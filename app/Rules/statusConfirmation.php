<?php

namespace App\Rules;

use App\Models\Accounts;
use Illuminate\Contracts\Validation\Rule;

class statusConfirmation implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        //
        $this->email    = $email;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public $email;

    public function passes($attribute, $value)
    {
        $account = Accounts::where('email', $this->email)->first();

        if (!$account) {
            return false;
        }

        if ($account->status == 0 || $account->position_id == 1) {
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'your account is admin or your account is not active, pls contact support.';
    }
}
