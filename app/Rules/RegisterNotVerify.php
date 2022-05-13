<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Auth\User;

class RegisterNotVerify implements Rule
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
        $user = User::where('email',$value)->get()->first();
        
        if(isset($user) && count(array($user))>0 ){
            if($user->status == 'pending'){
                $user->delete();
                return true;
            }else{
                return false;
            }

        }else{
            return true;
        }
        // die;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {

        return 'Email already exists.';
    }
}
