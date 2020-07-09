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
@isset($prop1->property_id)
<section class="mt-10 pt-10">
    <!-- Page Heading -->
    <div class="text-center" id="featured">
    <h3 class="my-4  fontweight-bolder">Featured Listings</h3>
    </div>


    <div class="row">

        <div class="col-lg-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                @if($prop1->images->count())
            <img class="img-fluid rounded mb-3 mb-md-0" src="{{ asset('storage/'.$prop1->images[0]->image_path) }}" alt="">
            @else
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
            @endif
            <h5  class="status text-capitalize">{{ $prop1->type }}&ensp;<span class="badge badge-info">Ksh {{ $prop1->price}}.00</span></h5>
            <h3 class="text-capitalize">{{ $prop1->title }}</h3>
            <h5 class="county"><small>{{ $prop1->county->county_title }}</small></h5>
            <h4 class="location"><i class="fas fa-map-marker-alt"></i>&ensp;<small>{{ $prop1->location }}</small></h4>
            <p>{!! \Illuminate\Support\Str::limit($prop1->description, $limit = 150, $end = '...') !!}</p>
            <div class="button">
            <a class="btn btn-primary" href="{{ route('listings.show_client', $prop1->property_id) }}">View Property</a>        
            </div>        
             </div>
            </div>
        </div>
@isset($prop2->property_id)
        <div class="col-lg-6 mb-4">
            <d  iv class="card h-100">
                <div class="card-body">
                @if($prop2->images->count())
            <img class="img-fluid rounded mb-3 mb-md-0" src="{{ asset('storage/'.$prop2->images[0]->image_path) }}" alt="">
            @else
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
            @endif
            <h5  class="status text-capitalize">{{ $prop2->type }}&ensp;<span class="badge badge-info">Ksh {{ $prop2->price}}.00</span></h5>
            <h3 class="text-capitalize">{{ $prop2->title }}</h3>
            <h5 class="county"><small>{{ $prop2->county->county_title }}</small></h5>
            <h4 class="location"><i class="fas fa-map-marker-alt"></i>&ensp;<small>{{ $prop2->location }}</small></h4>
            <p>{!! \Illuminate\Support\Str::limit($prop2->description, $limit = 150, $end = '...') !!}</p>
            <div class="button">
            <a class="btn btn-primary" href="{{ route('listings.show_client', $prop2->property_id) }}">View Property</a>        
            </div>        
             </div>
            </div>
        </div>

    </div>
@endisset
    <!-- /.row -->      
</section>
<div class="button" id="viewmore">
            <a class="btn btn-primary" href="/listings">View More</a>        
  </div>  
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
