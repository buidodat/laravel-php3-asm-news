<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' =>'required|unique:posts',
            'category_id'=>'required',
            'author_id'=>'required',
            'content'=>'required',
            'description'=>'required',
            'image'=>'nullable|image|max:2048'
        ];
    }

    public function attributes() {
        return [
            'category_id'=>'category',
            'author_id'=>'author',
        ];

    }
}
