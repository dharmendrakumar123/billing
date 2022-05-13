<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Auth\User;

class PhoneAlreadyExist implements Rule
{
    
    public $type ;
    
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        if(!empty($email)){
            $this->email = $email;
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
        $user = User::where(array('phone'=> $value))->get()->first();
        
        if(isset($user) && count(array($user))>0 ){
            if($user->status == 'pending' && $user->email == $this->email){
                $user->delete();
                return true;
            }else{
                return false;
            }

        }else{
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Phone already exist.';
    }
}
