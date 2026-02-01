@extends('layouts.admin')

@section('page-title', 'Post New Job')

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
      <h2>Post New Job</h2>
      <nav aria-label="breadcrumb" style="margin-top: 8px;">
        <ol class="breadcrumb" style="background: transparent; padding: 0; margin: 0;">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" style="color: var(--text-secondary); text-decoration: none;">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.jobs.index') }}" style="color: var(--text-secondary); text-decoration: none;">Jobs</a></li>
          <li class="breadcrumb-item active" style="color: var(--text-primary);">Create</li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-8">
      <div class="admin-card">
        <div class="card-header">
          <h5 class="mb-0"><i class="fas fa-plus me-2"></i>Job Details</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.jobs.store') }}" method="POST">
            @csrf

            <div class="mb-3">
              <label for="title" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Job Title <span style="color: #dc3545;">*</span></label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="e.g. Construction Worker" required>
              @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="company" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Company <span class="text-muted" style="font-weight: 400;">(optional)</span></label>
                <input type="text" class="form-control @error('company') is-invalid @enderror" id="company" name="company" value="{{ old('company') }}" placeholder="Company name">
                @error('company')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="location" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Location</label>
                <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location') }}" placeholder="e.g. Singapore, Malaysia">
                @error('location')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="mb-3">
              <label for="salary" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Salary</label>
              <input type="text" class="form-control @error('salary') is-invalid @enderror" id="salary" name="salary" value="{{ old('salary') }}" placeholder="e.g. $1,200/month">
              @error('salary')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="description" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Description</label>
              <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" placeholder="Job description and requirements">{{ old('description') }}</textarea>
              @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="status" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Status <span style="color: #dc3545;">*</span></label>
                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                  <option value="pending" {{ old('status', 'pending') === 'pending' ? 'selected' : '' }}>Pending</option>
                  <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Active</option>
                  <option value="closed" {{ old('status') === 'closed' ? 'selected' : '' }}>Closed</option>
                </select>
                @error('status')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="posted_at" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Posted Date</label>
                <input type="date" class="form-control @error('posted_at') is-invalid @enderror" id="posted_at" name="posted_at" value="{{ old('posted_at', date('Y-m-d')) }}">
                @error('posted_at')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="d-flex gap-2 mt-4">
              <button type="submit" class="btn btn-admin">
                <i class="fas fa-save me-2"></i>Post Job
              </button>
              <a href="{{ route('admin.jobs.index') }}" class="btn btn-outline-primary">
                <i class="fas fa-times me-2"></i>Cancel
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
