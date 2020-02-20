<div class="drawer">
  <ul>
    @if(Auth::user()->role_id == 1)
      <li class="centres">
        <a href="{{route('superadmin.centres')}}">
          <i class="fas fa-building"></i>
          <p>Centres</p>
        </a>
      </li>
      <li class="contacts">
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
      </li>
      <li class="contacts">
      <a href="{{route('superadmin.users')}}">
        <i class="fas fa-users"></i>
        <p>Users</p>
      </a>
    </li>
  @else
    <li class="centres">
      <a href="{{route('home.centres')}}">
        <i class="fas fa-building"></i>
        <p>Centres</p>
      </a>
    </li>
    <li class="contacts">
      <a href="{{route('home.contacts')}}">
        <i class="fas fa-address-book"></i>
        <p>Centres Contacts</p>
      </a>
    </li>
    <li class="doors">
      <a href="{{route('superadmin.doors')}}">
        <i class="fas fa-door-open"></i>
        <p>Centres Doors</p>
      </a>
    </li>
  @endif
  </ul>
</div>