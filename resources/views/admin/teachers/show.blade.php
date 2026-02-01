@extends('layouts.admin')

@section('page-title', 'View Teacher')

@section('content')
<div class="container-fluid">
  <div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
      <h2>Teacher Details</h2>
      <div class="d-flex gap-2">
        <a href="{{ route('admin.teachers.edit', $teacher->id) }}" class="btn btn-admin">
          <i class="fas fa-edit me-2"></i>Edit Teacher
        </a>
        <a href="{{ route('admin.teachers.index') }}" class="btn btn-outline-primary">
          <i class="fas fa-arrow-left me-2"></i>Back to List
        </a>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-8">
      <div class="admin-card">
        <div class="card-header">
          <h5 class="mb-0"><i class="fas fa-chalkboard-teacher me-2"></i>{{ $teacher->name }}</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4 mb-4">
              @if($teacher->image)
                <img src="{{ storage_url($teacher->image) }}" alt="{{ $teacher->name }}" style="width: 100%; max-width: 200px; border-radius: 12px; border: 1px solid var(--border-color);">
              @else
                <div style="width: 200px; height: 200px; border-radius: 12px; background: var(--bg-hover); display: flex; align-items: center; justify-content: center; color: var(--text-secondary); font-size: 64px;">
                  <i class="fas fa-user"></i>
                </div>
              @endif
            </div>
            <div class="col-md-8">
              <table class="table table-borderless" style="font-size: 14px;">
                <tr>
                  <td style="width: 140px; color: var(--text-secondary); font-weight: 500;">Email</td>
                  <td>{{ $teacher->email }}</td>
                </tr>
                <tr>
                  <td style="color: var(--text-secondary); font-weight: 500;">Phone</td>
                  <td>{{ $teacher->phone ?? '—' }}</td>
                </tr>
                <tr>
                  <td style="color: var(--text-secondary); font-weight: 500;">Specialization</td>
                  <td>{{ $teacher->specialization ?? '—' }}</td>
                </tr>
                <tr>
                  <td style="color: var(--text-secondary); font-weight: 500;">Qualification</td>
                  <td>{{ $teacher->qualification ?? '—' }}</td>
                </tr>
                <tr>
                  <td style="color: var(--text-secondary); font-weight: 500;">Experience</td>
                  <td>{{ $teacher->experience_years !== null ? $teacher->experience_years . ' years' : '—' }}</td>
                </tr>
                <tr>
                  <td style="color: var(--text-secondary); font-weight: 500;">Status</td>
                  <td>
                    @if($teacher->status === 'active')
                      <span class="badge bg-success">Active</span>
                    @else
                      <span class="badge bg-secondary">Inactive</span>
                    @endif
                  </td>
                </tr>
                <tr>
                  <td style="color: var(--text-secondary); font-weight: 500;">Created</td>
                  <td>{{ $teacher->created_at->format('M d, Y H:i') }}</td>
                </tr>
              </table>
            </div>
          </div>

          @if($teacher->bio)
            <hr style="margin: 24px 0; border-color: var(--border-color);">
            <h6 style="font-weight: 600; color: var(--text-primary); margin-bottom: 8px;">Bio</h6>
            <p style="color: var(--text-secondary); line-height: 1.6; margin: 0; white-space: pre-wrap;">{{ $teacher->bio }}</p>
          @endif

          @if($teacher->social_links && count($teacher->social_links) > 0)
            <hr style="margin: 24px 0; border-color: var(--border-color);">
            <h6 style="font-weight: 600; color: var(--text-primary); margin-bottom: 12px;">Social Links</h6>
            <div class="d-flex flex-wrap gap-2">
              @if(!empty($teacher->social_links['facebook']))
                <a href="{{ $teacher->social_links['facebook'] }}" target="_blank" rel="noopener" class="btn btn-outline-primary btn-sm"><i class="fab fa-facebook-f me-1"></i>Facebook</a>
              @endif
              @if(!empty($teacher->social_links['linkedin']))
                <a href="{{ $teacher->social_links['linkedin'] }}" target="_blank" rel="noopener" class="btn btn-outline-primary btn-sm"><i class="fab fa-linkedin-in me-1"></i>LinkedIn</a>
              @endif
              @if(!empty($teacher->social_links['twitter']))
                <a href="{{ $teacher->social_links['twitter'] }}" target="_blank" rel="noopener" class="btn btn-outline-primary btn-sm"><i class="fab fa-twitter me-1"></i>Twitter</a>
              @endif
              @if(!empty($teacher->social_links['instagram']))
                <a href="{{ $teacher->social_links['instagram'] }}" target="_blank" rel="noopener" class="btn btn-outline-primary btn-sm"><i class="fab fa-instagram me-1"></i>Instagram</a>
              @endif
            </div>
          @endif
        </div>
      </div>

      @if($teacher->courses->count() > 0)
        <div class="admin-card" style="margin-top: 24px;">
          <div class="card-header">
            <h5 class="mb-0"><i class="fas fa-graduation-cap me-2"></i>Courses ({{ $teacher->courses->count() }})</h5>
          </div>
          <div class="card-body">
            <ul class="list-unstyled mb-0">
              @foreach($teacher->courses as $course)
                <li class="mb-2">
                  <a href="{{ route('admin.courses.edit', $course->id) }}" style="color: var(--primary); text-decoration: none;">{{ $course->title }}</a>
                  <span class="text-muted" style="font-size: 13px;"> — {{ $course->status }}</span>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      @endif
    </div>
  </div>
</div>
@endsection
