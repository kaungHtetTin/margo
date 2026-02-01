@extends('layouts.admin')

@section('page-title', 'Job Forms Management')

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
      <h2>Job Forms Management</h2>
      <a href="{{ route('admin.job-forms.create') }}" class="btn btn-admin">
        <i class="fas fa-plus me-2"></i>Add New Job Form
      </a>
    </div>
  </div>

  <div class="admin-card">
    <div class="card-header">
      <h5 class="mb-0"><i class="fas fa-file-alt me-2"></i>All Job Forms</h5>
    </div>
    <div class="card-body">
      @if($jobForms->count() > 0)
        <div class="table-responsive">
          <table class="table admin-table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Fields</th>
                <th>Status</th>
                <th>Active</th>
                <th>Created</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($jobForms as $jobForm)
                <tr>
                  <td>{{ $jobForm->id }}</td>
                  <td style="max-width: 250px;">
                    <div style="font-weight: 500; color: var(--text-primary);">{{ Str::limit($jobForm->title, 50) }}</div>
                  </td>
                  <td style="max-width: 300px;">
                    @if($jobForm->description)
                      <div style="font-size: 12px; color: var(--text-secondary);">{{ Str::limit($jobForm->description, 80) }}</div>
                    @else
                      <span style="color: var(--text-secondary); font-style: italic;">No description</span>
                    @endif
                  </td>
                  <td>
                    <span class="badge bg-info">{{ $jobForm->formData->count() }} field(s)</span>
                  </td>
                  <td>
                    @if($jobForm->status === 'active')
                      <span class="badge bg-success">Active</span>
                    @elseif($jobForm->status === 'draft')
                      <span class="badge bg-warning">Draft</span>
                    @else
                      <span class="badge bg-secondary">Inactive</span>
                    @endif
                  </td>
                  <td>
                    @if($jobForm->is_active)
                      <span class="badge bg-success">Yes</span>
                    @else
                      <span class="badge bg-secondary">No</span>
                    @endif
                  </td>
                  <td>{{ $jobForm->created_at->format('Y-m-d') }}</td>
                  <td>
                    <a href="{{ route('admin.job-forms.show', $jobForm->id) }}" class="btn-action btn-action-view" title="View">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.job-forms.edit', $jobForm->id) }}" class="btn-action btn-action-edit" title="Edit">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{ route('admin.job-form-data.index', ['job_form_id' => $jobForm->id]) }}" class="btn-action btn-action-view" title="Manage Fields">
                      <i class="fas fa-list"></i>
                    </a>
                    <form action="{{ route('admin.job-forms.destroy', $jobForm->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this job form?');">
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
          <p style="margin: 0;">No job forms found. <a href="{{ route('admin.job-forms.create') }}" style="color: var(--primary);">Create your first job form</a></p>
        </div>
      @endif
    </div>
  </div>
</div>
@endsection
