@extends('layouts.main')

@section('container')

    <h1>Data Semua Categories</h1>

    @forelse ($categories as $item)
        <article>
            <ul>
                <li><a class='text-decoration-none' href="/categories/{{ $item->slug }}">{{ $item->name }}</a></li>
            </ul>    
        </article>
    @empty
        <p>Data belum ada</p>    
    @endforelse 
    
@endsection