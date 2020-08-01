<?php

namespace App\Http\Controllers;

use App\Contacto;
use Illuminate\Http\Request;
use App\Http\Requests\ContactoCreateRequest;
//use Session;
//use Redirect;


class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }     

    public function index()
    {
       $contactos= Contacto::all();
       return view('contacto.index', compact ('contactos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactoCreateRequest $request)
    {

        //$validated = $request->validated();
        
        Contacto::create([
            'nombres' => $request['nombres'],
            'apellidos' => $request['apellidos'],
            'sexo' => $request['sexo'],
            'fecha_nac' => $request['fecha_nac'],
            'tel_celular' => $request['tel_celular'],
            'observaciones' => $request['observaciones']
        ]);
            return redirect('contacto')->with('status', 'Registro Ingresado');
            //return view('Contacto.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show(Contacto $contacto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit(Contacto $contacto)
    {
        
        $contacto = Contacto::find($contacto->id);
        return view('contacto.edit',['contacto'=>$contacto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contacto $contacto)
    {
        $contacto = Contacto::find($contacto->id);
        $contacto ->fill($request->all());
        $contacto->save;

        //$request->session()->flash('status', 'Task was successful!');
        $session::flash('message', 'Usuario actualizado correctamente');
        return Redirect::to('/contacto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contacto $contacto)
    {
        //
    }
}
