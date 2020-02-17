@extends('layouts.home')
@section('title', 'Regus Survey Data')
@section('content')
  <div class="content">
    <table id="table" class="row-border">
      <thead>
        <tr>
          <th>Name</th>
          <th>Telephone Code</th>
          <th>Number</th>
          <th>Email</th>
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
            <td>{{$contact->centre_name}}</td>
            <td>{{$contact->created_at}}</td>
          </tr> 
        @endforeach
      </tbody>
    </table>
  </div>
@endsection