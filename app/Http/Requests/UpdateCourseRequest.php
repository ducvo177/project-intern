<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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
            'slug' => ['required', 'max:255', 'string', Rule::unique('courses')->ignore($this->route('course'))],
            'link' => ['required', 'max:255', 'url'],
            'price' => ['required', 'numeric', 'between:0,99.99'],
            'old_price' => ['required', 'numeric', 'between:0,99.99'],
            'category_id'=>['required'],
            'description' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'meta_title' => ['max:255','nullable', 'string'],
            'meta_desc' => ['max:255','nullable', 'string'],
            'meta_keyword' => ['max:255','nullable', 'string'],
            'photo' => ['nullable','image','mimes:jpg,png,jpeg','max:2048'],
        ];
    }
}
