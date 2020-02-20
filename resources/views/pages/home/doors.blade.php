@extends('layouts.home')
@section('title', 'Regus Survey Data')
@section('content')
  <div class="content">
  <form method="GET" action="{{route('doors.search')}}">
      <div class="filter">
        <select class="form-control" name="country" id="country">
          <option value="" hidden disabled selected class="placeholder">Select Country</option>
            @foreach ($countries as $country)
              <option value="{{$country->name}}">{{$country->name}}</option>
            @endforeach
        </select>
        <button class="btn btn-raised btn-info" type="submit">
          <i class="fas fa-search"></i>
          <div class="search">Search</div>
        </button>
      </div> 
    </form> 
    <table class="table" class="row-border">
      <thead>
        <tr>
          <th>Centre Name</th>
          <th>Interior Photo/th>
          <th>Front Photo</th>
          <th>Exterior Photo</th>
          <th>Cylinder Name</th>
          <th>Exterior Length</th>
          <th>Interior Length</th>
          <th>Distance Knobs Frame OK</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($doors as $door)
          <tr>
            <td>{{$door->centre_name}}</td>
            <td>{{$door->interior_photo}}</td>
            <td>{{$door->front_photo}}</td>
            <td>{{$door->exterior_photo}}</td>
            <td>{{$door->cylinder_name}}</td>
            <td>{{$door->exterior_length}}</td>
            <td>{{$door->interior_length}}</td>
            <td>{{$door->distance_knobs_frame_ok}}</td>
          </tr> 
        @endforeach
      </tbody>
    </table>
  </div>
@endsection