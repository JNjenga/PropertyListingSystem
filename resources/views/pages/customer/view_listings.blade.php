@extends('layouts.client_layout')

@section('content')
<!-- Page Content -->
<div class="container">

   <!-- Page Heading -->
   <h2 class="my-4">Featured Properties</h2>
   @forelse($properties as $property)
   <!-- Property One -->
   <div class="row">
      <div class="col-md-7">
         <a href="{{ route('listings.show', $property->property_id) }}">
            @if($property->images->count())
            <img class="img-fluid rounded mb-3 mb-md-0" src="{{ asset('storage/'.$property->images[0]->image_path) }}" alt="">
            @else
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
            @endif
         </a>
      </div>
      <div class="col-md-5">
         
         <h5>{{ $property->type }}&ensp;<span class="badge badge-info">Ksh {{ $property->price}}.00</span></h5>
         <h3 class="text-capitalize">{{ $property->title }}</h3>
         <h5 class="county"><small>{{ $property->county->county_title }}</small></h5>
         <h4 class="location"><i class="fas fa-map-marker-alt"></i>&ensp;<small>{{ $property->location }}</small></h4>
         <p>{!! \Illuminate\Support\Str::limit($property->description, $limit = 150, $end = '...') !!}</p>
         <a class="btn btn-primary" href="{{ route('listings.show_client', $property->property_id) }}">View Property</a>
      </div>
   </div>
   <!-- /.row -->

   <hr>
   @empty

   <div class="container ml-20">
      <h4 class="text-muted"><i>There are no listings at the moment<i></h4>
         </div>
         @endforelse

         <div class="container text-center">
            {{ $properties->links() }}
         </div>

      </div>
      <!-- /.container -->
   </div>
   @endsection
