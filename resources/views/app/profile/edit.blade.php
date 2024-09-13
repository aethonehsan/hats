@extends('app.layouts.app')
@section('content')


        <div class=" container-xxl flex-grow-1 container-p-y ">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div >
                    @include('app.profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg my-4">
                <div >
                    @include('app.profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div >
                    @include('app.profile.partials.delete-user-form')
                </div>
            </div>
        </div>

    @endsection
