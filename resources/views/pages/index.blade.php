@extends('layouts.home')

@section('title', 'Regus Survey')

@section('content')
  <div id="form">
    <h5>Centre Information<h5>
    <form method="post">
      @csrf
      <div class="form-group">
         <label class="bmd-label-floating">Name</label>
         <input type="text" class="form-control" name="name" id="name" min="2" max="35" required/> 
      </div>
      <div class="form-group">
        <label class="bmd-label-floating">Number</label>
        <input type="number" class="form-control" name="number" equired/>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label class="bmd-label-floating">City</label>
          <input type="text" class="form-control" name="city" required/>
        </div>
        <div class="form-group col-md-6">
          <label class="bmd-label-floating">Country</label>
          <input type="text" class="form-control" name="city" required/>
        </div> 
      </div>
  
    </form>
  </div>
  
@endsection