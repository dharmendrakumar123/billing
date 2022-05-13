<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Vehiclenumber implements Rule
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
        if(preg_match('/^[A-Za-z\s]{2}[0-9\s]{1,2}[A-Za-z\s]{1,2}[0-9\s]{1,4}$/',$value)){
            return true;
        }else{
            return false;
        }

        return ;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid Vehicle Number';
    }
}
