<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:255', 'string'],
            'slug' => ['required', 'max:255', 'string', 'unique:courses,slug'],
            'link' => ['required', 'max:255', 'url'],
            'price' => ['required', 'numeric', 'between:0,99.99'],
            'old_price' => ['required', 'numeric', 'between:0,99.99'],
            'category_id'=>['required'],
            'description' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'is_online'=>['required', 'boolean'],
            'meta_title' => ['required','max:255','nullable', 'string'],
            'meta_desc' => ['required','max:255','nullable', 'string'],
            'meta_keyword' => ['required','max:255','nullable', 'string'],
            'photo' => ['nullable','image','mimes:jpg,png,jpeg','max:2048'],
        ];
    }
}
