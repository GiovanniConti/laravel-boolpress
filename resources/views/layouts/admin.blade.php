@extends('layouts.app');

@section('title', 'admin');

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="sidebar col-2 bg-info min-vh-100">
      <ul class="nav d-flex flex-column">
        <li class="nav-item">
          <a class="nav-link text-light" href="{{ route('admin.home') }}">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="{{ route('home') }}">Area Pubblica</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="{{ route('admin.users.index') }}">Elenco Utenti</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="{{ route('admin.posts.index') }}">Posts</a>
        </li>
      </ul>
    </div>
      <div class="col-10">
          @yield('main_content')
      </div>
  </div>
</div>
@endsection