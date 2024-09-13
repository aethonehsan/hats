@extends('app.layouts.app')

@section('content')
<div class="container">
    <h1>Edit Run Category</h1>

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
    <form action="{{ route('runcategories.update', $runcategory->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Use PUT method for updating the user -->

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="userName" name="name" value="{{ old('name', $runcategory->name) }}" />
                    </div>

                    <div class="mb-3">
                        <label for="detail" class="form-label">detail</label>
                        <input type="text" class="form-control" id="userName" name="detail" value="{{ old('detail', $runcategory->detail) }}" />
                    </div>

                    <div class="mb-3">
                        <label for="additional_details" class="form-label">additional-details</label>
                        <input type="text" class="form-control" id="userName" name="additional_details" value="{{ old('additional_details', $runcategory->additional_details) }}"/>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">price</label>
                        <input type="text" class="form-control" id="userName" name="price"value="{{ old('price', $runcategory->price) }}" />
                    </div>



        <!-- Add more fields as needed -->

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
