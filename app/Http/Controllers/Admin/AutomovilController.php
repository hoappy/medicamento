<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Automovil;
use Illuminate\Http\Request;

class automovilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $automovils = Automovil::all();

        return view('admin.automovil.index', compact('automovils'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.automovil.create');
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
            'modelo' => ['required', 'string', 'max:255'],
            'patente' =>'required|unique:automovils',
            'anno' => ['required', 'integer'],
            'tipo_automovil' => ['required', 'string', 'max:255'],
            'marca_automovil' => ['required', 'string', 'max:255'],        
        ],
        [
            'required' => 'Esque campo no puede quedar Vacio',
            'patente.unique' => 'Ya existe un automovil con dicha patente'
        ]);

        Automovil::create($request->all());

        //$automovils = Automovil::all();

        return redirect()->route('admin.automovils.index'/*, $automovils*/)->with('info', 'El automovil se creo correctamente');

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
        return view('admin.automovil.show'/*, compact('automovils')*/);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Automovil $automovil)
    {

        //$automovil = Automovil::find($id);

        return view('admin.automovil.edit', compact('automovil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Automovil $automovil)
    {
        $request->validate([
            'modelo' => ['required', 'string', 'max:255'],
            'patente' =>"required|unique:automovils,patente,$automovil->id",
            'anno' => ['required', 'integer'],
            'tipo_automovil' => ['required', 'string', 'max:255'],
            'marca_automovil' => ['required', 'string', 'max:255'],          
        ],
        [
            'required' => 'Esque campo no puede quedar Vacio',
            'patente.unique' => 'Ya existe un automovil con dicha patente'
        ]);

        $automovil->update($request->all());

        //return redirect()->route('admin.automovils.edit', $automovil);
        return redirect()->route('admin.automovils.index')->with('info', 'El automovil se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Automovil $automovil)
    {
        $automovil->delete();

        return redirect()->route('admin.automovils.index')->with('info', 'El automovil se elimino correctamente');
    }

    public function desactivar(Request $request)
    {
        $automovil = Automovil::findOrFail($request->id);
        $automovil->estado = '0';
        $automovil->save();
        
        return redirect()->route('admin.automovils.index')->with('info', 'El automovil se desactivo correctamente');
    }

    public function activar(Request $request)
    {
        $automovil = Automovil::findOrFail($request->id);
        $automovil->estado = '1';
        $automovil->save();
        
        return redirect()->route('admin.automovils.index')->with('info', 'El automovil se activo correctamente');
    }
}
