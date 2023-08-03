<?php

namespace App\Http\Requests;

use App\Rules\HTMLTag;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'fullname'  => ['required', 'max:100', new HTMLTag],
            'email'     => ['required', 'email', 'max:45', 'unique:account,email']
        ];
    }

    public function attributes()
    {
        return [
            'fullname'  => 'Fullname',
            'email'     => 'Email'
        ];
    }
}
