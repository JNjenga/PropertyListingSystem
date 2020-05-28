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
<section class="mt-10 pt-10">
    <!-- Page Heading -->
    <div class="text-center">
    <h3 class="my-4  fontweight-bolder">Featured Listings</h3>
    </div>


    <div class="row">

        <div class="col-lg-6 mb-4">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="https://placeimg.com/700/400/house" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#">3 bdrm Mansion - Karen</a>
                    </h4>
                    <p class="card-text"><em>Ksh. 25, 000, 000</em></p>

                    <span class="badge badge-info">Selling</span>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="https://placeimg.com/700/400/appartment" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#">Spacious Bedsitter - Mwihoko</a>
                    </h4>
                    <p class="card-text"><em>Ksh. 3000 per Month</em></p>

                    <span class="badge badge-info">Rental</span>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</section>
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
  <div class="col-md-7">
    <a href="#">
      <img class="img-fluid rounded mb-3 mb-md-0" src="https://placeimg.com/700/400/book" alt="">
    </a>
  </div>
  <div class="col-md-5">
    <h3>Article title</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, odit velit cumque vero doloremque repellendus distinctio maiores rem expedita a nam vitae modi quidem similique ducimus! Velit, esse totam tempore.</p>
    <a class="btn btn-primary" href="#">Read More</a>
  </div>
</div>

</section>

</div>
<!-- /.container -->
@endsection
