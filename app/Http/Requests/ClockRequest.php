<?php

namespace App\Http\Requests;

use App\Rules\passwordConfirmation;
use App\Rules\statusConfirmation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClockRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
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
            'email'     => ['required', 'email', 'exists:account,email', new statusConfirmation($this->email)],
            'password'  => ['required', new passwordConfirmation($this->email, $this->password)],
            'type'      => ['required', Rule::in(['IN', 'OUT'])]
        ];
    }

    public function attributes()
    {
        return [
            'email'     => 'Email',
            'password'  => 'Password',
            'tipe'      => 'Type',
        ];
    }

}
