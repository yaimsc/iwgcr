<!DOCTYPE html>
  <meta charset="utf-8">
  <head>
    @include('includes.head')
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/modal.css">
    <title>@yield('title')</title>
  </head>
  <body>
    @include('includes.navbars.navdark')
    <div class="row">
      <aside class="col-md-2">
        @yield('drawer')
      </aside>
    <section class="col-md-10">
      @yield('content')
    </section>
  </div>
    @include('includes.scripts')
  </body>
</html>