@extends('layouts.admin')

@section('main_content')
<div class="container text-center">
  <h1>{{ $post->title }}</h1>
  <img src="https://picsum.photos/200" alt="igm">
  <p>{{ $post->content }}</p>



  <form action="{{ route('admin.posts.destroy', $post->id) }}" method='post'>
    @csrf
    @method('DELETE')

    <a class="btn btn-primary" href="{{ route('admin.posts.edit', $post->id) }}">Modifica Post</a>

    <input type="submit" value="ELIMINA" class="btn btn-danger">
  </form>
</div>
@endsection