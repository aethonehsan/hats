@extends('layouts.app')
@section('title', 'Home')
@section('content')


  <!-- Content wrapper -->
  <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row g-6">

                <!-- Average Daily Sales -->
                <div class="col-xl-6 col-sm-6">
                  <div class="card h-100">
                    <div class="card-header pb-0">
                      <h5 class="mb-3 card-title">Total Sites</h5>
                      <p class="mb-0 text-body"></p>
                      <h4 class="mb-0">{{$totalsites}}</h4>
                    </div>
                    <div class="card-body px-0">
                      <div id="averageDailySales"></div>
                    </div>
                  </div>
                </div>

                <!--/ Average Daily Sales -->


            <!-- Average Daily Sales -->
                <div class="col-xl-6 col-sm-6">
                  <div class="card h-100">
                    <div class="card-header pb-0">
                      <h5 class="mb-3 card-title">Total Site Admins</h5>
                      <p class="mb-0 text-body"></p>
                      <h4 class="mb-0">{{$totalsiteadmins}}</h4>
                    </div>
                    <div class="card-body px-0">
                      <div id="averageDailySales"></div>
                    </div>
                  </div>
                </div>
                <!--/ Average Daily Sales -->








              </div>
            </div>
            <!-- / Content -->


            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->


@endsection



