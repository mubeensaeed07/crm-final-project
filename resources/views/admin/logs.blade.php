@extends('layouts.master')

@section('title') System Logs @endsection

@section('content')
<div class="container-fluid">
    <!-- Start::row-1 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">
                        System Logs
                    </div>
                    <div class="card-tools">
                        <button class="btn btn-primary" onclick="refreshLogs()">
                            <i class="bx bx-refresh"></i> Refresh
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Search and Filter Section -->
                    <div class="row mb-4">
                        <div class="col-xl-8">
                            <form method="GET" action="{{ route('admin.logs') }}" id="searchForm">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" 
                                           value="{{ request('search') }}" 
                                           placeholder="Search by keyword, user name, or action...">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="bx bx-search"></i> Search
                                    </button>
                                    @if(request('search'))
                                        <a href="{{ route('admin.logs') }}" class="btn btn-secondary">
                                            <i class="bx bx-x"></i> Clear
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div>
                        <div class="col-xl-4">
                            <div class="d-flex gap-2">
                                <select class="form-control" id="typeFilter" onchange="filterLogs()">
                                    <option value="">All Types</option>
                                    <option value="profile_update">Profile Updates</option>
                                    <option value="user_created">User Creation</option>
                                    <option value="user_updated">User Updates</option>
                                    <option value="module_access">Module Access</option>
                                    <option value="login">Login</option>
                                    <option value="logout">Logout</option>
                                    <option value="password_change">Password Changes</option>
                                    <option value="company_update">Company Updates</option>
                                    <option value="supervisor_created">Supervisor Creation</option>
                                    <option value="department_created">Department Creation</option>
                                </select>
                                <select class="form-control" id="moduleFilter" onchange="filterLogs()">
                                    <option value="">All Modules</option>
                                    <option value="Profile">Profile</option>
                                    <option value="User Management">User Management</option>
                                    <option value="HRM">HRM</option>
                                    <option value="SUPPORT">SUPPORT</option>
                                    <option value="FINANCE">FINANCE</option>
                                    <option value="Authentication">Authentication</option>
                                    <option value="Supervisor Management">Supervisor Management</option>
                                    <option value="Department Management">Department Management</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Logs Table -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>User</th>
                                    <th>Type</th>
                                    <th>Module</th>
                                    <th>Description</th>
                                    <th>Date & Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($logs as $log)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="me-2">
                                                    @if($log->user_type === 'supervisor' && $log->supervisor)
                                                        @if($log->supervisor->avatar)
                                                            <img src="{{ asset('storage/' . $log->supervisor->avatar) }}" 
                                                                 alt="Avatar" class="rounded-circle" 
                                                                 style="width: 32px; height: 32px; object-fit: cover;">
                                                        @else
                                                            <div class="rounded-circle bg-warning d-flex align-items-center justify-content-center text-white" 
                                                                 style="width: 32px; height: 32px;">
                                                                <i class="ti ti-user-check fs-12"></i>
                                                            </div>
                                                        @endif
                                                    @elseif($log->user)
                                                        @if($log->user->userInfo && $log->user->userInfo->avatar)
                                                            <img src="{{ asset('storage/' . $log->user->userInfo->avatar) }}" 
                                                                 alt="Avatar" class="rounded-circle" 
                                                                 style="width: 32px; height: 32px; object-fit: cover;">
                                                        @else
                                                            <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center text-white" 
                                                                 style="width: 32px; height: 32px;">
                                                                <i class="ti ti-user fs-12"></i>
                                                            </div>
                                                        @endif
                                                    @endif
                                                </div>
                                                <div>
                                                    @if($log->user_type === 'supervisor' && $log->supervisor)
                                                        <div class="fw-semibold">{{ $log->supervisor->full_name }} <span class="badge bg-warning text-dark">Supervisor</span></div>
                                                        <small class="text-muted">{{ $log->supervisor->email }}</small>
                                                    @elseif($log->user)
                                                        @if($log->user_type === 'admin')
                                                            <div class="fw-semibold">{{ $log->user->full_name }} <span class="badge bg-success">Admin</span></div>
                                                        @else
                                                            <div class="fw-semibold">{{ $log->user->full_name }} <span class="badge bg-primary">User</span></div>
                                                        @endif
                                                        <small class="text-muted">{{ $log->user->email }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ $log->type == 'login' ? 'success' : ($log->type == 'logout' ? 'warning' : 'info') }}">
                                                {{ ucfirst(str_replace('_', ' ', $log->type)) }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-secondary">{{ $log->module ?? 'N/A' }}</span>
                                        </td>
                                        <td>{{ $log->description }}</td>
                                        <td>
                                            <div>{{ $log->created_on->format('M d, Y') }}</div>
                                            <small class="text-muted">{{ $log->created_on->format('h:i A') }}</small>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4">
                                            <div class="text-muted">
                                                <i class="bx bx-file-blank fs-48"></i>
                                                <div class="mt-2">No logs found</div>
                                                @if(request('search'))
                                                    <small>Try adjusting your search criteria</small>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($logs->hasPages())
                        <div class="d-flex justify-content-center mt-4">
                            {{ $logs->appends(request()->query())->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- End::row-1 -->
</div>
@endsection

@section('scripts')
<script>
function refreshLogs() {
    window.location.reload();
}

function filterLogs() {
    const typeFilter = document.getElementById('typeFilter').value;
    const moduleFilter = document.getElementById('moduleFilter').value;
    const searchForm = document.getElementById('searchForm');
    
    // Add hidden inputs for filters
    let typeInput = searchForm.querySelector('input[name="type"]');
    let moduleInput = searchForm.querySelector('input[name="module"]');
    
    if (!typeInput) {
        typeInput = document.createElement('input');
        typeInput.type = 'hidden';
        typeInput.name = 'type';
        searchForm.appendChild(typeInput);
    }
    
    if (!moduleInput) {
        moduleInput = document.createElement('input');
        moduleInput.type = 'hidden';
        moduleInput.name = 'module';
        searchForm.appendChild(moduleInput);
    }
    
    typeInput.value = typeFilter;
    moduleInput.value = moduleFilter;
    
    searchForm.submit();
}
</script>
@endsection
