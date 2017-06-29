<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\VentaRequest;
use App\Venta;
use App\Dtventa;
use App\Producto;
use App\User;
use Session;
use Redirect;
use DB;
use Carbon\Carbon;

class ControladorVenta extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    } 
    public function index()
    {
        $dtventas=Venta::All();
        return view('ventas.index', compact('dtventas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=User::All();
        $producto=Producto::All();
         return view('ventas.createVenta',compact('user','producto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VentaRequest $request)
    {
       
            $mytime = Carbon::now('America/Mexico_City');
            $venta= new Venta();
            $venta->idfUsuario=$request->get('id'); 
            $venta->fecha_hora = $mytime->toDateTimeString();
            $venta->estado = 'Aprovada';
            //$venta->idfUsuario='1';
            $venta->totalventa=$request->get('totalventa');
            $venta->save();

            $idfProducto = $request->get('idfProducto');
            $cantidad = $request->get('cantidad');
            $subtotal = $request->get('subtotal');
            $precio_v = $request->get('precio_v');

              $cont = 0;
             while ($cont < count($idfProducto))
              {
                $detalle = new Dtventa();
                $detalle->idVenta = $venta->idVenta;
                $detalle->idfProducto = $idfProducto[$cont];
                $detalle->cantidad = $cantidad[$cont];
                $detalle->subtotal = $subtotal[$cont];
                $detalle->precio_v = $precio_v[$cont];
                $detalle->save();
                $cont = $cont + 1;
              }
               
           
            Session::flash('message','Venta Concretada Correctamente');
            return Redirect::to('/ventas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idVenta)
    {
        $detalle = Dtventa::All()->where('idVenta','=',$idVenta);
        $venta = Venta::All()->where('idVenta','=',$idVenta);
         return view('ventas.ventaShow',["venta"=>$venta,'detalle'=>$detalle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idVenta)
    {
        
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
    public function destroy($idVenta)
    {
        $venta = Venta::findOrFail($idVenta);
        $venta->estado = 'Cancelado';
        $venta->update();
           Session::flash('message','Venta Cancelada Correctamente');
            return Redirect::to('/ventas');
    }
}
