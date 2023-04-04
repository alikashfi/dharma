<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutPageRequest extends FormRequest
{
    public function rules(): array
    {
        return array_merge(UserDetailsRequest::rules(), [
            'comment'  => 'nullable|max:255',
            'privacy_policy' => 'accepted',
        ]);
    }
}
