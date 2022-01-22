@extends('layouts.admin')

@section('main_content')
<form action="{{ route('admin.users.update', $user->id) }}" method="POST">
  @csrf
  @method('put')

  <div class="form-group">
    <label class="form-label">Nome</label>
    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
      value="{{ $user->name }}" required autocomplete="name">

    @error('name')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror

    <label class="form-label mt-3">E-mail</label>
    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
      value="{{ $user->email }}" required autocomplete="email">

    @error('email')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror

    <div class="d-flex my-4 justify-content-center">
      <a href="{{ route('admin.users.index') }}" class="btn btn-outline-danger mr-2" type="reset">Annulla</a>
      <button class="btn btn-primary px-3" type="submit">Salva</button>
    </div>
  </div>

</form>
@endsection