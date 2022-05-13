<?php

namespace App\Http\Controllers;

use App\Mail\ForgetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Units;
use App\State;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Redirect,Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use DB;
use Charts;
class AdminController extends Controller
{
    
     //public function __construct()
    // {
   //      $this->middleware(['admin']);

   //  }

    public function index()
    {
       return view('admin/admin');
    }
    public function validateadminLogin(Request $request)
    {
    	//dd($request->all());
      $user =  $request->validate([
        	'email'  => 'required|string|email',
            'password' => 'required|string',
        ]);

    	if (Auth::attempt([ 'role_id' => '1','email' => $request->email, 'password' => $request->password] )) {
    	$data = $request->session()->all();
    	//die("hello");
        return redirect()->intended('admin/dashboard');

        }
        else {
            return back()->with("failed", "Invalid Credentials");
        }
      
    }
    public function admindashboard(Request $request)
    {
    
      $countusers = User::where('role_id', '3')->count();
      $countstates = State::count();
      $countunits = Units::count();
      $users = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
    				->get();
        $chart = Charts::database($users, 'bar', 'highcharts')
			      ->title("Monthly new Register Users")
			      ->elementLabel("Total Users")
			      ->dimensions(1000, 500)
			      ->responsive(false)
			      ->groupByMonth(date('Y'), true);
         // dd($chart);        
     //   return view('chart',compact('chart'));
      return view('admin/dashboard', ['data' => $countusers,'states' => $countstates, 'units' => $countunits , 'chart' => $chart,]);
      //return view('admin/dashboard');
    }
    public function userslist(Request $request)
    {
    	//  return view('admin/userslist');
       	$data = User::where('role_id', '3')->get();
        return view('admin/userslist', ['data' => $data]);
    }
    public function changeStatus(Request $request)
    {
        $user = User::find($request->user_id);

        $user->status = $request->status;
        $user->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }
   
