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
        {{-- <div class="info">
          <img src="/img/bullhorn.png" id="trompet" alt="post-installation"/>
          <p>Fill the pre-installation survey first</p>
        </div> --}}
      <form method="GET" action="{{route('installer.create')}}" enctype="multipart/form-data" >
        <div id="input">
          <label>Centre</label>
          <div>
            <select class="form-control @error('centre_name') is-invalid @enderror" name="centre_name" value="{{ old('centre_name') }}" required>
              <option value="" hidden disabled selected class="placeholder">Select Centre Number/ID<option>
              @foreach($centres as $centre)
                <option value="{{$centre->name}}">{{$centre->number}} - {{$centre->name}}</option>
              @endforeach
            </select>
            <small class="text-muted">*Only centres with pre-installation survey completed will appear on the list</small>
            @error('centre_name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
            <button type="submit" class="btn-primary" id="post">
              {{ __('Go to the Sign Off Form') }}
            </button>

          {{-- <div>
            <a href={{route('centre.create')}}><button class="btn-primary">Go to the Form</button></a>
          </div> --}}
        </form>
        </div>
    </div>
  </header>