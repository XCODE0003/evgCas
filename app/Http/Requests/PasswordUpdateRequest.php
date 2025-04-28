<?php

namespace App\Http\Requests;

use App\Rules\ValidateUserPassword;
use Illuminate\Foundation\Http\FormRequest;

class PasswordUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'old_password' => ['required', 'string', 'min:8', new ValidateUserPassword],
            'password_confirmation' => ['required', 'string', 'min:8'],
        ];
    }
}