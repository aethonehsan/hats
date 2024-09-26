@extends('app.layouts.app')

@section('content')


<div class="py-12">
    <div class="container">
        <div class="bg-white border rounded-3 shadow-sm">
            <div class="p-4">
                <form method="POST" action="{{ route('drivers.store') }}">
                    @csrf
                    <!-- User Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="userName" name="name" placeholder="Enter name" />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="text" class="form-control" id="userName" name="email" placeholder="Enter name" />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label" >Password</label>
                        <input type="text" class="form-control" id="userName" name="password" placeholder="Enter name" />
                    </div>

                    <div class="mb-3">
                        <label for="phone_no" class="form-label">Phone No</label>
                        <input type="text" class="form-control" id="userName" name="phone_no" placeholder="Enter name" />
                    </div>
                    <div class="mb-3">
                        <label for="lisence_no" class="form-label">Lisence No</label>
                        <input type="text" class="form-control" id="userName" name="lisence_no" placeholder="Enter name" />
                    </div>
                    <div class="mb-3">
                        <label for="vehicle_type" class="form-label">Vehicle Type</label>
                        <input type="text" class="form-control" id="userName" name="vehicle_type" placeholder="Enter name" />
                    </div>
                    <div class="mb-3">
                        <label for="run_category" class="form-label">Run Category</label>
                        <select name="run_category">
                            @foreach ($departments as $department)
                            <option value="{{$department->name}}"> {{$department->name}} </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Add Driver</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
