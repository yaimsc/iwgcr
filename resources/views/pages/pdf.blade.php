@extends('layouts.form')

@section('title', 'Regus Survey')

@section('content')

<div id="pdf-content">
  <div id="pdf-title">
    <h3>Download the PDF and follow the details of the survey guide</h3>
  </div>
  <div id="pdf-icon">
    <a href="/download/IWG_Communication_Rooms_Project_Survey.pdf"><img id="pdf" src="img/icon_pdf.png" alt="Regus Survey Requirements"></a>
  </div>
  <div>
    <a class="link">View online</a>
    <a class="link" href="/download/IWG_Communication_Rooms_Project_Survey.pdf">Download</a>
  </div>
  <div id="pdf-button">
    <a href="{{route('door.create')}}">
      <button class="btn-light">
        {{ __('NEXT') }}
      </button>
    </a>
  </div>
</div>
    
@endsection