@extends('layouts.admin')

@section('page-title', 'View Blog')

@section('content')
<div class="container-fluid">
  <div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
      <h2>View Blog</h2>
      <div class="d-flex gap-2">
        <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-admin">
          <i class="fas fa-edit me-2"></i>Edit
        </a>
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-primary">
          <i class="fas fa-arrow-left me-2"></i>Back to List
        </a>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-8">
      <div class="admin-card">
        <div class="card-header">
          <h5 class="mb-0"><i class="fas fa-blog me-2"></i>{{ $blog->title }}</h5>
        </div>
        <div class="card-body">
          @if($blog->featured_image)
            <div style="margin-bottom: 24px;">
              <img src="{{ storage_url($blog->featured_image) }}" alt="Featured Image" style="width: 100%; border-radius: 8px; border: 1px solid var(--border-color);">
            </div>
          @endif

          @if($blog->excerpt)
            <div style="padding: 16px; background: var(--bg-hover); border-radius: 8px; margin-bottom: 24px; color: var(--text-secondary); font-style: italic;">
              {{ $blog->excerpt }}
            </div>
          @endif

          <div style="line-height: 1.8; color: var(--text-primary); white-space: pre-wrap;">{{ $blog->body }}</div>

          @if($blog->body_images && count($blog->body_images) > 0)
            <div style="margin-top: 32px;">
              <h6 style="margin-bottom: 16px; color: var(--text-primary);">Body Images</h6>
              <div class="row g-3">
                @foreach($blog->body_images as $image)
                  <div class="col-md-6">
                    <img src="{{ storage_url($image) }}" alt="Body Image" style="width: 100%; border-radius: 8px; border: 1px solid var(--border-color);">
                  </div>
                @endforeach
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="admin-card">
        <div class="card-header">
          <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Blog Information</h5>
        </div>
        <div class="card-body">
          <div style="margin-bottom: 16px;">
            <strong style="color: var(--text-secondary); font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Status</strong>
            <div style="margin-top: 4px;">
              @if($blog->status === 'published')
                <span class="badge bg-success">Published</span>
              @elseif($blog->status === 'draft')
                <span class="badge bg-warning">Draft</span>
              @else
                <span class="badge bg-secondary">Archived</span>
              @endif
            </div>
          </div>

          <div style="margin-bottom: 16px;">
            <strong style="color: var(--text-secondary); font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Author</strong>
            <div style="margin-top: 4px; color: var(--text-primary);">
              {{ $blog->author ? $blog->author->name : 'N/A' }}
            </div>
          </div>

          @if($blog->category)
            <div style="margin-bottom: 16px;">
              <strong style="color: var(--text-secondary); font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Category</strong>
              <div style="margin-top: 4px; color: var(--text-primary);">
                {{ $blog->category }}
              </div>
            </div>
          @endif

          @if($blog->tags && count($blog->tags) > 0)
            <div style="margin-bottom: 16px;">
              <strong style="color: var(--text-secondary); font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Tags</strong>
              <div style="margin-top: 4px;">
                @foreach($blog->tags as $tag)
                  <span class="badge bg-primary" style="margin-right: 4px; margin-bottom: 4px;">{{ $tag }}</span>
                @endforeach
              </div>
            </div>
          @endif

          <div style="margin-bottom: 16px;">
            <strong style="color: var(--text-secondary); font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Views</strong>
            <div style="margin-top: 4px; color: var(--text-primary);">
              {{ $blog->views }}
            </div>
          </div>

          <div style="margin-bottom: 16px;">
            <strong style="color: var(--text-secondary); font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Created</strong>
            <div style="margin-top: 4px; color: var(--text-primary);">
              {{ $blog->created_at->format('F d, Y h:i A') }}
            </div>
          </div>

          @if($blog->published_at)
            <div style="margin-bottom: 16px;">
              <strong style="color: var(--text-secondary); font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Published At</strong>
              <div style="margin-top: 4px; color: var(--text-primary);">
                {{ $blog->published_at->format('F d, Y h:i A') }}
              </div>
            </div>
          @endif

          <div style="margin-bottom: 16px;">
            <strong style="color: var(--text-secondary); font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Slug</strong>
            <div style="margin-top: 4px; color: var(--text-primary); font-family: monospace; font-size: 12px;">
              {{ $blog->slug }}
            </div>
          </div>
        </div>
      </div>

      @if($blog->meta_title || $blog->meta_description)
        <div class="admin-card" style="margin-top: 24px;">
          <div class="card-header">
            <h5 class="mb-0"><i class="fas fa-search me-2"></i>SEO Information</h5>
          </div>
          <div class="card-body">
            @if($blog->meta_title)
              <div style="margin-bottom: 16px;">
                <strong style="color: var(--text-secondary); font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Meta Title</strong>
                <div style="margin-top: 4px; color: var(--text-primary);">
                  {{ $blog->meta_title }}
                </div>
              </div>
            @endif

            @if($blog->meta_description)
              <div style="margin-bottom: 16px;">
                <strong style="color: var(--text-secondary); font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Meta Description</strong>
                <div style="margin-top: 4px; color: var(--text-primary);">
                  {{ $blog->meta_description }}
                </div>
              </div>
            @endif
          </div>
        </div>
      @endif
    </div>
  </div>
</div>
@endsection
