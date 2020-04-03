<!doctype html>
  <meta http-equiv="Content-type" content="text/html" charset="utf-8">
  <head>
    @include('includes.head')
    <link rel="stylesheet" href="/css/form.css">
    <link rel="stylesheet" href="/css/footer.css">
    <title>@yield('title')</title>
  </head>
  <body>
    @include('includes.navbars.navlight')
    <section>
      @yield('content')
    </section>
    @include('includes.footer.footer')
    @include('includes.scripts')
  </body>
  
</html>