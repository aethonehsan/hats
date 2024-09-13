@extends('app.layouts.app')

@section('content')


<div class="py-12">
    <div class="container">
        <div class="bg-white border rounded-3 shadow-sm">
            <div class="p-6">
                <form method="POST" action="{{ route('permissions.store') }}">
                    @csrf
                    <!-- User Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="userName" name="name" placeholder="Enter name" />
                    </div>


                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Add Permission</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
