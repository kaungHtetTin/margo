@extends('layouts.admin')

@section('page-title', 'Edit Course')

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
      <h2>Edit Course</h2>
      <nav aria-label="breadcrumb" style="margin-top: 8px;">
        <ol class="breadcrumb" style="background: transparent; padding: 0; margin: 0;">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" style="color: var(--text-secondary); text-decoration: none;">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.courses.index') }}" style="color: var(--text-secondary); text-decoration: none;">Courses</a></li>
          <li class="breadcrumb-item active" style="color: var(--text-primary);">Edit</li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-8">
      <div class="admin-card">
        <div class="card-header">
          <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Course Details</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.courses.update', $course->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label for="title" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Title <span style="color: #dc3545;">*</span></label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $course->title) }}" placeholder="Enter course title" required>
              @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="description" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Description</label>
              <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" placeholder="Enter course description">{{ old('description', $course->description) }}</textarea>
              @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="level" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Level <span style="color: #dc3545;">*</span></label>
              <select class="form-select @error('level') is-invalid @enderror" id="level" name="level" required>
                <option value="beginner" {{ old('level', $course->level) === 'beginner' ? 'selected' : '' }}>Beginner</option>
                <option value="intermediate" {{ old('level', $course->level) === 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                <option value="advanced" {{ old('level', $course->level) === 'advanced' ? 'selected' : '' }}>Advanced</option>
              </select>
              @error('level')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px; display: block;">Status</label>
              <div class="form-check form-switch" style="padding-top: 8px;">
                <input class="form-check-input" type="checkbox" id="is_open" name="is_open" value="1" {{ old('is_open', $course->is_open ?? true) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_open" style="font-weight: 400; color: var(--text-secondary);">
                  Open (course is open for enrollment)
                </label>
              </div>
              <small class="text-muted" style="font-size: 12px;">Uncheck to set course as Closed.</small>
            </div>

            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="duration" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Duration</label>
                <input type="text" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration" value="{{ old('duration', $course->duration) }}" placeholder="e.g. 3 months, 40 hours">
                @error('duration')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-4 mb-3">
                <label for="day" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Day</label>
                <input type="text" class="form-control @error('day') is-invalid @enderror" id="day" name="day" value="{{ old('day', $course->day) }}" placeholder="e.g. Mon, Wed, Fri">
                @error('day')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-4 mb-3">
                <label for="time" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Time</label>
                <input type="text" class="form-control @error('time') is-invalid @enderror" id="time" name="time" value="{{ old('time', $course->time) }}" placeholder="e.g. 9:00 AM - 11:00 AM">
                @error('time')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="d-flex gap-2 mt-4">
              <button type="submit" class="btn btn-admin">
                <i class="fas fa-save me-2"></i>Update Course
              </button>
              <a href="{{ route('admin.courses.index') }}" class="btn btn-outline-primary">
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
