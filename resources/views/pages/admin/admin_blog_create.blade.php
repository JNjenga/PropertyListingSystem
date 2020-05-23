@extends('layouts.admin_layout')

@section('stylesheets')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
@endsection
@section('content')

<h3>Create a new article</h3>
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
      <input id="text" name="text" placeholder="Title of the article" type="text" aria-describedby="textHelpBlock" class="form-control">
    </div> 
    <span id="textHelpBlock" class="form-text text-muted">E.g What home is best for you?</span>
  </div>
  <div class="form-group">
    <label for="textarea">Body</label> 
    <textarea id="textarea" name="textarea" cols="40" rows="15" class="form-control" aria-describedby="textareaHelpBlock"></textarea> 
    <span id="textareaHelpBlock" class="form-text text-muted">Article content</span>
  </div>
  <div class="form-group">
    <label for="select">Select</label> 
    <div>
      <select id="select" name="select" class="custom-select" aria-describedby="selectHelpBlock">
        <option value="rabbit">Rental homes</option>
        <option value="duck">How to</option>
      </select> 
      <span id="selectHelpBlock" class="form-text text-muted">Topic covered in this article</span>
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
