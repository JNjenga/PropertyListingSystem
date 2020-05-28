@extends('layouts.client_layout')

@section('content')
<!-- Page Content -->
<div class="container">

<!-- Page Heading -->
<h1 class="my-4">Articles
</h1>
@foreach($posts as $post)
<!-- Article One -->
<div class="row">
  <div class="col-md-7">
    <a href="#">
      <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
    </a>
  </div>
  <div class="col-md-5">
    <h3>{{ $post->blog_post_title }}</h3>
    <p>{{{ \Illuminate\Support\Str::limit($post->blog_post_body, $limit = 150, $end = '...') }}}</p>
    <a class="btn btn-primary" href="#">View Article</a>
  </div>
</div>
<!-- /.row -->

<hr>

@endforeach

<hr>

<!-- Pagination -->
{{ $posts->links() }}


</div>
<!-- /.container -->
</div>
@endsection
