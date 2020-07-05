@extends('layouts.client_layout')

@section('content')
<header>
    <div class="jumbotron bg-cover text-center mast">
        <h1 class="display-4">PLS</h1>
        <p class="lead">Discover a place
            you'll love to live</p>
        <form class="form-inline justify-content-center">

            <div class="form-group mx-sm-3 mb-2">
                <div class="input-group">
                    <label for="inputPassword2" class="sr-only">Property search</label>
                    <input type="text" class="form-control" id="inputPassword2" placeholder="e.g Nairobi rentals">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary "><i class="fa fa-search" aria-hidden="true"></i> </button>
                    </div>

                </div>

            </div>
        </form>
    </div>
</header>

<!-- Page Content -->
<div class="container">
<!-- Property Two -->
<section class="mb-10">
<div class="row">
  <div class="col-md-7">
    <a href="#">
      <img class="img-fluid  mb-md-0" width="700" height="400" src="https://placeimg.com/700/400/suit" alt="">
    </a>
  </div>
  <div class="col-md-5">
    <h3>We are here for you !</h3>
    <p>Real estate transactions are still able to be conducted in many markets with new safety measures put into place. Regardless of location, our agents are ready to support you however they can. </p>
  </div>
</div>
</section>

<!-- /.row -->
@isset($prop1)
<section class="mt-10 pt-10">
    <!-- Page Heading -->
    <div class="text-center">
    <h3 class="my-4  fontweight-bolder">Featured Listings</h3>
    </div>


    <div class="row">

        <div class="col-lg-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="{{ route('listings.show', $prop1->property_id) }}">{{ $prop1->title }} - {{ $prop1->county->county_title }}</a>
                    </h4>
                    <p class="card-text"><em>Ksh. {{ $prop1->price }}</em></p>

                    <span class="badge badge-info">Selling</span>
                </div>
            </div>
        </div>
@if(count($prop2) != 0)
        <div class="col-lg-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="{{ route('listings.show', $prop2->property_id) }}">{{ $prop2->title }} - {{ $prop2->county->county_title }}</a>
                    </h4>
                    <p class="card-text"><em>{{ $prop2->price }}</em></p>

                    <span class="badge badge-info">Rental</span>
                </div>
            </div>
        </div>
    </div>
@endif
    <!-- /.row -->
</section>
@endisset
<!-- /.row -->
<section class="mt-10 pt-10">
    <!-- Page Heading -->
    <div class="text-center">
    <h3 class="my-4  fontweight-bold">
      PLS News
    </h3>
    </div>

  <!-- Property Two -->
<div class="row mb-3">
  <div class="col-md-5">
    <h3>{{ $article1->blog_post_title}}</h3>
    <p>{!! \Illuminate\Support\Str::limit($article1->blog_post_body, $limit = 150, $end = '...') !!}</p>
    <a class="btn btn-primary" href="{{ route('blog.show_client', $article1->blog_post_id) }}">View Article</a>
  </div>
</div>

</section>

</div>
<!-- /.container -->
@endsection
