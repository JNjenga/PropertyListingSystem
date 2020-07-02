@extends('layouts.admin_layout')

@section('stylesheets')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

@section('content')

<h3>Create a new article</h3>
<hr>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="/admin/blog">
    @csrf
  <div class="form-group">
    <label for="text">Title</label> 
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fa fa-address-card"></i>
        </div>
      </div> 
      <input id="text" name="blog_post_title" placeholder="Title of the article" type="text"
      aria-describedby="textHelpBlock" class="form-control @error('blog_post_title') is-invalid @enderror " >
    </div> 
    <span id="textHelpBlock" class="form-text text-muted">E.g What home is best for you?</span>
  </div>
  <div class="form-group">
    <label for="textarea">Body</label> 
    <textarea id="summernote" name="blog_post_body" cols="40" rows="15" class="form-control @error('blog_post_body') is-invalid @enderror" aria-describedby="textareaHelpBlock">
</textarea> 
    <span id="textareaHelpBlock" class="form-text text-muted">Article content</span>
  </div>
  <div class="form-group">
    <label for="select">Select</label> 
    <div class="row">
    <div class="col">
      <select id="select_category" name="fk_blog_cateogory_id" class="custom-select" aria-describedby="selectHelpBlock">
	@foreach($categories as $category)
			
			<option value="{{$category->blog_category_id}}">{{$category->blog_category_title}}</option>
	@endforeach
      </select> 
      <span id="selectHelpBlock" class="form-text text-muted">Topic covered in this article</span>
    </div><!-- Col -->
    <div class="col">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-category">Add category</button>
    </div>
    </div><!-- End row -->
  </div> <!-- End form group-->

  <div class="form-group">
    <button name="submit" type="submit" class="btn btn-primary">Create</button>
  </div>
</form>

<div class="modal fade" id="add-category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new article category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form id="form_category" >
        @csrf
      <div class="modal-body">
            <div id="response_message" class="alert " role="alert"></div>
          <div class="form-group">
            <label for="category-title" class="col-form-label">Category title:</label>
            <input type="text" name="blog_category_title" class="form-control" >
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add category</button>
      </div>
        </form>
    </div>
  </div>
</div>
@endsection


@section("js")
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
$(document).ready(function() {

    $('#success_message').show();
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

$('#form_category').submit(function (event){
    event.preventDefault();
    var $form = $(this);

    // Let's select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");
    
    // Serialize the data in the form
    var serializedData = $form.serialize();

    var request = $.ajax({
        url : "{{ route('blog.add_category') }}",
        type : "post",
        data : serializedData
        });

        // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console

        var cat_title = response.category.blog_category_title;
        var cat_id = response.category.blog_category_id;

        $('#select_category').append($('<option >', {
            text: cat_title,
            value: cat_id
        }));

        setTimeout(function() {
            $('#add-category').modal('toggle');
            $('#response_message').removeClass('alert-success');
            $('#response_message').hide();
        }, 1000);

        var message = $('#response_message');
        message.show();
        message.addClass('alert-success');
        message.text('Category added successfully');

    });

        // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        var message = $('#response_message');
        message.show();
        message.addClass('alert-danger');
        message.text('This category already exists');
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // Reenable the inputs
        $inputs.prop("disabled", false);
    });
});
});

</script>
@endsection
