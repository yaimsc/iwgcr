@extends('layout.superadmin')
@section('title', 'Centres Information - IWG Communication Rooms Project')
@section('drawer')
  <link rel="stylesheet" href="/css/data.css" />
  @include('includes.drawer')
@endsection
@section('content')
  <div class="content">
    @foreach ($centres as $centre)
  <div class="title">
    <h4>Centre: <input value="{{$centre->name}}" /></h4>
  </div>
    <p class="title2">Centre Information</p>
    <div class="centre_info">
      <div class="centre">
        <div><p class="bold">Centre Number:</p><p>{{$centre->number}}<p></div>
        <div><p class="bold">Address:</p><p>{{$centre->address}}</p></div>
        <div><p class="bold">City: </p><p>{{$centre->city}}</p></div>
        <div><p class="bold">Postal Code: </p><p>{{$centre->postal_code}}</p></div>
        <div><p class="bold">Province/State: </p><p>{{$centre->province}}</p></div>
        <div><p class="bold">Country:</p><p>{{$centre->country}}</p></div>
      </div>
      <div class="date">
        <p>{{$centre->created_at}}</p>
      </div> 
    </div>
    @endforeach
    @foreach ($contact_people as $people)
    <p class="title2">Centre Staff Contact Information</p>
      <div class="staff">
        <div><p class="bold">Name: </p><p>{{$people->name}}</p></div>
        <div>
          @if ($people->centre_phone !== null)
              <p class="bold">Centre phone: </p><p>{{$people->centre_telephonecode.' '}}{{$people->centre_phone}}</p>
          @endif
        </div>
          {{-- {{$people->centre_phone == null ? '' :'T: '. $people->centre_telephonecode .' '}}{{$people->centre_phone == null ? '' : $people->centre_phone}}</p> --}}
          <div>
            @if ($people->mobile_phone !== null)
                <p class="bold">Mobile phone: </p><p>{{$people->mobile_telephonecode.' '}}{{$people->mobile_phone}}</p>
            @endif
          </div>
          <div><p class="bold">Email: </p><p>{{$people->email}}</p></div>
      </div>  
    @endforeach
    @foreach ($doors as $door)
    <p class="title2">Communication Rooms Door Information
        <div class="photos">
          <div class="img">
            <p>Interior Photo</p>
            <img src={{$door->interior_photo}} alt="Interior Photo" id="img01" />
          </div>
          <div class="img">
            <p>Front Photo</p>
            <img src={{$door->front_photo}} alt="Front Photo" id="img02"/>
          </div>
          <div class="img">
            <p>Exterior Photo</p>
            <img src={{$door->exterior_photo}} alt="Exterior Photo" id="img03"/>
          </div>
          <div class="img">
            <p>IQ Placement Photo</p>
            <img src={{$door->placement_photo}} alt="IQ Placement Photo" id="img04"/>
          </div>
          <div class="img">
            <p>Optional IQ Placement Photo</p>
            @if ($door->placement_photo_optional == null)
                <p>No Photo</p>
            @else
              <img src={{$door->placement_photo_optional}} alt="IQ Placement Photo (Optional)" id="img05"/>
            @endif
          </div>
        </div>
        <!-- The Modal -->
        <div id="myModal" class="modal">
          <span class="close">&times;</span>
          <img class="modal-content" id="imgModal">
          <div id="caption"></div>
        </div>
        <div class="cylinder">
          <div><p class="bold">Communication Room Door Name:</p><p> {{$door->door_name}}</p></div>
          <div><p class="bold">Exterior Length:</p><p> {{$door->exterior_length.' '}} {{$door->type_length}}</p></div>
          <div><p class="bold">Interior Length:</p><p> {{$door->interior_length.' '}} {{$door->type_length}}</p></div>
          <div><p class="bold">Confirmation Distance from Knob's centre to Frame is OK:</p><p>{{$door->distance_knobs_frame_ok == 1 ? 'YES' : 'NO'}}</p></div>
        </div>
    @endforeach
    <div>
    </div>
  </div>
  <script>
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
    var modalImg = document.getElementById("imgModal");
    var captionText = document.getElementById("caption");
    

    function onclick(value){
      value.onclick = function(){
      modal.style.display = "block";
      modalImg.src = this.src;
      captionText.innerHTML = this.alt;
      }
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
    modal.style.display = "none";
    }
  </script>
@endsection
@endsection