<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="SUPPORT - Customer Support Management System">
    <meta name="Author" content="SUPPORT Team">
    <meta name="keywords" content="support, customer, help, tickets, assistance">
    
    <!-- TITLE -->
    <title>@yield('title', 'SUPPORT Dashboard') - SUPPORT System</title>

    <!-- FAVICON -->
    <link rel="icon" href="{{asset('build/assets/images/brand-logos/favicon.ico')}}" type="image/x-icon">

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{asset('build/assets/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- ICONS CSS -->
    <link href="{{asset('build/assets/icon-fonts/icons.css')}}" rel="stylesheet">
    
    <!-- APP SCSS -->
    @vite(['resources/sass/app.scss'])

    @include('layouts.components.styles')

    <!-- MAIN JS -->
    <script src="{{asset('build/assets/main.js')}}"></script>

    @yield('styles')

</head>

<body>
    <!-- SWITCHER -->
    @include('layouts.components.switcher')
    <!-- END SWITCHER -->

    <!-- LOADER -->
    <div id="loader">
        <img src="{{asset('build/assets/images/media/loader.svg')}}" alt="">
    </div>
    <!-- END LOADER -->

    <!-- PAGE -->
    <div class="page">
        <!-- HEADER -->
        @include('layouts.components.header')
        <!-- END HEADER -->

        <!-- SUPPORT SIDEBAR -->
        <aside class="app-sidebar sticky" id="sidebar">
            <!-- Start::main-sidebar-header -->
            <div class="main-sidebar-header">
                <a href="{{url('index')}}" class="header-logo">
                    @php
                        use App\Models\User;
                        $user = Auth::user();
                        $admin = null;
                        
                        // Get admin info based on user type
                        if ($user && $user->isAdmin()) {
                            $admin = $user;
                        } elseif ($user && $user->isSupervisor()) {
                            $admin = User::find($user->admin_id);
                        } elseif ($user && $user->role_id == 3) { // Regular user
                            $admin = User::find($user->admin_id);
                        }
                    @endphp
                    
                    @if($admin && $admin->company_print_logo)
                        <img src="{{ asset('storage/' . $admin->company_print_logo) }}" alt="Company Logo" class="desktop-logo" style="max-height: 40px; object-fit: contain;">
                        <img src="{{ asset('storage/' . $admin->company_print_logo) }}" alt="Company Logo" class="toggle-logo" style="max-height: 40px; object-fit: contain;">
                        <img src="{{ asset('storage/' . $admin->company_print_logo) }}" alt="Company Logo" class="desktop-dark" style="max-height: 40px; object-fit: contain;">
                        <img src="{{ asset('storage/' . $admin->company_print_logo) }}" alt="Company Logo" class="toggle-dark" style="max-height: 40px; object-fit: contain;">
                        <img src="{{ asset('storage/' . $admin->company_print_logo) }}" alt="Company Logo" class="desktop-white" style="max-height: 40px; object-fit: contain;">
                        <img src="{{ asset('storage/' . $admin->company_print_logo) }}" alt="Company Logo" class="toggle-white" style="max-height: 40px; object-fit: contain;">
                    @else
                        <img src="{{asset('build/assets/images/brand-logos/desktop-logo.png')}}" alt="logo" class="desktop-logo">
                        <img src="{{asset('build/assets/images/brand-logos/toggle-logo.png')}}" alt="logo" class="toggle-logo">
                        <img src="{{asset('build/assets/images/brand-logos/desktop-dark.png')}}" alt="logo" class="desktop-dark">
                        <img src="{{asset('build/assets/images/brand-logos/toggle-dark.png')}}" alt="logo" class="toggle-dark">
                        <img src="{{asset('build/assets/images/brand-logos/desktop-white.png')}}" alt="logo" class="desktop-white">
                        <img src="{{asset('build/assets/images/brand-logos/toggle-white.png')}}" alt="logo" class="toggle-white">
                    @endif
                </a>
            </div>
            <!-- End::main-sidebar-header -->

            <!-- Start::main-sidebar -->
            <div class="main-sidebar" id="sidebar-scroll">
                <!-- Start::nav -->
                <nav class="main-menu-container nav nav-pills flex-column sub-open">
                    <div class="slide-left" id="slide-left">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path> </svg>
                    </div>
                    <ul class="main-menu">
                        <!-- Start::slide__category -->
                        <li class="slide__category"><span class="category-name">SUPPORT System</span></li>
                        <!-- End::slide__category -->

                        <!-- Back to Dashboard Link -->
                        <li class="slide">
                            <a href="{{ route(\App\Helpers\DashboardHelper::getDashboardRoute()) }}" class="side-menu__item">
                                <i class="bx bx-arrow-back side-menu__icon"></i>
                                <span class="side-menu__label">Back to Dashboard</span>
                            </a>
                        </li>

                        <!-- SUPPORT Dashboard -->
                        <li class="slide">
                            <a href="{{ route('support.dashboard') }}" class="side-menu__item {{ request()->routeIs('support.dashboard') ? 'active' : '' }}">
                                <i class="bx bx-home side-menu__icon"></i>
                                <span class="side-menu__label">SUPPORT Dashboard</span>
                            </a>
                        </li>

                        <!-- SUPPORT module doesn't need user management permissions -->
                        <!-- All users with access can use all features -->

                        <!-- SUPPORT Modules -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-support side-menu__icon"></i>
                                <span class="side-menu__label">Support Options</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0);">Support Options</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ route('support.user') }}" class="side-menu__item {{ request()->routeIs('support.user') ? 'active' : '' }}">
                                        <i class="bx bx-user me-2"></i>
                                        User Support
                                    </a>
                                </li>
                                <li class="slide">
                                    <a href="{{ route('support.dealer') }}" class="side-menu__item {{ request()->routeIs('support.dealer') ? 'active' : '' }}">
                                        <i class="bx bx-store me-2"></i>
                                        Dealer Support
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path> </svg></div>
                </nav>
                <!-- End::nav -->
            </div>
            <!-- End::main-sidebar -->
        </aside>
        <!-- END SUPPORT SIDEBAR -->

        <!-- MAIN-CONTENT -->
        <div class="main-content app-content">
            @yield('content')
        </div> 
        <!-- END MAIN-CONTENT -->
        
        <!-- PERMISSION WIDGET -->
        @include('layouts.components.permission-widget')
        <!-- END PERMISSION WIDGET -->

        <!-- SEARCH-MODAL -->
        @include('layouts.components.search-modal')
        <!-- END SEARCH-MODAL -->

        <!-- FOOTER -->
        @include('layouts.components.footer')
        <!-- END FOOTER -->
    </div>
    <!-- END PAGE-->

    <!-- SCRIPTS -->
    @include('layouts.components.scripts')
    @yield('scripts')
    <!-- STICKY JS -->
    <script src="{{asset('build/assets/sticky.js')}}"></script>
    
    <!-- Permission Error Modal -->
    <div class="modal fade" id="permissionErrorModal" tabindex="-1" aria-labelledby="permissionErrorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="permissionErrorModalLabel">
                        <i class="bx bx-shield-x me-2"></i>Permission Required
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <i class="bx bx-shield-x text-danger" style="font-size: 3rem;"></i>
                        <h4 class="mt-3 text-danger">Access Denied</h4>
                        <p class="text-muted">You do not have permission to <span id="permissionAction"></span>.</p>
                        <p class="text-muted">Please contact your administrator to request access.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <script>
    function showPermissionError(action) {
        // Show the professional modal
        try {
            if (document.getElementById('permissionAction')) {
                document.getElementById('permissionAction').textContent = action;
            }
            if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                var modal = new bootstrap.Modal(document.getElementById('permissionErrorModal'));
                modal.show();
            }
        } catch (error) {
            console.log('Bootstrap modal error:', error);
        }
    }
    </script>
</body>
</html>
