@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="content">
    <div id="right" class="col-md-6">
        <h3>Welcome to SALTO BU Administration Site</h3>
        <img src="{{asset('img/SALTO_inspired_access_LOGO.png')}}" alt="SALTO" />
    </div>
    <div id="buttons">
    @auth
    <a href="{{ url('/home') }}">
        <button type="button" class="btn btn-raised btn-info">
            Home
        </button>
      </a>
    @else
        <a href="{{ route('login') }}">
          <button type="button" class="btn btn-raised btn-info">
              Login
          </button>
        </a>
      @if (Route::has('register'))
        <a href="{{ route('register') }}">
          <button type="button" class="btn btn-raised btn-info">
            Register
          </button>
        </a>
      @endif
    @endauth
    </div>
  </div>
</div>
@endsection
