@extends('layouts.client_layout')

@section('stylesheets')

<link href="{{ asset('css/lightbox.min.css') }}" rel="stylesheet">

@endsection

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
            @if($property->images->count())
            <div class="row text-center text-lg-left">
               @foreach($property->images as $image)
               <div class="col-lg-4 col-md-4 col-6 mb-4">
                  <a  class="d-block h-100" href="{{ asset('storage/'.$image->image_path) }}"  data-lightbox="image-1" data-title="{{ $property->title }}">
                     <img class="img-fluid " src="{{ asset('storage/'.$image->image_path) }}" alt="">
                  </a>
               </div>
               @endforeach

            </div>
            @endif

            <div class="container mx-auto mb-3">
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#messageform" data-whatever="@mdo">Send
                  Message</button>
            </div>

         </div>
         <!-- /.col-lg-9 -->

      </div>
   </div>
   <!-- /.container -->
</section>

<div class="modal fade" id="messageform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Send messagege</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="{{ route('message.store_client') }}" method="POST">
               @csrf
               <div class="form-group">
                  <input type="hidden" name="property_id" value={{ $property->property_id }}>
               </div>
               <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Your email:</label>
                  <input type="email" name="customer_email" class="form-control" id="recipient-name" required>
               </div>
               <div class="form-group">
                  <label for="message-text" class="col-form-label">Message:</label>
                  <textarea class="form-control" name="message" id="message-text"></textarea>
               </div>

               <div class="form-group">
                  <button type="submit" class="btn btn-primary">Send message</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/lightbox-plus-jquery.min.js') }}"></script>
@endsection
