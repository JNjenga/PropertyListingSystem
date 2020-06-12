@extends('layouts.admin_layout')

@section('content')
<body>
    <div class="tcard">
        <div>
        <h1>Overview</h3>
        </div>
        <div class="card-body">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Properties</h5>
                    <p class="card-text">View and edit properties.</p>
                    <a href="/admin/view_properties" class="btn btn-primary stretched-link">Go</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Agents</h5>
                    <p class="card-text">View and edit Agent information.</p>
                    <a href="/admin/view_agents" class="btn btn-primary stretched-link">Go</a>
                </div>
            </div>
            
        </div>
    </div>
</body>
@endsection
