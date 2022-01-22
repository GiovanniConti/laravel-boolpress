@extends('layouts.admin')

@section('main_content')

<h1>Elenco Utenti Registrati</h1>

@if (count($usersList) === 0)
  Nessun Utente Registrato
@else
  <ul class="list-group">
    @foreach ($usersList as $user)
      <li class="list-group-item">{{ $user->name }} - {{ $user->email }}</li> 
    @endforeach
  </ul>
@endif



@endsection
