<html>
  <head>
    @include('includes.head')
    <title>@yield('title')</title>
  </head>
  <body>
    <header>
      @include('includes.landing.header')
    </header>
      @yield('content')
    <footer>

    </footer>
    @include('includes.scripts')
  </body>
</html>