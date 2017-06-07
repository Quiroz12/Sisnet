<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ProductoRequest;
use App\Http\Requests\ProdUpdateRequest;
use App\Producto;
use App\Dtalmacen;
use App\Almacen;
use Session;
use Redirect;


class ControladorProducto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $detprod=Dtalmacen::All();
        return view('productos.index', compact('detprod'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $almacen=Almacen::All();
        return view('productos.createProd',compact('almacen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoRequest $request)
    {   //primero guardo producto
        $prodcuto= new Producto ($request->all());
        

        if(Input::hasFile('image')){
        $file=Input::file('image');
        $file->move(public_path().'/img/productos/',$file->getClientOriginalName());
        $prodcuto->image=$file->getClientOriginalName();
                                    }
        $prodcuto->save();
        //guardo detealle almacen
         Dtalmacen::create([
            'idProducto'=>$request['idProducto'],
            'idAlmacen'=>$request['idAlmacen'],
            'stock'=>$request['stock'],
        
            ]);
          Session::flash('message','Producto Creado Correctamente');
         return Redirect::to('/productos');

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
    public function edit($iddtAlmacen)
    {   $almacen=Almacen::All();

              
        $detalm=Dtalmacen::find($iddtAlmacen);
        
         $detalm['idProducto']=$detalm->productos->idProducto;
        $detalm['nombre']=$detalm->productos->nombre;
        $detalm['precio']=$detalm->productos->precio;
        $detalm['descripcion']=$detalm->productos->descripcion;
        $detalm['image']=$detalm->productos->image;
        return view('productos.editProd', ['detalm'=>$detalm],compact('almacen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProdUpdateRequest $request,$idProducto)
    {   
        // $idprod= $detalm->productos->idProducto;
    $producto=Producto::findOrFail($idProducto);
         $producto->idProducto=$request->get('idProducto');
        $producto->nombre=$request->get('nombre');
        $producto->precio=$request->get('precio');
        $producto->descripcion=$request->get('descripcion');


        $producto->update();
 $this->ActualizaStock($idProducto);
           
         

           
          Session::flash('message','Producto Actualizado Correctamente');
       return Redirect::to('/productos');

    }
    
    public function ActualizaStock($idProducto){

        $detalle=Dtalmacen::where('idProducto', $idProducto)->first();
        $detalle->idProducto=Input::get('idProducto');
        $detalle->idAlmacen=Input::get('idAlmacen');
        $detalle->stock=Input::get('stock');
        
          
             $detalle->save();

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
}
