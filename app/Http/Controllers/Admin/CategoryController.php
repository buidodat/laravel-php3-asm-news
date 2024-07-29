<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const ROOT_PATH = "admin.categories.";
    public function index()
    {
        $categories = Category::latest('id')->paginate(10);
        return view(self::ROOT_PATH . __FUNCTION__ , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::ROOT_PATH . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->except('image');

        $data['is_active'] = isset($data['is_active']) ? 1: 0 ;

        $data['slug'] =  Str::slug($data['name']);

        if($request->hasFile('image')){
            $data['image'] = Storage::put('categories', $request->file('image'));
        }

        Category::create($data);

        return redirect()->route('admin.categories.index')
            ->with("success", "Thao tác thành công !");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view(self::ROOT_PATH . __FUNCTION__, compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view(self::ROOT_PATH . __FUNCTION__, compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->except('image');

        $data['is_active'] = isset($data['is_active']) ? 1: 0 ;

        if($request->hasFile('image')){
            $data['image'] = Storage::put('categories', $request->file('image'));
            if($category->image && Storage::exists($category->image)){
                Storage::delete($category->image);
            }
        }

        $data['slug'] = Str::slug($data['name']);

        $category->update($data);

        return back()
            ->with("success", "Thao tác thành công !");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success', 'Thao tác thành công!');
    }
}
