<?php

namespace App\Http\Controllers;

use App\Evento;
use Illuminate\Http\Request;

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
        //$start_Ymd = \Carbon\Carbon::createFromFormat('d-m-Y', $request->start)->format('Y-m-d');
        //$requestdata['start'] = $start_Ymd;
        //$end_Ymd = \Carbon\Carbon::createFromFormat('d-m-Y', $request->end)->format('Y-m-d');
        // $requestdata['end'] = $end_Ymd;
        $requestdata['allDay'] = ('true' == $request->allDay) ? 1 : 0;
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
        $evento = Contacto::find($evento->id);
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
        //
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
