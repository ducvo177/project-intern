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
            'price' => ['required','numeric','between:0,99.99'],
            'old_price' => ['required','numeric','between:0,99.99'],
            'benefits' => ['nullable', 'json'],
            'description' => ['required','string'],
            'content' => ['required','string'],
            'meta_title' => [ 'max:255', 'string'],
            'meta_desc' => ['max:255', 'string'],
            'meta_keyword' => [ 'max:255', 'string'],   
        ];
    }
}
