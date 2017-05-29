<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Controladorinicio extends Controller
{
    public  function  index()
    {
    	return view('usuarios/login');
    }

}

