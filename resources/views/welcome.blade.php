@extends('layout.main')
@section('title','hola')
@section('content')
@guest
    <h2>Inicia sesion y ve la magia!</h2>
@endguest
@auth
    <h2>Que bueno tenerte de vuelta!</h2>
@endauth
@endsection
