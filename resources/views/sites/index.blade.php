@extends('layouts.app')
@section('content')

    <div >
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="bg-white border rounded-3 shadow-sm">
            <div class="p-4">
                <h2 class="mb-4">Sites Information</h2>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Site Admin</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sites as $t)
                        <tr>
                            <td>{{ $t->name }}</td>
                            <td>{{ $t->location }}</td>
                            <td>{{ $t->siteadmin->name ?? 'No Site Admin' }}</td>

                            <td ><button class="btn {{ $t->status == 1 ? 'btn-success' : 'btn-danger' }}">{{ $t->status == 1 ? 'Active' : 'Inactive' }}</button></td>

                    <!-- <td>
                    <a href="http://{{ $t->domain_name }}.{{ config('app.domain') }}">
                    {{ $t->domain_name }}.{{ config('app.domain') }}</a>
                </td> -->


                            <td>
                                    <a href="{{ route('sites.edit', $t->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{route('sites.destroy', $t->id)}}" method="POST" style="display:inline-block;">
                                        @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <a href="{{ route('sites.create') }}" class="btn btn-primary">Create Sites</a>
            </div>
        </div>
    </div>
</div>
@endsection


