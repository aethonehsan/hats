@extends('app.layouts.app')
@section('content')
<div class="container">
    <h1>Edit Run Category</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('baselocations.update', $baselocation->id) }}" method="POST">
        @csrf
        @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="userName" name="name" value="{{ old('name', $baselocation->name) }}" />
                    </div>

                    <div class="mb-3">
                        <label for="detail" class="form-label">detail</label>
                        <input type="text" class="form-control" id="userName" name="detail" value="{{ old('detail', $baselocation->detail) }}" />
                    </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
