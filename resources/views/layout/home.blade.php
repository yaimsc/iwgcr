<html>
  <head>
    @include('includes.head')
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