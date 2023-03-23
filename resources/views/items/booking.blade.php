@extends('layout/master')

@section('title')
  Booking
@endsection

@section('content')
<div class='form'>
<?php //form to add booking?>
<h1>Booking</h1>
  <form method="post" action="{{url("addbooking")}}">
   {{csrf_field()}}
    <p><label>Client</label></p>
    <?php //drop down list for all clients?>
    <select id="client" name="client">
      @foreach($vehicles as $vehicle)
        <option value="{{$vehicle->client_id}}">{{$vehicle->name}}</option>
      @endforeach
    </select>
    <p><label>Rego</label></p>
    <?php //drop down list for all clients?>
    <select id="rego" name="rego">
      @foreach($vehicles as $vehicle)
        <option value="{{$vehicle->vehicle_id}}">{{$vehicle->rego}}</option>
      @endforeach
    </select>
    <p><label>Start Date</label></p>
    <input type="text" name="startdate">
    <p><label>Start Time</label></p>
    <input type="text" name="starttime">
    <p><label>End Date</label></p>
    <input type="text" name="enddate">
    <p><label>End Time</label></p>
    <input type="text" name="endtime">
    <br>
    <input type="submit" value="Submit">
    <input type="reset" value="Reset"></td></tr>
  </form>
</div>
@endsection