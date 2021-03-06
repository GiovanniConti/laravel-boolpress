@extends('layouts.admin')

@section('main_content')
<div class="container text-center">
  <h1>{{ $post->title }}</h1>
  <h6 class="card-subtitle text-muted mb-2">{{ $post->category->name }}</h6>
  <img src="https://picsum.photos/200" alt="igm">
  <p>{{ $post->content }}</p>




  <form action="{{ route('admin.posts.destroy', $post->slug) }}" method='post'>
    @csrf
    @method('DELETE')

    <a class="btn btn-primary" href="{{ route('admin.posts.edit', $post->slug) }}">Modifica Post</a>

    <input type="submit" value="ELIMINA" class="btn btn-danger">
  </form>
</div>
@endsection