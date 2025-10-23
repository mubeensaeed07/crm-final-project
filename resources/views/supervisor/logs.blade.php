@extends('layouts.master')

@section('title') My Activity Logs @endsection

@section('content')
<div class="container-fluid">
    <!-- Start::row-1 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">
                        My Activity Logs
                    </div>
                    <div class="card-tools">
                        <button class="btn btn-primary" onclick="refreshLogs()">
                            <i class="bx bx-refresh"></i> Refresh
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Search Section -->
                    <div class="row mb-4">
                        <div class="col-xl-8">
                            <form method="GET" action="{{ route('supervisor.logs') }}" id="searchForm">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" 
                                           value="{{ request('search') }}" 
                                           placeholder="Search your activity...">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="bx bx-search"></i> Search
                                    </button>
                                    @if(request('search'))
                                        <a href="{{ route('supervisor.logs') }}" class="btn btn-secondary">
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
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Logs Table -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
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
                                        <td colspan="4" class="text-center py-4">
                                            <div class="text-muted">
                                                <i class="bx bx-file-blank fs-48"></i>
                                                <div class="mt-2">No activity logs found</div>
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
    const searchForm = document.getElementById('searchForm');
    
    // Add hidden input for filter
    let typeInput = searchForm.querySelector('input[name="type"]');
    
    if (!typeInput) {
        typeInput = document.createElement('input');
        typeInput.type = 'hidden';
        typeInput.name = 'type';
        searchForm.appendChild(typeInput);
    }
    
    typeInput.value = typeFilter;
    searchForm.submit();
}
</script>
@endsection
