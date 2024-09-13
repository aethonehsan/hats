@extends('app.layouts.app')

@section('content')
<main class=" bg-light mt-4">

@role('Admin')
                <div >


                            <div class="row">
                                <div class="col-md-4 ">
                                    <div class="card text-white bg-primary mb-3 p-3">
                                        <div class="card-body">
                                            <h5 class="card-title  mb-2">Run</h5>
                                            <p class="card-text mb-3">Manage your user accounts, roles, and permissions.</p>
                                            <a href="{{route('runs.index')}}" class="btn btn-light">Manage Runs</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card text-white bg-success mb-3 p-3">
                                        <div class="card-body">
                                            <h5 class="card-title ">Run Categories</h5>
                                            <p class="card-text mb-3">Define and assign roles within your application.</p>
                                            <a href="{{route('runcategories.index')}}" class="btn btn-light">Manage Categories</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card text-white bg-danger mb-3 p-3">
                                        <div class="card-body">
                                            <h5 class="card-title  mb-2">Drivers</h5>
                                            <p class="card-text mb-3">Control access to different parts of your application.</p>
                                            <a href="{{route('drivers.index')}}" class="btn btn-light">Manage Drivers</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card text-white bg-dark mb-3 p-3">
                                        <div class="card-body">
                                            <h5 class="card-title  mb-2">Bids</h5>
                                            <p class="card-text mb-3">Manage your user accounts, roles, and permissions.</p>
                                            <a href="{{route('bids.index')}}" class="btn btn-light">Manage Bids</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card text-white bg-info mb-3 p-3">
                                        <div class="card-body">
                                            <h5 class="card-title ">Notifications</h5>
                                            <p class="card-text mb-3">Define and assign roles within your application.</p>
                                            <a href="{{route('notifications.index')}}" class="btn btn-light">Manage Notifications</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card text-white bg-warning mb-3 p-3">
                                        <div class="card-body">
                                            <h5 class="card-title  mb-2">Invoices</h5>
                                            <p class="card-text mb-3">Control access to different parts of your application.</p>
                                            <a href="{{route('invoices.index')}}" class="btn btn-light">Manage Invoices</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                @endrole
                @role('Driver')
                <div >


                            <div class="row">
                                <div class="col-md-4 ">
                                    <div class="card text-white bg-primary mb-3 p-3">
                                        <div class="card-body">
                                            <h5 class="card-title  mb-2">Bids</h5>
                                            <p class="card-text mb-3">Manage your user accounts, roles, and permissions.</p>
                                            <a href="{{route('bids.index')}}" class="btn btn-light">Manage Runs</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card text-white bg-success mb-3 p-3">
                                        <div class="card-body">
                                            <h5 class="card-title ">Invoices </h5>
                                            <p class="card-text mb-3">Define and assign roles within your application.</p>
                                            <a href="{{route('invoices.index')}}" class="btn btn-light">Manage Categories</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card text-white bg-danger mb-3 p-3">
                                        <div class="card-body">
                                            <h5 class="card-title  mb-2">Notifications</h5>
                                            <p class="card-text mb-3">Control access to different parts of your application.</p>
                                            <a href="{{route('notifications.index')}}" class="btn btn-light">Manage Drivers</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            </div>
                        </div>
                    </div>

                </div>
                @endrole

            </main>
            @endsection
