<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Conductor;
use App\Models\Automovil;
use Illuminate\Http\Request;

class ConductorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conductors = Conductor::all();

        return view('admin.conductor.index', compact('conductors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $automovil = Automovil::pluck('patente', 'id');
        return view('admin.conductor.create', compact('automovil'));
        
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
            'tipo_licencia' => ['required', 'string','max:255'],
            'annos_experiencia' => ['required','integer'],
            'nombre_conductor' => ['required','string','max:255'],
            'apellido_p_conductor' => ['required','string','max:255'],
            'apellido_m_conductor' => ['required','string','max:255'],
            'telefono_conductor' => ['required', 'integer'],
            'direccion_conductor' => ['required','string','max:255'],
            'automovil_id' => ['required', 'integer'],
                       
        ]);

        Conductor::create($request->all());

        //$automovils = Automovil::all();

        return redirect()->route('admin.conductors.index'/*, $automovils*/)->with('info', 'El conductor se creo correctamente');

        //return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    return view('admin.conductor.show', compact('conductors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Conductor $conductor)
    {
    return view('admin.conductor.edit', compact('conductor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Automovil $conductor)
    {
        $request->validate([
            'tipo_licencia' => ['required', 'string','max:255'],
            'annos_experiencia' => ['required','integer'],
            'nombre_conductor' => ['required','string','max:255'],
            'apellido_p_conductor' => ['required','string','max:255'],
            'apellido_m_conductor' => ['required','string','max:255'],
            'telefono_conductor' => ['required', 'integer'],
            'direccion_conductor' => ['required','string','max:255'],
            'automovil_id' => ['required', 'integer'],
                       
        ]);

        $conductor->update($request->all());

        //return redirect()->route('admin.automovils.edit', $automovil);
        return redirect()->route('admin.conductors.index')->with('info', 'El conductor se actualizo correctamente');
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

    public function desactivar(Request $request)
    {
        $conductor = Conductor::findOrFail($request->id);
        $conductor->estado = '0';
        $conductor->save();
        
        return redirect()->route('admin.conductors.index')->with('info', 'El conductor se desactivo correctamente');
    }

    public function activar(Request $request)
    {
        $conductor = Conductor::findOrFail($request->id);
        $conductor->estado = '1';
        $conductor->save();
        
        return redirect()->route('admin.conductors.index')->with('info', 'El conductor se activo correctamente');
    }
}
