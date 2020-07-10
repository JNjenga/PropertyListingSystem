@extends('layouts.agents_layout')


@section('stylesheets')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

@section('content')

<h3>Edit Post : <em>"{{ $post->blog_post_title }}"</em></h3>
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
<form method="POST" action="{{ route('blog.update', $post->blog_post_id) }}">
@method('PATCH')
@csrf
  <div class="form-group">
    <label for="text">Post title</label> 
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fa fa-address-card"></i>
        </div>
      </div> 
      <input id="text" name="blog_post_title" placeholder="Title of the article" type="text" aria-describedby="textHelpBlock" class="form-control" value="{{ $post->blog_post_title }}">
    </div> 
    <span id="textHelpBlock" class="form-text text-muted">E.g What home is best for you?</span>
  </div>
  <div class="form-group">
    <label for="textarea">Body</label> 
    <textarea id="summernote" name="blog_post_body" cols="40" rows="15" class="form-control" aria-describedby="textareaHelpBlock">
{!! $post->blog_post_body !!} 
</textarea> 
    <span id="textareaHelpBlock" class="form-text text-muted">Article content</span>
  </div>
  <div class="form-group">
    <label for="select">Select</label> 
    <div>
      <select id="select" name="fk_blog_cateogory_id" class="custom-select" aria-describedby="selectHelpBlock">
	@foreach($categories as $category)
		@if($category->blog_category_id === $post->blog_category->blog_category_id)
			
		<option value="{{ $post->blog_category->blog_category_id }}" selected="selected">
			{{$category->blog_category_title}}
		</option>
		@else
			<option value="{{$category->blog_category_id}}">{{$category->blog_category_title}}</option>
		@endif
	@endforeach
      </select> 
      <span id="selectHelpBlock" class="form-text text-muted">Topic covered in this article</span>
    </div>
  </div> 
  <div class="form-group">
    <button name="submit" type="submit" class="btn btn-info">Save</button>
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
