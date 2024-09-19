@extends('layouts.main')
@section('content')

    <section id="hero-animation min-height-100">
        <div id="landingHero" class="section-py landing-hero position-relative">
          <img
            src="../../assets/img/front-pages/backgrounds/hero-bg.png"
            alt="hero background"
            class="position-absolute top-0 start-50 translate-middle-x object-fit-cover w-100 h-100"
            data-speed="1" />
          <div class="container">
            <div class="hero-text-box text-center position-relative">
              <h1 class="text-primary hero-title display-6 fw-extrabold">
                One dashboard to manage all your businesses
              </h1>
              <h2 class="hero-sub-title h6 my-3">
                Super Admin
                Login
              </h2>
              <div class="landing-hero-btn d-inline-block position-relative">
                    <a href="/login" class="btn btn-success btn-lg " >Login</a>
              </div>
            </div>
          <div class="container mt-5">
            <div class="hero-text-box text-center position-relative">
              <h1 class="text-primary hero-title display-6 fw-extrabold">
                Sites
              </h1>
              <h2 class="hero-sub-title h6 mb-6">
                Site Logins
              </h2>
              <div class="landing-hero-btn d-inline-block position-relative">

                @foreach ($tenants as $t)
                    <a href= "http://{{$t->name}}.{{env('APP_DOMAIN' ,'localhost')}}" class="btn btn-primary btn-lg m-2" >{{$t->name}}</a>
                @endforeach
              </div>
            </div>


          </div>
        </div>
        <div class="landing-hero-blank"></div>
      </section>
@endsection

@section('pageheadfiles')
<link rel="stylesheet" href="../../assets/vendor/fonts/tabler-icons.css" />

<!-- Core CSS -->

<link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
<link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />

<link rel="stylesheet" href="../../assets/css/demo.css" />

<link rel="stylesheet" href="../../assets/vendor/css/pages/front-page.css" />
<!-- Vendors CSS -->
<link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />

<link rel="stylesheet" href="../../assets/vendor/libs/nouislider/nouislider.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/swiper/swiper.css" />

<!-- Page CSS -->

<link rel="stylesheet" href="../../assets/vendor/css/pages/front-page-landing.css" />

<!-- Helpers -->
<script src="../../assets/vendor/js/helpers.js"></script>
<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

<!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
<script src="../../assets/vendor/js/template-customizer.js"></script>

<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="../../assets/js/front-config.js"></script>
@endsection


@section('pagebodyfiles')
<script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/nouislider/nouislider.js"></script>
    <script src="../../assets/vendor/libs/swiper/swiper.js"></script>

    <!-- Main JS -->


    <!-- Page JS -->
    <script src="../../assets/js/front-page-landing.js"></script>
@endsection

