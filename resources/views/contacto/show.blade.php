@extends('layouts.master')

@section('content')
@section('title', 'Eliminar Contacto')
    <form method="POST" action="{{ route('contacto.destroy',$contacto->id) }}">
	@csrf
	@method('DELETE')
        @include('contacto.form')
    </form>
    <form id="formcancel" method="GET" action="{{ url('contacto') }}"> </form>
@endsection

