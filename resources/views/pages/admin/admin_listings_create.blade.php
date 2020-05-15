@extends('layouts.admin_layout')

@section('stylesheets')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
@endsection
@section('content')

<h3>Create a new listing</h3>
<hr>
<form>
  <div class="form-group">
    <label for="text">Title</label> 
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fa fa-address-card"></i>
        </div>
      </div> 
      <input id="text" name="text" placeholder="Title of the property" type="text" aria-describedby="textHelpBlock" class="form-control">
    </div> 
    <span id="textHelpBlock" class="form-text text-muted">E.g 3 acre plot in Karen</span>
  </div>
  <div class="form-group">
    <label for="textarea">Description</label> 
    <textarea id="textarea" name="textarea" cols="40" rows="5" aria-describedby="textareaHelpBlock" class="form-control"></textarea> 
    <span id="textareaHelpBlock" class="form-text text-muted">Breif description of the listing (150 words)</span>
  </div>
  <div class="form-group">
    <label>Type of property</label> 
    <div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="radio" id="radio_0" type="radio" class="custom-control-input" value="rabbit" aria-describedby="radioHelpBlock"> 
        <label for="radio_0" class="custom-control-label">Rent</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="radio" id="radio_1" type="radio" class="custom-control-input" value="duck" aria-describedby="radioHelpBlock"> 
        <label for="radio_1" class="custom-control-label">For sale</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="radio" id="radio_2" type="radio" class="custom-control-input" value="fish" aria-describedby="radioHelpBlock"> 
        <label for="radio_2" class="custom-control-label">Lots and land</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="radio" id="radio_3" type="radio" class="custom-control-input" value="" aria-describedby="radioHelpBlock"> 
        <label for="radio_3" class="custom-control-label">Other</label>
      </div> 
      <span id="radioHelpBlock" class="form-text text-muted">Which category does the property fall under?</span>
    </div>
  </div>
  <div class="form-group">
    <label for="text1">Address</label> 
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fa fa-address-book"></i>
        </div>
      </div> 
      <input id="text1" name="text1" placeholder="Physical Address of property" type="text" aria-describedby="text1HelpBlock" class="form-control">
    </div> 
    <span id="text1HelpBlock" class="form-text text-muted">E.g Kibera in Nairobi</span>
  </div> 
  <div class="form-group">
    <button name="submit" type="submit" class="btn btn-primary">Create</button>
  </div>
</form>
@endsection


@section("js")

<!-- Page level plugins -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
@endsection
