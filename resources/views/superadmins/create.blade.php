@extends('layouts.app')
@section('title', 'Site')
@section('title', 'SuperAdmin')
@section('content')
<div class="py-12">
    <div class="container">
        <div class="bg-white border rounded-3 shadow-sm">
            <div class="p-6">
                <form method="POST" action="{{ route('superadmins.store') }}">
                    @csrf
                    <!-- User Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="userName" name="name" placeholder="Enter name" />
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="userEmail" name="email" placeholder="Enter email" />
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="userPassword" name="password" placeholder="Enter password" />
                    </div>
                    <div class="form-group mb-3">
            <label for="password">status</label>
            <select name="status">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>

        </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn custombtn btn-primary custombtn">Add User</button>
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
        </div>
    </div>
</div>
@endsection
