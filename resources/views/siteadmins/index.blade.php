@extends('layouts.app')
@section('title', 'Site Admin')
@section('content')


    <div class="container-xxl flex-grow-1 container-p-y">
        <div >
            <div class="bg-white border rounded-3 shadow-sm p-4">

                <table class="table table-hover table-bordered">
                    <thead class="thead-dark">
                        <tr>

                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Actions</th>

                            <!-- <th>Assign New Role</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $u)
                        <tr>

                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td ><button class="btn {{ $u->status == 1 ? 'btn-success' : 'btn-danger' }}">{{ $u->status == 1 ? 'Active' : 'Inactive' }}</button></td>


                            <td>
                                <a href="{{ route('siteadmins.edit', $u->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('siteadmins.destroy', $u->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{route('siteadmins.create')}}" class="btn btn-primary mt-3 custombtn">Create</a>
            </div>
        </div>
    </div>
    @endsection

    @section('pageheadfiles')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    @endsection

    @section('pagebodyfiles')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    @endsection
