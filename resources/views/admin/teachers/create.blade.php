@extends('layouts.admin')

@section('page-title', 'Create Teacher')

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
      <h2>Create New Teacher</h2>
      <nav aria-label="breadcrumb" style="margin-top: 8px;">
        <ol class="breadcrumb" style="background: transparent; padding: 0; margin: 0;">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" style="color: var(--text-secondary); text-decoration: none;">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.teachers.index') }}" style="color: var(--text-secondary); text-decoration: none;">Teachers</a></li>
          <li class="breadcrumb-item active" style="color: var(--text-primary);">Create</li>
        </ol>
      </nav>
    </div>
  </div>

  <form action="{{ route('admin.teachers.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-lg-8">
        <div class="admin-card">
          <div class="card-header">
            <h5 class="mb-0"><i class="fas fa-plus me-2"></i>Teacher Details</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="name" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Name <span style="color: #dc3545;">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Full name" required>
                @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="email" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Email <span style="color: #dc3545;">*</span></label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="email@example.com" required>
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="mb-3">
              <label for="phone" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Phone</label>
              <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Phone number">
              @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="bio" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Bio</label>
              <textarea class="form-control @error('bio') is-invalid @enderror" id="bio" name="bio" rows="4" placeholder="Short biography">{{ old('bio') }}</textarea>
              @error('bio')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="specialization" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Specialization</label>
                <input type="text" class="form-control @error('specialization') is-invalid @enderror" id="specialization" name="specialization" value="{{ old('specialization') }}" placeholder="e.g. Web Development">
                @error('specialization')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="qualification" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Qualification</label>
                <input type="text" class="form-control @error('qualification') is-invalid @enderror" id="qualification" name="qualification" value="{{ old('qualification') }}" placeholder="e.g. MSc Computer Science">
                @error('qualification')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="experience_years" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Experience (years)</label>
                <input type="number" class="form-control @error('experience_years') is-invalid @enderror" id="experience_years" name="experience_years" value="{{ old('experience_years') }}" min="0" max="99" placeholder="0">
                @error('experience_years')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="status" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Status <span style="color: #dc3545;">*</span></label>
                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                  <option value="active" {{ old('status', 'active') === 'active' ? 'selected' : '' }}>Active</option>
                  <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="mb-3">
              <label for="image" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Photo</label>
              <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp">
              <small class="text-muted" style="font-size: 12px;">JPEG, PNG, GIF, WebP. Max 2MB.</small>
              @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <hr style="margin: 24px 0; border-color: var(--border-color);">
            <h6 style="font-weight: 600; color: var(--text-primary); margin-bottom: 12px;">Social Links (optional)</h6>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="social_facebook" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Facebook URL</label>
                <input type="url" class="form-control" id="social_facebook" name="social_facebook" value="{{ old('social_facebook') }}" placeholder="https://facebook.com/...">
              </div>
              <div class="col-md-6 mb-3">
                <label for="social_linkedin" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">LinkedIn URL</label>
                <input type="url" class="form-control" id="social_linkedin" name="social_linkedin" value="{{ old('social_linkedin') }}" placeholder="https://linkedin.com/in/...">
              </div>
              <div class="col-md-6 mb-3">
                <label for="social_twitter" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Twitter URL</label>
                <input type="url" class="form-control" id="social_twitter" name="social_twitter" value="{{ old('social_twitter') }}" placeholder="https://twitter.com/...">
              </div>
              <div class="col-md-6 mb-3">
                <label for="social_instagram" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Instagram URL</label>
                <input type="url" class="form-control" id="social_instagram" name="social_instagram" value="{{ old('social_instagram') }}" placeholder="https://instagram.com/...">
              </div>
            </div>

            <div class="d-flex gap-2 mt-4">
              <button type="submit" class="btn btn-admin">
                <i class="fas fa-save me-2"></i>Create Teacher
              </button>
              <a href="{{ route('admin.teachers.index') }}" class="btn btn-outline-primary">
                <i class="fas fa-times me-2"></i>Cancel
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection
