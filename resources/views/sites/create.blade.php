@extends('layouts.app')
@section('content')


<div class="py-12 p-4">
    <div class="">
        <div class="bg-white border rounded-3 shadow-sm">
            <div class="p-4">
                <form method="POST" action="{{route('sites.store')}}">
                    @csrf
                    <!-- User Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" />
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" id="domain_name" name="location" placeholder="Enter name" />
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

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Add Site</button>
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
