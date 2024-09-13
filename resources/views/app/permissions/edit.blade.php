@extends('app.layouts.app')

@section('content')

<div class="container">
    <h1>Edit Permission</h1>

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
    <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Use PUT method for updating the user -->

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $permission->name) }}" required>
        </div>


        <!-- Add more fields as needed -->

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
