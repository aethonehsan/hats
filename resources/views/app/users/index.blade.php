@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Site Admins</h1>
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
                            <th>Email</th>
                            <th>Actions</th>
                            <!-- <th>Current Roles</th>    -->
                            <!-- <th>Assign New Role</th> -->
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $u)
                        <tr>

                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>
                                <a href="{{ route('users.edit', $u->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('users.destroy', $u->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                            <!-- <td style="color:green;">
                                @php
                                    $rol = $u->getRoleNames();
                                @endphp
                                {{ implode(', ', $rol->toArray()) }}
                            </td> -->
                            <!-- <td>
                                <form method="POST" action="{{route('assignrole', $u->id)}}" style="display:inline-block;">
                                    @csrf
                                    <div class="input-group">
                                        <select name="rolename" class="form-control" style="appearance: none; -webkit-appearance: none; -moz-appearance: none; padding-right: 30px;">
                                            @foreach($roles as $r)
                                            <option value="{{$r->name}}">{{$r->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append m-2">
                                            <button type="submit" class="btn btn-sm btn-danger">Assign</button>
                                        </div>
                                    </div>
                                </form>
                            </td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{route('users.create')}}" class="btn btn-primary mt-3">Create</a>
            </div>
        </div>
    </div>


@endsection
