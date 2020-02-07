@extends('layouts.home')

@section('title', 'Regus Survey')

@section('content')

<img src="/img/salto.png" id="img-salto"/>
  <div id="form-centre">
    <h5>Centre Information<h5>
    <form method="post">
      @csrf
      <div class="form-group">
        <label class="bmd-label-floating">Name</label>
         <input type="text" class="form-control" name="name" id="name" min="2" max="35" required/> 
      </div>
      <div class="form-group">
        <label class="bmd-label-floating">Number</label>
        <input type="number" class="form-control" name="number" required/>
      </div>
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
        <div class="form-group">
          <select class="form-control" name="country" id="country">
            <option value="" hidden disabled selected class="placeholder">--- Select Country ---</option>
              @foreach ($countries as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
              @endforeach
          </select>
        </div>  
      {{-- </div> --}}
      <div class="form-group">
        <label class="bmd-label-floating">City</label>
        <input type="text" class="form-control" name="city" required/>
      </div>


    </form>
  </div>
  <div id="form-centre">
    <h5>Centre Staff Contact Person<h5>
    <form method="post">
      @csrf
      <div class="form-group">
        <label class="bmd-label-floating">Name</label>
         <input type="text" class="form-control" name="name" id="name" min="2" max="35" required/> 
      </div>
      <div class="form-group">
        {{-- <label>Telephone Number</label> --}}
        <input type="tel" class="form-control" name="number" placeholder="+ 34 671 29 05 34" required/>
      </div>
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
        <div class="form-group">
          <select class="form-control" name="country" id="country">
            <option value="" hidden disabled selected class="placeholder">--- Select Country ---</option>
              @foreach ($countries as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
              @endforeach
          </select>
        </div>  
      {{-- </div> --}}
      <div class="form-group">
        <label class="bmd-label-floating">Email</label>
        <input type="email" class="form-control" name="email" required/>
      </div>
    </form>
  </div>

{{-- <script type="text/javascript" src="{{asset('./js/app.js')}}"></script> --}}
  
  
@endsection