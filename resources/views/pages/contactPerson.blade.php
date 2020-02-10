@extends('layouts.home')

@section('title', 'Regus Survey')

@section('content')

<div id="form-staff" class="card">
  <h5 class="title">Centre Staff Contact Person<h5>
  <form method="post">
    @csrf
    <div class="form-group">
      <label class="bmd-label-floating">Name</label>
       <input type="text" class="form-control" name="name" id="name" min="2" max="35" required/> 
    </div>
    <div class="form-row">
  
      <div class="form-group col-md-6">
        <select class="form-control" name="telephonecode" id="telephonecode">
          <option value="" hidden disabled selected class="placeholder">+ 34</option>
            @foreach ($countries as $country)
              <option value="{{$country->telephonecode}}">{{$country->name}} {{$country->telephonecode}}</option>
            @endforeach
        </select>
      </div>
      <div class="form-group col-md-6">
        <input type="tel" id="telephone" class="form-control" name="telephonenumber" placeholder="671 29 05 34" required/>
      </div>
      
    </div>
    <div class="form-group">
      <select class="form-control" name="centre" id="centre">
        <option value="" hidden disabled selected class="placeholder">Select Centre</option>
          @foreach ($centres as $centre)
            <option value="{{$centre->id}}">{{$centre->name}}</option>
          @endforeach
      </select>
    </div>  
    <div class="form-group">
      <label class="bmd-label-floating">Email</label>
      <input type="email" class="form-control" name="email" required/>
    </div>
  </form>
</div>

@endsection 