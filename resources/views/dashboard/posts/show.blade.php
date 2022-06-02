@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h1>{{ $post->title }}</h1>
                <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back To All My posts</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>
                </form>
                @if($post->image)
                    <div style="max-height: 400; overflow:hidden">
                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top img-fluid mt-4" alt="">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top img-fluid mt-4" alt="">
                @endif
                
                <article class="my-3 fs-5">
                    {!! $post->body !!} <!-- this not doing excaping htlm sintax / or this exclude from template engine blade -->
                </article>            
        </div>
    </div>
</div>
@endsection