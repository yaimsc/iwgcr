 <!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container-fluid">
      <img href={{route('index')}} src="img/SALTO_inspired_access_LOGO.png" alt="SALTO" id="icon" class="rounded float-left">
        <div class="collapse navbar-collapse" id="navbarResponsive">
        <h1 class="navbar-brand js-scroll-trigger">{{config('app.name')}}</h1>
          {{-- @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif --}}
        </div>
        
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    </div>
  </nav>

    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="column" id="content">

        <h1 id="welcome"><strong>{{config('app.name')}}</strong></h1>

          {{-- <span class="icon">
            <a href="#form"><i class="fas fa-chevron-down" ></i></a>
          </span> --}}
          <img src="/img/salto.png" id="img-salto"/>
          <div>
            <a href={{route('centre.create')}}><button class="btn-primary">Go to the Survey</button></a>
          </div>
          <!--
          <div class="col-lg-5 mx-auto"><hr>
            <h1 id="welcome"><strong>@lang('landing.title')</strong></h1>
            <br/>
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="/register">@lang('landing.register')</a><br/>
            <a class="badge badge-success" href="/home">@lang('landing.map')</a>
          </div>  -->
          
        </div>
      </div>
    </header>