@extends('layouts.admin')

@section('page-title', 'View Job')

@section('content')
<div class="container-fluid">
  <div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
      <h2>Job Details</h2>
      <div class="d-flex gap-2">
        <a href="{{ route('admin.jobs.edit', $job->id) }}" class="btn btn-admin">
          <i class="fas fa-edit me-2"></i>Edit Job
        </a>
        <a href="{{ route('admin.jobs.index') }}" class="btn btn-outline-primary">
          <i class="fas fa-arrow-left me-2"></i>Back to List
        </a>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-8">
      <div class="admin-card">
        <div class="card-header">
          <h5 class="mb-0"><i class="fas fa-briefcase me-2"></i>{{ $job->title }}</h5>
        </div>
        <div class="card-body">
          <table class="table table-borderless" style="font-size: 14px;">
            <tr>
              <td style="width: 140px; color: var(--text-secondary); font-weight: 500;">Company</td>
              <td>{{ $job->company ?? '—' }}</td>
            </tr>
            <tr>
              <td style="color: var(--text-secondary); font-weight: 500;">Location</td>
              <td>{{ $job->location ?? '—' }}</td>
            </tr>
            <tr>
              <td style="color: var(--text-secondary); font-weight: 500;">Salary</td>
              <td>{{ $job->salary ?? '—' }}</td>
            </tr>
            <tr>
              <td style="color: var(--text-secondary); font-weight: 500;">Status</td>
              <td>
                @if($job->status === 'active')
                  <span class="badge bg-success">Active</span>
                @elseif($job->status === 'pending')
                  <span class="badge bg-warning text-dark">Pending</span>
                @else
                  <span class="badge bg-secondary">Closed</span>
                @endif
              </td>
            </tr>
            <tr>
              <td style="color: var(--text-secondary); font-weight: 500;">Posted</td>
              <td>{{ $job->posted_at ? $job->posted_at->format('M d, Y') : '—' }}</td>
            </tr>
            <tr>
              <td style="color: var(--text-secondary); font-weight: 500;">Created</td>
              <td>{{ $job->created_at->format('M d, Y H:i') }}</td>
            </tr>
          </table>

          @if($job->description)
            <hr style="margin: 24px 0; border-color: var(--border-color);">
            <h6 style="font-weight: 600; color: var(--text-primary); margin-bottom: 8px;">Description</h6>
            <p style="color: var(--text-secondary); line-height: 1.75; margin: 0; white-space: pre-wrap;">{{ $job->description }}</p>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
