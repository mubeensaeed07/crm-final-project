@extends('layouts.master')

@section('title') User Profile @endsection

@section('styles')
<style>
    .profile-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 2rem 0;
        margin-bottom: 2rem;
    }
    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 4px solid white;
        object-fit: cover;
    }
    .section-title {
        color: #495057;
        font-weight: 600;
        margin-bottom: 1.5rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #e9ecef;
    }
</style>
@endsection

@section('content')

<div class="container-fluid">
    <!-- Profile Header -->
    <div class="row">
        <div class="col-12">
            <div class="profile-header">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            @if($user->userInfo && $user->userInfo->avatar)
                                <img src="{{ asset('storage/' . $user->userInfo->avatar) }}" alt="Profile" class="profile-avatar">
                            @else
                                <div class="profile-avatar bg-white d-flex align-items-center justify-content-center">
                                    <i class="ti ti-user fs-48 text-primary"></i>
                                </div>
                            @endif
                        </div>
                        <div class="col">
                            <h2 class="mb-1">{{ $user->full_name }}</h2>
                            <p class="mb-1 opacity-75">{{ $user->email }}</p>
                            @php
                                $userType = $user->userInfo && $user->userInfo->userType ? $user->userInfo->userType : null;
                            @endphp
                            @if($userType)
                                <span class="badge bg-light text-dark fs-12">{{ $userType->name }}</span>
                            @endif
                            @if($user->userInfo && $user->userInfo->job_title)
                                <p class="mb-0 opacity-75">{{ $user->userInfo->job_title }} @ {{ $user->userInfo->company }}</p>
                            @endif
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-light" onclick="editProfile()">
                                <i class="ti ti-edit me-1"></i>Edit Profile
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Form -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">Complete Your Profile</div>
                    <p class="text-muted mb-0">Fill in all the details to complete your profile</p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Personal Information -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="section-title">Personal Information</h5>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="first_name" value="{{ old('first_name', $user->first_name) }}" required>
                                    @error('first_name')
                                        <div class="text-danger fs-12">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $user->last_name) }}" required>
                                    @error('last_name')
                                        <div class="text-danger fs-12">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
                                    @error('email')
                                        <div class="text-danger fs-12">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" name="phone" value="{{ old('phone', $user->userInfo->phone ?? '') }}">
                                    @error('phone')
                                        <div class="text-danger fs-12">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Profile Picture</label>
                                    <div class="profile-picture-upload">
                                        <div class="current-avatar mb-3">
                                            @if($user->userInfo && $user->userInfo->avatar)
                                                <img id="current-avatar" src="{{ asset('storage/' . $user->userInfo->avatar) }}" alt="Current Profile" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover; border: 3px solid #e9ecef;">
                                            @else
                                                <div id="current-avatar" class="rounded-circle bg-primary d-flex align-items-center justify-content-center text-white" style="width: 100px; height: 100px;">
                                                    <i class="ti ti-user fs-24"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="upload-section">
                                            <input type="file" class="form-control" name="avatar" id="avatar-input" accept="image/*" onchange="previewImage(this)">
                                            <small class="text-muted d-block mt-1">Choose a new profile picture (JPG, PNG, GIF - Max 2MB)</small>
                                            @error('avatar')
                                                <div class="text-danger fs-12">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div id="image-preview" class="mt-3" style="display: none;">
                                            <h6>Preview:</h6>
                                            <div class="position-relative d-inline-block">
                                                <img id="preview-img" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover; border: 3px solid #e9ecef;">
                                                <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 rounded-circle" onclick="removePreview()" style="width: 25px; height: 25px; padding: 0; font-size: 12px;">×</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Address Information -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="section-title">Address Information</h5>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control" name="address" rows="3" placeholder="Enter your full address">{{ old('address', $user->userInfo->address ?? '') }}</textarea>
                                    @error('address')
                                        <div class="text-danger fs-12">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control" name="city" value="{{ old('city', $user->userInfo->city ?? '') }}">
                                    @error('city')
                                        <div class="text-danger fs-12">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Professional Information -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="section-title">Professional Information</h5>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Company</label>
                                    <input type="text" class="form-control" name="company" value="{{ old('company', $user->userInfo->company ?? '') }}">
                                    @error('company')
                                        <div class="text-danger fs-12">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Bio</label>
                                    <textarea class="form-control" name="bio" rows="4" placeholder="Tell us about yourself">{{ old('bio', $user->bio) }}</textarea>
                                    @error('bio')
                                        <div class="text-danger fs-12">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Social Media -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="section-title">Social Media & Links</h5>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">LinkedIn URL</label>
                                    <input type="url" class="form-control" name="linkedin_url" value="{{ old('linkedin_url', $user->linkedin_url) }}" placeholder="https://linkedin.com/in/username">
                                    @error('linkedin_url')
                                        <div class="text-danger fs-12">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Twitter URL</label>
                                    <input type="url" class="form-control" name="twitter_url" value="{{ old('twitter_url', $user->twitter_url) }}" placeholder="https://twitter.com/username">
                                    @error('twitter_url')
                                        <div class="text-danger fs-12">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Website URL</label>
                                    <input type="url" class="form-control" name="website_url" value="{{ old('website_url', $user->website_url) }}" placeholder="https://yourwebsite.com">
                                    @error('website_url')
                                        <div class="text-danger fs-12">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>



                        <!-- Password Change Section -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="section-title">Change Password</h5>
                                <p class="text-muted">Leave password fields empty if you don't want to change your password.</p>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Current Password</label>
                                    <input type="password" class="form-control" name="current_password" placeholder="Enter your current password">
                                    @error('current_password')
                                        <div class="text-danger fs-12">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">New Password</label>
                                    <input type="password" class="form-control" name="new_password" placeholder="Enter new password">
                                    @error('new_password')
                                        <div class="text-danger fs-12">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Confirm New Password</label>
                                    <input type="password" class="form-control" name="new_password_confirmation" placeholder="Confirm new password">
                                    @error('new_password_confirmation')
                                        <div class="text-danger fs-12">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('user.dashboard') }}" class="btn btn-light">Cancel</a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="ti ti-device-floppy me-1"></i>Save Profile
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
function editProfile() {
    // Scroll to the form
    document.querySelector('form').scrollIntoView({ behavior: 'smooth' });
}

