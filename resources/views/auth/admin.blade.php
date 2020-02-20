@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="content">
    <div id="right" class="col-md-6">
        <h3>Welcome to SALTO BU Administration Site</h3>
        <img src="{{asset('img/SALTO_inspired_access_LOGO.png')}}"/>
    </div>
    <div>
    @auth
        <button type="button" class="btn btn-raised btn-info">
            <a href="{{ url('/home') }}">Home</a>
        </button>
    @else
        <button type="button" class="btn btn-raised btn-info">
            <a href="{{ route('login') }}">Login</a>
        </button>
      @if (Route::has('register'))
        {{-- <div class="card"> --}}
        <button type="button" class="btn btn-raised btn-info">
            <a href="{{ route('register') }}">Register</a>
        </button>
      @endif
    @endauth
    <div>
  </div>
</div>
@endsection
