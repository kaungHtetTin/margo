@extends('layouts.admin')

@section('page-title', 'Jobs Management')

@section('content')
<div class="container-fluid">
  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 8px; margin-bottom: 24px;">
      <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 8px; margin-bottom: 24px;">
      <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
      <h2>Jobs Management</h2>
      <a href="{{ route('admin.jobs.create') }}" class="btn btn-admin">
        <i class="fas fa-plus me-2"></i>Post New Job
      </a>
    </div>
  </div>

  <div class="admin-card">
    <div class="card-header">
      <h5 class="mb-0"><i class="fas fa-briefcase me-2"></i>Available Jobs</h5>
    </div>
    <div class="card-body">
      @if($jobs->count() > 0)
        <div class="table-responsive">
          <table class="table admin-table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Job Title</th>
                <th>Company</th>
                <th>Location</th>
                <th>Salary</th>
                <th>Status</th>
                <th>Posted</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($jobs as $job)
                <tr>
                  <td>{{ $job->id }}</td>
                  <td style="font-weight: 500;">{{ Str::limit($job->title, 50) }}</td>
                  <td>{{ $job->company ?? '—' }}</td>
                  <td>{{ $job->location ?? '—' }}</td>
                  <td>{{ $job->salary ?? '—' }}</td>
                  <td>
                    @if($job->status === 'active')
                      <span class="badge bg-success">Active</span>
                    @elseif($job->status === 'pending')
                      <span class="badge bg-warning text-dark">Pending</span>
                    @else
                      <span class="badge bg-secondary">Closed</span>
                    @endif
                  </td>
                  <td>{{ $job->posted_at ? $job->posted_at->format('Y-m-d') : '—' }}</td>
                  <td>
                    <a href="{{ route('admin.jobs.show', $job->id) }}" class="btn-action btn-action-view" title="View">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.jobs.edit', $job->id) }}" class="btn-action btn-action-edit" title="Edit">
                      <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this job?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn-action btn-action-delete" title="Delete">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @else
        <div style="text-align: center; padding: 40px; color: var(--text-secondary);">
          <i class="fas fa-briefcase" style="font-size: 48px; margin-bottom: 16px; opacity: 0.3;"></i>
          <p style="margin: 0;">No jobs found. <a href="{{ route('admin.jobs.create') }}" style="color: var(--primary);">Post your first job</a></p>
        </div>
      @endif
    </div>
  </div>
</div>
@endsection