function previewImage(input) {
    if (input.files && input.files[0]) {
        const file = input.files[0];
        
        // Validate file size (2MB max)
        if (file.size > 2 * 1024 * 1024) {
            alert('File size must be less than 2MB');
            input.value = '';
            return;
        }
        
        // Validate file type
        if (!file.type.startsWith('image/')) {
            alert('Please select a valid image file');
            input.value = '';
            return;
        }
        
        const reader = new FileReader();
        reader.onload = function(e) {
            const previewImg = document.getElementById('preview-img');
            const previewDiv = document.getElementById('image-preview');
            
            previewImg.src = e.target.result;
            previewDiv.style.display = 'block';
            
            // Update current avatar preview
            const currentAvatar = document.getElementById('current-avatar');
            if (currentAvatar.tagName === 'IMG') {
                currentAvatar.src = e.target.result;
            } else {
                // Replace the div with an img
                const newImg = document.createElement('img');
                newImg.src = e.target.result;
                newImg.alt = 'Profile Preview';
                newImg.className = 'rounded-circle';
                newImg.style.cssText = 'width: 100px; height: 100px; object-fit: cover; border: 3px solid #e9ecef;';
                currentAvatar.parentNode.replaceChild(newImg, currentAvatar);
            }
        };
        reader.readAsDataURL(file);
    }
}

function removePreview() {
    const input = document.getElementById('avatar-input');
    const previewDiv = document.getElementById('image-preview');
    const currentAvatar = document.getElementById('current-avatar');
    
    // Reset file input
    input.value = '';
    
    // Hide preview
    previewDiv.style.display = 'none';
    
    // Reset current avatar to original
    @if($user->userInfo && $user->userInfo->avatar)
        currentAvatar.src = '{{ asset("storage/" . $user->userInfo->avatar) }}';
    @else
        // Replace img with div
        const newDiv = document.createElement('div');
        newDiv.id = 'current-avatar';
        newDiv.className = 'rounded-circle bg-primary d-flex align-items-center justify-content-center text-white';
        newDiv.style.cssText = 'width: 100px; height: 100px;';
        newDiv.innerHTML = '<i class="ti ti-user fs-24"></i>';
        currentAvatar.parentNode.replaceChild(newDiv, currentAvatar);
    @endif
}

// Add drag and drop functionality
document.addEventListener('DOMContentLoaded', function() {
    const uploadSection = document.querySelector('.upload-section');
    const fileInput = document.getElementById('avatar-input');
    
    // Prevent default drag behaviors
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        uploadSection.addEventListener(eventName, preventDefaults, false);
        document.body.addEventListener(eventName, preventDefaults, false);
    });
    
    // Highlight drop area when item is dragged over it
    ['dragenter', 'dragover'].forEach(eventName => {
        uploadSection.addEventListener(eventName, highlight, false);
    });
    
    ['dragleave', 'drop'].forEach(eventName => {
        uploadSection.addEventListener(eventName, unhighlight, false);
    });
    
    // Handle dropped files
    uploadSection.addEventListener('drop', handleDrop, false);
    
    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }
    
    function highlight(e) {
        uploadSection.classList.add('border-primary', 'bg-light');
    }
    
    function unhighlight(e) {
        uploadSection.classList.remove('border-primary', 'bg-light');
    }
    
    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        
        if (files.length > 0) {
            fileInput.files = files;
            previewImage(fileInput);
        }
    }
});
</script>
@endsection
