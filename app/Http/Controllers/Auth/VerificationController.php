<?php

namespace App\Http\Controllers\Auth;

use App\GeneralSettings;
use App\Http\Controllers\Controller;
use App\InvoiceOptions;
use App\Mail\VerifyUser;
use App\Organization;
use App\Rules\GstinPan;
use App\State;
use App\User;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth')->except('verify_email_otp');;
    }


    public function index()
    { 
        if (Session::has('user_id'))
        {   
            $user_id = Session::get('user_id');
            $user = User::find($user_id);
            // dd($user->id);
            if($user['status'] == 'pending'){
                return view('auth.verify')->with('user',$user);
            }else{
                return redirect('/login');
            }
        }else{
            return redirect('/login');
        }
    }

    public function verify_otp(Request $request){

        if ($request->method() == "POST") {
            // dd($request->all());
            $rules = array(
                'otp' => 'required',
            );
            $validator = Validator::make($request->all(), $rules);
            if (!$validator->fails()) {
                // $user = Auth::user();
                $user = User::find($request->user_id);
                if($user['otp'] == $request->otp){

                    $request->session()->put('user_id', $request->user_id);
                    $user->otp =  Str::random(6);
                    $user->status = 'active';
                    $user->save();
                    $generalSetting = new GeneralSettings();
                    $generalSetting->user_id = $user->id;
                    $generalSetting->default_first_page = 2;
                    $generalSetting->save();
                    return redirect('/signup-organization');
                }else{
                    return redirect()->back()->withInput()->withErrors(['otp' => 'OTP not match']);
                }
            }else{
                return redirect()->back()->withErrors($validator->errors());
            }
        }
    }

    public function resend_otp(Request $request){
            if($request->id){
                // $user = Auth::user();
                $user = User::find($request->id);
                $user->otp =  Str::random(6);
                $user->save();
                $encrypted = Crypt::encryptString($user->id);
                $user['encrypted'] = $encrypted;
                $mail = Mail::to($user->email)->send(new VerifyUser($user));
                return 1;
            }else{
                return 0;
            }
    }

    public function verify_email_otp($encrypt,$otp){
        $id = Crypt::decryptString($encrypt);
        $user = User::find($id);
        if(isset($user) && count((array)$user)>0){
            return view('auth.verify',compact('user'));
        }else{
            redirect('/login');
        }
    }

    public function signup_organization(){
        if (Session::has('user_id'))
        {   
            $user_id = Session::get('user_id');
            $user = User::find($user_id);
            $states = State::where('status','active')->where('country_id',1)->get();
            return view('auth.signup_organization',compact('states','user'));
        }
        
    } 
    
    public function save_organization(Request $request){
        
        if ($request->method() == "POST") {
            $rules = array(
                'name' => 'required',
                'type' => 'required|not_in:0',
                'gstin' => ['required',new GstinPan('gstin')],
                'address1' => 'required',
                'state_id' => 'required|not_in:0',
                'city' => 'required',
                'pincode' => 'required|digits:6',
            );
            $validator = Validator::make($request->all(), $rules);
            if (!$validator->fails()) {
                $organization = new Organization();
                $organization->user_id =  $request->user_id;
                $organization->name = $request->name;
                $organization->type = $request->type;
                $organization->gstin = $request->gstin;
                $organization->address1 = $request->address1;
                $organization->address2 = $request->address2 != null ?$request->address2:'';
                $organization->state_id = $request->state_id;
                $organization->city = $request->city;
                $organization->pincode = $request->pincode;
                $organization->save();

                $options = ['invoice','delivery_challan','quotation','proforma_invoice','purchase_order','debit_note','credit_note'];

                foreach($options as $option){
                    $invoice_option = new InvoiceOptions();
                    $invoice_option->user_id = $request->user_id;;
                    $invoice_option->po_no = 0;
                    $invoice_option->lr_no = 0;
                    $invoice_option->invoice_no_prefix = '';
                    $invoice_option->invoice_no_postfix = '';
                    $invoice_option->term_condition_title = '';
                    $invoice_option->term_condition = '';
                    $invoice_option->type = $option;
                    $invoice_option->status = 'active';
                    $invoice_option->save();
                }
                return redirect('home');
            }else{
                return redirect()->back()->withInput()->withErrors($validator->errors());
            }
        }
    }

    public function change_email(){
        if (Session::has('user_id'))
        {   
            $user_id = Session::get('user_id');
            $user = User::find($user_id);
            return view('auth.change_email')->with('user',$user);
        }
    }

    public function update_email(Request $request){
        // dd($request->all());
        if ($request->method() == "POST") {
            $user_id =  Session::get('user_id');
            $user = User::find($user_id);
            // dd($user);
            $rules = array(
                "email" => ["required",Rule::unique('users')->ignore($user->id)],
            );
            $validator = Validator::make($request->all(), $rules);
            if (!$validator->fails()) {
                $user->email = $request->email;
                $user->otp =  Str::random(6);
                $user->status = 'pending';
                $user->save();
                // dd($user);
                $encrypted = Crypt::encryptString($user->id);
                $user['encrypted'] = $encrypted;
                Mail::to($user->email)->send(new VerifyUser($user));
                return redirect('verify');
            }else{
                return redirect()->back()->withInput()->withErrors($validator->errors());
            }
        }
    }
}
