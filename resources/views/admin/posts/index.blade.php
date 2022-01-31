@extends('layouts.admin')

@section('main_content')
<h1 class="text-center">Elenco Posts</h1>

{{-- Button to create a new post --}}
<div class="text-right my-3">
  <a class="btn btn-outline-success" href="{{ route('admin.posts.create') }}">Nuovo Post</a>
</div>

@if (count($posts) === 0)
<h2>Nessun Post disponibile</h2>
@else
<div class="container">
  <div class="row row-cols-1 row-cols-md-3 g-4">

    {{-- Cicle through all posts --}}
    @foreach ($posts as $post)

    {{-- Card single post --}}
    <div class="col mb-4">
      <div class="card">
        <img src="https://picsum.photos/200" class="card-img-top" alt="img">
        <div class="card-body">
          <h5 class="card-title"> {{ $post->title }} </h5>
          <p class="card-text"> {{ $post->content }} </p>
          <h6 class="card-subtitle text-muted mb-2">{{ $post->category->name }}</h6>

          {{-- Show single post button --}}
          <a class="btn btn-primary" href="{{ route('admin.posts.show', $post->slug) }}">Visualizza Post</a>
        </div>
      </div>
    </div>

    @endforeach
  
  </div>
  <div class="d-flex justify-content-center py-3">
    {!! $posts->links() !!}
  </div>
</div>
@endif

@endsection