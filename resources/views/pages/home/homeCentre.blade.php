@extends('layouts.home')
@section('title', 'Regus Survey Data')
@section('content')
  <div class="content">
    <table id="table" class="row-border">
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