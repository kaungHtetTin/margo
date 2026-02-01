@extends('layouts.admin')

@section('page-title', 'Course Management')

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
      <h2>Course Management</h2>
      <a href="{{ route('admin.courses.create') }}" class="btn btn-admin">
        <i class="fas fa-plus me-2"></i>Add New Course
      </a>
    </div>
  </div>

  <div class="admin-card">
    <div class="card-header">
      <h5 class="mb-0"><i class="fas fa-graduation-cap me-2"></i>All Courses</h5>
    </div>
    <div class="card-body">
      @if($courses->count() > 0)
        <div class="table-responsive">
          <table class="table admin-table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Level</th>
                <th>Status</th>
                <th>Duration</th>
                <th>Day</th>
                <th>Time</th>
                <th>Created</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($courses as $course)
                <tr>
                  <td>{{ $course->id }}</td>
                  <td style="max-width: 300px;">
                    <div style="font-weight: 500; color: var(--text-primary);">{{ Str::limit($course->title, 50) }}</div>
                    @if($course->description)
                      <div style="font-size: 12px; color: var(--text-secondary);">{{ Str::limit($course->description, 60) }}</div>
                    @endif
                  </td>
                  <td>
                    @if($course->level === 'beginner')
                      <span class="badge bg-info">Beginner</span>
                    @elseif($course->level === 'intermediate')
                      <span class="badge bg-primary">Intermediate</span>
                    @elseif($course->level === 'advanced')
                      <span class="badge bg-dark">Advanced</span>
                    @else
                      {{ $course->level ?? '—' }}
                    @endif
                  </td>
                  <td>
                    @if(($course->is_open ?? true))
                      <span class="badge bg-success">Open</span>
                    @else
                      <span class="badge bg-secondary">Closed</span>
                    @endif
                  </td>
                  <td>{{ $course->duration ?? '—' }}</td>
                  <td>{{ $course->day ?? '—' }}</td>
                  <td>{{ $course->time ?? '—' }}</td>
                  <td>{{ $course->created_at->format('Y-m-d') }}</td>
                  <td>
                    <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn-action btn-action-edit" title="Edit">
                      <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this course?');">
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
          <i class="fas fa-graduation-cap" style="font-size: 48px; margin-bottom: 16px; opacity: 0.3;"></i>
          <p style="margin: 0;">No courses found. <a href="{{ route('admin.courses.create') }}" style="color: var(--primary);">Create your first course</a></p>
        </div>
      @endif
    </div>
  </div>
</div>
@endsection
