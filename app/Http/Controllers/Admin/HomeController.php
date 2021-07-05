<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $user = auth()->user();

        if($user->estado == '0'){
            $info = 'Su Solicitud aun esta en Proceso';
        }
        if($user->estado == '1'){
            $info = 'Su Solicitud fue aprobada';
        }
        if($user->estado == '2'){
            $info = 'Su Solicitud ha sido rechazada';
        }

        return view('admin.index')->with('info', $info);
    }
}
