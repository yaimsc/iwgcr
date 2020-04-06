 <!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container-fluid">
      <a href={{route('index')}} ><img src="img/SALTO_inspired_access_LOGO.png" alt="SALTO" id="icon" class="rounded float-left"></a>
      {{-- <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> --}}
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
        {{-- <img src="/img/salto.png" id="img-salto" alt="salto" /> --}}
        
        <form method="GET" action="{{route('centre.create')}}" enctype="multipart/form-data">

          {{-- <div id="input">
           <input />
          <div> --}}
          <div class="inputs" id="one">
            <div id="input">
              <label>Centre Number/ID</label>
              <div>
              <input name="centre_number" class="form-control @error('centre_number') is-invalid @enderror" placeholder="Select Centre Number/ID" >
              <small class="text-muted">*If Centre Number/ID does not have 4 digits, put 0 before. e.g. 0074</small>
              @error('centre_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
            </div>
          </div>
          <button type="submit" class="btn-primary" id="post">
            {{ __('Go to the Survey') }}
          </button>

      </form>
      </div>
      <div class="post">
        <h2 id="welcome"><strong>Post-installation Sign off Form</strong></h1>
      <form method="GET" action="{{route('installer.create')}}" enctype="multipart/form-data" >
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <div class="inputs">
          <div id="input">
            <label>Country</label>
            <div>
              <select class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required>
                <option hidden disabled selected class="placeholder">Select Country<option>
                @foreach($countries as $country)
                  <option value="{{$country->name}}">{{$country->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div id="input">
            <label>Centre</label>
            <div>
              <select class="form-control @error('centre_number') is-invalid @enderror" name="centre_number" value="{{ old('centre_number') }}" required>
                <option hidden disabled selected class="placeholder">Select Centre Number/ID<option>
              </select>
              <small class="text-muted">*Only centres with the pre-installation survey completed will appear on the list</small>
              @error('centre_number')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
        </div>
          <button type="submit" class="btn-primary" id="post">
            {{ __('Go to the Sign Off Form') }}
          </button>
        </form>
        </div>
    </div>
  </header>