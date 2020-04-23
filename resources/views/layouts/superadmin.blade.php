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
    <!-- The Modal -->
    <div id="myModal" class="modal">
      <span class="close">&times;</span>
      <img class="modal-content" id="imgModal">
      <div id="caption"></div>
    </div>
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
    /* Parte show Photos en modal */
    
     // Get the modal
     var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img01 = document.getElementById("img01");
    onclick(img01)
    var img02 = document.getElementById("img02");
    onclick(img02)
    var img03 = document.getElementById("img03");
    onclick(img03)
    var img04 = document.getElementById("img04");
    onclick(img04)
    var img05 = document.getElementById("img05");
    if(img05 !== null){
      onclick(img05);
    }
    var img06 = document.getElementById("img06");
    if(img06 !== null){
      onclick(img06)
    }
    var img07 = document.getElementById("img07");
    if(img07 !== null){
      onclick(img07)
    }
    var img08 = document.getElementById("img08");
    if(img08 !== null){
      onclick(img08)
    }
    var img09 = document.getElementById("img09");
    if(img09 !== null){
      onclick(img09)
    }
    var modalImg = document.getElementById("imgModal");
    var captionText = document.getElementById("caption");


    function onclick(value){
      if(value == null){
        return null;
      }else{
        value.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
        }
      }
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
    modal.style.display = "none";
    }

    //* botones de centreData */
    $(document).ready(function() {

    $('#btn-pre').on('click', function(){
      $('#pre').show();
      $('#post').hide();
      $(this).removeClass('btn-disabled').addClass('btn-active');
      $('#btn-post').removeClass('btn-active').addClass('btn-disabled');
    });

    $('#btn-post').on('click', function(){
      $('#pre').hide();
      $('#post').show();
      $('#btn-pre').addClass('btn-disabled'); 
      $(this).removeClass('btn-disabled').addClass('btn-active');
      $('#btn-pre').removeClass('btn-active').addClass('btn-disabled');
    });

});
  </script>
</html>