@extends('layouts.admin')

@section('main_content')
<h1 class="text-center">Modifica Post</h1>

<form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
  @csrf
  @method('PUT')

  <div class="mb-3">
    <label for="title" class="form-label">Titolo</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
  </div>
  <div class="mb-3">
    <label for="content" class="form-label">Contenuto</label>
    <textarea class="form-control" id="content" name="content">{{ $post->content }}</textarea>
  </div>
  <div class="text-center mb-3">
    <button type="submit" class="btn btn-success btn-submit">Salva</button>
  </div>
</form>

<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">
  bkLib.onDomLoaded(nicEditors.allTextAreas);
</script>
@endsection