<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Customers;
use App\Address;
use App\Rules\BankValidation;
use App\Rules\GstinPan;
use App\Rules\Licensenumber;
use App\State;
use Auth;

class CustomerVendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $customers_data = Customers::select('customers.*','addresses.*','states.name as state_name','customers.id as id')->join('states','states.id','=','customers.state_id')->leftjoin('addresses','addresses.customer_id','=','customers.id')->where('customers.user_id',$user_id);
        $total_customer = $customers_data->count();
        $customers = $customers_data->get();
        $states = State::where('status','active')->where('country_id',1)->get();
        return view('customer.index',compact('customers','states','total_customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::where('status','active')->where('country_id',1)->get();
        return view('customer.create')->with('states',$states);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if ($request->method() == "POST") {
            $rules = array(
                "name" => "required",
                "state_id" => 'required',
                "registration_type" => "required",
                "type" => "required",
                "pan" => ['nullable',new GstinPan('pan')],
                "gstin" => ['nullable',new GstinPan('gstin')],
                "shipping_pan" => ['nullable',new GstinPan('pan')],
                "shipping_gstin" => ['nullable',new GstinPan('gstin')],
                "pincode" => ['required','numeric']
            );
            $validator = Validator::make($request->all(), $rules);
            if (!$validator->fails()) {
               
                $customer = new Customers();
                $customer->name = $request->name;
                $customer->user_id = Auth::user()->id;
              
                $customer->phone = $request->phone != null ? $request->phone : '';
                $customer->address1 = $request->address1 != null ? $request->address1 : '';
            
                $customer->pincode = $request->pincode != null ? $request->pincode : '';
                $customer->state_id = $request->state_id ;
                $customer->country_code = '+91';
           
                $customer->type = $request->type != null ? $request->type : '';
           
                $customer->registration_type = $request->registration_type != null ? $request->registration_type : '';
                $customer->gstin = $request->gstin != null ? $request->gstin : '';
                $customer->pan = $request->pan != null ? $request->pan : '';
                $customer->same_shipping = $request->same_shipping == 1 ? 'on' : 'off';
                           
               if($customer->save()){
                    $customer_id = $customer->id;
                    if( $request->same_shipping){
                        $address = new address();
                        $address->customer_id = $customer_id;
                        $address->shipping_name = $request->name ?$request->name :'';
                        $address->shipping_phone = $request->phone ? $request->phone:'';
                        $address->shipping_country_code = '+91';
                        $address->shipping_address = $request->address1? $request->address1 :'';
                        $address->shipping_state_id = $request->state_id ? $request->state_id :'';
                        $address->shipping_pan = $request->pan ? $request->pan :'';
                        $address->shipping_gstin = $request->gstin ? $request->gstin:'';
                        $address->save();
                    }else{
                        $address = new address();
                        $address->customer_id = $customer_id;
                        $address->shipping_name = $request->shipping_name ?$request->shipping_name :'';
                        $address->shipping_phone = $request->shipping_phone ? $request->shipping_phone:'';
                        $address->shipping_country_code = '+91';
                        $address->shipping_address = $request->shipping_address? $request->shipping_address :'';
                        $address->shipping_state_id = $request->shipping_state_id ? $request->shipping_state_id :'';
                        $address->shipping_pan = $request->shipping_pan ? $request->shipping_pan :'';
                        $address->shipping_gstin = $request->shipping_gstin ? $request->shipping_gstin:'';
                        $address->save();
                    }
                    $notification = array(
                        'message' => $customer->type.' Added Successfully',
                    );
                    return redirect('/customers')->with($notification);
                    
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $states = State::where('status','active')->where('country_id',1)->get();
        $customer = Customers::select('customers.*','addresses.*','customers.id as id')->leftjoin('addresses','addresses.customer_id','=','customers.id')->where('customers.id',$id)->get()->first();
        return view('customer.edit')->with(array('customer'=>$customer,'states' => $states));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {       
            $rules = array(
                "name" => "required",
                "state_id" => 'required',
                "registration_type" => "required",
                "type" => "required",
            );
            $validator = Validator::make($request->all(), $rules);
            if (!$validator->fails()) {
                $customer = Customers::find($id);
                $customer->name = $request->name;
                $customer->phone = $request->phone != null ? $request->phone : '';
                $customer->address1 = $request->address1 != null ? $request->address1 : '';
            
                $customer->pincode = $request->pincode != null ? $request->pincode : '';
                $customer->state_id = $request->state_id ;
                $customer->country_code = '+91';
           
                $customer->type = $request->type != null ? $request->type : '';
           
                $customer->registration_type = $request->registration_type != null ? $request->registration_type : '';
                $customer->gstin = $request->gstin != null ? $request->gstin : '';
                $customer->pan = $request->pan != null ? $request->pan : '';
                $customer->same_shipping = $request->same_shipping == 1 ? 'on' : 'off';
                           
                
                if($customer->save()){
                    $address_id = $request->address_id;
                    if( $request->shipping_name != null ){
                        
                        $address = address::find($address_id);
                        if($address==null){
                            $address = new Address();
                        }
                        $address->shipping_name = $request->shipping_name ?$request->shipping_name :'';
                        $address->shipping_phone = $request->shipping_phone ? $request->shipping_phone:'';
                        $address->shipping_country_code = '+91';
                        $address->shipping_address = $request->shipping_address? $request->shipping_address :'';
                        $address->shipping_state_id = $request->shipping_state_id ? $request->shipping_state_id :'';
                        $address->shipping_pan = $request->shipping_pan ? $request->shipping_pan :'';
                        $address->shipping_gstin = $request->shipping_gstin ? $request->shipping_gstin:'';
                        $address->save();
                    }
                    $notification = array(
                        'message' => $customer->type.' Updated Successfully',
                        'status' => 1
                    );
                    return response()->json($notification);
                }else{
                    $notification = array(
                        'message' => 'Internal Server Error!!',
                        'type' => 'warning',
                        'status' => 1
                    );
                    return response()->json($notification);
                }
                
            }else{
                $notification = array(
                    'message' => $validator->errors()->first(),
                    'type' => 'warning',
                    'status' => 0
                );
                return response()->json($notification);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function multidelete(Request $request){
        if ($request->method() == "POST") {
            $rules = array(
                "customer_id" => "required"
            );
            $validator = Validator::make($request->all(), $rules);
            if (!$validator->fails()) {
                $customers = $request->customer_id;
                foreach($customers as $customer){
                    Customers::where('id',$customer)->delete();
                }
                return 1;
            }else{
                echo $validator->errors()->first();
                die;
            }
        }
    }

    public function changecustomerStatus(Request $request,$id)
    {
        $customer = Customers::find($id);
        $customer->status = $request->status;
        if($customer->save()){
            return response()->json(['status' => 1,'message'=>'Status change successfully.']);
        }else{
            return response()->json(['status' => 0,'message'=>'Somwthing went wrong']);
        }
  
        
    }
}
