@extends('app.layouts.app')

@section('content')
<div class="container">
    <h1>Edit Role</h1>

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
    <form action="{{ route('runs.update', $run->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Use PUT method for updating the user -->

        `           <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="userName" name="name" value="{{ old('name', $run->name) }}" />
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">category</label>
                        <select name="category">
                            @foreach ($runcategories as $r)
                            <option value="{{$r->name}}"> {{$r->name}} </option>
                            @endforeach
                        </select>

                    </div>

                    <div class="mb-3">
                        <label for="destination" class="form-label">destination</label>
                        <input type="text" class="form-control" id="userName" name="destination"value="{{ old('destination', $run->destination) }}" />
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">price</label>
                        <input type="text" class="form-control" id="userName" name="price" value="{{ old('price', $run->price) }}" />
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">status</label>
                        <input type="text" class="form-control" id="userName" name="status" value="{{ old('status', $run->status) }}" />
                    </div>



        <!-- Add more fields as needed -->

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
