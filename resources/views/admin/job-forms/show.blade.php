@extends('layouts.admin')

@section('page-title', 'View Job Form')

@section('content')
<div class="container-fluid">
  <div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
      <h2>View Job Form</h2>
      <div class="d-flex gap-2">
        <a href="{{ route('admin.job-forms.edit', $jobForm->id) }}" class="btn btn-admin">
          <i class="fas fa-edit me-2"></i>Edit
        </a>
        <a href="{{ route('admin.job-form-data.index', ['job_form_id' => $jobForm->id]) }}" class="btn btn-admin" style="background: var(--primary);">
          <i class="fas fa-list me-2"></i>Manage Fields
        </a>
        <a href="{{ route('admin.job-forms.index') }}" class="btn btn-outline-primary">
          <i class="fas fa-arrow-left me-2"></i>Back to List
        </a>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-8">
      <div class="admin-card">
        <div class="card-header">
          <h5 class="mb-0"><i class="fas fa-file-alt me-2"></i>{{ $jobForm->title }}</h5>
        </div>
        <div class="card-body">
          @if($jobForm->description)
            <div style="line-height: 1.8; color: var(--text-primary); white-space: pre-wrap; margin-bottom: 24px;">{{ $jobForm->description }}</div>
          @else
            <p style="color: var(--text-secondary); font-style: italic;">No description provided</p>
          @endif

          @if($jobForm->formData->count() > 0)
            <div style="margin-top: 32px;">
              <h6 style="margin-bottom: 16px; color: var(--text-primary);">Form Fields</h6>
              <div class="table-responsive">
                <table class="table admin-table">
                  <thead>
                    <tr>
                      <th>Order</th>
                      <th>Title</th>
                      <th>Type</th>
                      <th>Required</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($jobForm->formData as $field)
                      <tr>
                        <td>{{ $field->order }}</td>
                        <td>{{ $field->title }}</td>
                        <td>
                          @if($field->type === 'image')
                            <span class="badge bg-info">Image</span>
                          @else
                            <span class="badge bg-secondary">Text</span>
                          @endif
                        </td>
                        <td>
                          @if($field->is_required)
                            <span class="badge bg-danger">Required</span>
                          @else
                            <span class="badge bg-secondary">Optional</span>
                          @endif
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          @else
            <div style="text-align: center; padding: 20px; color: var(--text-secondary);">
              <i class="fas fa-list" style="font-size: 32px; margin-bottom: 12px; opacity: 0.3;"></i>
              <p style="margin: 0;">No form fields yet. <a href="{{ route('admin.job-form-data.create', ['job_form_id' => $jobForm->id]) }}" style="color: var(--primary);">Add fields</a></p>
            </div>
          @endif
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="admin-card">
        <div class="card-header">
          <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Job Form Information</h5>
        </div>
        <div class="card-body">
          <div style="margin-bottom: 16px;">
            <strong style="color: var(--text-secondary); font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Status</strong>
            <div style="margin-top: 4px;">
              @if($jobForm->status === 'active')
                <span class="badge bg-success">Active</span>
              @elseif($jobForm->status === 'draft')
                <span class="badge bg-warning">Draft</span>
              @else
                <span class="badge bg-secondary">Inactive</span>
              @endif
            </div>
          </div>

          <div style="margin-bottom: 16px;">
            <strong style="color: var(--text-secondary); font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Is Active</strong>
            <div style="margin-top: 4px;">
              @if($jobForm->is_active)
                <span class="badge bg-success">Yes</span>
              @else
                <span class="badge bg-secondary">No</span>
              @endif
            </div>
          </div>

          <div style="margin-bottom: 16px;">
            <strong style="color: var(--text-secondary); font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Form Fields</strong>
            <div style="margin-top: 4px; color: var(--text-primary);">
              {{ $jobForm->formData->count() }} field(s)
            </div>
          </div>

          <div style="margin-bottom: 16px;">
            <strong style="color: var(--text-secondary); font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Created</strong>
            <div style="margin-top: 4px; color: var(--text-primary);">
              {{ $jobForm->created_at->format('F d, Y h:i A') }}
            </div>
          </div>

          <div style="margin-bottom: 16px;">
            <strong style="color: var(--text-secondary); font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Updated</strong>
            <div style="margin-top: 4px; color: var(--text-primary);">
              {{ $jobForm->updated_at->format('F d, Y h:i A') }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
