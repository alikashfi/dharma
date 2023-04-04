<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserDetailsRequest extends FormRequest
{
    public static function rules(): array
    {
        return [
            'fname'       => 'required|string|max:30',
            'lname'       => 'required|string|max:30',
            'address'     => 'required|string|max:255',
            'postal_code' => 'required|digits:10|numeric',
            'phone'       => 'required|regex:/(09)[0-9]{9}/|digits:11|numeric|unique:users,phone,' . auth()->id(),
        ];
    }
}
