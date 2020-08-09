@extends('layouts.master')

@section('content')
@section('title', 'Datos de Usuario')

    <form method="POST" action="{{ route('contacto.store') }}">
    @csrf
		@if(!$errors->any()) 			
			@php	
				$contacto=[];
			@endphp
		@endif
        @include('contacto.form')
    </form>
@endsection
