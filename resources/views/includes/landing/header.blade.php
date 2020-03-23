 <!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container-fluid">
      <img href={{route('index')}} src="img/SALTO_inspired_access_LOGO.png" alt="SALTO" id="icon" class="rounded float-left">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
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
    </div>
  </nav>

  <header>
    <div class="flex">
      <div class="pre">
        <h2 id="welcome"><strong>Pre-installation Survey</strong></h1>
        <img src="/img/salto.png" id="img-salto" alt="salto" />
        <div>
          <a href={{route('centre.create')}}><button class="btn-primary">Go to the Survey</button></a>
        </div>
      </div>
      <div class="post">
        <h2 id="welcome"><strong>Post-installation Sign off Form</strong></h1>
        <div class="info">
          <img src="/img/bullhorn.png" id="trompet" alt="post-installation"/>
          <p>Fill the pre-installation survey first</p>
        </div>
        <form method="GET" enctype="multipart/form-data">
          <select class="form-control" id="input" name="centre_number">
            <option>Select Centre Number/ID<option>
            @foreach($centres as $centre)
              <option>{{$centre->number}}</option>
            @endforeach
          </select>
          <div>
            <button type="submit" class="btn-primary">
              {{ __('Go to the Form') }}
            </button>
          </div>
          {{-- <div>
            <a href={{route('centre.create')}}><button class="btn-primary">Go to the Form</button></a>
          </div> --}}
        </form>
        </div>
    </div>
  </header>