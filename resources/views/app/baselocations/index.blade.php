@extends('app.layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Base Locations</h1>

                    </div>
    <div class="py-12">
        <div >
            <div class="bg-white border rounded-3 shadow-sm p-4">
                <table class="table table-hover table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($baselocations as $r)
                        <tr>
                            <td>{{ $r->name }}</td>
                            <td>{{ $r->address }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{route('baselocations.create')}}" class="btn btn-primary mt-3">Create Base Location</a>
            </div>
        </div>
    </div>
    @endsection
