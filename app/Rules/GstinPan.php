<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class GstinPan implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    public $type = 'gstin';
    
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
        if($this->type == 'gstin'){
            return preg_match('/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/',$value);
        }

        if($this->type == 'pan'){
            return preg_match("/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/", $value);
        }


        if($this->type == 'both'){
            if(preg_match('/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/',$value) || preg_match("/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/", $value) ){
                return true;
            }else{
                return false;
            }
        }


        
        // return pre($value) === $value;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {   
        if($this->type == 'gstin'){
            return 'Invalid GST no.';
        }

        if($this->type == 'pan'){
            return 'Invalid PAN no.';
        }

        if($this->type == 'both'){
            return 'Invalid PAN or GSTIN no.';
        }
        
    }
}
