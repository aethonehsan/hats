<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="/dashboard" class="app-brand-link">
              <span class="">
                <img src="{{asset('logo.png')}}" width="80px" height="100%">
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                    fill="#7367F0" />
                  <path
                    opacity="0.06"
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                    fill="#161616" />
                  <path
                    opacity="0.06"
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                    fill="#161616" />
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                    fill="#7367F0" />
                </i>
              </span>

            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
              <i class="ti menu-toggle-icon d-none d-xl-block align-middle"></i>
              <i class="ti ti-x d-block d-xl-none ti-md align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow " style="background:linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(0,31,69,1) 23%, rgba(0,132,111,1) 100%)"></div>

          <ul id="ulmenu" class="menu-inner py-1" style="background:linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(0,31,69,1) 23%, rgba(0,132,111,1) 100%)">
            <!-- Page -->
            <li class="menu-item text-white">
              <a href="{{ route('dashboard') }}" class="menu-link " style="color:white">
                <i class="menu-icon tf-icons ti ti-smart-home "></i>
                <div>Home</div>
              </a>
            </li>
            <li class="menu-item ">
              <a href="{{ route('superadmins.index') }}" class="menu-link " style="color:white">
                <i class="menu-icon tf-icons ti-crown ti"></i>
                <div>Super Admins</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="{{ route('siteadmins.index') }}" class="menu-link " style="color:white">
                <i class="menu-icon tf-icons ti ti-user " style="color:white"></i>
                <div>Site Admins</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{ route('sites.index') }}" class="menu-link " style="color:white">
                <i class="menu-icon tf-icons ti-layout"></i>
                <div>Sites</div>
              </a>
            </li>

          </ul>

          <script>
document.addEventListener('DOMContentLoaded', function() {
    const menuItems = document.querySelectorAll('#ulmenu li a');
    const icons = document.querySelectorAll('#ulmenu li a i'); // Use querySelectorAll for icons

    let path = window.location.pathname;
    path = 'http://localhost' + path;  // Adjust path for localhost

    console.log(path);

    // Active state for menu items (links)
    menuItems.forEach(item => {
        console.log(item.getAttribute("href"));
        if (item.getAttribute("href") === path) {
            console.log('Menu item matched');
            item.style.backgroundColor = "#ffffff"; // Change background color
            item.style.color = "#00846F"; // Change text color
        }
    });

    // Active state for icons
    icons.forEach(icon => {
        const parentLink = icon.closest('a');  // Find the closest <a> tag
        if (parentLink && parentLink.getAttribute("href") === path) {

            icon.style.color = "#00846F";  // Change icon color
        }
    });
});


          </script>
        </aside>
