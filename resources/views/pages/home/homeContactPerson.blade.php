@extends('layouts.home')
@section('title', 'Regus Survey Data')
@section('content')
  <div class="content">
  <form method="GET" action="{{route('home.contacts.search')}}">
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
          <th>Telephone Code</th>
          <th>Number</th>
          <th>Email</th>
          <th>Country</th>
          <th>Centre Name</th>
          <th>Completion Date</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($contact_people as $contact)
          <tr>
            <td>{{$contact->name}}</td>
            <td>{{$contact->telephonecode}}</td>
            <td>{{$contact->number}}</td>
            <td>{{$contact->email}}</td>
            <td>{{$contact->country}}</td>
            <td>{{$contact->centre_name}}</td>
            <td>{{$contact->created_at}}</td>
          </tr> 
        @endforeach
      </tbody>
    </table>
  </div>
@endsection