	public function editprofile(Request $request)
    {
    	$data = Auth::user();
    	//dd($data);
      return view('admin/editprofile' ,['data' => $data]);
    }
    public function saveprofile(Request $request)
    {
        $user = Auth::user();
        //$image_name = $request->hidden_image;
        $image = $request->file('image');
       // dd($image);
        $rules = array(
            "name" => "required",
            "email" => ["required",Rule::unique('users')->ignore($user->id)],
            "phone" => ["required",Rule::unique('users')->ignore($user->id)],
            "password" => ['nullable','confirmed'],
            'image'         =>  'image|max:2048'
            //'profile_image' => ['required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'],
        );
        $validator = Validator::make($request->all(), $rules);
        if (!$validator->fails()) {
            // dd($request->all());
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
         
            if($image){
                $image_name =md5(rand()) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload'), $image_name);
              
               $user->image = 'upload/' .$image_name;
            }
            
            if($request->password){
                $user->password = Hash::make($request->password);
            }
           // $user->save();
           // return redirect()->back();
            if($user->save()){
                $notification = array(
                    'message' => 'profile updated Successfully',
                );
                return redirect()->back()->with($notification);
            }else{
                $notification = array(
                    'message' => 'Internal Server Error!!',
                    'type' => 'warning'
                );
                return redirect()->back()->with($notification)->withinput();
            }
        }else{
            //dd($validator->errors());
            return redirect()->back()->withinput()->withErrors($validator->errors());
        }
    }
    ///Units edit,delete,add,update
	public function units(Request $request)
    {
    	// return view('admin/units');
    
    	$data = Units::all();
        return view('admin/units', ['data' => $data]);
       

    }
	public function storeunit(Request $request)
    {
        //
        if ($request->method() == "POST") {
            $rules = array(
                "name" => "required",
                "short_name" => 'required'
                        );
            $validator = Validator::make($request->all(), $rules);
            if (!$validator->fails()) {
                // dd($request->all());
                $unit = new Units();
                $unit->name = $request->name;
               // $customer->user_id = Auth::user()->id;
                $unit->short_name = $request->short_name;
                $unit->symbol = "";
                if($unit->save()){
                 
                    $notification = array(
                        'message' => 'units  Added Successfully',
                    );
                    return redirect()->back()->with($notification);
                    
                }else{
                    $notification = array(
                        'message' => 'Internal Server Error!!',
                        'type' => 'warning'
                    );
                    return redirect()->back()->with($notification)->withinput();
                }
                
            }else{
                return redirect()->back()->withInput()->withErrors($validator->errors());
            }
        }
    }
    public function getunit($id)
    {
        
        $where = array('id' => $id);
        $post  = Units::where($where)->first();
 
        return Response::json($post);
      
    }
    public function updateunit(Request $request)
    {
        if ($request->method() == "POST") {
            $rules = array(
                "name" => "required",
                "short_name" => 'required'
                        );
            $validator = Validator::make($request->all(), $rules);
            if (!$validator->fails()) {
                 //dd($request->all());
                //$unit = new Units();
                $id = $request->id;
                $unit = Units::findOrFail($id);
                $unit->name = $request->name;
               // $customer->user_id = Auth::user()->id;
                $unit->short_name = $request->short_name;
                $unit->symbol = "";
                if($unit->save()){
                    $notification = array(
                        'message' => 'units Updated Successfully',
                        'status' => '1',
                        'data' => $unit
                       );
                    return Response::json($notification);
                  
                    //return redirect()->back()->with($notification);
                    
                }else{
                    $notification = array(
                        'message' => 'Internal Server Error!!',
                        'type' => 'warning',
                        'status' => '0'
                    );
                    return Response::json($notification);
                    //return redirect()->back()->with($notification)->withinput();
                }
                
            }else{
                return Response::json($validator->errors());
                //return redirect()->back()->withInput()->withErrors($validator->errors());
            }
        }
    }
    public function destroy($id)
    {
        Units::find($id)->delete();
     
        return response()->json(['success'=>'Unit deleted successfully.']);
    }
    ///State edit,delete,add,update
    public function state(Request $request)
    {
    	
     // return view('admin/state');
    	$data = State::all();
        return view('admin/state', ['data' => $data]);
    }
    public function storestate(Request $request)
    {
       // dd($request->all());
        if ($request->method() == "POST") {
            $rules = array(
                "name" => "required|unique:states",
                "state_code" => 'required'
                        );
            $validator = Validator::make($request->all(), $rules);
            if (!$validator->fails()) {
                 
                $state = new State();
                $state->name = $request->name;
               // $customer->user_id = Auth::user()->id;
                $state->state_code= $request->state_code;
                $state->country_id = "1";
                $state->alpha_code ="";
                if($state->save()){
                 
                    $notification = array(
                        'message' => 'State Added Successfully',
                    );
                    return redirect()->back()->with($notification);
                    
                }else{
                    $notification = array(
                        'message' => 'Internal Server Error!!',
                        'type' => 'warning'
                    );
                    return redirect()->back()->with($notification)->withinput();
                }
                
            }else{
                //return redirect()->back()->withInput()->withErrors($validator->errors());
                $messages = $validator->messages()->first();
                //dd($messages);
                $notification = array(
                    'message' =>$messages,
                    'type' => 'warning'
                );
                return redirect()->back()->with($notification)->withinput();
            
            }
        }
    }
    public function getstate($id)
    {
        
        $where = array('id' => $id);
        $post  = State::where($where)->first();
 
        return Response::json($post);
      
    }
    public function updatestate(Request $request)
    {
        if ($request->method() == "POST") {
            $rules = array(
                "name" => "required",
                "state_code" => 'required'
                        );
            $validator = Validator::make($request->all(), $rules);
            if (!$validator->fails()) {
                 //dd($request->all());
                $id = $request->id;
                $state = State::findOrFail($id);
                $state->name = $request->name;
                $state->country_id = "1";
                $state->alpha_code ="";
               // $customer->user_id = Auth::user()->id;
                $state->state_code = $request->state_code;
                if($state->save()){
                    $notification = array(
                        'message' => 'State Updated Successfully',
                        'status' => '1',
                        'data' => $state
                       );
                    return Response::json($notification);
                  
                    //return redirect()->back()->with($notification);
                    
                }else{
                    $notification = array(
                        'message' => 'Internal Server Error!!',
                        'type' => 'warning',
                        'status' => '0'
                    );
                    return Response::json($notification);
                    //return redirect()->back()->with($notification)->withinput();
                }
                
            }else{
                return Response::json($validator->errors());
                //return redirect()->back()->withInput()->withErrors($validator->errors());
            }
        }
    }
    public function destroystate($id)
    {
        State::find($id)->delete();
     
        return response()->json(['success'=>'State deleted successfully.']);
    }
    public function changestateStatus(Request $request,$id)
    {
        $state = State::find($id);
        $state->status = $request->status;
        $state->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }
    public function logoutadmin(Request $request) {
        Auth::logout();
        return redirect('/adminlogin');
     }
    public function forgotpassword(){

        return view('admin/forgotpass');
     
    }
    public function resetpassword(Request $request)
    {
      //  dd($request->all());
        if ($request->method() == "POST") {
            $rules = array(
                "email" => ["required"]
            );
            $validator = Validator::make($request->all(), $rules);
            if (!$validator->fails()) {
               
                $where = array('email' => $request->email, 'role_id' => '1' );
                $user  = User::where($where)->first();
               
                //dd($user);
                if($user){
                    $user->otp =  Str::random(6);
                   $user->save();
                   Mail::to($user->email)->send(new ForgetPassword($user));
                  // user details in session
                   session(['user' => $user]);
                  // return 1;
                 
                 return view('admin/resetpass', ['user' => $user]);
                 // return view('admin/resetpass');

                }else{

                    return redirect()->back()->withInput()->withErrors();
                }
            }else{
                return redirect()->back()->withErrors($validator->errors());
            }
        }    
       // return view('admin/forgotpass');
     
    }
    public function resetpass(Request $request)
    {

       
        $rules = array(
            "otp" =>  ['required'],
            "password" => ['required']
             
        );

        $validator = Validator::make($request->all(), $rules);
        if (!$validator->fails()) {
             //dd($request->all());
            // $user->otp = $request->otp;
            // $user->password = $request->password;
            $id = $request->id;
            $user = User::find($id);
            //dd($user);
            if($request->otp == $user->otp)
            {
                $user->password = Hash::make($request->password);
                $user->otp =  Str::random(6);

                $user->save();
                return redirect('/adminlogin');
                //return view('admin/adminlogin');
            }
            else{
                return redirect()->back()->withInput()->withErrors(['otp' => 'OTP not match']);
                //return redirect()->back();
               // return view('admin/resetpass');
            }
     
        }
        else{

            return redirect()->back()->withErrors($validator->errors());
        }
       
    }
    public function verifyotp(){
       // session value get
        $user = session('user');
        //dd($user);
        return view('admin/resetpass', ['user' => $user]);
    }
 


}

