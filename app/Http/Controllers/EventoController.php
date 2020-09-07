<?php

namespace App\Http\Controllers;

use App\Evento;
use Illuminate\Http\Request;
use Calendar;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos= Evento::all();
        
        return view('evento.index', compact ('eventos'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestdata = $request->all();
 
        //$requestdata['allDay'] = ($request->allDay) ? 1 : 0;
        //$requestdata['editable'] = ($request->editable) ? 1 : 0;
        $evento = Evento::create($requestdata);  
      
        return redirect('evento')->with('status', 'Registro Ingresado   ID=' . $evento['id'] );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        $evento = Evento::find($evento->id);
        return view('evento.show',['evento'=>$evento]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        $requestdata = $request->all();
        
        $requestdata['backgroundColor'] = ($request->allDay) ?  $requestdata['borderColor']  : 'white';
        $requestdata['textColor'] = ($request->allDay) ?  'white' : $requestdata['borderColor'];
        $evento ->update($requestdata);     
        

        return redirect('evento')->with('status', 'Registro Actualizado  ID ' . $evento['id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        //
    }
}
