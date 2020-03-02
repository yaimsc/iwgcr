<div class="centre-open">
  <a href="{{route('superadmin.centres')}}">
    <i class="fas fa-building"></i>
    <p>Centres</p>
  </a>
</div>
@if(Auth::user()->role_id == 1)
  <div class="user">
    <a href="{{route('superadmin.users')}}">
      <i class="fas fa-users"></i>
    </a>
  </div>
@endif