<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class PostController extends Controller
{

    public function home()
    {
        $postHot = Post::query()
            ->with('author','tags')
            ->where('is_hot_post',1)
            ->orderByDesc('updated_at')
            ->first();

        $postPopular = Post::query()
            ->with('author')
            ->where('is_popular',1)
            ->orderByDesc('updated_at')
            ->first();

        $postTrendings = Post::query()
            ->where('is_popular',0)
            ->where('is_hot_post',0)
            ->orderByDesc('views')
            ->limit(3)
            ->get();

        $postRecents = Post::query()
            ->with('author')
            ->orderByDesc('id')
            ->paginate(5);

        $categories = DB::table('categories')
            ->selectRaw('categories.id, categories.name,categories.slug, count(category_id) as total_post')
            ->join('posts', 'categories.id', 'category_id')
            ->where('categories.is_active',1)
            ->groupBy('category_id')
            ->get();
        $authors = Author::all();
        return view('clients.home' , compact('postHot','postPopular','postTrendings','postRecents','categories','authors'));
    }

    public function show(string $category, string $slug)
    {
        $post = Post::with('author','category')->where('slug',$slug)->firstOrFail();
        $post->increment('views');

        return view('clients.post-detail' , compact('post'));
    }

    public function postInCategory(string $slug)
    {
        $category = Category::where('slug',$slug)->firstOrFail();
        
        $posts = Post::query()
            ->with('author','tags',)
            ->where('category_id',$category->id)
            ->paginate(10);

        return view('clients.post-in-category' , compact('posts','category'));
    }

    public function search(Request $request)
    {
        $keyWord = '';
        if(isset($request->q)){
            $keyWord = $request->q;
        }


        $posts = Post::query()
            ->with('author','category')
            ->where('title', 'like', '%' . $keyWord. '%')
            ->orWhere('content', 'like', '%' . $keyWord. '%')
            ->paginate(10);

        return view('clients.search', compact('posts','keyWord'));
    }
}
