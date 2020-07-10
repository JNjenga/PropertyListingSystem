@extends('layouts.admin_layout')

@section('stylesheets')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Properties</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $properties->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
   <div class="card-header py-3">
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

</div>
<!-- /.container-fluid -->

@endsection


@section("js")

@endsection
