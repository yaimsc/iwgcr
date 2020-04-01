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
                    success:function(data) {
                        console.log(data)
                        
                        $('select[name="centre_name"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="centre_name"]').append('<option value="'+ key +'">' + value.number+' - '+ value.name +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="centre_name"]').empty();
            }
        });
    });
    </script> 
    <script src="js/header.js"></script> 
  </body>
</html>