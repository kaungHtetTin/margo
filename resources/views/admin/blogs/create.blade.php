@extends('layouts.admin')

@section('page-title', 'Create Blog')

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
      <h2>Create New Blog</h2>
      <nav aria-label="breadcrumb" style="margin-top: 8px;">
        <ol class="breadcrumb" style="background: transparent; padding: 0; margin: 0;">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" style="color: var(--text-secondary); text-decoration: none;">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.blogs.index') }}" style="color: var(--text-secondary); text-decoration: none;">Blogs</a></li>
          <li class="breadcrumb-item active" style="color: var(--text-primary);">Create</li>
        </ol>
      </nav>
    </div>
  </div>

  <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-lg-8">
        <div class="admin-card">
          <div class="card-header">
            <h5 class="mb-0"><i class="fas fa-plus me-2"></i>Blog Details</h5>
          </div>
          <div class="card-body">
            <div class="mb-3">
              <label for="title" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Title <span style="color: #dc3545;">*</span></label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="Enter blog title" required>
              @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="excerpt" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Excerpt</label>
              <textarea class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt" rows="3" placeholder="Short description of the blog">{{ old('excerpt') }}</textarea>
              <small class="text-muted" style="font-size: 12px;">Brief summary of the blog (optional)</small>
              @error('excerpt')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="body" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Content <span style="color: #dc3545;">*</span></label>
              <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="12" placeholder="Write your blog content here" required>{{ old('body') }}</textarea>
              @error('body')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="body_images" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Body Images</label>
              <input type="file" class="form-control @error('body_images.*') is-invalid @enderror" id="body_images" name="body_images[]" multiple accept="image/*">
              <small class="text-muted" style="font-size: 12px;">You can select multiple images to add to the blog body (max 2MB per image)</small>
              @error('body_images.*')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="admin-card">
          <div class="card-header">
            <h5 class="mb-0"><i class="fas fa-cog me-2"></i>Settings</h5>
          </div>
          <div class="card-body">
            <div class="mb-3">
              <label for="featured_image" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Featured Image</label>
              <input type="file" class="form-control @error('featured_image') is-invalid @enderror" id="featured_image" name="featured_image" accept="image/*">
              <small class="text-muted" style="font-size: 12px;">Main cover image for the blog (max 2MB)</small>
              @error('featured_image')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              <div id="featured_image_preview" style="margin-top: 10px; display: none;">
                <img id="featured_image_preview_img" src="" alt="Preview" style="max-width: 100%; border-radius: 8px; border: 1px solid var(--border-color);">
              </div>
            </div>

            <div class="mb-3">
              <label for="category" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Category</label>
              <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" value="{{ old('category') }}" placeholder="e.g., Career Tips">
              @error('category')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="tags" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Tags</label>
              <input type="text" class="form-control @error('tags') is-invalid @enderror" id="tags" name="tags" value="{{ old('tags') }}" placeholder="tag1, tag2, tag3">
              <small class="text-muted" style="font-size: 12px;">Separate tags with commas</small>
              @error('tags')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="status" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Status <span style="color: #dc3545;">*</span></label>
              <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Published</option>
                <option value="archived" {{ old('status') === 'archived' ? 'selected' : '' }}>Archived</option>
              </select>
              @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="published_at" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Published At</label>
              <input type="datetime-local" class="form-control @error('published_at') is-invalid @enderror" id="published_at" name="published_at" value="{{ old('published_at') }}">
              <small class="text-muted" style="font-size: 12px;">Schedule publication date (optional)</small>
              @error('published_at')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>

        <div class="admin-card">
          <div class="card-header">
            <h5 class="mb-0"><i class="fas fa-search me-2"></i>SEO Settings</h5>
          </div>
          <div class="card-body">
            <div class="mb-3">
              <label for="meta_title" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Meta Title</label>
              <input type="text" class="form-control @error('meta_title') is-invalid @enderror" id="meta_title" name="meta_title" value="{{ old('meta_title') }}" placeholder="SEO title">
              @error('meta_title')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="meta_description" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Meta Description</label>
              <textarea class="form-control @error('meta_description') is-invalid @enderror" id="meta_description" name="meta_description" rows="3" placeholder="SEO description">{{ old('meta_description') }}</textarea>
              @error('meta_description')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>

        <div class="d-flex gap-2 mt-4">
          <button type="submit" class="btn btn-admin w-100">
            <i class="fas fa-save me-2"></i>Create Blog
          </button>
         
        </div>
      </div>
    </div>
  </form>
</div>

<script>
  // Featured image preview
  document.getElementById('featured_image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById('featured_image_preview').style.display = 'block';
        document.getElementById('featured_image_preview_img').src = e.target.result;
      };
      reader.readAsDataURL(file);
    } else {
      document.getElementById('featured_image_preview').style.display = 'none';
    }
  });
</script>
@endsection
