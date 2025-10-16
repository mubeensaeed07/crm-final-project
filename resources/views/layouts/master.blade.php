<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

    <head>

        <!-- META DATA -->
		<meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="Description" content="Laravel Bootstrap Responsive Admin Web Dashboard Template">
        <meta name="Author" content="Spruko Technologies Private Limited">
        <meta name="keywords" content="dashboard bootstrap, laravel template, admin panel in laravel, php admin panel, admin panel for laravel, admin template bootstrap 5, laravel admin panel, admin dashboard template, hrm dashboard, vite laravel, admin dashboard, ecommerce admin dashboard, dashboard laravel, analytics dashboard, template dashboard, admin panel template, bootstrap admin panel template">
        
        <!-- TITLE -->
		<title> YNEX - Laravel Bootstrap 5 Premium Admin & Dashboard Template </title>

        <!-- FAVICON -->
        <link rel="icon" href="{{asset('build/assets/images/brand-logos/favicon.ico')}}" type="image/x-icon">

        <!-- BOOTSTRAP CSS -->
	    <link  id="style" href="{{asset('build/assets/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

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

            <!-- SIDEBAR -->
            @if(request()->is('hrm*'))
                @include('layouts.components.hrm-sidebar')
            @else
                @include('layouts.components.sidebar')
            @endif
            <!-- END SIDEBAR -->

            <!-- MAIN-CONTENT -->

            <div class="main-content app-content">

                @yield('content')

            </div> 
            <!-- END MAIN-CONTENT -->
            
            <!-- PERMISSION WIDGET -->
            @include('layouts.components.permission-widget')
            
            <!-- GLOBAL PERMISSION ERROR MODAL -->
            <div class="modal fade" id="globalPermissionErrorModal" tabindex="-1" aria-labelledby="globalPermissionErrorModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title" id="globalPermissionErrorModalLabel">
                                <i class="bx bx-shield-x me-2"></i>Permission Required
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <i class="bx bx-shield-x text-danger" style="font-size: 3rem;"></i>
                                <h4 class="mt-3 text-danger">Access Denied</h4>
                                <p class="text-muted">You do not have permission to <span id="globalPermissionAction"></span>.</p>
                                <p class="text-muted">Please contact your administrator to request access.</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

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

        <!-- APP JS -->
		@vite('resources/js/app.js')


        <!-- CUSTOM-SWITCHER JS -->
        @vite('resources/assets/js/custom-switcher.js')

        <!-- SECURITY: Prevent back button access after logout -->
        <script>
            // Prevent back button access to protected pages
            if (window.location.pathname !== '/login' && window.location.pathname !== '/register') {
                // Clear browser history
                window.history.replaceState(null, null, window.location.href);
                
                // Prevent back button
                window.onpopstate = function(event) {
                    window.history.pushState(null, null, window.location.href);
                    // Force reload to ensure fresh authentication check
                    window.location.reload();
                };
                
                // Additional protection
                window.addEventListener('beforeunload', function() {
                    window.history.replaceState(null, null, window.location.href);
                });
            }
        </script>
        
        <!-- Global permission error function -->
        <script>
            function showPermissionError(action) {
                document.getElementById('globalPermissionAction').textContent = action;
                var modal = new bootstrap.Modal(document.getElementById('globalPermissionErrorModal'));
                modal.show();
            }
        </script>
        
        <!-- END SCRIPTS -->

	</body>
</html>
