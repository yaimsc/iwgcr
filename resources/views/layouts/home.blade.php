<!DOCTYPE html>
  <meta charset="utf-8">
  <head>
    @include('includes.head')
    <link rel="stylesheet" href="/css/home.css">
    <title>@yield('title')</title>

  </head>
  <body>
    @include('includes.navbars.navdark')
    @include('includes.drawer')
    @yield('content')
    @include('includes.scripts')
  </body>
</html>