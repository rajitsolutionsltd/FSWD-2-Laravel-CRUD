@extends('layouts.masters')

@section('content')

<div class="row d-flex justify-content-center my-3">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>Create a New User</h4>
            </div>
            <div class="card-body">
                <form action="{{ url('user/store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control"  value="{{ old('name') }}">

                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email') }}">

                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control">

                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Father Name</label>
                        <input type="text" name="father_name" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Add New</button>
                    <a href="{{ url('users') }}" class="btn btn-warning">Back To User List</a>
                    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection