<?php

namespace App\Http\Controllers;

use App\Rules\Vehiclenumber;
use App\Transport;
use Illuminate\Http\Request;
use Auth;
use Validator;

class TransportController extends Controller
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
        $transports = Transport::where('user_id','=',$user_id)->orderBy('id','desc');
        $total_tranport =   $transports->count();
        $transports = $transports->get();
        // dd($transports);
        return view('transport.index',compact('transports','total_tranport'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('transport.create');
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
                "vehicle_no" => ['nullable',new Vehiclenumber],
            );
            $validator = Validator::make($request->all(), $rules);
            if (!$validator->fails()) {
                $transport = new Transport();
                $transport->name = $request->name;
                $transport->user_id = Auth::user()->id;
                $transport->transport_id = $request->transport_id != null ? $request->transport_id:'';
                $transport->vehicle_no = $request->vehicle_no != null ? $request->vehicle_no :'';
                $transport->save();
                $notification = array(
                    'message' => 'Transport Created Successfully',
                );
                return redirect('transports')->with($notification);
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
        $user_id = Auth::user()->id;
        $transport = Transport::where('user_id','=',$user_id)->where('id','=',$id)->get()->first();
        return view('transport.edit')->with('transport',$transport); 
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
            "vehicle_no" => ['nullable',new Vehiclenumber],
        );
        $validator = Validator::make($request->all(), $rules);
        if (!$validator->fails()) {
            $transport = Transport::find($id);
            $transport->name = $request->name;
            $transport->transport_id = $request->transport_id != null ? $request->transport_id:'';
            $transport->vehicle_no = $request->vehicle_no != null ? $request->vehicle_no :'';
            $transport->save();
            // $notification = array(
            //     'message' => 'Transport Updated Successfully',
            // );
            // return redirect('transports')->with($notification);
            $notification = array(
                'message' => 'Transport Updated Successfully',
                'status' => 1
            );
            return response()->json($notification);
        }else{
        
            $notification = array(
                'message' => $validator->errors()->first(),
                'type' => 'warning',
                'status' => 0
            );
            return response()->json($notification);
            // dd($validator->errors());
            // return redirect()->back()->withErrors($validator->errors());
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
                "transport_id" => "required"
            );
            $validator = Validator::make($request->all(), $rules);
            if (!$validator->fails()) {
                $transports = $request->transport_id;
                $user_id = Auth::user()->id;
                foreach($transports as $transport){
                    Transport::where('id',$transport)->where('user_id',$user_id)->delete();
                }
                return 1;
            }else{
                echo $validator->errors()->first();
                die;
            }
        }
    }
}
