@extends('layouts.master')

@section('title') Admin Profile @endsection

@section('content')
<div class="container-fluid">
    <!-- Start::row-1 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">
                        Admin Profile
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Personal Information -->
                            <div class="col-xl-8">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            Personal Information
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">First Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="first_name" value="{{ old('first_name', $user->first_name) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Last Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $user->last_name) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Email <span class="text-danger">*</span></label>
                                                    <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Phone Number</label>
                                                    <input type="tel" class="form-control" name="phone" value="{{ old('phone', $user->userInfo->phone ?? '') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">City</label>
                                                    <input type="text" class="form-control" name="city" value="{{ old('city', $user->userInfo->city ?? '') }}">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Address</label>
                                                    <textarea class="form-control" name="address" rows="3">{{ old('address', $user->userInfo->address ?? '') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Company Information -->
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            Company Information
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Company Name</label>
                                                    <input type="text" class="form-control" name="company_name" value="{{ old('company_name', $user->company_name ?? '') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Company Location</label>
                                                    <input type="text" class="form-control" name="company_location" value="{{ old('company_location', $user->company_location ?? '') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">NTN Number</label>
                                                    <input type="text" class="form-control" name="company_ntn_number" value="{{ old('company_ntn_number', $user->company_ntn_number ?? '') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Country</label>
                                                    <input type="text" class="form-control" name="company_country" value="{{ old('company_country', $user->company_country ?? '') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Company Logo</label>
                                                    <input type="file" class="form-control" name="company_logo" accept="image/*">
                                                    @if($user->company_logo)
                                                        <div class="mt-2">
                                                            <img src="{{ asset('storage/' . $user->company_logo) }}" alt="Company Logo" style="max-width: 100px; max-height: 100px;">
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Company Print Logo (for sidebar)</label>
                                                    <input type="file" class="form-control" name="company_print_logo" accept="image/*">
                                                    @if($user->company_print_logo)
                                                        <div class="mt-2">
                                                            <img src="{{ asset('storage/' . $user->company_print_logo) }}" alt="Company Print Logo" style="max-width: 100px; max-height: 100px;">
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Website Link</label>
                                                    <input type="url" class="form-control" name="website_url" value="{{ old('website_url', $user->userInfo->website_url ?? '') }}" placeholder="https://yourcompany.com">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">LinkedIn Link</label>
                                                    <input type="url" class="form-control" name="linkedin_url" value="{{ old('linkedin_url', $user->userInfo->linkedin_url ?? '') }}" placeholder="https://linkedin.com/company/yourcompany">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Company Bio</label>
                                                    <textarea class="form-control" name="company_bio" rows="3" placeholder="Tell us about your company">{{ old('company_bio', $user->company_bio ?? '') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Password Change -->
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            Change Password
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Current Password</label>
                                                    <input type="password" class="form-control" name="current_password">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">New Password</label>
                                                    <input type="password" class="form-control" name="new_password">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Confirm New Password</label>
                                                    <input type="password" class="form-control" name="new_password_confirmation">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Profile Picture and Quick Info -->
                            <div class="col-xl-4">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            Profile Picture
                                        </div>
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="mb-3">
                                            @if($user->userInfo && $user->userInfo->avatar)
                                                <img src="{{ asset('storage/' . $user->userInfo->avatar) }}" alt="Profile Picture" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
                                            @else
                                                <div class="avatar avatar-xxl bg-primary-transparent rounded-circle d-flex align-items-center justify-content-center" style="width: 120px; height: 120px;">
                                                    <i class="bx bx-user fs-24"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <input type="file" class="form-control" name="avatar" accept="image/*">
                                        </div>
                                        <h5>{{ $user->full_name }}</h5>
                                        <p class="text-muted">{{ $user->email }}</p>
                                        <p class="text-muted">
                                            <span class="badge bg-warning">Admin</span>
                                        </p>
                                    </div>
                                </div>

                                <!-- Company Logo Preview -->
                                @if($user->company_logo)
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            Company Logo Preview
                                        </div>
                                    </div>
                                    <div class="card-body text-center">
                                        <img src="{{ asset('storage/' . $user->company_logo) }}" alt="Company Logo" class="img-fluid" style="max-height: 150px;">
                                    </div>
                                </div>
                                @endif

                                <!-- Company Print Logo Preview -->
                                @if($user->company_print_logo)
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            Company Print Logo Preview
                                        </div>
                                    </div>
                                    <div class="card-body text-center">
                                        <img src="{{ asset('storage/' . $user->company_print_logo) }}" alt="Company Print Logo" class="img-fluid" style="max-height: 150px;">
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bx bx-save me-2"></i>Update Profile
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End::row-1 -->
</div>
@endsection
