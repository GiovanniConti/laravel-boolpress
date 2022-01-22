@extends('layouts.admin')

@section('main_content')

<h1>Elenco Utenti Registrati</h1>

@if (count($usersList) === 0)
  Nessun Utente Registrato
@else
  <ul class="list-group">
    @foreach ($usersList as $user)
      <li class="list-group-item d-flex align-items-center justify-content-between">
        {{ $user->name }} - {{ $user->email }}
        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-link">Modifica</a>
      </li> 
    @endforeach
  </ul>
@endif



@endsection
