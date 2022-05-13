<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class BankValidation implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    public $type = 'account';
    public function __construct($type)
    {
        //
        if(!empty($type)){
            $this->type = $type;
        }

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
        if($this->type == 'account'){
            return preg_match('/^\d{9,18}$/',$value);
        }

        if($this->type == 'ifsc'){
            return preg_match('/^[A-Z]{4}0[A-Z0-9]{6}$/',$value);
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        if($this->type == 'account'){
            return "Invalid Account Number";
        }

        if($this->type == 'ifsc'){
            return "Invalid IFSC Code";
        }
    }
}
