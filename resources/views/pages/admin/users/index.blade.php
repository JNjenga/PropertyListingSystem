@extends('layouts.admin_layout')

@section('content')
<div class="card shadow mb-4">
   <div class="card-header py-3">
   </div>
   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
               <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Roles</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
               </tr>
            </thead>
            <tfoot>
               <tr>
               <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Roles</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
               </tr>
            </tfoot>
            <tbody>

            @foreach($users as $user)
            <tr>      
    <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{implode(',' , $user->roles()->get()->pluck('role_name')->toArray())}}</td>
            <td><a href="{{route('users.edit', $user->id)}}"><button class="btn btn-success">Edit</button></a></td>
           <td><form action="{{route('users.destroy', $user)}}" method="POST">
            @csrf
            {{method_field('DELETE')}}
            <button class="btn btn-danger">Delete</button>
           </form></td>
          </tr>
                  @endforeach
                  </tbody>
               </table>
            </div>
         </div>

@endsection
