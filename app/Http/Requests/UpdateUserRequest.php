<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
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
            'phone' => ['required', 'digits_between:10,11', 'numeric', Rule::unique('users')->ignore($this->route('user'))],
            'email' => ['required', 'max:255', 'email', Rule::unique('users')->ignore($this->route('user'))],
            'password' => ['nullable', 'same:password_confirmation', 'max:255', Password::min(6)],
            'password_confirmation' => ['nullable', Password::min(6)->letters()->numbers()->symbols()]
        ];
    }
}
