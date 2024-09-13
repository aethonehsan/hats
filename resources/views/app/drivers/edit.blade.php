@extends('app.layouts.app')

@section('content')

<div class="container">
    <h1>Edit Driver Detail</h1>

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
    <form action="{{ route('drivers.update', $driver->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Use PUT method for updating the user -->

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
                            @foreach ($runcategories as $runcategory)
                            <option value="{{$runcategory->name}}"> {{$runcategory->name}} </option>
                            @endforeach
                        </select>
                    </div>


        <!-- Add more fields as needed -->

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
