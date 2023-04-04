<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSettingsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email'            => 'email|max:100|unique:users,email,' . auth()->id(),
            'current_password' => 'nullable|required_with:password|string|max:255|current_password',
            'password'         => 'nullable|max:255|confirmed',
        ];
    }

    public function validated($key = null, $default = null)
    {
        return array_filter(array_merge(
            parent::validated(),
            ['password' => $this->password ? bcrypt($this->password) : null]
        ));
    }
}
