@extends('layouts.admin')

@section('page-title', 'Application Details')

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
    <div class="col-12 d-flex justify-content-between align-items-center flex-wrap gap-2">
      <h2>Application Details</h2>
      <div class="d-flex gap-2">
        <a href="{{ route('admin.applications.index') }}" class="btn btn-outline-primary">
          <i class="fas fa-arrow-left me-2"></i>Back to List
        </a>
        <form action="{{ route('admin.applications.destroy', $applicant->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this application?');">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-outline-danger">
            <i class="fas fa-trash me-2"></i>Delete
          </button>
        </form>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-8">
      <div class="admin-card">
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
          <h5 class="mb-0"><i class="fas fa-user me-2"></i>{{ $applicant->name }}</h5>
          @if($jobForm)
            <span style="font-size: 14px; color: var(--text-secondary);">{{ $jobForm->title }}</span>
          @endif
        </div>
        <div class="card-body">
          <!-- Applicant Info -->
          <div style="padding: 20px; background: var(--bg-hover); border-radius: 8px; margin-bottom: 24px;">
            <h6 style="font-weight: 600; color: var(--text-primary); margin-bottom: 12px;">Applicant Info</h6>
            <div class="row">
              @if($applicant->phone)
                <div class="col-md-6 mb-2">
                  <strong style="font-size: 12px; color: var(--text-secondary);">Phone</strong>
                  <div>{{ $applicant->phone }}</div>
                </div>
              @endif
              @if($applicant->emails)
                <div class="col-md-6 mb-2">
                  <strong style="font-size: 12px; color: var(--text-secondary);">Email(s)</strong>
                  <div>{{ $applicant->emails }}</div>
                </div>
              @endif
              <div class="col-md-6 mb-2">
                <strong style="font-size: 12px; color: var(--text-secondary);">Submitted</strong>
                <div>{{ $applicant->created_at->format('M d, Y H:i') }}</div>
              </div>
            </div>
          </div>

          <!-- Update Status -->
          <div style="margin-bottom: 24px;">
            <h6 style="font-weight: 600; color: var(--text-primary); margin-bottom: 12px;">Status</h6>
            <form action="{{ route('admin.applications.update', $applicant->id) }}" method="POST" class="d-flex align-items-center gap-2 flex-wrap">
              @csrf
              @method('PUT')
              <select name="status" class="form-select" style="width: auto; max-width: 180px;">
                <option value="pending" {{ ($applicant->status ?? 'pending') === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ ($applicant->status ?? '') === 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ ($applicant->status ?? '') === 'rejected' ? 'selected' : '' }}>Rejected</option>
              </select>
              <button type="submit" class="btn btn-admin btn-sm">Update Status</button>
            </form>
          </div>

          <!-- Application Details (Form Fields) -->
          @if($applications->count() > 0)
            <hr style="margin: 24px 0; border-color: var(--border-color);">
            <h6 style="font-weight: 600; color: var(--text-primary); margin-bottom: 16px;"><i class="fas fa-clipboard-list me-2" style="color: var(--primary);"></i>Application Details</h6>
            <div style="display: flex; flex-direction: column; gap: 16px;">
              @foreach($applications as $application)
                <div style="padding: 16px; border: 1px solid var(--border-color); border-radius: 8px; background: #fff;">
                  <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 8px;">
                    <strong style="font-size: 14px; color: var(--text-primary);">{{ $application->jobFormData->title ?? 'Field' }}</strong>
                    <span style="padding: 4px 10px; border-radius: 12px; font-size: 11px; font-weight: 600; background: rgba(107, 114, 128, 0.1); color: var(--text-secondary);">
                      {{ ucfirst($application->jobFormData->type ?? 'text') }}
                    </span>
                  </div>
                  @if(($application->jobFormData->type ?? 'text') === 'image')
                    <div style="margin-top: 12px;">
                      @if($application->value)
                        <a href="{{ storage_url($application->value) }}" target="_blank" rel="noopener" class="d-inline-block">
                          <img src="{{ storage_url($application->value) }}" alt="{{ $application->jobFormData->title }}" style="max-width: 100%; max-height: 280px; border-radius: 8px; border: 1px solid var(--border-color);">
                        </a>
                        <div style="margin-top: 8px;">
                          <a href="{{ storage_url($application->value) }}" target="_blank" rel="noopener" class="btn btn-outline-primary btn-sm"><i class="fas fa-external-link-alt me-1"></i>Open</a>
                        </div>
                      @else
                        <span style="color: var(--text-secondary);">—</span>
                      @endif
                    </div>
                  @else
                    <div style="margin-top: 8px; padding: 12px; background: var(--bg-hover); border-radius: 6px; font-size: 14px; color: var(--text-primary); line-height: 1.6; white-space: pre-wrap;">{{ $application->value ?? '—' }}</div>
                  @endif
                </div>
              @endforeach
            </div>
          @else
            <p style="color: var(--text-secondary); margin: 0;">No form data for this application.</p>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
