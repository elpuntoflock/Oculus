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
        
        $requestdata = $request->all();
        $fecha_Ymd = \Carbon\Carbon::createFromFormat('d-m-Y', $request->fecha_nac)->format('Y-m-d');
        $requestdata['fecha_nac'] = $fecha_Ymd;
        $contacto = Contacto::create($requestdata);  
        
        return redirect('contacto')->with('status', 'Registro Ingresado   ID=' . $contacto['id'] );
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
        $contacto = Contacto::find($contacto->id);
        return view('contacto.show',['contacto'=>$contacto]);
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
    public function update(ContactoCreateRequest $request, Contacto  $contacto)
    {
        $requestdata = $request->all();
        $fecha_Ymd = \Carbon\Carbon::createFromFormat('d-m-Y', $request->fecha_nac)->format('Y-m-d');
        $requestdata['fecha_nac'] = $fecha_Ymd;
        $contacto ->update($requestdata);     
    
        //$contacto->save;

        return redirect('contacto')->with('status', 'Registro Actualizado  ID ' . $contacto['id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contacto $contacto)
    {
        $contacto->delete();
  
        return redirect('contacto')->with('status', 'Registro Eliminado   ID= ' . $contacto['id']);
    }

}
