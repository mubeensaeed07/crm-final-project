@extends('support::layouts.support-master')

@section('title') SUPPORT Dashboard @endsection

@section('content')
<div class="container-fluid">
    <!-- Start::row-1 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">
                        SUPPORT Dashboard
                    </div>
                </div>
                <div class="card-body">
                    <!-- Two Main Options -->
                    <div class="row">
                        @php
                            $user = Auth::user();
                            $supervisor = Auth::guard('supervisor')->user();
                            $currentUser = $user ?: $supervisor;
                            $canAccessUserSupport = false;
                            $canAccessDealerSupport = false;
                            
                            if ($currentUser) {
                                // Admins have full access to all SUPPORT features
                                if ($user && ($user->isAdmin() || $user->isSuperAdmin())) {
                                    $canAccessUserSupport = true;
                                    $canAccessDealerSupport = true;
                                } elseif ($supervisor) {
                                    // For supervisors, check their permissions
                                    $supportModule = $supervisor->modules()->where('name', 'SUPPORT')->first();
                                    $canAccessUserSupport = $supportModule && $supportModule->pivot && $supportModule->pivot->can_access_user_support;
                                    $canAccessDealerSupport = $supportModule && $supportModule->pivot && $supportModule->pivot->can_access_dealer_support;
                                } elseif ($user) {
                                    // For regular users, check their permissions
                                    $supportModule = $user->modules()->where('name', 'SUPPORT')->first();
                                    $canAccessUserSupport = $supportModule && $supportModule->pivot && $supportModule->pivot->can_access_user_support;
                                    $canAccessDealerSupport = $supportModule && $supportModule->pivot && $supportModule->pivot->can_access_dealer_support;
                                }
                            }
                        @endphp
                        
                        @if($canAccessUserSupport)
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="card custom-card">
                                <div class="card-body text-center">
                                    <div class="mb-4">
                                        <span class="avatar avatar-xxl bg-primary-transparent">
                                            <i class="bx bx-user fs-48"></i>
                                        </span>
                                    </div>
                                    <h4 class="mb-3">User Support</h4>
                                    <p class="text-muted mb-4">Provide support for individual users and customers</p>
                                    <a href="{{ route('support.user') }}" class="btn btn-primary btn-lg">
                                        <i class="bx bx-user me-2"></i>
                                        Access User Support
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        @if($canAccessDealerSupport)
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="card custom-card">
                                <div class="card-body text-center">
                                    <div class="mb-4">
                                        <span class="avatar avatar-xxl bg-success-transparent">
                                            <i class="bx bx-store fs-48"></i>
                                        </span>
                                    </div>
                                    <h4 class="mb-3">Dealer Support</h4>
                                    <p class="text-muted mb-4">Provide support for dealers and business partners</p>
                                    <a href="{{ route('support.dealer') }}" class="btn btn-success btn-lg">
                                        <i class="bx bx-store me-2"></i>
                                        Access Dealer Support
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        @if(!$currentUser)
                        <div class="col-12">
                            <div class="card custom-card">
                                <div class="card-body text-center">
                                    <div class="mb-4">
                                        <span class="avatar avatar-xxl bg-danger-transparent">
                                            <i class="bx bx-user-x fs-48"></i>
                                        </span>
                                    </div>
                                    <h4 class="mb-3">Authentication Required</h4>
                                    <p class="text-muted mb-4">Please log in to access the SUPPORT module.</p>
                                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                                </div>
                            </div>
                        </div>
                        @elseif(!$canAccessUserSupport && !$canAccessDealerSupport)
                        <div class="col-12">
                            <div class="card custom-card">
                                <div class="card-body text-center">
                                    <div class="mb-4">
                                        <span class="avatar avatar-xxl bg-warning-transparent">
                                            <i class="bx bx-lock fs-48"></i>
                                        </span>
                                    </div>
                                    <h4 class="mb-3">No Support Access</h4>
                                    <p class="text-muted mb-4">You don't have permission to access any support features. Contact your administrator.</p>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End::row-1 -->
</div>
@endsection
