<?php

namespace App\Http\Controllers;

use App\Evento;

use Illuminate\Http\Request;

use Redirect,Response;

class FullCalendarEventMasterController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
        $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
        $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
        $data = Evento::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)->get(['id','title','start', 'end']);
        return Response::json($data);
        }
        return view('fullcalender');
    }

    public function create(Request $request)
    {
        $insertArr = [ 'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end
        ];
        $event = Evento::insert($insertArr);
        return Response::json($event);
    }
    
    public function update(Request $request)
    {
        $where = array('id' => $request->id);
        $updateArr = ['title' => $request->title,'start' => $request->start, 'end' => $request->end];
        $event  = Evento::where($where)->update($updateArr);
        return Response::json($event);
    }

    public function destroy(Request $request)
    {
        $event = Evento::where('id',$request->id)->delete();
        return Response::json($event);
    }    
}
