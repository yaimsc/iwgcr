@extends('layouts.form')

@section('title', 'Regus Survey')

@section('content')

<div id="pdf-content">
  <div id="pdf-title">
    <h3>Download the PDF and follow the details of the survey guide</h3>
  </div>
  <div id="pdf-icon">
    <a href="/download/IWG_Communication_Rooms_Project_Survey.pdf"><img id="pdf" src="img/icon_pdf.png" alt="IWG Communication Rooms pproject Survey"></a>
  </div>
  <div class="links">
    <a href="/view/IWG_Communication_Rooms_Project_Survey.pdf">View online</a>
    <a href="/download/IWG_Communication_Rooms_Project_Survey.pdf">Download</a>
  </div>
  <div class="text">
    <p>Once completed the survey click next to upload the requested documentation</p>
  </div>
  <div id="pdf-button">
    <a href="{{route('door.create')}}">
      <button class="btn-light">
        {{ __('NEXT') }}
      </button>
    </a>
  </div>
  <div class="back" id="back-pdf">
    <a href="javascript:history.back()">Back</a>
  </div>
</div>
    
@endsection