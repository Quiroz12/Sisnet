<?php

namespace App\Http\Controllers;
use App\User;
use App\Local;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use Session;
use Redirect;
use DB;
use Input;
class ControladorUsuario extends Controller
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
        $users=User::All();
      
       return view('usuarios.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $loc=Local::All();
                  return view('usuarios.createUsu', compact('loc')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
         User::create([
            
            'name'=>$request['name'],
            'email'=>$request['email'],
            'rol'=>$request['rol'],
            'idSucursal'=>$request['idSucursal'],
            'celular'=>$request['celular'],
            'turno'=>$request['turno'],
          'password'=>bcrypt($request['password'])
            ]);
         Session::flash('message','Usuario Creado Correctamente');
       return Redirect::to('/usuarios'); 
        
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
        $loc=Local::All();
        
        //Input::flash();
       return view("usuarios.editUsu",["usuario"=>User::findOrFail($id)],compact('loc'));
        //return view('usuarios.editUsu', compact('user','loc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {

        
           $v = \Validator::make($request->all(), [
            'email'    => 'required|email',
            ]);
        $usuario = User::findOrFail($id);
        $usuario ->name=$request->get('name');
        $usuario ->email=$request->get('email');
        $usuario->rol=$request->get('rol');
        $usuario->idSucursal=$request->get('idSucursal');
        $usuario->celular=$request->get('celular');
        $usuario->turno=$request->get('turno');
        $usuario ->password=bcrypt ($request->get('password'));
        $usuario ->update();
          Session::flash('message','Usuario Actualizado Correctamente');
        return Redirect::to('/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario=DB::table('users')->where('id','=',$id)->delete();
         Session::flash('message','Usuario Eliminado Correctamente');
        return Redirect::to('/usuarios');
    }
}
