@extends('layouts.masters')

@section('content')

<div class="row d-flex justify-content-center my-3">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h4>User Details for *<span class="text-info">{{ $user->name }}</span></h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    
                    <tr>
                        <th>Created At</th>
                        <td>{{ date( 'd-F-Y H:i:s a', strtotime($user->created_at)) }}</td>
                    </tr>

                    <tr>
                        <th>Updated At</th>
                        <td>{{ $user->updated_at }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection