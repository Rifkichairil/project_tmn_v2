<?php

namespace App\Rules;

use App\Models\Accounts;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class passwordConfirmation implements Rule
{
  /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($email, $password)
    {
        //
        $this->email    = $email;
        $this->password = $password;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */

     public $email, $password;

    public function passes($attribute, $value)
    {
        $account = Accounts::where('email', $this->email)->first();

        if (Hash::check($this->password, $account->password)) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':Attribute is wrong, please try again.';
    }
}
