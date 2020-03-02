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
    <div class="numbers">
      <p>{{$centre->number}} number/ID<p>
      <p>{{$centre->created_at}}</p>
    </div>  
    <div class="address">
      <p>{{$centre->address}}</p>
      <p>{{$centre->city}}</p>
      <p>{{$centre->postal_code}}</p>
      <p>{{$centre->province}}</p>
      <p>{{$centre->country}}</p>
    </div>
    @endforeach
    @foreach ($contact_people as $people)
    <p class="title2">Centre Staff Contact Information</p>
      <div class="staff">
        <p>{{$people->name}}</p>
        <p>{{$people->centre_phone == null ? '' : 'T: '. $people->centre_telephonecode .' '}}{{$people->centre_phone == null ? '' : $poeple->centre_phone}}</p>
        <p>{{$people->mobile_phone == null ? '' : 'M: '.$people->mobile_telephonecode .' '}}{{$people->mobile_phone == null ? '' : $people->mobile_phone}}</p>
        <p>E: {{$people->email}}</p>
      </div>  
    @endforeach
    @foreach ($doors as $door)
    <p class="title2">Communications Room Door Information
        <div class="photos">
          <div class="img"><p>Interior Photo</p><img src={{$door->interior_photo}}/></div>
          <div class="img"><p>Front Photo</p><img src={{$door->front_photo}} /></div>
          <div class="img"><p>Exterior Photo</p><img src={{$door->exterior_photo}} /></div>
          <div class="img"><p>Placement Photo</p><img src={{$door->placement_photo}} /></div>
        </div>
        <div class="cylinder">
          <p>Communication Room Door Name: {{$door->door_name}}</p>
          <p>Exterior Length: {{$door->exterior_length.' '}} {{$door->type_length}}</p>
          <p>Interior Length: {{$door->interior_length.' '}} {{$door->type_length}}</p>
          <p>Confirmation Distance from Knob's centre to Frame is OK: {{$door->distance_knobs_frame_ok == 1 ? 'YES' : 'NO'}}</p>
        </div>
    @endforeach
    <div>

    </div>
  </div>
@endsection