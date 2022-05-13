<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CustomEmailValidate implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        
        return preg_match("/^[a-zA-Z0-9_.]+@[a-zA-Z_]+?\.[a-zA-Z]{2,6}$/", $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid Email Id.';
    }
}
