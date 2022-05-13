<?php

namespace App\Http\Controllers;

use App\TransportCharge;
use Illuminate\Http\Request;
use Auth;
use Validator;

class TransportChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_id = Auth::user()->id;
        $transportcharges = TransportCharge::where('user_id','=',$user_id)->orderBy('id','desc')->get();
        // dd($transportcharges);
        return view('transportcharge.index')->with('transportcharges',$transportcharges);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('transportcharge.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if ($request->method() == "POST") {
            $rules = array(
                "name" => "required"
            );
            $validator = Validator::make($request->all(), $rules);
            if (!$validator->fails()) {
               
                $transportcharge = new TransportCharge();
                $transportcharge->name = $request->name;
                $transportcharge->user_id = Auth::user()->id;
                $transportcharge->product_note = $request->product_note != null ? $request->product_note:'';
                $transportcharge->sell_price = $request->sell_price != null ? $request->sell_price :0;
                $transportcharge->hsn = $request->hsn != null ? $request->hsn :'';
                $transportcharge->type = $request->type != null ? $request->type :'';
                $transportcharge->no_itc = $request->no_itc != null ? $request->no_itc :0;
                $transportcharge->cgst = $request->cgst != null ? $request->cgst :0;
                $transportcharge->sgst = $request->sgst != null ? $request->sgst :0;
                $transportcharge->igst = $request->igst != null ? $request->igst :0;
                $transportcharge->is_visible_all = $request->is_visible_all != null ? $request->is_visible_all :0;
                $transportcharge->save();
                $notification = array(
                    'message' => 'Transport Charge Added Successfully',
                );
                return redirect('transportcharge')->with($notification);
            }else{
                return redirect()->back()->withErrors($validator->errors());
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
        $user_id = Auth::user()->id;
        $transportcharge = TransportCharge::where('user_id','=',$user_id)->where('id','=',$id)->get()->first();
        // dd($transportcharge);
        return view('transportcharge.edit')->with('transportcharge',$transportcharge); 
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
            "name" => "required"
        );
        $validator = Validator::make($request->all(), $rules);
        if (!$validator->fails()) {
           
            $transportcharge = TransportCharge::find($id);
            $transportcharge->name = $request->name;
            $transportcharge->product_note = $request->product_note != null ? $request->product_note:'';
            $transportcharge->sell_price = $request->sell_price != null ? $request->sell_price :0;
            $transportcharge->hsn = $request->hsn != null ? $request->hsn :'';
            $transportcharge->type = $request->type != null ? $request->type :'';
            $transportcharge->no_itc = $request->no_itc != null ? $request->no_itc :0;
            $transportcharge->cgst = $request->cgst != null ? $request->cgst :0;
            $transportcharge->sgst = $request->sgst != null ? $request->sgst :0;
            $transportcharge->igst = $request->igst != null ? $request->igst :0;
            $transportcharge->is_visible_all = $request->is_visible_all != null ? $request->is_visible_all :0;
            $transportcharge->save();
            // return redirect('transportcharge');
            $notification = array(
                'message' => 'Transport Charge Updated Successfully',
            );
            return redirect('transportcharge')->with($notification);
        }else{
            return redirect()->back()->withErrors($validator->errors());
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
                "transportcharge_id" => "required"
            );
            $validator = Validator::make($request->all(), $rules);
            if (!$validator->fails()) {
                $transports = $request->transportcharge_id;
                $user_id = Auth::user()->id;
                foreach($transports as $transport){
                    TransportCharge::where('id',$transport)->where('user_id',$user_id)->delete();
                }
                return 1;
            }else{
                echo $validator->errors()->first();
                die;
            }
        }
    }
}
