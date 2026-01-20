@extends('layouts.admin')

@section('page-title', 'FAQ Management')

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
      <h2>FAQ Management</h2>
      <a href="{{ route('admin.faqs.create') }}" class="btn btn-admin">
        <i class="fas fa-plus me-2"></i>Add New FAQ
      </a>
    </div>
  </div>

  <div class="admin-card">
    <div class="card-header">
      <h5 class="mb-0"><i class="fas fa-question-circle me-2"></i>All FAQs</h5>
    </div>
    <div class="card-body">
      @if($faqs->count() > 0)
        <div class="table-responsive">
          <table class="table admin-table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Question</th>
                <th>Order</th>
                <th>Status</th>
                <th>Created</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($faqs as $faq)
                <tr>
                  <td>{{ $faq->id }}</td>
                  <td style="max-width: 400px;">
                    <div style="font-weight: 500; color: var(--text-primary); margin-bottom: 4px;">{{ Str::limit($faq->question, 80) }}</div>
                    <div style="font-size: 12px; color: var(--text-secondary);">{{ Str::limit($faq->answer, 100) }}</div>
                  </td>
                  <td>{{ $faq->order }}</td>
                  <td>
                    @if($faq->is_active)
                      <span class="badge bg-success">Active</span>
                    @else
                      <span class="badge bg-secondary">Inactive</span>
                    @endif
                  </td>
                  <td>{{ $faq->created_at->format('Y-m-d') }}</td>
                  <td>
                    <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn-action btn-action-edit" title="Edit">
                      <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this FAQ?');">
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
          <i class="fas fa-question-circle" style="font-size: 48px; margin-bottom: 16px; opacity: 0.3;"></i>
          <p style="margin: 0;">No FAQs found. <a href="{{ route('admin.faqs.create') }}" style="color: var(--primary);">Create your first FAQ</a></p>
        </div>
      @endif
    </div>
  </div>
</div>
@endsection
