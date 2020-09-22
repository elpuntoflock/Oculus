@extends('layouts.master')
@push('headerSection')

@endpush

@section('content')
    @section('title', 'Agregar Evento')

        <div id="eventModalInsert" name="eventModalInsert" class="modal fade" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <form id="formModalInsert" name="formModalInsert" method="POST" autocomplete="off" action="{{ route('evento.store') }}"> 
            @csrf
            @include('evento.form')
        </form>
        </div>

    @endsection

@push('scriptsSection')
 
@endpush