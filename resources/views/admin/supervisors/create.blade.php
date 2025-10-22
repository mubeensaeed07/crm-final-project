@extends('layouts.master')

@section('title') Create Supervisor @endsection

@section('content')
<div class="container-fluid">
    <!-- Start::row-1 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">
                        Create New Supervisor
                    </div>
                    <div class="card-tools">
                        <a href="{{ route('admin.supervisors.index') }}" class="btn btn-secondary">
                            <i class="bx bx-arrow-back"></i> Back to Supervisors
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.supervisors.store') }}">
                        @csrf
                        <div class="row">
                            <!-- Basic Information -->
                            <div class="col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">Basic Information</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">First Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required>
                                                    @error('first_name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Last Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required>
                                                    @error('last_name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                                    @error('email')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Module Assignment -->
                            <div class="col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">Module Assignment</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label">Select Modules <span class="text-danger">*</span></label>
                                            <div class="row">
                                                @foreach($modules as $module)
                                                <div class="col-md-6 mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input module-checkbox" type="checkbox" name="modules[]" value="{{ $module->id }}" id="module_{{ $module->id }}" onchange="togglePermissions({{ $module->id }})">
                                                        <label class="form-check-label" for="module_{{ $module->id }}">
                                                            {{ $module->name }}
                                                        </label>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            @error('modules')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Permissions -->
                            <div class="col-12">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">Permissions Configuration</div>
                                        <p class="text-muted mb-0">Select what permissions the supervisor should have for each module</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach($modules as $module)
                                            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                                                <div class="card custom-card module-permissions" id="permissions_{{ $module->id }}" style="display: none;">
                                                    <div class="card-header">
                                                        <div class="card-title">{{ $module->name }} Permissions</div>
                                                    </div>
                                                    <div class="card-body">
                                                        @if($module->name === 'HRM')
                                                        <!-- HRM has user management features, so show generic permissions -->
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="checkbox" name="permissions[{{ $module->id }}][]" value="create_users" id="create_users_{{ $module->id }}">
                                                            <label class="form-check-label" for="create_users_{{ $module->id }}">
                                                                Create Users
                                                            </label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="checkbox" name="permissions[{{ $module->id }}][]" value="edit_users" id="edit_users_{{ $module->id }}">
                                                            <label class="form-check-label" for="edit_users_{{ $module->id }}">
                                                                Edit Users
                                                            </label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="checkbox" name="permissions[{{ $module->id }}][]" value="delete_users" id="delete_users_{{ $module->id }}">
                                                            <label class="form-check-label" for="delete_users_{{ $module->id }}">
                                                                Delete Users
                                                            </label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="checkbox" name="permissions[{{ $module->id }}][]" value="reset_passwords" id="reset_passwords_{{ $module->id }}">
                                                            <label class="form-check-label" for="reset_passwords_{{ $module->id }}">
                                                                Reset Passwords
                                                            </label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="checkbox" name="permissions[{{ $module->id }}][]" value="assign_modules" id="assign_modules_{{ $module->id }}">
                                                            <label class="form-check-label" for="assign_modules_{{ $module->id }}">
                                                                Assign Modules
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="permissions[{{ $module->id }}][]" value="view_reports" id="view_reports_{{ $module->id }}">
                                                            <label class="form-check-label" for="view_reports_{{ $module->id }}">
                                                                View Reports
                                                            </label>
                                                        </div>
                                                        @elseif($module->name === 'FINANCE')
                                                        <!-- Finance module - only show basic access permission -->
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="permissions[{{ $module->id }}][]" value="view_reports" id="view_reports_{{ $module->id }}">
                                                            <label class="form-check-label" for="view_reports_{{ $module->id }}">
                                                                Access Finance Module
                                                            </label>
                                                        </div>
                                                        @elseif($module->name === 'SUPPORT')
                                                        <!-- Support module - show User Support and Dealer Support permissions -->
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="checkbox" name="permissions[{{ $module->id }}][]" value="access_user_support" id="access_user_support_{{ $module->id }}">
                                                            <label class="form-check-label" for="access_user_support_{{ $module->id }}">
                                                                <i class="bx bx-user me-1"></i> User Support
                                                            </label>
                                                            <small class="text-muted d-block">Provide support for individual users and customers</small>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="permissions[{{ $module->id }}][]" value="access_dealer_support" id="access_dealer_support_{{ $module->id }}">
                                                            <label class="form-check-label" for="access_dealer_support_{{ $module->id }}">
                                                                <i class="bx bx-store me-1"></i> Dealer Support
                                                            </label>
                                                            <small class="text-muted d-block">Provide support for dealers and business partners</small>
                                                        </div>
                                                        @endif
                                                        
                                                        @if($module->name === 'FINANCE')
                                                        <!-- Finance-specific permissions - only show what Finance module actually supports -->
                                                        <hr class="my-3">
                                                        <h6 class="text-primary mb-3">Finance Permissions</h6>
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="checkbox" name="finance_permissions[can_mark_salary_paid]" value="1" id="can_mark_salary_paid_{{ $module->id }}">
                                                            <label class="form-check-label" for="can_mark_salary_paid_{{ $module->id }}">
                                                                Mark Salary Paid
                                                            </label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="checkbox" name="finance_permissions[can_mark_salary_pending]" value="1" id="can_mark_salary_pending_{{ $module->id }}">
                                                            <label class="form-check-label" for="can_mark_salary_pending_{{ $module->id }}">
                                                                Mark Salary Pending
                                                            </label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="checkbox" name="finance_permissions[can_view_salary_data]" value="1" id="can_view_salary_data_{{ $module->id }}">
                                                            <label class="form-check-label" for="can_view_salary_data_{{ $module->id }}">
                                                                View Salary Data
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="finance_permissions[can_manage_salary_payments]" value="1" id="can_manage_salary_payments_{{ $module->id }}">
                                                            <label class="form-check-label" for="manage_salary_payments_{{ $module->id }}">
                                                                Manage Salary Payments
                                                            </label>
                                                        </div>
                                                        @elseif($module->name === 'SUPPORT')
                                                        <!-- SUPPORT module permissions already shown above -->
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bx bx-save"></i> Create Supervisor
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

@section('scripts')
<script>
function togglePermissions(moduleId) {
    const checkbox = document.getElementById('module_' + moduleId);
    const permissionsDiv = document.getElementById('permissions_' + moduleId);
    
    if (checkbox.checked) {
        permissionsDiv.style.display = 'block';
    } else {
        permissionsDiv.style.display = 'none';
        // Uncheck all permissions for this module
        const permissionCheckboxes = permissionsDiv.querySelectorAll('input[type="checkbox"]');
        permissionCheckboxes.forEach(cb => cb.checked = false);
    }
}

// Initialize permissions visibility on page load
document.addEventListener('DOMContentLoaded', function() {
    const moduleCheckboxes = document.querySelectorAll('.module-checkbox');
    moduleCheckboxes.forEach(checkbox => {
        const moduleId = checkbox.value;
        togglePermissions(moduleId);
    });
});
</script>
@endsection
