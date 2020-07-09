@extends('layouts.admin_layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
<h1>Edit user {{$user->name}}</h1>
<form action="{{ route('users.update', $user) }}" method="POST">
    @csrf
    {{method_field('PUT')}}
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Roles</label>
        <div class="col-md-6">
            @foreach ($roles as $role)
            <div class="form-check">
            <input type="checkbox" name="roles[]" value="{{$role->id}}"
            @if ($user->roles->pluck('id')->contains($role->id))
                checked
            @endif >
            <label>{{ $role->role_name }}</label>
            </div>
        @endforeach
        </div>
    </div>
    <button type="submit" class="btn btn-primary">
        Update
    </button>
</form>
</div>
            </div>
        </div>
    </div>
</div>
@endsection
