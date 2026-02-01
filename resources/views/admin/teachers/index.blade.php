@extends('layouts.admin')

@section('page-title', 'Teacher Management')

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
      <h2>Teacher Management</h2>
      <a href="{{ route('admin.teachers.create') }}" class="btn btn-admin">
        <i class="fas fa-plus me-2"></i>Add New Teacher
      </a>
    </div>
  </div>

  <div class="admin-card">
    <div class="card-header">
      <h5 class="mb-0"><i class="fas fa-chalkboard-teacher me-2"></i>All Teachers</h5>
    </div>
    <div class="card-body">
      @if($teachers->count() > 0)
        <div class="table-responsive">
          <table class="table admin-table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Specialization</th>
                <th>Status</th>
                <th>Created</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($teachers as $teacher)
                <tr>
                  <td>{{ $teacher->id }}</td>
                  <td>
                    @if($teacher->image)
                      <img src="{{ storage_url($teacher->image) }}" alt="{{ $teacher->name }}" style="width: 40px; height: 40px; object-fit: cover; border-radius: 8px;">
                    @else
                      <div style="width: 40px; height: 40px; border-radius: 8px; background: var(--bg-hover); display: flex; align-items: center; justify-content: center; color: var(--text-secondary);">
                        <i class="fas fa-user"></i>
                      </div>
                    @endif
                  </td>
                  <td style="font-weight: 500;">{{ $teacher->name }}</td>
                  <td>{{ $teacher->email }}</td>
                  <td>{{ $teacher->specialization ?? '—' }}</td>
                  <td>
                    @if($teacher->status === 'active')
                      <span class="badge bg-success">Active</span>
                    @else
                      <span class="badge bg-secondary">Inactive</span>
                    @endif
                  </td>
                  <td>{{ $teacher->created_at->format('Y-m-d') }}</td>
                  <td>
                    <a href="{{ route('admin.teachers.show', $teacher->id) }}" class="btn-action btn-action-view" title="View">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.teachers.edit', $teacher->id) }}" class="btn-action btn-action-edit" title="Edit">
                      <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.teachers.destroy', $teacher->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this teacher?');">
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
          <i class="fas fa-chalkboard-teacher" style="font-size: 48px; margin-bottom: 16px; opacity: 0.3;"></i>
          <p style="margin: 0;">No teachers found. <a href="{{ route('admin.teachers.create') }}" style="color: var(--primary);">Add your first teacher</a></p>
        </div>
      @endif
    </div>
  </div>
</div>
@endsection
