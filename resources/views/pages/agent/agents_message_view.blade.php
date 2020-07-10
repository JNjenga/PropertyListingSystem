@extends('layouts.agents_layout')

@section('stylesheets')
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="container">
         <h1 class="h3 mb-2 text-gray-800"><i class="fa fa-envelop">From : <em>{{ $message->customer_email }}</em></h1>
         <div class="mt-2 mb-5">
         <textarea class="form-control" readonly>{{ $message->message }}</textarea>
         </div>
         <div class="row">
             <div class="col">
                <a href="{{ route('messages.read', $message->id) }}" class="btn btn-primary " role="button" >Mark as read</a>
             </div >

             <div class="col">
                <a href="#" class="btn btn-primary " role="button" aria-pressed="true">Delete</a>
             </div >

        </div>
    </div>

@endsection


@section("js")
@endsection
