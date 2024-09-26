@extends('app.layouts.app')

@section('content')
<div class="py-12">
    <div class="container">
        <div class="bg-white border rounded-3 shadow-sm">
            <div class="p-4">
                <form method="POST" action="{{ route('baselocations.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="userName" name="name" placeholder="Enter name" />
                    </div>

                    <div class="mb-3">
                        <label for="detail" class="form-label">detail</label>
                        <input type="text" class="form-control" id="userName" name="detail" placeholder="Enter name" />
                    </div>

                    <div class="mb-3">
                        <label for="additional_details" class="form-label">additional-_details</label>
                        <input type="text" class="form-control" id="userName" name="additional_details" placeholder="Optional" />
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">price</label>
                        <input type="text" class="form-control" id="userName" name="price" placeholder="Enter Price" />
                    </div>

                    <button type="submit" class="btn btn-primary">Add Base Location</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
