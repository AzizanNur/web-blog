@extends('layouts.main')

@section('container')
    <h1>About dengan template blade</h1>
    <h3>{{ $name }}</h3>
    <p>{{ $email }}</p>  
    <img src="img/{{ $image }}" alt="{{ $name }}" class="rounded-circle">  
@endsection