@extends('layouts.master')

@section('content')
@section('title', 'Datos de Contacto')
    <form method="POST" action="update">
    @csrf
        @include('contacto.form')
    </form>
@endsection