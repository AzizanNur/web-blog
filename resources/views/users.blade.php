@extends('layouts.main')

@section('container')

    <h1>Data Semua Penulis</h1>

    @forelse ($users as $item)
        <article>
            <ul>
                <li><a class='text-decoration-none' href="/user/{{ $item->slug }}">{{ $item->name }}</a></li>
            </ul>    
        </article>
    @empty
        <p>Data belum ada</p>    
    @endforelse 
    
@endsection