@extends('layouts.client_layout')

@section('content')
<!-- Page Content -->
<div class="container">

<!-- Page Heading -->
<h1 class="my-4">Articles
</h1>

<!-- Article One -->
<div class="row">
  <div class="col-md-7">
    <a href="#">
      <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
    </a>
  </div>
  <div class="col-md-5">
    <h3>Article One</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
    <a class="btn btn-primary" href="#">View Article</a>
  </div>
</div>
<!-- /.row -->

<hr>

<!-- Article Two -->
<div class="row">
  <div class="col-md-7">
    <a href="#">
      <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
    </a>
  </div>
  <div class="col-md-5">
    <h3>Article Two</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, odit velit cumque vero doloremque repellendus distinctio maiores rem expedita a nam vitae modi quidem similique ducimus! Velit, esse totam tempore.</p>
    <a class="btn btn-primary" href="#">View Article</a>
  </div>
</div>
<!-- /.row -->

<hr>

<!-- Article Three -->
<div class="row">
  <div class="col-md-7">
    <a href="#">
      <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
    </a>
  </div>
  <div class="col-md-5">
    <h3>Article Three</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, temporibus, dolores, at, praesentium ut unde repudiandae voluptatum sit ab debitis suscipit fugiat natus velit excepturi amet commodi deleniti alias possimus!</p>
    <a class="btn btn-primary" href="#">View Article</a>
  </div>
</div>
<!-- /.row -->

<hr>

<!-- Article Four -->
<div class="row">

  <div class="col-md-7">
    <a href="#">
      <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
    </a>
  </div>
  <div class="col-md-5">
    <h3>Article Four</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, quidem, consectetur, officia rem officiis illum aliquam perspiciatis aspernatur quod modi hic nemo qui soluta aut eius fugit quam in suscipit?</p>
    <a class="btn btn-primary" href="#">View Article</a>
  </div>
</div>
<!-- /.row -->

<hr>

<!-- Pagination -->
<ul class="pagination justify-content-center">
  <li class="page-item">
    <a class="page-link" href="#" aria-label="Previous">
      <span aria-hidden="true">&laquo;</span>
      <span class="sr-only">Previous</span>
    </a>
  </li>
  <li class="page-item">
    <a class="page-link" href="#">1</a>
  </li>
  <li class="page-item">
    <a class="page-link" href="#">2</a>
  </li>
  <li class="page-item">
    <a class="page-link" href="#">3</a>
  </li>
  <li class="page-item">
    <a class="page-link" href="#" aria-label="Next">
      <span aria-hidden="true">&raquo;</span>
      <span class="sr-only">Next</span>
    </a>
  </li>
</ul>

</div>
<!-- /.container -->
</div>
@endsection
