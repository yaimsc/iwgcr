@extends('layouts.superadmin')
@section('title', 'Centres Information - IWG Communication Rooms Project')
@section('drawer')
  <link rel="stylesheet" href="/css/data.css" />
  @include('includes.drawer')
@endsection
@section('content')
  <div class="content">
    @foreach ($centres as $centre)
  <div class="title">
    <h4>Centre: {{$centre->name}}</h4>
  </div>
  <div>
    <div class="botones">
      <button class="btn-active" id="btn-pre">Pre-Installation Survey</button>
      <button class="btn-disabled" id="btn-post">Post-Installation Sign Off Form</button>
    </div>
    <div id="pre">
      <h5>Pre-Installation Survey</h5>
      <p class="title2">Centre Information</p>
      <div class="centre_info">
        <div class="centre">
          <div><p class="bold">Centre Number:</p><p>{{$centre->number}}<p></div>
          <div><p class="bold">Address:</p><p>{{$centre->address}}</p></div>
          <div><p class="bold">City: </p><p>{{$centre->city}}</p></div>
          <div><p class="bold">Postal Code: </p><p>{{$centre->postal_code}}</p></div>
          <div><p class="bold">Province/State: </p><p>{{$centre->province}}</p></div>
          <div><p class="bold">Country:</p><p>{{$centre->country}}</p></div>
        </div>
        <div class="date">
          <p>{{$centre->created_at}}</p>
        </div> 
      </div>
      @endforeach
      @foreach ($contact_people as $people)
      <p class="title2">Centre Staff Contact Information</p>
        <div class="staff">
          <div><p class="bold">Name: </p><p>{{$people->name}}</p></div>
          <div>
            @if ($people->centre_phone !== null)
                <p class="bold">Centre phone: </p><p>{{$people->centre_telephonecode.' '}}{{$people->centre_phone}}</p>
            @endif
          </div>
            {{-- {{$people->centre_phone == null ? '' :'T: '. $people->centre_telephonecode .' '}}{{$people->centre_phone == null ? '' : $people->centre_phone}}</p> --}}
            <div>
              @if ($people->mobile_phone !== null)
                  <p class="bold">Mobile phone: </p><p>{{$people->mobile_telephonecode.' '}}{{$people->mobile_phone}}</p>
              @endif
            </div>
            <div><p class="bold">Email: </p><p>{{$people->email}}</p></div>
        </div>  
      @endforeach
      @foreach ($doors as $door)
      <p class="title2">Communication Rooms Door Information</p>
          <div class="photos">
            <div class="img">
              <p>Interior Photo</p>
              <img src={{$door->interior_photo}} alt="Interior Photo" id="img01" />
            </div>
            <div class="img">
              <p>Front Photo</p>
              <img src={{$door->front_photo}} alt="Front Photo" id="img02"/>
            </div>
            <div class="img">
              <p>Exterior Photo</p>
              <img src={{$door->exterior_photo}} alt="Exterior Photo" id="img03"/>
            </div>
            <div class="img">
              <p>IQ Placement Photo</p>
              <img src={{$door->placement_photo}} alt="IQ Placement Photo" id="img04"/>
            </div>
            <div class="img">
              <p>Optional IQ Placement Photo</p>
              @if ($door->placement_photo_optional == null)
                  <p>No Photo</p>
              @else
                <img src={{$door->placement_photo_optional}} alt="IQ Placement Photo (Optional)" id="img05"/>
              @endif
            </div>
          </div>
          <div class="cylinder">
            <div><p class="bold">Communication Room Door Name:</p><p> {{$door->door_name}}</p></div>
            <div><p class="bold">Exterior Length:</p><p> {{$door->exterior_length.' '}} {{$door->type_length}}</p></div>
            <div><p class="bold">Interior Length:</p><p> {{$door->interior_length.' '}} {{$door->type_length}}</p></div>
            <div><p class="bold">Confirmation Distance from Knob's centre to Frame is OK:</p><p>{{$door->distance_knobs_frame_ok == 1 ? 'YES' : 'NO'}}</p></div>
            <div><p class="bold">Does the General Manager want to receive from SALTO a quotation for equipping the whole center?:</p><p>{{$door->quotation == 1 ? 'YES' : 'NO'}}</p></div>
          </div>
      @endforeach
    </div>
    <div id="post">
      <h5>Post-installation Sign-off Form</h5>
      @if($installers->count() == 0 || $sign_doors->count() == 0)
        <p class="no-info">There is no data. Post-Installation has not been done.</p>
      @else
        @foreach($installers as $installer)
        <p class="title2">Installer Information</p>
        <div class="installer_info">
          <div class="installer">
            <div><p class="bold">Name:</p><p> {{$installer->name}}</p></div>
            <div><p class="bold">Email:</p><p> {{$installer->email}}</p></div>
            <div><p class="bold">Telephone:</p><p> {{$installer->telephonecode.' '}}{{$installer->telephone}}</p></div>
          </div>
          <div class="date">
            <p>{{$installer->created_at}}</p>
          </div>
        </div>
        @endforeach
        @foreach($sign_doors as $sign_door)
        <p class="title2">Sign-off Information</p>
        <div class="photos">
          <div class="img">
            <p>Cylinder Interior Photo</p>
            <img src={{$sign_door->interior_photo}} alt="Interior Photo" id="img06" />
          </div>
          <div class="img">
            <p>Cylinder Exterior Photo</p>
            <img src={{$sign_door->exterior_photo}} alt="Exterior Photo" id="img07"/>
          </div>
          <div class="img">
            <p>IQ Installation Photo</p>
            <img src={{$sign_door->installation_photo}} alt="IQ Installation Photo" id="img08"/>
          </div>
          <div class="img">
            <p>IQ + Cylinder Photo</p>
            <img src={{$sign_door->iq_cylinder_photo}} alt="IQ Cylinder Photo" id="img09"/>
          </div>
        </div>
        <div class="checkboxes">
          <div><p class="bold">IQ shows purple light: </p><i class="fas fa-check"></i><p></p></div>
          <div><p class="bold">IQ Mac adress has been whitelisted: </p><i class="fas fa-check"></i><p></p></div>
          <div><p class="bold">Centre has activated Titan: </p><i class="fas fa-check"></i><p></p></div>
          <div><p class="bold">Maintenance kit and tags have been given to centre staff: </p><i class="fas fa-check"></i><p></p></div>
        </div>
        @endforeach
      @endif
    </div>
  </div>
@endsection