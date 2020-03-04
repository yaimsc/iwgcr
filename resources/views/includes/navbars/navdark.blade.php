<!-- NAV dark -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="{{route('index')}}"><img src="{{ asset('img/SALTO_inspired_access_LOGO_blanco.png')}}" alt="SALTO" id="icon" class="rounded float-left"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
  <a href="{{route('index')}}"><h1 class="navbar-brand js-scroll-trigger">{{config('app.name')}}</h1></a>
  </div>
  {{-- <div class="collapse navbar-collapse" id="navbarNavDropdown"> --}}
    <form action="{{ route('logout') }}" method="POST">
      @csrf
      <ul class="navbar-nav">
        {{-- <li class="nav-item active"> --}}
          <button type="submit" class="btn btn-link">
            <a class="nav-link active">Logout</a>
            <i id="logout" class="fas fa-sign-out-alt"></i>
          </button>
        {{-- </li> --}}
      </ul>
  </form>
    {{-- <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown link
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
  </div> --}}
</nav>