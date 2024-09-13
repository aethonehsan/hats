@extends('app.layouts.main')
@section('content')
<div class="full-height text-center " style="height: 100vh; /* Full viewport height */
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #343a40; /* Dark background */
            color: #fff; /* Light text color */">
        <div>


            <h1 style="font-size:50px">Welcome to {{ $tenant->name }} Branch</h1>
            <p class="my-3">Please click on button to login</p>
            <a href="/login" class="btn btn-light">Login</a>

        </div>
    </div>
@endsection
