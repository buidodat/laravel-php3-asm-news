<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
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
            ->with('author')
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
            ->get();

        $categories = DB::table('categories')
            ->selectRaw('categories.id, categories.name, count(category_id) as total_post')
            ->join('posts', 'categories.id', 'category_id')
            ->groupBy('category_id')
            ->get();


        return view('clients.home' , compact('postHot','postPopular','postTrendings','postRecents','categories'));
    }

    public function show(string $id)
    {
        $post = Post::with('author')->findOrFail($id);

        return view('clients.post-detail' , compact('post'));
    }

    public function postInCategory(string $id)
    {
        $category = Category::find($id);

        $posts = Post::query()
            ->with('author')
            ->where('category_id',$id)
            ->get();

        return view('clients.post-in-category' , compact('posts','category'));
    }

    public function search(Request $request)
    {
        $keyWord = '';
        if(isset($request->q)){
            $keyWord = $request->q;
        }


        $posts = Post::query()
            ->with('author')
            ->where('title', 'like', '%' . $keyWord. '%')
            ->orWhere('content', 'like', '%' . $keyWord. '%')
            ->get();

        return view('clients.search', compact('posts','keyWord'));
    }
}
