@extends('layouts.agents_layout')

@section('stylesheets')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">My Listings</h1>
<div class="mb-4 mt-2">
   <a class="btn btn-primary" href="{{ route('listings.create') }}" role="button">Create Listing</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
   <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Property Listings</h6>
   </div>
   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Type</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th colspan="2">Actions</th>
               </tr>
            </thead>
            <tfoot>
               <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Type</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th colspan="2">Actions</th>
               </tr>
            </tfoot>
            <tbody>

            @foreach($properties as $property)
            <tr>
               <td>{{ $loop->iteration }}</td>
               <td>{{ $property->title }}</td>
               <td>{{ $property->type }}</td>
               <td>{{ $property->price }}</td>
               <td>@if($property->status) Sold @else Not Sold @endif </td>
               <td>
                  <a type="button" class="btn btn-info btn-sm" href="{{ route('listings.edit', $property->property_id) }}">Edit</a>
               </td>
               <td>
                  <form action="{{ route('listings.destroy', $property->property_id)}}" method="post">

                     @method('DELETE')
                     @csrf
                     <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
                  <td>
                  </tr>
                  @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>

      @endsection


      @section("js")

      <!-- Page level plugins -->
      <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

      <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
      <!-- Page level custom scripts -->
      <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
      @endsection
