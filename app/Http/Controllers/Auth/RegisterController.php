<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;
use App\Mail\VerifyUser;
use App\Rules\alphaSpace;
use App\Rules\CustomEmailValidate;
use App\Rules\PasswordValid;
use App\Rules\PhoneAlreadyExist;
use App\Rules\RegisterNotVerify;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/verify';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', new alphaSpace, 'max:255'],
            // 'email' => ['required', 'string', new CustomEmailValidate, 'max:255', 'unique:users'],
            'email' => ['required', 'string', new CustomEmailValidate, 'max:255', new RegisterNotVerify],
            // 'phone' => ['required', 'digits:10', 'max:255', 'unique:users'],
            'phone' => ['required', 'digits:10', 'max:255',  new PhoneAlreadyExist($data['email'])],
            'password' => ['required', 'string', 'min:8',new PasswordValid, 'confirmed'],
            'term_condition' => ['required'],
        ]);
        // $this->errors = $validation->messages();
        // dd($validation->messages());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {   
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'country_code' => '+91',
            'password' => Hash::make($data['password']),
            'otp' => Str::random(6)
        ]);
        $encrypted = Crypt::encryptString($user->id);
        $user['encrypted'] = $encrypted;
        
        Mail::to($user->email)->send(new VerifyUser($user));
        return $user;
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        
        $request->session()->put('user_id', $user->id);
        // dd($user);
        // $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }
}
