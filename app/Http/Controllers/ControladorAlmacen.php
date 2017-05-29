<?php

namespace App\Http\Controllers;
use App\Almacen;
use App\Local;
use App\Http\Requests;
use App\Http\Requests\AlmacenRequest;
use Illuminate\Http\Request;
use Session;
use DB;
use Redirect;
class ControladorAlmacen extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $almacen=Almacen::All();

        return view('almacen.index',compact('almacen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $loc=Local::All();
                  return view('almacen.createAlma', compact('loc')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlmacenRequest $request)
    {
         Almacen::create([
            
            'nombre'=>$request['nombre'],
            'direccion'=>$request['direccion'],
            'idfSucursal'=>$request['idfSucursal'],
            		   ]);
         Session::flash('message','Almacen Creado Correctamente');
       return Redirect::to('/almacen'); 
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idAlmacen)
    {
         $almacen=DB::table('almacen')->where('idAlmacen','=',$idAlmacen)->delete();
         Session::flash('message','Almacen Eliminado Correctamente');
        return Redirect::to('/almacen');
    }
}
