@extends('layouts.admin')

@section('page-title', 'Blog Management')

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
      <h2>Blog Management</h2>
      <a href="{{ route('admin.blogs.create') }}" class="btn btn-admin">
        <i class="fas fa-plus me-2"></i>Add New Blog
      </a>
    </div>
  </div>

  <div class="admin-card">
    <div class="card-header">
      <h5 class="mb-0"><i class="fas fa-blog me-2"></i>All Blogs</h5>
    </div>
    <div class="card-body">
      @if($blogs->count() > 0)
        <div class="table-responsive">
          <table class="table admin-table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Status</th>
                <th>Views</th>
                <th>Created</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($blogs as $blog)
                <tr>
                  <td>{{ $blog->id }}</td>
                  <td style="max-width: 300px;">
                    <div style="font-weight: 500; color: var(--text-primary); margin-bottom: 4px;">{{ Str::limit($blog->title, 50) }}</div>
                    @if($blog->excerpt)
                      <div style="font-size: 12px; color: var(--text-secondary);">{{ Str::limit($blog->excerpt, 80) }}</div>
                    @endif
                  </td>
                  <td>{{ $blog->author ? $blog->author->name : 'N/A' }}</td>
                  <td>{{ $blog->category ?? 'Uncategorized' }}</td>
                  <td>
                    @if($blog->status === 'published')
                      <span class="badge bg-success">Published</span>
                    @elseif($blog->status === 'draft')
                      <span class="badge bg-warning">Draft</span>
                    @else
                      <span class="badge bg-secondary">Archived</span>
                    @endif
                  </td>
                  <td>{{ $blog->views }}</td>
                  <td>{{ $blog->created_at->format('Y-m-d') }}</td>
                  <td>
                    <a href="{{ route('admin.blogs.show', $blog->id) }}" class="btn-action btn-action-view" title="View">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn-action btn-action-edit" title="Edit">
                      <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this blog?');">
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
          <i class="fas fa-blog" style="font-size: 48px; margin-bottom: 16px; opacity: 0.3;"></i>
          <p style="margin: 0;">No blogs found. <a href="{{ route('admin.blogs.create') }}" style="color: var(--primary);">Create your first blog</a></p>
        </div>
      @endif
    </div>
  </div>
</div>
@endsection
