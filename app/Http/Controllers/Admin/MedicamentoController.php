<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carga;
use App\Models\Medicamento;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.medicamento.index');
    }

    public function index1()
    {
        return view('admin.medicamento.index1');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.medicamento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    return view('admin.medicamento.show'/*, compact('medicamentos')*/);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicamento $medicamento)
    {
        return view('admin.medicamento.edit', compact('medicamento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicamento $medicamento)
    {
        $request->validate([
            'nombre_medicamento' => ['required', 'string', 'max:255', "unique:users,email,$medicamento->id"],
            'descripcion_medicamento' => ['required', 'string', 'max:255'],
        ]);

        $medicamento->update($request->all());

        return redirect()->route('admin.medicamentos.index'/*, $automovils*/)->with('info', 'El medicamento se modifico correctamente');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Medicamento $medicamento )
    {
        $medicamento->delete();

        return redirect()->route('admin.medicamentos.index'/*, $automovils*/)->with('info', 'El usuario elimino correctamente');
    
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
