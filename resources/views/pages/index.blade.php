@extends('layouts.landing')

@section('title', 'Regus Survey')

@section('content')


{{-- <div class="index">

  <div id="form-centre" class="card">
    <h5 class="title">Centre Information<h5>
    <form method="POST" action="{{route('centre.store')}}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label class="bmd-label-floating">Name</label>
         <input type="text" class="form-control" name="name" id="name" min="2" max="255" required/> 
      </div>
      <div class="form-group">
        <label class="bmd-label-floating">Number</label>
        <input type="number" class="form-control" name="number" required/>
      </div> --}}
      {{-- <div class="form-row"> --}}
        {{-- <div id="app">
          <example-component></example-component>
        </div> --}}
        
        {{-- <div class="form-group col-md-6">
          <select class="form-control" name="continent" id="continent" data-dependent="country">
            <option value="">--- Select Continent ---</option>
            @foreach ($continents as $continent)
              <option value="{{$continent->id}}">{{$continent->name}}</option>
            @endforeach
          </select>
        </div> --}}
        {{-- <div class="form-group">
          <select class="form-control" name="country" id="country">
            <option value="" hidden disabled selected class="placeholder">Select Country</option>
              @foreach ($countries as $country)
                <option value="{{$country->name}}">{{$country->name}}</option>
              @endforeach
          </select>
        </div>  
      {{-- </div> --}}
      {{-- <div class="form-group">
        <label class="bmd-label-floating">City</label>
        <input type="text" class="form-control" name="city" required/>
      </div>
      <div>
        <button type="submit" class="btn btn-primary">
          {{ __('SUBMIT') }}
      </button>
      </div>
    </form>
  </div>
  
</div> --}}



@endsection