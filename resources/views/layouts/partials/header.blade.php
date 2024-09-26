<nav  class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"  style="background:linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(0,31,69,1) 23%, rgba(0,132,111,1) 100%)"
id="layout-navbar">

            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="ti ti-menu-2 ti-md"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center " id="navbar-collapse">


              <ul class="navbar-nav flex-row align-items-center ms-auto">


                <!-- Style Switcher -->
                <li class="nav-item dropdown-style-switcher dropdown">
                  <a
                    class="nav-link btn btn-text-secondary btn-icon rounded-pill dropdown-toggle hide-arrow"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown">
                    <i class="ti ti-md"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                    <li>
                      <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                        <span class="align-middle"><i class="ti ti-sun ti-md me-3"></i>Light</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                        <span class="align-middle"><i class="ti ti-moon-stars ti-md me-3"></i>Dark</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                        <span class="align-middle"
                          ><i class="ti ti-device-desktop-analytics ti-md me-3"></i>System</span
                        >
                      </a>
                    </li>
                  </ul>
                </li>
                <!-- / Style Switcher-->



                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown " >
                  <a
                    class="nav-link dropdown-toggle hide-arrow p-0"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="{{asset('../profile.png')}}" alt class="rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end text-white"   style="background:linear-gradient(270deg, rgba(2,0,36,1) 0%,  rgba(0,132,111,1) 100%)">
                    <li>
                      <a class=" mt-0" >
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0 me-2 my-5">
                            <div class="avatar avatar-online">
                              <img src="profile.png" alt class="rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1 text-white">
                            <h6 class="mb-0 text-white" style="color:white;">{{Auth::user()->name}}</h6>
                            <small class="text-muted text-white" style="color:white !important;">Super Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider my-1 mx-n2"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="/profile">
                        <i class="ti ti-user me-3 ti-md text-white"></i><span class="align-middle text-white">My Profile</span>
                      </a>
                    </li>


                    <li>
                      <div class="d-grid px-2 pt-2 pb-1">
                        <a class="btn btn-sm  d-flex" style="background-color:white; color:#00806D;" href="{{ url('/logout') }}" target="_blank">
                          <small class="align-middle">Logout</small>
                          <i class="ti ti-logout ms-2 ti-14px"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>

            <!-- Search Small Screens -->
            <div class="navbar-search-wrapper search-input-wrapper d-none">
              <input
                type="text"
                class="form-control search-input container-xxl border-0"
                placeholder="Search..."
                aria-label="Search..." />
              <i class="ti ti-x search-toggler cursor-pointer"></i>
            </div>
</nav>
