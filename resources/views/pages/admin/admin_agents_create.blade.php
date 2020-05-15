@extends('layouts.admin_layout')

@section('stylesheets')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
@endsection
@section('content')

<h3>Create a new agent</h3>
<hr>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<form>
  <div class="form-group">
    <label for="text">Username</label> 
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fa fa-address-card"></i>
        </div>
      </div> 
      <input id="text" name="text" placeholder="Enter username" type="text" aria-describedby="textHelpBlock" class="form-control">
    </div> 
    <span id="textHelpBlock" class="form-text text-muted">Ensure username is unique and only contains alphanumerical characters</span>
  </div>
  <div class="form-group">
    <label for="text1">Email</label> 
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fa fa-envelope"></i>
        </div>
      </div> 
      <input id="text1" name="text1" placeholder="Enter email" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label for="text3">Phone number</label> 
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fa fa-phone"></i>
        </div>
      </div> 
      <input id="text3" name="text3" placeholder="Enter your phone number" type="text" class="form-control" aria-describedby="text3HelpBlock">
    </div> 
    <span id="text3HelpBlock" class="form-text text-muted">E.g +254 789 890 989</span>
  </div>
  <div class="form-group">
    <label for="text2">Password</label> 
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fa fa-key"></i>
        </div>
      </div> 
      <input id="text2" name="text2" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label for="select">Type</label> 
    <div>
      <select id="select" name="select" class="custom-select" aria-describedby="selectHelpBlock">
        <option value="rabbit">Owner</option>
        <option value="duck">Broker</option>
      </select> 
      <span id="selectHelpBlock" class="form-text text-muted">Owner or a broker?</span>
    </div>
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
