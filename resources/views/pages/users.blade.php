@extends('layouts.masters')

@section('content')
<div class="row d-flex justify-content-center my-3">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header d-flex justify-content-end">
                <a href="{{ url('user/create') }}" class="btn btn-primary">Add New</a>
            </div>
            <div class="card-body">
                @if (session()->get('success'))
                    <p class="alert alert-success">{{ session()->get('success') }}</p>
                @endif
                <div
                class="table-responsive"
                >
                <table
                class="table table-hover"
                >
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="">
                        <td scope="row">{{ $user->id }}</td>
                        <td scope="row">{{ $user->name }}</td>
                        <td>{{$user->email}}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>

                        <td>
                            <a href="{{ url("/user/$user->id/show") }}" class="btn btn-info">Show</a>
                            <a href="{{ url("/user/$user->id/edit") }}" class="btn btn-primary">Edit</a>

                            <a href="#" class="btn btn-danger"
                            onclick="
                                document.getElementById('deleteForm-{{ $user->id }}').submit();
                            "
                            >
                                Delete
                            </a>

                            <form class="d-none" id="deleteForm-{{ $user->id }}" action="{{ url("user/$user->id/delete") }}" method="post">
                                @csrf
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
</div>

@endsection