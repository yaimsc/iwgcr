@extends('layouts.form')
@section('title', 'Regus Survey - Centre information')
@section('content')
<div id="card-contact" class="card">
  <div class="card-header">
    <h5 class="title">Centre Information<h5>
  </div>
  <form method="POST" action="{{route('centre.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label class="bmd-label-floating">Name</label>
       <input type="text" class="form-control" name="name" id="name" min="2" max="255" required/> 
    </div>
    <div class="form-group">
      <label class="bmd-label-floating">Number</label>
      <input type="number" class="form-control" name="number" required/>
    </div>
    {{-- <div class="form-row"> --}}
      
      {{-- <div class="form-group col-md-6">
        <select class="form-control" name="continent" id="continent" data-dependent="country">
          <option value="">--- Select Continent ---</option>
          @foreach ($continents as $continent)
            <option value="{{$continent->id}}">{{$continent->name}}</option>
          @endforeach
        </select>
      </div> --}}
      <div class="form-group">
        <select class="form-control" name="country" id="country">
          <option value="" hidden disabled selected class="placeholder">Select Country</option>
            @foreach ($countries as $country)
              <option value="{{$country->name}}">{{$country->name}}</option>
            @endforeach
        </select>
      </div>  

    <div class="form-group">
      <label class="bmd-label-floating">City</label>
      <input type="text" class="form-control" name="city" required/>
    </div>
    <div class="form-group">
      <label class="bmd-label-floating">Address</label>
      <input type="text" class="form-control" name="address" required/>
    </div>
    <div class="submit">
      <button type="submit" class="btn">
        {{ __('SUBMIT') }}
    </button>
    </div>
    </div>
  </form>
</div>
<div class="next">
  <a href="{{route('contactPerson.index')}}">Next</a>
</div>

@endsection