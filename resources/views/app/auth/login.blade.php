
@extends('layouts.guest')
@section('pageheadfiles')

<style>
  /* Placeholder styling */
  ::placeholder {
    color: white !important; /* Placeholder color */
    opacity: 1; /* Ensures color is fully visible */
  }

  /* For Edge 12-18 */
  ::-ms-input-placeholder {
    color: white !important;
  }

  /* Input text styling */
  input {
    color: #ffffff90 !important; /* Input text color */
  }
  input :focus{
    border-color: #ffffff90 !important; /* Input text color */
    font-weight: 200;
  }
</style>

<!-- Icons -->
<link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome.css" />
<link rel="stylesheet" href="../../assets/vendor/fonts/tabler-icons.css" />
<link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />

<!-- Core CSS -->
<link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
<link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
<link rel="stylesheet" href="../../assets/css/demo.css" />

<!-- Vendors CSS -->
<link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />

<!-- Vendor -->
<link rel="stylesheet" href="../../assets/vendor/libs/@form-validation/form-validation.css" />

<!-- Page CSS -->
<link rel="stylesheet" href="../../assets/vendor/css/pages/page-auth.css" />

<!-- Helpers -->
<script src="../../assets/vendor/js/helpers.js"></script>
<script src="../../assets/vendor/js/template-customizer.js"></script>
<script src="../../assets/js/config.js"></script>
@endsection





<!-- Content -->
@section('content')


    <div class="authentication-wrapper authentication-cover " >
      <!-- Logo -->

      <!-- /Logo -->
      <div class="authentication-inner row m-0">
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-8 p-0">
          <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
          <img
              src="logo.png"
              alt="auth-login-cover"
              class="my-5 auth-illustration"
              width="40%"

            />



          </div>
        </div>
        <!-- /Left Text -->

        <!-- Login -->
        <div class="text-white d-flex col-12 col-lg-4 align-items-center authentication-bg p-sm-12 p-6" style="background:linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(0,31,69,1) 23%, rgba(0,132,111,1) 100%)">
          <div class="w-px-400 mx-auto ">
            <h2 class="mb-1 text-white">Sign in</h2>
            <p class="mb-6 text-white">Please sign-in </p>

            <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-6">
              <label for="email" class="form-label text-white">Email</label>
              <input type="email" class="form-control" id="email" name="email" required autofocus autocomplete="username">
              <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-6 form-password-toggle">
              <label class="form-label text-white" for="password ">Password</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control " name="password">
                <span class="input-group-text cursor-pointer text-white"><i class="ti ti-eye-off"></i></span>
              </div>
              <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="my-8">
              <div class="d-flex justify-content-between">
                <div class="form-check mb-0 ms-2">
                  <input class="form-check-input text-white" type="checkbox" id="remember_me" name="remember">
                  <label class="form-check-label text-white" for="remember_me">Remember Me</label>
                </div>

              </div>
            </div>

            <!-- Submit Button -->
            <div class="mb-6">
              <button class="btn  d-grid w-100" type="submit" style="background-color:white; color:#00836F;">Log in</button>
            </div>
          </form>

          </div>
        </div>
        <!-- /Login -->
      </div>
    </div>
@endsection

@section('pagebodyfiles')

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="../../assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/@form-validation/popular.js"></script>
    <script src="../../assets/vendor/libs/@form-validation/bootstrap5.js"></script>
    <script src="../../assets/vendor/libs/@form-validation/auto-focus.js"></script>

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../assets/js/pages-auth.js"></script>
@endsection



