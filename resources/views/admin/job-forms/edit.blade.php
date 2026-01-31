@extends('layouts.admin')

@section('page-title', 'Edit Job Form')

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

  @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 8px; margin-bottom: 24px;">
      <i class="fas fa-exclamation-circle me-2"></i>
      <strong>Please fix the following errors:</strong>
      <ul class="mb-0 mt-2" style="padding-left: 20px;">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <div class="row mb-4">
    <div class="col-12">
      <h2>Edit Job Form</h2>
      <nav aria-label="breadcrumb" style="margin-top: 8px;">
        <ol class="breadcrumb" style="background: transparent; padding: 0; margin: 0;">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" style="color: var(--text-secondary); text-decoration: none;">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.job-forms.index') }}" style="color: var(--text-secondary); text-decoration: none;">Job Forms</a></li>
          <li class="breadcrumb-item active" style="color: var(--text-primary);">Edit</li>
        </ol>
      </nav>
    </div>
  </div>

  <form action="{{ route('admin.job-forms.update', $jobForm->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-lg-8">
        <div class="admin-card">
          <div class="card-header">
            <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Job Form Details</h5>
          </div>
          <div class="card-body">
            <div class="mb-3">
              <label for="title" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Title <span style="color: #dc3545;">*</span></label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $jobForm->title) }}" placeholder="Enter job form title" required>
              @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="description" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Description</label>
              <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="6" placeholder="Enter job form description">{{ old('description', $jobForm->description) }}</textarea>
              @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="admin-card">
          <div class="card-header">
            <h5 class="mb-0"><i class="fas fa-cog me-2"></i>Settings</h5>
          </div>
          <div class="card-body">
            <div class="mb-3">
              <label for="status" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Status <span style="color: #dc3545;">*</span></label>
              <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                <option value="draft" {{ old('status', $jobForm->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="active" {{ old('status', $jobForm->status) === 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $jobForm->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
              </select>
              @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $jobForm->is_active) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active" style="font-weight: 500; color: var(--text-primary);">
                  Is Active
                </label>
              </div>
              <small class="text-muted" style="font-size: 12px;">Check to make this form active for users</small>
            </div>
          </div>
        </div>

        <div class="d-flex gap-2 mt-4">
          <button type="submit" class="btn btn-admin w-100">
            <i class="fas fa-save me-2"></i>Update Job Form
          </button>
          <a href="{{ route('admin.job-forms.index') }}" class="btn btn-outline-primary">
            <i class="fas fa-times me-2"></i>Cancel
          </a>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection
