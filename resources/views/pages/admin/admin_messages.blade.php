@extends('layouts.admin_layout')

@section('stylesheets')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Listings</h1>
<div class="mb-4 mt-2">
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @forelse($messages as $message)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                {{ \Illuminate\Support\Str::limit($message->message, $limit = 50, $end = '...') }}
                                </td>
                            <td>@if($message->read) Read @else Not read @endif </td>
			    <td>
					<a type="button" class="btn btn-info btn-sm" href="{{ route('messages.read', $message->id) }}">Mark as read</a>
			    </td>
			    <td>
                <form action="{{ route('messages.destroy', $message->id) }}" method="post">

                  @method('DELETE')
                  @csrf
					<button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
			    <td>
			</tr>
                        @empty
                        @endforelse
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
