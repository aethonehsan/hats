@extends('app.layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Roles</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group me-2">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                                <i class="bi bi-calendar-fill"></i> This week
                            </button>
                        </div>
                    </div>
    <div class="py-12">
        <div >
            <div class="bg-white border rounded-3 shadow-sm p-4">
                <table class="table table-hover table-bordered">
                    <thead class="thead-dark">
                        <tr>

                            <th>Name</th>
                            <th>Actions</th>
                            <th>Current Permissions</th>
                            <th>Assign New Permission</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $r)
                        <tr>

                            <td>{{ $r->name }}</td>
                            <td>
                                <a href="{{ route('roles.edit', $r->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('roles.destroy', $r->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                            <td style="color:green;">
                                @php
                                    $per = $r->getPermissionNames();
                                @endphp
                                {{ implode(', ', $per->toArray()) }}
                            </td>
                            <td>
                                <form method="POST" action="{{route('assignpermission', $r->id)}}" >
                                    @csrf
                                    <div class="input-group">
                                        <select name="permissionname" class="form-control">
                                            @foreach($permissions as $p)
                                            <option value="{{$p->name}}">{{$p->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append m-2">
                                            <button type="submit" class="btn btn-sm btn-danger ">Assign</button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{route('roles.create')}}" class="btn btn-primary mt-3">Create Role</a>
            </div>
        </div>
    </div>
    @endsection
