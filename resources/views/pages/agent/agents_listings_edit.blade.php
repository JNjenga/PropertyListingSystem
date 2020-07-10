@extends('layouts.agents_layout')

@section('stylesheets')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

@section('content')

<h3>Update listing</h3>
<hr>
<form method="POST" action="{{ route('listings.update', $property->property_id) }}" enctype="multipart/form-data">
    @csrf
    @method("PATCH")
  <div class="form-group">
    <label for="text">Title</label> 
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fa fa-address-card"></i>
        </div>
      </div> 
      <input id="title" name="title" value="{{ $property->title }}"placeholder="Title of the property" type="text" aria-describedby="textHelpBlock" class="form-control">
    </div> 
    <span id="textHelpBlock" class="form-text text-muted">E.g 3 acre plot in Karen</span>
  </div>
  <div class="form-group">
    <label for="textarea">Description</label> 
    <textarea id="summernote" name="description"
    aria-describedby="textareaHelpBlock" class="form-control">{!! $property->description  !!}</textarea> 
    <span id="textareaHelpBlock" class="form-text text-muted">Breif description of the listing (150 words)</span>
  </div>
<div class="form-group">
      <select id="select" name="fk_property_category_id" class="custom-select" aria-describedby="selectHelpBlock">
        <option selected value="">Select property Category</option>
	@foreach($categories as $category)
    		@if($category->property_category_id == $property->property_category->property_category_id)
			
			<option selected value="{{$category->property_category_id}}">{{$category->property_category_title}}</option>
		@else
			<option value="{{$category->property_category_id}}">{{$category->property_category_title}}</option>
		@endif
			
	@endforeach
      </select> 
    <span id="textareaHelpBlock" class="form-text text-muted">Breif description of the listing (150 words)</span>
</div>
<div class="form-group">
  <div class="form-row">
    <div class="col">
      <input type="text" class="form-control" value="{{ $property->bedrooms }}" placeholder="Bedrooms">
    <span id="textareaHelpBlock" class="form-text text-muted">Breif description of the listing (150 words)</span>
    </div>
    <div class="col">
      <input type="text" class="form-control" value="{{ $property->bathrooms}}" placeholder="Bathrooms">
    <span id="textareaHelpBlock" class="form-text text-muted">Breif description of the listing (150 words)</span>
    </div>
  </div>
</div>
<div class="form-group">
      <select id="select" name="fk_county_id" class="custom-select" aria-describedby="selectHelpBlock">
        <option selected value="">Select county</option>
	@foreach($counties as $county )
			@if($county->county_id === $property->fk_county_id)
			    <option selected value="{{$county->county_id}}">{{$county->county_title}}</option>
            @else
			    <option value="{{$county->county_id}}">{{$county->county_title}}</option>
            @endif
	@endforeach
      </select> 
    <span id="textareaHelpBlock" class="form-text text-muted">Breif description of the listing (150 words)</span>
</div>
  <div class="form-group">
    <label for="text1">Location</label> 
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fa fa-address-book"></i>
        </div>
      </div> 
      <input value="{{ $property->location }}"id="text1" name="location" placeholder="Physical Address of property" type="text" aria-describedby="text1HelpBlock" class="form-control">
    </div> 
    <span id="text1HelpBlock" class="form-text text-muted">E.g Kibera in Nairobi</span>
  </div> 
  <div class="form-group">
    <label for="text1">Price</label> 
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fa fa-money"></i>
        </div>
      </div> 
      <input id="text1" value="{{ $property->price }}" name="price" placeholder="Price" type="text" aria-describedby="text1HelpBlock" class="form-control">
    </div> 
    <span id="text1HelpBlock" class="form-text text-muted">E.g Kibera in Nairobi</span>
  </div> 

  <div class="form-group">
    <button name="submit" type="submit" class="btn btn-primary">Update</button>
  </div>
</form>
@endsection

@section("js")
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
$(document).ready(function() {
  $('#summernote').summernote({
        toolbar: [
            [ 'style', [ 'style' ] ],
            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
            [ 'fontname', [ 'fontname' ] ],
            [ 'fontsize', [ 'fontsize' ] ],
            [ 'color', [ 'color' ] ],
            [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
            [ 'table', [ 'table' ] ],
            [ 'insert', [ 'link'] ],
            [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
        ]
    });
});
</script>
@endsection
