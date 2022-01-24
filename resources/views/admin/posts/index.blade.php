@extends('layouts.admin')

@section('main_content')
<h1 class="text-center">Elenco Posts</h1>
<div class="text-right">
  <a class="btn btn-outline-success" href="{{ route('admin.posts.create') }}">Nuovo Post</a>
</div>

@if (count($posts) === 0)
<h2>Nessun Post disponibile</h2>
@else
<div class="row row-cols-1 row-cols-md-3">
  <div class="col mb-4">
    @foreach ($posts as $post)
    <div class="card">
      <img src="https://picsum.photos/200" class="card-img-top" alt="img">
      <div class="card-body">
        <h5 class="card-title"> {{ $post->title }} </h5>
        <p class="card-text"> {{ $post->content }} </p>

        <a class="btn btn-primary" href="{{ route('admin.posts.show', $post->id) }}">Visualizza Post</a>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endif

@endsection