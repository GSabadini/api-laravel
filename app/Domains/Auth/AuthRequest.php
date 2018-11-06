<?php

namespace App\Domains\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class AuthRequest
 */
class AuthRequest extends FormRequest
{

    public function rules()
    {
        return [
            'email' => 'required',
            'password' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
