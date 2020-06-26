@extends('layouts.client_layout')

@section('content')

<section>
 <!-- Page Content -->
  <div class="container">
    <div class="row">

 

      <div class="col-lg-9 mx-auto">
    <div class="">
            <h3 class="ml-3 mt-5 text-capitalize">{{ $property->title }}</h3>
            </div>
        <div class="card mt-4 mb-4 border-0">
  <div id="carouselExampleInterval" class="carousel slide " data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-interval="10000">
      <img src="{{ asset('storage/'.$property->images[0]->image_path) }}" class="d-block w-100 img-fluid" alt="...">
    </div>
    <div class="carousel-item" data-interval="2000">
      <img src="{{ asset('storage/'.$property->images[1]->image_path) }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('storage/'.$property->images[2]->image_path) }}" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>        
          <div class="card-body">
            <div class="card-text">
            <p>Price : <span class="badge badge-info">Ksh. {{ $property->price }}.00</span></p>
            <p>County : <span class="badge badge-light">{{ $property->county->county_title}}</span></p>
            <p>Location : <span class="badge badge-light">{{ $property->location}}</span></p>
            <p>Type : <span class="badge badge-light">{{ $property->type}}</span></p>
            </div>
            <hr>
            <p class="card-text">{!! $property->description !!}</p>
          </div>
        </div>
        <!-- /.card -->
<div class="container mx-auto mb-3">
    <a class="btn btn-primary" href="#" role="button">Request More Information</a>
    </div>

      </div>
      <!-- /.col-lg-9 -->

    </div>
     </div>
  <!-- /.container -->
  </section>
@endsection
