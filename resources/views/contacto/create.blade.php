@extends('layouts.master')

@section('content')
@section('title', 'Datos de Usuario')

    <form method="POST" action="{{ route('contacto.store') }}">
    @csrf
        @include('contacto.form')
    </form>
@endsection