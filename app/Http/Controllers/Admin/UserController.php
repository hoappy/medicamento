<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dependencia;
use Illuminate\Http\Request;

use App\Models\User;

use App\Actions\Fortify\PasswordValidationRules;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

use Spatie\Permission\Models\Role;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        //$this->middleware('can:admin.user.index')->only('index');
        //$this->middleware('can:admin.user.indexporaprobar')->only('indexporaprobar');
        //$this->middleware('can:admin.user.indexrechazado')->only('indexrechazado');
        //$this->middleware('can:admin.user.edit')->only('edit');
        //$this->middleware('can:admin.user.create')->only('create');
        //$this->middleware('can:admin.user.destroy')->only('destroy');
        //$this->middleware('can:admin.user.aceptar')->only('aceptar');
        //$this->middleware('can:admin.user.rechazar')->only('desactivar');
        //$this->middleware('can:admin.user.rolestore')->only('rolestore');
        //$this->middleware('can:admin.user.roleasig')->only('roleasig');

    }

    public function index()
    {
        return view('admin.user.index');
    }

    public function index1()
    {
        return view('admin.user.index1');
    }

    public function index2()
    {
        return view('admin.user.index2');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
        

        return redirect()->route('admin.users.index'/*, $automovils*/)->with('info', 'El usuario se creo correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    return view('admin.user.show'/*, compact('users')*/);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', "unique:users,email,$user->id"],

            'direccion' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'integer'],
            'coordenadas' => ['string', 'max:255'],

            //'password' => $this->passwordRules(),
            //'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ]);
        
        $user->update($request->all());
        
        return redirect()->route('admin.users.index'/*, $automovils*/)->with('info', 'El usuario se creo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index'/*, $automovils*/)->with('info', 'El usuario elimino correctamente');
    }
    public function roleasig(User $user)
    {
        $roles = Role::all();

        return view('admin.user.role', compact('user', 'roles'));
    }

    public function rolestore(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.roleasig', $user)->with('info', 'Se asigno el rol correctamente');
    }

    public function rechazar(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->estado = '2';
        $user->fecha_activacion = Carbon::now();
        $user->save();
        
        return redirect()->route('admin.users.index2')->with('info', 'El Useuario se rechazo correctamente');
    }

    public function aceptar(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->estado = '1';
        $user->fecha_activacion = Carbon::now();
        
        $user->save();

        $user->roles()->sync('2');
        
        return redirect()->route('admin.users.index')->with('info', 'El Useuario se acepto correctamente');
    }
    
}
