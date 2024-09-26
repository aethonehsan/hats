@extends('layouts.app')
@section('title', 'Site')
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
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $site->name) }}" />
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $site->location) }}" />
                    </div>
                    <div class="form-group mb-3">
            <label for="siteadmin">Choose Site Admin</label>
            <select name="siteadmin">
                @foreach ($siteadmins as $siteadmin)
                <option value="{{$siteadmin->id}}">{{$siteadmin->name}}</option>
                @endforeach
            </select>

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
