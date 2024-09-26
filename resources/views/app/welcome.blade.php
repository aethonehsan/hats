@extends('app.layouts.guest')

@section('content')

<section id="hero-animation" class="min-height-100 position-relative py-5">
    <!-- Background overlay for aesthetics -->


    <!-- Main Hero Section -->
    <div id="landingHero" class="d-flex flex-column align-items-center justify-content-center section-py landing-hero position-relative text-light">
        <!-- Logo with border radius and shadow -->
        <img src="logo.png" width="250px" alt="hero background" class="mb-5 animate-fade-in"  />

        <div class="container text-center" >
            <!-- Super Admin Section -->
            <div class="hero-text-box bg-dark rounded shadow-lg p-5 position-relative mb-5 animate-fade-in " style="background:linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(0,31,69,1) 23%, rgba(0,132,111,1) 100%)">
                <h1 class="text-success display-4 fw-bold mb-3 text-white"> Welcome to {{ $tenant->name }} Branch</h1>
                <p class="text-light mb-4 text-white">Access the management dashboard to oversee all your business operations.</p>
                <a href="/login" class="btn btn-success btn-lg shadow" style="background-color:#008470;">Login</a>
            </div>

            <!-- Sites Section -->

        </div>
    </div>
</section>

@endsection

