@extends('layouts.main')

@section('container')

<h1 class="mb-3 text-center">{{ $title }}</h1>

<div class="row justify-content-center mb-3">
  <div class="col-md-6">
    <form action="/blog">

      @if (request('category'))
        <input type="hidden" name="category" value="{{ request('category') }}">          
      @endif

      @if (request('user'))
        <input type="hidden" name="user" value="{{ request('user') }}">          
      @endif

      <div class="input-group mb-3">
        <input type="text" value="{{ request('search') }}" class="form-control" placeholder="Search" aria-label="Recipient's username" name="search">
        <button class="btn btn-danger" type="submit">Seach</button>
      </div>
    </form>
  </div>
</div>

@if ($posts->count())
  <div class="card mb-3">
    @if($posts[0]->image)
        <div style="max-height: 400px; overflow:hidden">
            <img src="{{ asset('storage/' . $posts[0]->image) }}" class="card-img-top img-fluid" alt="">
        </div>
    @else
        <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="">
    @endif
    <div class="card-body text-center">
      <h5 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h5>
      <small class="text-muted">
      <p>By. <a class='text-decoration-none' href="blog?user={{ $posts[0]->user->slug }}">{{ $posts[0]->user->name }}</a> 
        in <a class='text-decoration-none' href="/blog?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a> 
        {{ $posts[0]->created_at->diffForhumans() }}</p> 
      </small>
      <p class="card-text">{{ $posts[0]->excerpt }}</p>   
      <a class='text-decoration-none btn btn-primary' href="/posts/{{ $posts[0]->slug }}">Read More</a>
    </div>
  </div>

  <div class="container">
      <div class="row">
          @foreach ($posts->skip(1) as $item)
          <div class="col-md-4 mb-3">
              <div class="card">
                  <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0,0,0,0.7)">
                      <a href="/blog?category={{ $item->category->slug }}" class="text-decoration-none text-white">
                          {{ $item->category->name }}
                      </a>    
                  </div>

                  @if($item->image)
                      <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="">                      
                  @else
                      <img src="https://source.unsplash.com/500x400?{{ $item->category->name }}" class="card-img-top" alt="">
                  @endif
                  
                  <div class="card-body">
                    <h5 class="card-title"><a href="/posts/{{ $item->slug }}" class="text-decoration-none text-dark">{{ $item->title }}</a></h5>
                    <p>By. <a class='text-decoration-none' href="blog?user={{ $item->user->slug }}">{{ $item->user->name }}</a> {{ $item->created_at->diffForhumans() }}</p>
                    <p class="card-text">{{ $item->excerpt }}</p>
                    <a href="/posts/{{ $item->slug }}" class="btn btn-primary">Read More</a>
                  </div>
                </div>
          </div>
          @endforeach
      </div>
  </div>

@else
  <p class="text-center fs-4">No Post Found.</p>
@endif

<div class="d-flex justify-content-center">
  {{ $posts->links() }}
</div>

@endsection