<html>
  <head>
    @include('includes.head')
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/footer.css">
  </head>
  <body>
    <header>
      @include('includes.landing.header')
    </header>
      @yield('content')
    <footer>
      @include('includes.footer.footer')
    </footer>
    @include('includes.scripts')   
    <script src="js/header.js"></script> 
  </body>
</html>