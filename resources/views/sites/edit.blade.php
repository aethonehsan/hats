@extends('layouts.app')
@section('content')
<div >
    <h1>Edit Tenant</h1>

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
    <form action="{{ route('sites.update', $site->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Use PUT method for updating the user -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Tanent Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $site->name) }}" />
                    </div>
                    <div class="mb-3">
                        <label for="domain_name" class="form-label">Domain Name</label>
                        <input type="text" class="form-control" id="domain_name" name="domain_name" value="{{ old('domain_name', $site->domain_name) }}" />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $site->email) }}" />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control" id="password" name="password"  />
                    </div>
                    <div class="form-group mb-3">
            <label for="password">status</label>
            <select name="status">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>

        </div>


        <!-- Add more fields as needed -->

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
