@extends('layouts.guest')
@section('title', 'HATS')
@section('content')

<section id="hero-animation" class="min-height-100 position-relative">
    <!-- Background overlay for aesthetics -->


    <!-- Main Hero Section -->
    <div id="landingHero" class="d-flex flex-column align-items-center justify-content-center section-py landing-hero position-relative text-light">
        <!-- Logo with border radius and shadow -->
        <img src="logo.png" width="250px" alt="hero background" class="mb-5 animate-fade-in"  />

        <div class="container text-center" >
            <!-- Super Admin Section -->
            <div class="hero-text-box bg-dark rounded shadow-lg p-5 position-relative mb-5 animate-fade-in " style="background:linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(0,31,69,1) 23%, rgba(0,132,111,1) 100%)">
                <h1 class="text-success display-4 fw-bold mb-3 text-white">Super Admin Login</h1>
                <p class="text-light mb-4 text-white">Access the management dashboard to oversee all your business operations.</p>
                <a href="/login" class="btn  btn-lg shadow" style="background-color:white; color:#008470">Login</a>
            </div>

            <!-- Sites Section -->
            <div class="hero-text-box bg-light text-dark rounded shadow-lg p-5 position-relative mt-5 animate-slide-up" style="background:linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(0,31,69,1) 23%, rgba(0,132,111,1) 100%)">
                <h2 class="text-primary display-6 fw-bold mb-4 text-white" style="color:white!important;">Site Logins</h2>
                <p class="text-secondary mb-4 text-white">Choose a site to login:</p>
                <div class="d-flex justify-content-center flex-wrap">
                    @foreach ($tenants as $t)
                        <a href="http://{{$t->name}}.{{env('APP_DOMAIN', 'localhost/login')}}/login" class="btn  m-2 shadow"  style="background-color:white; color:#008470">
                            {{$t->name}}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('pageheadfiles')
    <link rel="stylesheet" href="../../assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />
    <link rel="stylesheet" href="../../assets/vendor/css/pages/front-page.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/nouislider/nouislider.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/swiper/swiper.css" />

    <script src="../../assets/vendor/js/helpers.js"></script>
    <script src="../../assets/vendor/js/template-customizer.js"></script>
    <script src="../../assets/js/front-config.js"></script>
@endsection

@section('pagebodyfiles')
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="../../assets/vendor/libs/nouislider/nouislider.js"></script>
    <script src="../../assets/vendor/libs/swiper/swiper.js"></script>
    <script src="../../assets/js/front-page-landing.js"></script>
@endsection
