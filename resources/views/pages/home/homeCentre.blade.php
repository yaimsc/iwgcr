@extends('layouts.home')
@section('title', 'Regus Survey Data')
@section('content')
  <div class="content">
    <form method="GET" action={{route('home.centres.search')}}>
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
          <th>Number</th>
          <th>Country</th>
          <th>City</th>
          <th>Address</th>
          <th>Completion Date</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($centres as $centre)
          <tr>
            <td>{{$centre->name}}</td>
            <td>{{$centre->number}}</td>
            <td>{{$centre->country}}</td>
            <td>{{$centre->city}}</td>
            <td>{{$centre->address}}</td>
            <td>{{$centre->created_at}}</td>
          </tr> 
        @endforeach
      </tbody>
    </table>
  </div>
  
@endsection