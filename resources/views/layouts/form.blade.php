<!doctype html>
  <meta http-equiv="Content-type" content="text/html" charset="utf-8">
  <head>
    @include('includes.head')
    <link rel="stylesheet" href="/css/form.css">
    <title>@yield('title')</title>
    
  </head>
  <body>
    @include('includes.navbars.navlight')
    @yield('content')
    @include('includes.scripts')
  </body>
</html>