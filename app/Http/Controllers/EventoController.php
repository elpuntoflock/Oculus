<?php

namespace App\Http\Controllers;

use App\Evento;
use App\Notification;
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
    public function create(Request $request)
    {

        $evento['allDay'] = ($request->allDay) ? 1 : 0;
        return view('evento.create',['evento'=>$evento]);
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
        $requestdata['allDay'] = ($request->allDay) ? 1 : 0;
        $requestdata['editable'] = ($request->editable) ? 1 : 0;
        $requestdata['startEditable'] = ($request->startEditable) ? 1 : 0;
        $requestdata['durationEditable'] = ($request->durationEditable) ? 1 : 0;
        $requestdata['overlap'] = ($request->durationEditable) ? 1 : 0;

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
        $evento = Evento::find($evento->id);
        $evento['start']    = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $evento['start']) ->format('Y-m-d\TH:i');
        $evento['end']      = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $evento['end'])   ->format('Y-m-d\TH:i');

        $noti = Evento::find($evento->id)->notifications;

        return view('evento.edit',['evento'=>$evento, 'noti'=>$noti]);

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
        $requestdata['allDay'] = ($request->allDay) ? 1 : 0;
        $requestdata['editable'] = ($request->editable) ? 1 : 0;
        $requestdata['startEditable'] = ($request->startEditable) ? 1 : 0;
        $requestdata['durationEditable'] = ($request->durationEditable) ? 1 : 0;
        $requestdata['overlap'] = ($request->overlap) ? 1 : 0;

        $evento -> update($requestdata);
        if (isset($requestdata['tipoNoti'])) {
        foreach ($requestdata['tipoNoti'] as $clave => $notif) {
            if ($requestdata['id'][$clave] == '')
            {
                $notificacionesInsert[] =
                new Notification(array(
                    'tipoNotificacion'  => $notif,
                    'cantidad'          => $requestdata['cantidad'][$clave],
                    'duracion'          => $requestdata['duracion'][$clave]
                ));
            };
            if ($requestdata['accion'][$clave] == 'borrar' )
            {
                Notification::destroy($requestdata['id'][$clave]);
            };
            if ($requestdata['accion'][$clave] == 'actualizar' )
            {
                $notifi = Notification::find($requestdata['id'][$clave]);
                $notifi -> tipoNotificacion = $notif;
                $notifi -> cantidad = $requestdata['cantidad'][$clave];
                $notifi -> duracion = $requestdata['duracion'][$clave];
                $notifi -> save();
            };
        };
        };

        if (isset($notificacionesInsert)) {
            $evento->notifications()->saveMany($notificacionesInsert);
            $evento->refresh();
        }
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
