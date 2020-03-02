@extends('layouts.superadmin')
@section('title', 'Regus Survey Data')
@section('drawer')
  @include('includes.drawerCentre')
@endsection
@section('content')
  <div class="content">
    <form method="GET" action={{route('centres.search')}}>
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
          <th>Name</th>
          <th>Number/ID</th>
          <th>Country</th>
          <th>City</th>
          <th>Address</th>
          <th>Completion Date</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($centres as $centre)
        
        <tr class="table-row">
          <td><a href="{{route('superadmin.centreData', $centre->name)}}">{{$centre->name}}</a></td>
          <td><a href="{{route('superadmin.centreData', $centre->name)}}">{{$centre->number}}</a></td>
          <td><a href="{{route('superadmin.centreData', $centre->name)}}">{{$centre->country}}</a></td>
          <td><a href="{{route('superadmin.centreData', $centre->name)}}">{{$centre->city}}</a></td>
          <td><a href="{{route('superadmin.centreData', $centre->name)}}">{{$centre->address}}</a></td>
          <td><a href="{{route('superadmin.centreData', $centre->name)}}">{{$centre->created_at}}</a></td>
          {{-- <td>
          <button type="button" class="btn btn-info bmd-btn-icon active">
            <i id="edit" class="fas fa-pen fa-xs"></i>
          </button>
          <button type="button" class="btn btn-danger bmd-btn-icon active">
            <i id="delete" class="fas fa-trash-alt fa-xs"></i>
          </button>
        </td> --}}
        </tr>
        
        @endforeach
      </tbody>
    </table>
  </div>
  <script>
    $(document).ready(function($) {
    $(".table-row").click(function() {
      var href = $(this).find("a").attr("href");
        if(href) {
            window.location = href;
        }
    });
});
  </script>
@endsection