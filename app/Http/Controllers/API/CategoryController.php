<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {


        try {
            $data = Category::query()->latest('id')->paginate(5);
            return response()->json($data);
        } catch (\Throwable $th) {
            if ($th instanceof ModelNotFoundException) {
                return response()->json(
                    [
                        'error' => $th->getMessage()
                    ],
                    Response::HTTP_NOT_FOUND
                );
            }
            return response()->json(
                [
                    'error' => $th->getMessage()
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }


    public function show(string $id)
    {
        try {
            $data = Category::findOrFail($id);
            return response()->json($data);
        } catch (\Throwable $th) {
            //tạo file log khi người dùng thực hiện các chức năng có lỗi để mình biết người dùng sảy ra lỗi như này để vào fix
            Log::error(__CLASS__ . '@' .__FUNCTION__ ,[
                'line' => $th->getline(),
                'message' => $th->getMessage()

            ]);

            if ($th instanceof ModelNotFoundException) {
                return response()->json(
                    [
                        'error' => $th->getMessage()
                    ],
                    Response::HTTP_NOT_FOUND
                );
            }

            return response()->json(
                [
                    'error' => $th->getMessage()
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
    public function store(Request $request)
    {
        try {
            $model = $request->except('image');

            $model['is_active'] = isset($model['is_active']) ? 1: 0 ;

            $model['slug'] = Str::slug($request->name);
            if($request->hasFile('image')){
                $model['image'] = Storage::put('categories', $request->file('image'));
            }

            Category::query()->create($model);
            return response($model,Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json([
                    'error'=> $th->getMessage()
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
    public function update(Request $request, string $id)
    {
        try {
            $data = $request->except('image');

            $data['is_active'] = isset($data['is_active']) ? 1: 0 ;

            $model = Category::findOrFail($id);

            $data['slug'] = Str::slug($request->name);
            if($request->hasFile('image')){
                $data['image'] = Storage::put('categories', $request->file('image'));
                if($model->image && Storage::exists($model->image)){
                    Storage::delete($model->image);
                }
            }
            $model->update($data);
            return response($model);
        } catch (\Throwable $th) {
            return response()->json([
                    'error'=> $th->getMessage()
                ],
                500
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {
            Category::destroy($id);
            return response()->json([
                'message' => "Deleted Ok !"
            ]);
        } catch (\Throwable $th) {
            if ($th instanceof ModelNotFoundException) {
                return response()->json(
                    [
                        'error' => $th->getMessage()
                    ],
                    Response::HTTP_INTERNAL_SERVER_ERROR
                );
            }
        }
    }
}
