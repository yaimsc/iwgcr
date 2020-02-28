<!DOCTYPE html>
  <meta charset="utf-8">
  <head>
    @include('includes.head')
    <link rel="stylesheet" href="/css/superadmin.css">
    <title>@yield('title')</title>
  </head>
  <body>
    @include('includes.navbars.navdark')
    <div class="row">
      <aside>
        @yield('drawer')
      </aside>
    <section class="col-md-10">
      @yield('content')
    </section>
  </div>
    @include('includes.scripts')
  </body>
  <style>
    .row{
      display: flex; 
      flex-direction: row;
    }
  </style>
</html>