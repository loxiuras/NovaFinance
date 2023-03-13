<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class PasswordResetStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'password' => [
                'required',
                'confirmed',
                'string',
                'min:10',
                'max:30',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/'
            ]
        ];
    }
}
