<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/users",
     *      operationId="getUsersList",
     *      tags={"Users"},
     *      summary="Get lista de Usuarios / Farmacias",
     *      description="Retorno lista de Farmacias",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation")
     *       ),
     *      
     *     )
     */
    
    public function index()
    {
        return User::all();
    }

    public function create()
    {
        //
    }

    public function update()
    {
        //
    }

    public function delete()
    {
        //
    }
    
}
