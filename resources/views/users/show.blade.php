@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">User Details</div>
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" value="{{ $user->name }}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" value="{{ $user->email }}" class="form-control" readonly>
            </div>
            <!-- Add other user details as needed -->
        </div>
    </div>
</div>
@endsection
