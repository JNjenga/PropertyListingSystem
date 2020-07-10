@extends('layouts.agents_layout')

@section('stylesheets')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

@section('content')

<h3>Create a new listing</h3>
<hr>
<form method="POST" action="{{ route('listing.store') }}" enctype="multipart/form-data">
   @csrf
   @method("POST")
   <div class="form-group">
      <label for="text">Title</label> 
      <div class="input-group">
         <div class="input-group-prepend">
            <div class="input-group-text">
               <i class="fa fa-address-card"></i>
            </div>
         </div> 
         <input id="title" name="title" placeholder="Title of the property" type="text" aria-describedby="textHelpBlock" class="form-control">
      </div> 
      <span id="textHelpBlock" class="form-text text-muted font-italic">E.g 3 acre plot in Karen</span>
   </div>
   <div class="form-group">
      <label for="description">Description</label> 
      <textarea id="summernote" name="description" cols="40" rows="5" aria-describedby="textareaHelpBlock" class="form-control"></textarea> 
      <span id="textareaHelpBlock" class="form-text text-muted font-italic">Breif description of the listing (150 words)</span>
   </div>
   <br>
   <div class="form-group">
      <label>Type of property</label>
      <select class="custom-select" name="type">
         <option selected value="">Open this select menu</option>
         <option value="Rental">Rental</option>
         <option value="For Sale">For Sale</option>
         <option value="Plots and Land">Plots and Land</option>
         <option value="">Other</option>
      </select>
      <span id="textareaHelpBlock" class="form-text text-muted font-italic">Select the type of the listing</span>
   </div>
   <div>
      <div class="form-group">
         <label>Property images</label>
         <div class="custom-file">
            <input multiple type="file" name="images[]" class="custom-file-input" id="exampleInputFile">
            <label class="custom-file-label" for="exampleInputFile" data-browse="upload images"><i class="fas fa-image"></i>
               Choose images</label>
            <span id="textareaHelpBlock" class="form-text text-muted font-italic">Images of the lisiting : You can select multiple images at
               once</span>
         </div>
      </div>

      <div class="form-group">
         <label for="select">Select category</label> 
         <div class="row">
            <div class="col">
               <select id="select_category" name="fk_property_category_id" class="custom-select" aria-describedby="selectHelpBlock">
                  @foreach($categories as $category)

                  <option value="{{$category->property_category_id}}">{{$category->property_category_title}}</option>

                  @endforeach
               </select> 
               <span id="selectHelpBlock" class="form-text text-muted font-italic">The listing category e.g Mansions</span>
            </div><!-- Col -->
            <div class="col">
               <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-category">Add category</button>
            </div>
         </div><!-- End row -->
      </div> <!-- End form group-->


      <div class="form-group">
         <div class="form-row">
            <div class="col">

               <label for="select">Number of bedrooms</label> 
               <input type="text" name="bedrooms" class="form-control" placeholder="Bedrooms">
            </div>
            <div class="col">
               <label for="select">Number of bathrooms</label> 
               <input type="text" name="bathrooms" class="form-control" placeholder="Bathrooms">
            </div>
         </div>
      </div>
      <div class="form-group">
         <div class="form-row">
            <div class="col">
               <label for="select">County </label> 
               <select id="select" name="fk_county_id" class="custom-select" aria-describedby="selectHelpBlock">
                  <option selected value="">Select county</option>
                  @foreach($counties as $county )

                  <option value="{{$county->county_id}}">{{$county->county_title}}</option>
                  @endforeach
               </select> 
               <span id="text1HelpBlock" class="form-text text-muted font-italic">Select from the list </span>
            </div>
            <div class="col">
               <label for="text1">Location</label> 
               <div class="input-group">
                  <div class="input-group-prepend">
                     <div class="input-group-text">
                        <i class="fa fa-map-marker"></i>
                     </div>
                  </div> 
                  <input id="text1" name="location" placeholder="Physical Address of property" type="text" aria-describedby="text1HelpBlock" class="form-control">
               </div> 
               <span id="text1HelpBlock" class="form-text text-muted font-italic">E.g Kibera </span>
            </div>

         </div>
      </div>

      <div class="form-group">
         <label for="text1">Price</label> 
         <div class="input-group">
            <div class="input-group-prepend">
               <div class="input-group-text">
                  <i class="fa fa-money"></i>
               </div>
            </div> 
            <input id="text1" name="price" placeholder="Price" type="text" aria-describedby="text1HelpBlock" class="form-control">
         </div> 
      </div> 

      <div class="form-group">
         <button name="submit" type="submit" class="btn btn-primary">Create</button>
      </div>
   </form>


   <div class="modal fade" id="add-category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Add new listing category</h5>
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
                     <input type="text" name="property_category_title" class="form-control" >
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
url : "{{ route('listings.add_category') }}",
type : "post",
data : serializedData
});

         // Callback handler that will be called on success
         request.done(function (response, textStatus, jqXHR){
            // Log a message to the console

            var cat_title = response.category.property_category_title;
            var cat_id = response.category.property_category_id;

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
