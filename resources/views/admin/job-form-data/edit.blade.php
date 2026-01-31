@extends('layouts.admin')

@section('page-title', 'Edit Form Field')

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
      <h2>Edit Form Field</h2>
      <nav aria-label="breadcrumb" style="margin-top: 8px;">
        <ol class="breadcrumb" style="background: transparent; padding: 0; margin: 0;">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" style="color: var(--text-secondary); text-decoration: none;">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.job-form-data.index') }}" style="color: var(--text-secondary); text-decoration: none;">Form Fields</a></li>
          <li class="breadcrumb-item active" style="color: var(--text-primary);">Edit</li>
        </ol>
      </nav>
    </div>
  </div>

  <form action="{{ route('admin.job-form-data.update', $jobFormData->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-lg-8">
        <div class="admin-card">
          <div class="card-header">
            <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Form Field Details</h5>
          </div>
          <div class="card-body">
            <div class="mb-3">
              <label for="job_form_id" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Job Form <span style="color: #dc3545;">*</span></label>
              <select class="form-select @error('job_form_id') is-invalid @enderror" id="job_form_id" name="job_form_id" required>
                <option value="">Select a job form</option>
                @foreach($jobForms as $jobForm)
                  <option value="{{ $jobForm->id }}" {{ old('job_form_id', $jobFormData->job_form_id) == $jobForm->id ? 'selected' : '' }}>
                    {{ $jobForm->title }}
                  </option>
                @endforeach
              </select>
              @error('job_form_id')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="title" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Title <span style="color: #dc3545;">*</span></label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $jobFormData->title) }}" placeholder="Enter field title" required>
              @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="type" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Type <span style="color: #dc3545;">*</span></label>
              <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
                <option value="text" {{ old('type', $jobFormData->type) === 'text' ? 'selected' : '' }}>Text</option>
                <option value="image" {{ old('type', $jobFormData->type) === 'image' ? 'selected' : '' }}>Image</option>
              </select>
              <small class="text-muted" style="font-size: 12px;">Select the input type for this field</small>
              @error('type')
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
              <label for="order" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Order</label>
              <input type="number" class="form-control @error('order') is-invalid @enderror" id="order" name="order" value="{{ old('order', $jobFormData->order) }}" min="0" placeholder="0">
              <small class="text-muted" style="font-size: 12px;">Display order for sorting fields (lower numbers appear first)</small>
              @error('order')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="is_required" name="is_required" value="1" {{ old('is_required', $jobFormData->is_required) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_required" style="font-weight: 500; color: var(--text-primary);">
                  Is Required
                </label>
              </div>
              <small class="text-muted" style="font-size: 12px;">Check to make this field required</small>
            </div>
          </div>
        </div>

        <div class="d-flex gap-2 mt-4">
          <button type="submit" class="btn btn-admin w-100">
            <i class="fas fa-save me-2"></i>Update Field
          </button>
          <a href="{{ route('admin.job-form-data.index', ['job_form_id' => $jobFormData->job_form_id]) }}" class="btn btn-outline-primary">
            <i class="fas fa-times me-2"></i>Cancel
          </a>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection
