<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Rules\CheckCorrectPassword;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class PasswordRequest extends FormRequest
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
            'old_password' => [Password::min(6)->letters()->numbers()->symbols(), new CheckCorrectPassword()],
            'new_password' => ['same:password_confirmation', 'different:old_password', 'max:255', Password::min(6)],
            'password_confirmation' => [Password::min(6)->letters()->numbers()->symbols()]
        ];
    }
}
