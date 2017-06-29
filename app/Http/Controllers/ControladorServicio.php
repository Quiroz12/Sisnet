<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ServicioRequest;
use App\Servicio;
use App\Dtservicio;
use App\Dtequipo;
use App\Equipo;
use App\Marca;
use App\Modelo;
use App\User;
use App\Falla;
use Session;
use Redirect;
use Carbon\Carbon;
use Input;
use DB;

class ControladorServicio extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serv=Servicio::All();
        return view('servicios.index', compact('serv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $equipo=Equipo::All();
         $falla= Falla::All();
         $detserv=Dtservicio::All();
         return view('servicios.createServ',compact('equipo','falla','detserv'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServicioRequest $request)
    {
        

        $dtequipo= new Dtequipo();
        $dtservicio = new Dtservicio();
         
        if ($request->input('idEquipo')!="Otro"  ) {
      
        $dtequipo->idfEquipo=$request->get('idEquipo');
        $idequipo= $request->get('idEquipo'); 
         
        }
        else{
        $equipo= new Equipo();        
        $equipo->nombreE=$request->get('otroEq');
        $equipo->save();   
             $dtequipo->idfEquipo=$equipo->idEquipo;
        $idequipo= $equipo->idEquipo;
             
        }
         
        
        if($request->input('idMarca')!="Otro"){
           
            $dtequipo->idfMarca=$request->get('idMarca');
            $idmarca=$request->get('idMarca');
        }
        else{
    
        $marca= new Marca();       
        $marca->nombreMa=$request->get('otroMa');
        $marca->idEquipo=$idequipo;
        $marca->save();
        $dtequipo->idfMarca=$marca->idMarca;
        $idmarca=$marca->idMarca; 
              
        }
         
         
        if($request->input('idModelo')!="Otro" ){

             $dtequipo->idfModelo=$request->get('idModelo');
        }

        else{
             
            $modelo= new Modelo();
            $modelo->nombreMo=$request->get('otroMo');
           $modelo->idMarca=$idmarca;
           $modelo->save();
            $dtequipo->idfModelo=$modelo->idModelo;
            
          
        }
          

        if($request->input('idFalla')!="Otro"){
              
             $dtequipo->idFalla= $request->get('idFalla');

        }
                   
        else {
         
            
              $falla= new Falla();
            $falla->nombref= $request->get('Ofalla');
           
            $falla->save();
             

             $dtequipo->idFalla=$falla->idFalla;
       }
        $dtequipo->nserie=$request->get('nserie');
        $dtequipo->save();

        $mytime = Carbon::now('America/Mexico_City');
        $servicio= new Servicio();
        $servicio->idUsuario=$request->get('id');
        $servicio->fecha_hora= $mytime->toDateTimeString();
        $servicio->estado='Aprovado';
        $servicio->precio=$request->get('precio');
        $servicio->save();

        
        $dtservicio->idServicio= $servicio->idServicio;
        $dtservicio->iddtequipo= $dtequipo->iddtequipo;
        $dtservicio->nombreCliente= $request->get('nombreCliente');
        $dtservicio->telefono=$request->get('telefono');
        $dtservicio->informacionAdd=$request->get('informacionAdd');
        $dtservicio->condicionEntrada=$request->get('condicionEntrada');
       // $dtservicio->falla=$request->get('Ofalla');
        $dtservicio->descripcionserv=$request->get('descripcionfalla');
        $dtservicio->costopieza=$request->get('costopieza');
        $dtservicio->adelanto=$request->get('adelanto');
        $dtservicio->subtotal_p=$request->get('total');
        $dtservicio->save();
          Session::flash('message','Servicio Guardado Correctamente');
            return Redirect::to('/servicios');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idServicio)
    {
        $detserv=Dtservicio::All()->where('idServicio',"=",$idServicio);
        $servicio=Servicio::All()->where("idServicio","=",$idServicio);
        return view('servicios.detalleShow',["detserv"=>$detserv,'servicio'=>$servicio]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idServicio)
    {
        $detserv=Dtservicio::All()->where('idServicio',"=",$idServicio);
        return view('servicios.cobrarServ', compact('detserv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idServicio)
    {
        $servicio= Servicio::findOrFail($idServicio);
        $servicio->estado = 'Cobrado';
        $servicio->update();

        $dtservicio=Dtservicio::where('idServicio',"=",$idServicio)->first();
        $dtservicio->costopieza=$request->get('costopieza');
        $dtservicio->subtotal_p="0";
        $dtservicio->update();
        Session::flash('message','Servicio Cobrado');
            return Redirect::to('/servicios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idServicio)
    {
        $servicio = Servicio::findOrFail($idServicio);
        $servicio->estado = 'Cancelado';
        $servicio->update();
           Session::flash('message','Servicio Cancelado');
            return Redirect::to('/servicios');
    }

    public function cotizar()
    {   
        $equipo=Equipo::All();
        return view('servicios.cotizador', compact('equipo'));
    }

     public function getMarcaList(Request $request)
    {
        $marca = DB::table('marca')
            ->where('idEquipo', $request->idEquipo)
            ->pluck('nombreMa', 'idMarca');
        return response()->json($marca);
    }


     public function getModeloList(Request $request)
    {
        $modelo = DB::table('Modelo')
            ->where('idMarca', $request->idMarca)
            ->pluck('nombreMo', 'idModelo');
        return response()->json($modelo);
    }

    public function getFallayDemas(Request $request)
    {
        $falla=DB::table('dtequipo as dte')
        ->join('falla as f','dte.idFalla','=','f.idFalla' )
        ->select('f.nombref','f.idFalla')
        ->where('dte.idfModelo',$request->idModelo)
        ->pluck('f.nombref','f.idFalla');
        
         return response()->json($falla);
    } 

   
     public function getCosto(Request $request)
    {
        $costo=DB::table('dtequipo as dte')
        ->join('dtservicio as dts','dte.iddtequipo','=','dts.iddtequipo' )
         ->join('servicio as s','dts.idServicio','=','s.idServicio' )
        ->select('s.precio','s.idServicio')
        ->where('dte.idFalla',$request->idFalla)
        ->pluck('s.precio','s.idServicio');
        
         return response()->json($costo);
    }          
}
