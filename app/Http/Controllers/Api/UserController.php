<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * @OA\Get(
     *      path="/rodrigogarcia1601/public/api/users",
     *      operationId="getUsersList",
     *      tags={"Users"},
     *      summary="Get lista de Usuarios / Farmacias",
     *      description="Retorno lista de Farmacias",
     *      @OA\Response(
     *          response=200,
     *          description="Operacion Satisfactoria")
     *       ),
     *      
     *     )
     */
    
    public function index()
    {
        return User::all();
    }

    public function update()
    {
        //
    }

    public function delete()
    {
        //
    }
    
    
    
    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

            'direccion' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'integer'],
            'coordenadas' => ['string', 'max:255'],
            
            'password' => $this->passwordRules(),
            //'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ]);
        
        User::create([
            'name' =>$request->name,
            'email' => $request->email,
            'direccion' => $request->direccion,
            'fecha_ingreso' => Carbon::date(),
            'telefono' => $request->telefono,
            'coordenadas' => $request->nombre_cargo,

            'password' => Hash::make($request->password),
        ]);
        

        return redirect()->route('api.users.index');
    }
    
}
