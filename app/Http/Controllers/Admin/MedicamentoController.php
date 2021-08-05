<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Asigna_valor;
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
        return view('admin.medicamento.index3');
    }

    public function index2()
    {
        return view('admin.medicamento.index1');
    }
    public function index3()
    {
        return view('admin.medicamento.index2');
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
            'estadoo' => '0',
            'estado' => '0',
            
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
        $medicamento->estadoo = '1';
        $medicamento->save();
        
        return redirect()->route('admin.medicamentos.index1')->with('info', 'El Medicamento de Restauro correctamente');
    }

    public function eliminar(Request $request)
    {
        $medicamento = Medicamento::findOrFail($request->id);
        $medicamento->estadoo = '0';
        $medicamento->save();
        
        return redirect()->route('admin.medicamentos.index')->with('info', 'El medicamento se elimino correctamente');
    }

    public function asignarvalor(Request $request)
    {
        $medicamento = Medicamento::findOrFail($request->id);

        return view('admin.medicamento.asigna', compact('medicamento'));
    }

    public function asignarvalorstore(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'valor' => ['required', 'integer'],
            'cantidad' => ['required', 'integer'],
        ]);

        $medicamento = Medicamento::findOrFail($request->id);
        $medicamento->estado = '1';
        $medicamento->save();

        $asignavalor = Asigna_valor::create([
            'user_id' =>$user->id,
            'medicamento_id' => $request->id,
            'fecha_asigna' => Carbon::now(),
            'valor' => $request->valor,
            'cantidad' => $request->cantidad,
        ]);
        
        return redirect()->route('admin.medicamentos.index2')->with('info', 'El asigno el valor y la cantidad al medicamento correctamente');
    }

}
