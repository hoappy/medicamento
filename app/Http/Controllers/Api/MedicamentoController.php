<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Carga;
use Illuminate\Http\Request;

use App\Models\Medicamento;
use Carbon\Carbon;

class MedicamentoController extends Controller
{
    /**
     * @OA\Get(
     *      path="/rodrigogarcia1601/public/api/medicamentos",
     *      operationId="getMeedicamentoList",
     *      tags={"Medicamentos"},
     *      summary="Get lista de Medicamentos",
     *      description="Retorno lista de Medicamentos",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Pagina no Encontrada",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */

    public function index()
    {
        return Medicamento::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_medicamento' => ['required', 'string', 'max:255', 'unique:medicamentos'],
            'descripcion_medicamento' => ['required', 'string', 'max:255'],
        ]);

        $medicamento = Medicamento::create([
            'nombre_medicamento' =>$request->nombre_medicamento,
            'descripcion_medicamento' => $request->descripcion_medicamento,
            
        ]);


        $user = auth()->user();

        $carga = Carga::create([
            'user_id' =>$user->id,
            'medicamento_id' => $medicamento->id,
            'fecha_carga' => Carbon::now(),
        ]);

        return redirect()->route('admin.medicamentos.index'/*, $automovils*/)->with('info', 'El medicamento se creo correctamente');
    }

    public function update(Request $request, Medicamento $medicamento)
    {
        $request->validate([
            'nombre_medicamento' => ['required', 'string', 'max:255', "unique:users,email,$medicamento->id"],
            'descripcion_medicamento' => ['required', 'string', 'max:255'],
        ]);

        $medicamento->update($request->all());

        return redirect()->route('admin.medicamentos.index'/*, $automovils*/)->with('info', 'El medicamento se modifico correctamente');
    
    }

    public function restaurar(Request $request)
    {
        $medicamento = Medicamento::findOrFail($request->id);
        $medicamento->estado = '1';
        $medicamento->save();
        
        return redirect()->route('admin.medicamentos.index1')->with('info', 'El Medicamento de Restauro correctamente');
    }

    public function eliminar(Request $request)
    {
        $medicamento = Medicamento::findOrFail($request->id);
        $medicamento->estado = '0';
        $medicamento->save();
        
        return redirect()->route('admin.medicamentos.index')->with('info', 'El medicamento se elimino correctamente');
    }

}
