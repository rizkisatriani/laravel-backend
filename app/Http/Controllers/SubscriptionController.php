<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;
use App\Http\Resources\DataCollection;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  new DataCollection(Subscription::all()); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Subscription;
        $data->user_id = $request->input('user_id'); 
        $data->user_delivery_address = $request->input('user_delivery_address'); 
        $data->contact_number = $request->input('contact_number'); 
        $data->contact_person_name = $request->input('contact_person_name'); 
        $data->status = 'Created'; 
        if ($data->save()) {
            return response()->json([
                'data' => $data,
                'message' =>"sukses",
            ]); 
        }else{ 
            return response()->json([
                'message' =>"failed",
                'data' =>"",
            ],500);  
        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request )
    {
        $data = Subscription::find($request->input('id'));  
        $data->status =$request->input('status');  
        if ($data->save()) {
            return response()->json([
                'data' => $data,
                'message' =>"sukses",
            ]); 
        }else{ 
            return response()->json([
                'message' =>"failed",
                'data' =>"",
            ],500);  
        } 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        //
    }
}
