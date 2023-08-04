<?php

namespace App\Http\Requests;

use App\Rules\HTMLTag;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class KaryawanRequest extends FormRequest
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

    public function religion() {
        return [
            'ISLAM','KRISTEN','KATHOLIK','HINDU','BUDHA','KONGHUCU','OTHER'
        ];
    }

    public function rules(): array
    {
        return [
            //
            'position_id'       => ['required'],
            'email'             => ['required', 'email', new HTMLTag , 'unique:account,email'],
            'phone'             => ['required', 'unique:account,phone'],
            'fullname'          => ['required', 'max:100', new HTMLTag],
            'place_of_birth'    => ['required', 'string', new HTMLTag],
            'date_of_birth'     => ['required', 'date'],
            'gender'            => ['required', Rule::in(['LAKI', 'PEREMPUAN', 'OTHER'])],
            'religion'          => ['required', Rule::in($this->religion())],
            'address'           => ['required', 'string', new HTMLTag],
            'zipcode'           => ['required', 'digits:5'],
            'ktp_number'        => ['required', 'digits:16', 'unique:identity,ktp_number'],
            'npwp_number'       => ['unique:identity,npwp_number'],
        ];
    }

    public function attributes()
    {
        return [
            'position_id'       => "Position",
            'email'             => "Email",
            'phone'             => "Phone",
            'fullname'          => "Fullname",
            'place_of_birth'    => "Place of Birth",
            'date_of_birth'     => "Date of Birth",
            'gender'            => "Gender",
            'religion'          => "Religion",
            'address'           => "Address",
            'zipcode'           => "Zip Code",
            'ktp_number'        => "KTP Number",
        ];
    }
}
