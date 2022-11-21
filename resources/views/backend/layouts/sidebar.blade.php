 <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
     <div class="sidebar-inner px-4 pt-3">
         <div
             class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
             <div class="d-flex align-items-center">
                 <div class="avatar-lg me-4">
                     <img src="#" class="card-img-top rounded-circle border-white"
                         alt="Bonnie Green">
                 </div>
                 <div class="d-block">
                     <h2 class="h5 mb-3">{{ Auth::user()->name }}</h2>
                     <a href="#"
                         class="btn btn-secondary btn-sm d-inline-flex align-items-center">
                         <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                             </path>
                         </svg>
                         Sign Out
                     </a>
                 </div>
             </div>
             <div class="collapse-close d-md-none">
                 <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
                     aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation">
                     <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                         <path fill-rule="evenodd"
                             d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                             clip-rule="evenodd"></path>
                     </svg>
                 </a>
             </div>
         </div>
         <ul class="nav flex-column pt-3 pt-md-0">
             <li class="nav-item">
                 <a href="{{ url('/admin') }}" class="nav-link d-flex align-items-center">
                     <span class="sidebar-icon">
                         <img src="{{ asset('backend/img/brand/light.svg') }}" height="20" width="20"
                             alt="Volt Logo">
                     </span>
                     <span class="mt-1 ms-1 sidebar-text">Inventory</span>
                 </a>
             </li>
             <li class="nav-item ">
                 <a href="{{ url('/') }}" class="nav-link" target="new">
                     <span class="sidebar-icon">
                         <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                             <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                             <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                         </svg>
                     </span>
                     <span class="sidebar-text">Frontend</span>
                 </a>
             </li>




             <li
                 class="nav-item {{ request()->is('admin/supplier') || request()->is('admin/supplier/*') ? 'active' : '' }} ">
                 <a href="{{ route('supplier.index') }}" class="nav-link">
                     <span class="sidebar-icon">
                         <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                             <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                             <path fill-rule="evenodd"
                                 d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                                 clip-rule="evenodd"></path>
                         </svg>
                     </span>
                     <span class="sidebar-text">Suppliers</span>
                 </a>
             </li>
             <li
                 class="nav-item {{ request()->is('admin/customer') || request()->is('admin/customer/*') ? 'active' : '' }} ">
                 <a href="{{ route('customer.index') }}" class="nav-link">
                     <span class="sidebar-icon">
                         <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                             <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                             <path fill-rule="evenodd"
                                 d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                                 clip-rule="evenodd"></path>
                         </svg>
                     </span>
                     <span class="sidebar-text">Customers</span>
                 </a>
             </li>
             <li
                 class="nav-item {{ request()->is('admin/unit') || request()->is('admin/unit/*') ? 'active' : '' }} ">
                 <a href="{{ route('unit.index') }}" class="nav-link">
                     <span class="sidebar-icon">
                         <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                             <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                             <path fill-rule="evenodd"
                                 d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                                 clip-rule="evenodd"></path>
                         </svg>
                     </span>
                     <span class="sidebar-text">Units</span>
                 </a>
             </li>
             <li
                 class="nav-item {{ request()->is('admin/category') || request()->is('admin/category/*') ? 'active' : '' }} ">
                 <a href="{{ route('category.index') }}" class="nav-link">
                     <span class="sidebar-icon">
                         <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                             <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                             <path fill-rule="evenodd"
                                 d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                                 clip-rule="evenodd"></path>
                         </svg>
                     </span>
                     <span class="sidebar-text">Category</span>
                 </a>
             </li>
             <li
                 class="nav-item {{ request()->is('admin/product') || request()->is('admin/product/*') ? 'active' : '' }} ">
                 <a href="{{ route('product.index') }}" class="nav-link">
                     <span class="sidebar-icon">
                         <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                             <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                             <path fill-rule="evenodd"
                                 d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                                 clip-rule="evenodd"></path>
                         </svg>
                     </span>
                     <span class="sidebar-text">Products</span>
                 </a>
             </li>
             <li
                 class="nav-item {{ request()->is('admin/purchase') || request()->is('admin/purchase/*') ? 'active' : '' }} ">
                 <a href="{{ route('purchase.index') }}" class="nav-link">
                     <span class="sidebar-icon">
                         <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                             <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                             <path fill-rule="evenodd"
                                 d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                                 clip-rule="evenodd"></path>
                         </svg>
                     </span>
                     <span class="sidebar-text">Purchases</span>
                 </a>
             </li>


             <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
             <li
                 class="nav-item {{ request()->is('admin/setting') || request()->is('admin/setting/*') ? 'active' : '' }} ">
                 <a href="{{ route('setting.index') }}" class="nav-link">
                     <span class="sidebar-icon">
                         <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                             <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                             <path fill-rule="evenodd"
                                 d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                                 clip-rule="evenodd"></path>
                         </svg>
                     </span>
                     <span class="sidebar-text">Setings</span>
                 </a>
             </li>
             @if (Auth::user()->usertype == 'Admin')
                 <li
                     class="nav-item {{ request()->is('admin/user') || request()->is('admin/user/*') ? 'active' : '' }} ">
                     <a href="{{ route('user.index') }}" class="nav-link">
                         <span class="sidebar-icon">
                             <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                                 <path fill-rule="evenodd"
                                     d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                                     clip-rule="evenodd"></path>
                             </svg>
                         </span>
                         <span class="sidebar-text">Manage User</span>
                     </a>
                 </li>
             @endif
             <li
                 class="nav-item {{ request()->is('profile/user') || request()->is('profile/user/*') ? 'active' : '' }} ">
                 <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                     data-bs-toggle="collapse" data-bs-target="#submenu-app">
                     <span>
                         <span class="sidebar-icon">
                             <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd"
                                     d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z"
                                     clip-rule="evenodd"></path>
                             </svg>
                         </span>
                         <span class="sidebar-text">Manage Profiles</span>
                     </span>
                     <span class="link-arrow">
                         <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                             <path fill-rule="evenodd"
                                 d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                 clip-rule="evenodd"></path>
                         </svg>
                     </span>
                 </span>
                 <div class="multi-level collapse " role="list" id="submenu-app" aria-expanded="false">
                     <ul class="flex-column nav">
                         <li class="nav-item ">
                             <a class="nav-link" href="{{ route('profile.index') }}">
                                 <span class="sidebar-text">Your Profile</span>
                             </a>
                         </li>
                     </ul>
                 </div>
                 <div class="multi-level collapse " role="list" id="submenu-app" aria-expanded="false">
                     <ul class="flex-column nav">
                         <li class="nav-item ">
                             <a class="nav-link" href="{{ route('user.password_change') }}">
                                 <span class="sidebar-text">Change Password</span>
                             </a>
                         </li>
                     </ul>
                 </div>
             </li>

         </ul>
     </div>
 </nav>
