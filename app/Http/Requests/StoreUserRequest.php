<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
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
            'phone' => ['required', 'digits_between:10,11', 'numeric', 'unique:users,phone'],
            'email' => ['required', 'max:255', 'email', 'unique:users,email'],
            'password' => ['required_with:password_confirmation', 'same:password_confirmation', 'max:255', Password::min(6)->letters()->numbers()->symbols()],
            'password_confirmation' => [Password::min(6)->letters()->numbers()->symbols()]
        ];
    }
}
