@extends('layouts.master')
@push('headerSection')

@endpush

@auth
@section('content')
    @section('title', 'Agregar Evento')

        <div id="eventInsert" name="eventInsert" class="" >
        <form id="formInsert" name="formInsert" method="POST" autocomplete="off" action="{{ route('evento.store') }}">
            @csrf
            @include('evento.form')
        </form>
        </div>

@endsection
@endauth
@push('scriptsSection')
    @include('evento.part.notif')
    @include('evento.part.colorevento')
@endpush

