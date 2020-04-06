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
    <script>
       $(document).ready(function() {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $('select[name="country"]').on('change', function() {
            var country = $(this).val();
            if(country) {
                $.ajax({
                    url: '/ajax/'+country,
                    type: "POST",
                    dataType: "json",
                    contentType:"application/json; charset=utf-8",
                    success:function(data) {
                        console.log(data)
                        
                        $('select[name="centre_number"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="centre_number"]').append('<option value="'+ value.number +'">' + value.number+' - '+ value.name +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="centre_number"]').empty();
            }
        });
    });
    </script> 
    <script src="js/header.js"></script> 
  </body>
</html>