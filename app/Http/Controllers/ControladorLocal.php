<?php

namespace App\Http\Controllers;
use App\Local;
use Illuminate\Http\Request;
use App\Http\Requests\LocalRequest;

use Session;
use Redirect;
class ControladorLocal extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $local=Local::All();
       return view('local.index',compact('local'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('local.createLoc');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocalRequest $request)
    {
        Local::create([
        		'nombre'=>$request['nombre'],
        		'razonSocial'=>$request['razonSocial'],
        		'rfc'=>$request['rfc'],
        		'direccion'=>$request['direccion'],
        		'ciudad'=>$request['ciudad'],
        		'telefono'=>$request['telefono'],
        		'codigoPost'=>$request['codigoPost']
        	]);
         Session::flash('message','Local Creado Correctamente');
       return Redirect::to('/local');
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
    public function edit(Local $local)
    {
         return view("local.editLocal",compact('local'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LocalRequest $request, $local)
    {
        $local->fill($request->all());
        $local->save();
            Session::flash('message','Local Actualizado Correctamente');
       return Redirect::to('/local');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Local $local)
    {
        $local->delete();
         Session::flash('message','Local Eliminado Correctamente');
       return Redirect::to('/local'); 

    }
}
