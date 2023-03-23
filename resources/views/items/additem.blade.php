@extends('layout/master')

@section('title')
  Add Client
@endsection

@section('content')
<h1>Add Client</h1>
<div class="form">
<?php //form to add vehicle?>
<form method="post" action="{{url("additem")}}">
    {{csrf_field()}}
      <p><label>Client Name</label></p>
      <input type="text" name="name">
      <p><label>Age</label></p>
      <input type="text" name="age">        
      <p><label>Driver's license</label></p>
      <input type="text" name="dlnum">
      <p><label>License type</label></p>
      <input type="text" name="license">
      <p><label>Date of bith</label></p>
      <input type="date" name="dob">
      <input type="submit" value="Submit">
      <input type="reset" value="Reset"></td></tr>
</div>
@endsection