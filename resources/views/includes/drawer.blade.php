<div class="drawer">
  <ul>
    @if(Auth::user()->role_id == 1)
      <li class="centres">
        <a href="{{route('admin.centres')}}">
          <i class="fas fa-building"></i>
          <p>Centres</p>
        </a>
      </li>
      <li class="contacts">
        <a href="{{route('admin.contacts')}}">
          <i class="fas fa-address-book"></i>
          <p>Centres Contacts</p>
        </a>
      </li>
      <li class="contacts">
      <a href="{{route('admin.users')}}">
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
  @endif
  </ul>
</div>