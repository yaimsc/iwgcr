@extends('layouts.home')
<link rel="stylesheet" href="/css/data.css" />
@section('drawer')
  @include('includes.drawer')
@endsection
@section('content')
  <div class="content">
    @foreach ($centres as $centre)
  <div class="title">
    <h4>Centre: {{$centre->name}}</h4>
  </div>
    <p class="title2">Centre Information</p>
    <div class="centre_info">
      <div class="centre">
        <div><p class="bold">Number/ID:</p><p>{{$centre->number}}<p></div>
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
            <a href="{{$door->interior_photo}}"><img src={{$door->interior_photo}}/></a>
          </div>
          <div class="img">
            <p>Front Photo</p>
            <a href="{{$door->front_photo}}"><img src={{$door->front_photo}} /></a>
          </div>
          <div class="img">
            <p>Exterior Photo</p>
            <a href="{{$door->exterior_photo}}"><img src={{$door->exterior_photo}} /></a>
          </div>
          <div class="img">
            <p>IQ Placement Photo</p>
            <a href="{{$door->placement_photo}}"><img src={{$door->placement_photo}} /></a>
          </div>
          <div class="img">
            <p>Optional IQ Placement Photo</p>
            @if ($door->placement_photo_optional == null)
                <p>No Photo</p>
            @else
              <a href="{{$door->placement_photo_optional}}"><img src={{$door->placement_photo_optional}} /></a>
            @endif
            
          </div>
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
@endsection