@extends('layouts.admin')

@section('page-title', 'Job Applications')

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
    <div class="col-12">
      <h2>Job Applications</h2>
    </div>
  </div>

  @php
    $pendingCount = $applicants->where('status', 'pending')->count();
    $approvedCount = $applicants->where('status', 'approved')->count();
    $rejectedCount = $applicants->where('status', 'rejected')->count();
  @endphp

  <!-- Stats -->
  <div class="row mb-4">
    <div class="col-md-4">
      <div class="stats-card">
        <div class="stat-number">{{ $applicants->count() }}</div>
        <div class="stat-label">Total Applications</div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="stats-card">
        <div class="stat-number">{{ $pendingCount }}</div>
        <div class="stat-label">Pending Review</div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="stats-card">
        <div class="stat-number">{{ $approvedCount }}</div>
        <div class="stat-label">Approved</div>
      </div>
    </div>
  </div>

  <div class="admin-card">
    <div class="card-header">
      <h5 class="mb-0"><i class="fas fa-file-alt me-2"></i>Recent Applications</h5>
    </div>
    <div class="card-body">
      @if($applicants->count() > 0)
        <div class="table-responsive">
          <table class="table admin-table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Applicant</th>
                <th>Job Form</th>
                <th>Applied Date</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($applicants as $applicant)
                @php
                  $firstApp = $applicant->jobApplications->first();
                  $jobFormTitle = $firstApp?->jobForm?->title ?? '—';
                  $submittedAt = $firstApp?->created_at ?? $applicant->created_at;
                @endphp
                <tr>
                  <td>{{ $applicant->id }}</td>
                  <td>
                    <div style="font-weight: 500;">{{ $applicant->name }}</div>
                    <small style="font-size: 12px; color: var(--text-secondary);">{{ $applicant->emails ?? $applicant->phone ?? '—' }}</small>
                  </td>
                  <td>{{ Str::limit($jobFormTitle, 40) }}</td>
                  <td>{{ $submittedAt->format('Y-m-d H:i') }}</td>
                  <td>
                    @if(($applicant->status ?? 'pending') === 'pending')
                      <span class="badge bg-warning text-dark">Pending</span>
                    @elseif(($applicant->status ?? '') === 'approved')
                      <span class="badge bg-success">Approved</span>
                    @elseif(($applicant->status ?? '') === 'rejected')
                      <span class="badge bg-danger">Rejected</span>
                    @else
                      <span class="badge bg-secondary">Pending</span>
                    @endif
                  </td>
                  <td>
                    <a href="{{ route('admin.applications.show', $applicant->id) }}" class="btn-action btn-action-view" title="View">
                      <i class="fas fa-eye"></i>
                    </a>
                    <form action="{{ route('admin.applications.destroy', $applicant->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this application?');">
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
          <i class="fas fa-file-alt" style="font-size: 48px; margin-bottom: 16px; opacity: 0.3;"></i>
          <p style="margin: 0;">No applications found.</p>
        </div>
      @endif
    </div>
  </div>
</div>
@endsection
