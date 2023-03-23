@extends('layout/master')

@section('title')
  Update Item
@endsection

@section('content')
<?php //Form to update vehicle information?>
    <form method="post" action=" {{url("updateitem")}}">
    {{csrf_field()}}
        <input type="hidden" name="id" value="{{$vehicle->vehicle_id}}">
        <p>
        <label>Summary: </label>
        <p><label>Model Name</label></p>
        <input type="text" name="model" value="{{$vehicle->model}}">
        <p><label>Rego</label></p>
        <input type="text" name="rego" value="{{$vehicle->rego}}">
        <p><label>Year</label></p>
        <input type="text" name="year" value="{{$vehicle->year}}">
        <p><label>Odometer</label></p>
        <input type="text" name="odometer" value="{{$vehicle->odometer}}">
        <p><label>Transmission</label></p>
        <input type="text" name="transmission" value="{{$vehicle->transmission}}">
        <input type="reset" value="Reset"></td></tr>
        <input type="submit" value="Update item">
    </form>
@endsection