@extends('layouts.master')

@section('content')
@section('title', 'Datos de Contacto')
    <form method="POST" action="{{ route('contacto.update',$contacto->id) }}">
	@csrf
	@method('PUT')
        @include('contacto.form')
    </form>
@endsection
