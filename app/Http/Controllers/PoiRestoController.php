<?php

namespace App\Http\Controllers;

use App\PoiRestos;
use Illuminate\Http\Request;
use App\Http\Resources\DataCollection;

class PoiRestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
       return  new DataCollection(PoiRestos::all()); 
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
            $data = new PoiRestos;
            $data->nama_resto = $request->input('nama'); 
            $data->keterangan = $request->input('keterangan'); 
            $data->alamat = $request->input('alamat'); 
            $data->coordinat = $request->input('kordinat'); 
            $data->status = 1; 
            if ($data->save()) {
                    return [
            'kode' => "200",
            'message' =>"sukses",
            'data' =>$data,
                         ];
            }else{ 
                    return [
            'kode' => "404",
            'message' =>"failed",
            'data' =>"",
                         ];
            }   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\poi_resto  $poi_resto
     * @return \Illuminate\Http\Response
     */
    public function show(poi_resto $poi_resto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\poi_resto  $poi_resto
     * @return \Illuminate\Http\Response
     */
    public function edit(poi_resto $poi_resto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\poi_resto  $poi_resto
     * @return \Illuminate\Http\Response
     */
       public function update(Request $request )
    { 
            $data = PoiRestos::find($request->input('id'));
            $data->nama_resto = $request->input('nama');
            $data->keterangan = $request->input('keterangan'); 
            $data->alamat = $request->input('alamat'); 
            $data->coordinat = $request->input('kordinat'); 
            $data->status =$request->input('status'); 
            if ($data->save()) {
                    return [
            'kode' => "200",
            'message' =>"sukses",
            'data' =>$data,
                         ];
            }  else{ 
                    return [
            'kode' => "404",
            'message' =>"failed",
            'data' =>"",
                         ];
            } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\poi_resto  $poi_resto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
     
        $data = PoiRestos::find($request->input('id'));
if ($data->delete()) {
                    return [
            'kode' => "200",
            'message' =>"sukses",
            'data' =>$data,
                         ];
            }  else{ 
                    return [
            'kode' => "404",
            'message' =>"failed",
            'data' =>"",
                         ];
            }  
    }
}
