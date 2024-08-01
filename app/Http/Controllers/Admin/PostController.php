<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePostRequest;
use App\Http\Requests\Admin\UpdatePostRequest;
use App\Models\Author;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const ROOT_PATH = "admin.posts.";
    public function index()
    {
        $posts = Post::with(['author','category','tags'])->latest('id')->get();
        return view(self::ROOT_PATH . __FUNCTION__ , compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::query()->pluck('name', 'id')->all();
        $authors = Author::query()->pluck('name', 'id')->all();
        $tags = Tag::query()->pluck('name', 'id')->all();
        return view(self::ROOT_PATH . __FUNCTION__ ,compact('categories','authors','tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        try {
            DB::transaction(function() use ($request) {
                $dataPost = $request->except('tags');
                $dataPost['slug'] = Str::slug($dataPost['title']) . ".html";
                $dataPost['is_active'] = isset($dataPost['is_active']) ? 1 : 0;
                $dataPost['is_popular'] = isset($dataPost['is_popular']) ? 1 : 0;
                $dataPost['is_hot_post'] = isset($dataPost['is_hot_post']) ? 1 : 0;
                if($request->hasFile('image')){
                    $dataPost['image'] = Storage::put('posts',$request->file('image'));
                }
                $post = Post::create($dataPost);

                $dataTags = $request->tags;
                $post->tags()->sync($dataTags);

            },3);

            return redirect()
                ->route('admin.posts.index')
                ->with('success', 'Thao tác thành công!');

        } catch (Exception $exception) {
            return back()
                ->with('error', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->load([
            'category',
            'author',
            'tags',
        ]);
        $categories = Category::query()->pluck('name', 'id')->all();
        $authors = Author::query()->pluck('name', 'id')->all();
        $tags = Tag::query()->pluck('name', 'id')->all();
        return view(self::ROOT_PATH . __FUNCTION__, compact('post','categories','authors','tags') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $post->load([
            'category',
            'author',
            'tags',
        ]);
        $categories = Category::query()->pluck('name', 'id')->all();
        $authors = Author::query()->pluck('name', 'id')->all();
        $tags = Tag::query()->pluck('name', 'id')->all();
        return view(self::ROOT_PATH . __FUNCTION__, compact('post','categories','authors','tags') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        try {
            DB::transaction(function() use ($request, $post) {
                $dataPost = $request->except('tags');
                $dataPost['slug'] = Str::slug($dataPost['title']) . ".html";
                $dataPost['is_active'] = isset($dataPost['is_active']) ? 1 : 0;
                $dataPost['is_popular'] = isset($dataPost['is_popular']) ? 1 : 0;
                $dataPost['is_hot_post'] = isset($dataPost['is_hot_post']) ? 1 : 0;
                if($request->hasFile('image')){
                    $dataPost['image'] = Storage::put('posts',$request->file('image'));
                    if($post->image && Storage::exists($post->image)){
                        Storage::delete($post->image);
                    }
                }

                $post->update($dataPost);
                
                $post->tags()->sync($request->tags);




            },3);

            return back()
                    ->with("success", "Thao tác thành công !");

        } catch (Exception $exception) {
            return back()
                ->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
