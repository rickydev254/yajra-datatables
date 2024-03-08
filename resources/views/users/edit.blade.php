@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Edit User</div>
            <div class="card-body">
            <div class="container">
        <form method="POST" action="{{ route('user.update', $user->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control">
            </div>

            <div class="form-group mt-3">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control">
            </div>

            <div class="mt-3"> <!-- Add margin-top to create space -->
                <button type="submit" class="btn btn-primary px-4 py-2">Update</button>
            </div>
        </form>
    </div>
    </div>
        </div>
    </div>

@endsection