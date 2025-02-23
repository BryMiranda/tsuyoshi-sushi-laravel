@extends('layout.app')

@section('title', 'Home')

@section('content')
    <div class="bg-white p-4 shadow rounded">
        <h1 class="text-2xl font-bold">Bienvenido, {{ $user->name }}!</h1>
        <p>Esta es tu página principal.</p>
    </div>
@endsection
