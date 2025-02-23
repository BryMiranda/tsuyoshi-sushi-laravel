@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
    <div class="bg-white p-6 shadow rounded">
        <h1 class="text-2xl font-bold">Dashboard</h1>
        <p>Bienvenido, {{ $user->name }}!</p>
    </div>
@endsection
