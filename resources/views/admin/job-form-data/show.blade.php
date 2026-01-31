@extends('layouts.admin')

@section('page-title', 'View Form Field')

@section('content')
<div class="container-fluid">
  <div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
      <h2>View Form Field</h2>
      <div class="d-flex gap-2">
        <a href="{{ route('admin.job-form-data.edit', $jobFormData->id) }}" class="btn btn-admin">
          <i class="fas fa-edit me-2"></i>Edit
        </a>
        <a href="{{ route('admin.job-form-data.index', ['job_form_id' => $jobFormData->job_form_id]) }}" class="btn btn-outline-primary">
          <i class="fas fa-arrow-left me-2"></i>Back to List
        </a>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-8">
      <div class="admin-card">
        <div class="card-header">
          <h5 class="mb-0"><i class="fas fa-list me-2"></i>{{ $jobFormData->title }}</h5>
        </div>
        <div class="card-body">
          <div style="line-height: 1.8; color: var(--text-primary);">
            <p><strong>Field Title:</strong> {{ $jobFormData->title }}</p>
            <p><strong>Field Type:</strong> 
              @if($jobFormData->type === 'image')
                <span class="badge bg-info">Image</span>
              @else
                <span class="badge bg-secondary">Text</span>
              @endif
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="admin-card">
        <div class="card-header">
          <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Field Information</h5>
        </div>
        <div class="card-body">
          <div style="margin-bottom: 16px;">
            <strong style="color: var(--text-secondary); font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Job Form</strong>
            <div style="margin-top: 4px;">
              <a href="{{ route('admin.job-forms.show', $jobFormData->job_form_id) }}" style="color: var(--primary); text-decoration: none;">
                {{ $jobFormData->jobForm->title }}
              </a>
            </div>
          </div>

          <div style="margin-bottom: 16px;">
            <strong style="color: var(--text-secondary); font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Type</strong>
            <div style="margin-top: 4px;">
              @if($jobFormData->type === 'image')
                <span class="badge bg-info">Image</span>
              @else
                <span class="badge bg-secondary">Text</span>
              @endif
            </div>
          </div>

          <div style="margin-bottom: 16px;">
            <strong style="color: var(--text-secondary); font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Required</strong>
            <div style="margin-top: 4px;">
              @if($jobFormData->is_required)
                <span class="badge bg-danger">Required</span>
              @else
                <span class="badge bg-secondary">Optional</span>
              @endif
            </div>
          </div>

          <div style="margin-bottom: 16px;">
            <strong style="color: var(--text-secondary); font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Order</strong>
            <div style="margin-top: 4px; color: var(--text-primary);">
              {{ $jobFormData->order }}
            </div>
          </div>

          <div style="margin-bottom: 16px;">
            <strong style="color: var(--text-secondary); font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Created</strong>
            <div style="margin-top: 4px; color: var(--text-primary);">
              {{ $jobFormData->created_at->format('F d, Y h:i A') }}
            </div>
          </div>

          <div style="margin-bottom: 16px;">
            <strong style="color: var(--text-secondary); font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Updated</strong>
            <div style="margin-top: 4px; color: var(--text-primary);">
              {{ $jobFormData->updated_at->format('F d, Y h:i A') }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
