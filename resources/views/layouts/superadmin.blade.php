<!DOCTYPE html>
  <meta charset="utf-8">
  <head>
    @include('includes.head')
    <link rel="stylesheet" href="/css/superadmin.css">
    <link rel="stylesheet" href="/css/modal.css">
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
  <script>
    $(document).ready(function() {

      $('#btn-pre').on('click', function(){
        $('.pre').show();
        $('.post').hide();
      });

      $('#btn-post').on('click', function(){
        $('.pre').hide();
        $('.post').show();
      });

    });
  </script>
</html>