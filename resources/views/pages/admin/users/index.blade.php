@extends('layouts.admin_layout')

@section('content')
<div class="container">
    <table class="table table-sm table-dark">
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
        <tbody>
            @foreach ($users as $user) 
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
@endsection
