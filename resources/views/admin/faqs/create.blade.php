@extends('layouts.admin')

@section('page-title', 'Create FAQ')

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
      <h2>Create New FAQ</h2>
      <nav aria-label="breadcrumb" style="margin-top: 8px;">
        <ol class="breadcrumb" style="background: transparent; padding: 0; margin: 0;">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" style="color: var(--text-secondary); text-decoration: none;">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.faqs.index') }}" style="color: var(--text-secondary); text-decoration: none;">FAQs</a></li>
          <li class="breadcrumb-item active" style="color: var(--text-primary);">Create</li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-8">
      <div class="admin-card">
        <div class="card-header">
          <h5 class="mb-0"><i class="fas fa-plus me-2"></i>FAQ Details</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.faqs.store') }}" method="POST">
            @csrf

            <div class="mb-3">
              <label for="question" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Question <span style="color: #dc3545;">*</span></label>
              <input type="text" class="form-control @error('question') is-invalid @enderror" id="question" name="question" value="{{ old('question') }}" placeholder="Enter the FAQ question" required>
              @error('question')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="answer" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Answer <span style="color: #dc3545;">*</span></label>
              <textarea class="form-control @error('answer') is-invalid @enderror" id="answer" name="answer" rows="6" placeholder="Enter the FAQ answer" required>{{ old('answer') }}</textarea>
              @error('answer')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="order" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Display Order</label>
                <input type="number" class="form-control @error('order') is-invalid @enderror" id="order" name="order" value="{{ old('order', 0) }}" min="0" placeholder="0">
                <small class="text-muted" style="font-size: 12px;">Lower numbers appear first</small>
                @error('order')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px; display: block;">Status</label>
                <div class="form-check form-switch" style="padding-top: 8px;">
                  <input class="form-check-input" type="checkbox" id="is_active" name="is_active" {{ old('is_active', true) ? 'checked' : '' }}>
                  <label class="form-check-label" for="is_active" style="font-weight: 400; color: var(--text-secondary);">
                    Active (visible to users)
                  </label>
                </div>
              </div>
            </div>

            <div class="d-flex gap-2 mt-4">
              <button type="submit" class="btn btn-admin">
                <i class="fas fa-save me-2"></i>Create FAQ
              </button>
              <a href="{{ route('admin.faqs.index') }}" class="btn btn-outline-primary">
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
