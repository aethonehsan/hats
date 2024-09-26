@extends('layouts.app')
@section('title', 'SuperAdmin')
@section('content')
<div class="container">
    <h1>Edit</h1>

    <!-- Check for any validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Edit form -->
    <form action="{{ route('superadmins.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Use PUT method for updating the user -->

        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="email" name="password" value="{{ old('email', $user->email) }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="password">status</label>
            <select name="status">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>

        </div>

        <!-- Add more fields as needed -->

        <button type="submit" class="btn btn-primary custombtn">Update</button>
    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
@endsection
