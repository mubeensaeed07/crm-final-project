
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
                            <li class="slide__category"><span class="category-name">Main</span></li>
                            <!-- End::slide__category -->

                            <!-- Start::Admin Dashboard -->
                            @auth
                            @if(Auth::user()->isSuperAdmin())
                            <li class="slide">
                                <a href="{{ route('superadmin.dashboard') }}" class="side-menu__item">
                                    <i class="bx bx-crown side-menu__icon"></i>
                                    <span class="side-menu__label">Super Admin</span>
                                </a>
                            </li>
                            @elseif(Auth::user()->isAdmin())
                            <!-- Dashboard -->
                            <li class="slide">
                                <a href="{{ route('admin.dashboard') }}" class="side-menu__item">
                                    <i class="bx bx-home side-menu__icon"></i>
                                    <span class="side-menu__label">Dashboard</span>
                                </a>
                            </li>
                            
                            <!-- User Management -->
                            <li class="slide">
                                <a href="{{ route('admin.users') }}" class="side-menu__item">
                                    <i class="bx bx-user side-menu__icon"></i>
                                    <span class="side-menu__label">User List</span>
                                </a>
                            </li>
                            
                            <!-- Supervisor Management -->
                            <li class="slide">
                                <a href="{{ route('admin.supervisors.index') }}" class="side-menu__item">
                                    <i class="bx bx-user-check side-menu__icon"></i>
                                    <span class="side-menu__label">Supervisor Management</span>
                                </a>
                            </li>
                            
                            <!-- Department Management -->
                            <li class="slide">
                                <a href="{{ route('admin.departments.index') }}" class="side-menu__item">
                                    <i class="bx bx-buildings side-menu__icon"></i>
                                    <span class="side-menu__label">Department Management</span>
                                </a>
                            </li>
                            
                            <!-- System Logs -->
                            <li class="slide">
                                <a href="{{ route('admin.logs') }}" class="side-menu__item">
                                    <i class="bx bx-file-blank side-menu__icon"></i>
                                    <span class="side-menu__label">System Logs</span>
                                </a>
                            </li>
                            
                            <!-- Logout -->
                            <li class="slide">
                                <a href="{{ route('logout') }}" class="side-menu__item" 
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bx bx-log-out side-menu__icon"></i>
                                    <span class="side-menu__label">Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            @elseif(Auth::user()->isSupervisor())
                            <li class="slide">
                                <a href="{{ route('supervisor.dashboard') }}" class="side-menu__item">
                                    <i class="bx bx-user-check side-menu__icon"></i>
                                    <span class="side-menu__label">Supervisor Dashboard</span>
                                </a>
                            </li>
                            <li class="slide">
                                <a href="{{ route('supervisor.profile') }}" class="side-menu__item">
                                    <i class="bx bx-user side-menu__icon"></i>
                                    <span class="side-menu__label">Profile</span>
                                </a>
                            </li>
                            
                            <!-- Activity Logs -->
                            <li class="slide">
                                <a href="{{ route('supervisor.logs') }}" class="side-menu__item">
                                    <i class="bx bx-file-blank side-menu__icon"></i>
                                    <span class="side-menu__label">Activity Logs</span>
                                </a>
                            </li>
                            
                            <!-- Logout -->
                            <li class="slide">
                                <a href="{{ route('logout') }}" class="side-menu__item" 
                                   onclick="event.preventDefault(); document.getElementById('logout-form-supervisor').submit();">
                                    <i class="bx bx-log-out side-menu__icon"></i>
                                    <span class="side-menu__label">Logout</span>
                                </a>
                                <form id="logout-form-supervisor" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            @else
                            <li class="slide">
                                <a href="{{ route('user.dashboard') }}" class="side-menu__item">
                                    <i class="bx bx-user side-menu__icon"></i>
                                    <span class="side-menu__label">User Dashboard</span>
                                </a>
                            </li>
                            
                            <!-- Activity Logs -->
                            <li class="slide">
                                <a href="{{ route('user.logs') }}" class="side-menu__item">
                                    <i class="bx bx-file-blank side-menu__icon"></i>
                                    <span class="side-menu__label">Activity Logs</span>
                                </a>
                            </li>
                            
                            <!-- Logout -->
                            <li class="slide">
                                <a href="{{ route('logout') }}" class="side-menu__item" 
                                   onclick="event.preventDefault(); document.getElementById('logout-form-user').submit();">
                                    <i class="bx bx-log-out side-menu__icon"></i>
                                    <span class="side-menu__label">Logout</span>
                                </a>
                                <form id="logout-form-user" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            @endif
                            @endauth
                            <!-- End::Admin Dashboard -->
                        </ul>
                        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path> </svg></div>
                    </nav>
                    <!-- End::nav -->

                </div>
                <!-- End::main-sidebar -->

            </aside>