@extends('layouts.admin')

@section('page-title', 'Job Form Data Management')

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
      <h2>Form Fields Management</h2>
      <div class="d-flex gap-2">
        @if(request('job_form_id'))
          <a href="{{ route('admin.job-form-data.create', ['job_form_id' => request('job_form_id')]) }}" class="btn btn-admin">
            <i class="fas fa-plus me-2"></i>Add New Field
          </a>
        @else
          <a href="{{ route('admin.job-form-data.create') }}" class="btn btn-admin">
            <i class="fas fa-plus me-2"></i>Add New Field
          </a>
        @endif
        <a href="{{ route('admin.job-forms.index') }}" class="btn btn-outline-primary">
          <i class="fas fa-arrow-left me-2"></i>Back to Job Forms
        </a>
      </div>
    </div>
  </div>

  @if(request('job_form_id') && $jobForms->where('id', request('job_form_id'))->first())
    <div class="row mb-4">
      <div class="col-12">
        <div class="alert alert-info" style="border-radius: 8px;">
          <i class="fas fa-info-circle me-2"></i>
          Showing fields for: <strong>{{ $jobForms->where('id', request('job_form_id'))->first()->title }}</strong>
        </div>
      </div>
    </div>
  @endif

  <div class="admin-card mb-4">
    <div class="card-header">
      <h5 class="mb-0"><i class="fas fa-filter me-2"></i>Filter by Job Form</h5>
    </div>
    <div class="card-body">
      <form method="GET" action="{{ route('admin.job-form-data.index') }}" class="d-flex gap-2">
        <select name="job_form_id" class="form-select" onchange="this.form.submit()">
          <option value="">All Job Forms</option>
          @foreach($jobForms as $jobForm)
            <option value="{{ $jobForm->id }}" {{ request('job_form_id') == $jobForm->id ? 'selected' : '' }}>
              {{ $jobForm->title }}
            </option>
          @endforeach
        </select>
      </form>
    </div>
  </div>

  <div class="admin-card">
    <div class="card-header">
      <h5 class="mb-0"><i class="fas fa-list me-2"></i>All Form Fields</h5>
    </div>
    <div class="card-body">
      @if($jobFormData->count() > 0)
        <div class="table-responsive">
          <table class="table admin-table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Job Form</th>
                <th>Title</th>
                <th>Type</th>
                <th>Required</th>
                <th>Order</th>
                <th>Created</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($jobFormData as $field)
                <tr>
                  <td>{{ $field->id }}</td>
                  <td>
                    <a href="{{ route('admin.job-forms.show', $field->job_form_id) }}" style="color: var(--primary); text-decoration: none;">
                      {{ Str::limit($field->jobForm->title, 30) }}
                    </a>
                  </td>
                  <td style="font-weight: 500; color: var(--text-primary);">{{ $field->title }}</td>
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
                  <td>{{ $field->order }}</td>
                  <td>{{ $field->created_at->format('Y-m-d') }}</td>
                  <td>
                    <a href="{{ route('admin.job-form-data.show', $field->id) }}" class="btn-action btn-action-view" title="View">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.job-form-data.edit', $field->id) }}" class="btn-action btn-action-edit" title="Edit">
                      <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.job-form-data.destroy', $field->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this form field?');">
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
          <i class="fas fa-list" style="font-size: 48px; margin-bottom: 16px; opacity: 0.3;"></i>
          <p style="margin: 0;">
            @if(request('job_form_id'))
              No form fields found for this job form. <a href="{{ route('admin.job-form-data.create', ['job_form_id' => request('job_form_id')]) }}" style="color: var(--primary);">Add your first field</a>
            @else
              No form fields found. <a href="{{ route('admin.job-form-data.create') }}" style="color: var(--primary);">Create your first field</a>
            @endif
          </p>
        </div>
      @endif
    </div>
  </div>
</div>
@endsection
