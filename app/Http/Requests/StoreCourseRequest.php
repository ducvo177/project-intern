<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

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
             // 'price' => ['required','numeric', 'between:0,99.99'],
             // 'old_price' => ['required','numeric', 'between:0,99.99'],
            'category_id' => ['required', 'integer'],
            'lessons' => ['required', 'integer'],
            'view_count' => ['required', 'integer'],
            'benefits' => ['required', 'json'],
            'fqa' => ['required', 'json'],
            'description' => ['nullable','string'],
            'content' => ['nullable','string'],
            'meta_title' => ['required', 'max:255', 'string'],
            'meta_desc' => ['required', 'max:255', 'string'],
            'meta_keyword' => ['required', 'max:255', 'string'],

        ];
    }
}
