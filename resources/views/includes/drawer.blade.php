<div class="drawer">
  @if(Auth::user()->role_id == 1)
    <div class="centre">
      <a href="{{route('superadmin.centres')}}">
        <i class="fas fa-building"></i>
      </a>
    </div>
      {{-- <li class="contacts">
        <a href="{{route('superadmin.contacts')}}">
          <i class="fas fa-address-book"></i>
          <p>Centres Contacts</p>
        </a>
      </li> 
      <li class="doors">
        <a href="{{route('superadmin.doors')}}">
          <i class="fas fa-door-open"></i>
          <p>Centres Doors</p>
        </a>
      </li> --}}
    <div class="user">
      <a href="{{route('superadmin.users')}}">
        <i class="fas fa-users"></i>
      </a>
    </div>
  @else
    <div class="centre">
      <a href="{{route('home.centres')}}">
        <i class="fas fa-building"></i>
      </a>
    </div>
    {{-- <li class="contacts">
      <a href="{{route('home.contacts')}}">
        <i class="fas fa-address-book"></i>
        <p>Centres Contacts</p>
      </a>
    </li>
    <li class="doors">
      <a href="{{route('home.doors')}}">
        <i class="fas fa-door-open"></i>
        <p>Centres Doors</p>
      </a>
    </li> --}}
  @endif
</div>