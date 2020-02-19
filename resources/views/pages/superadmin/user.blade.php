@extends('layouts.superadmin')
@section('title', 'Regus Survey Data')
@section('content')
  <div class="content">
  <form method="GET" action="{{route('contacts.search')}}">
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
          <th>Email</th>
          <th>Country</th>
          <th>Centre Name</th>
          <th>Completion Date</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->country}}</td>
            <td>{{$user->created_at}}</td>
            <td>
              <button type="button" class="btn btn-info bmd-btn-icon active">
                <i id="edit" class="fas fa-pen fa-xs"></i>
              </button>
              <button type="button" class="btn btn-danger bmd-btn-icon active">
                <i id="delete" class="fas fa-trash-alt fa-xs"></i>
              </button>
            </td>
          </tr> 
        @endforeach
      </tbody>
    </table>
  </div>
@endsection