@extends('layouts.admin_layout')

@section('stylesheets')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
 <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Agents</h6>
        </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

      <table id="datatableid" class="table table-bordered table-dark">
        <tr>
                             <th scope="col"> ID</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Numbers</th>
                            <th scope="col">Delete</th>

        </tr>
         @if(count($agents) > 0)
        @foreach($agents->all() as $agent)
        <tr>
            <td>{{ $agent['agent_id'] }}</td>
              <td>{{ $agent['merchant_surname'] }}</td>
               <td>{{ $agent['email'] }}</td>
                 <td>{{ $agent['phonenumber'] }}</td>
            <td>

                <form action="{{ route('agents.destroy',$agent->agent_id) }}" method="POST">   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
         @endif
    </table>
  
    
    
                   <div class="pull-right">
                <a class="btn btn-success" href="/admin/agents/create"> Add agent</a>
            </div>
                                </div>


@endsection
