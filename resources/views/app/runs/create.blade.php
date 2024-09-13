@extends('app.layouts.app')

@section('content')
<div class="py-12">
    <div class="container">
        <div class="bg-white border rounded-3 shadow-sm">
            <div class="p-4">
                <form method="POST" action="{{ route('runs.store') }}">
                    @csrf
                    <!-- User Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="userName" name="name" placeholder="Enter name" />
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">category</label>
                        <select name="category">
                            @foreach ($runcategories as $runcategory)
                            <option value="{{$runcategory->name}}"> {{$runcategory->name}} </option>
                            @endforeach
                        </select>

                    </div>

                    <div class="mb-3">
                        <label for="destination" class="form-label">destination</label>
                        <input type="text" class="form-control" id="userName" name="destination" placeholder="Enter name" />
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">price</label>
                        <input type="text" class="form-control" id="userName" name="price" placeholder="Enter name" />
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">status</label>
                        <input type="text" class="form-control" id="userName" name="status" placeholder="Enter name" />
                    </div>


                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Add Run</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
