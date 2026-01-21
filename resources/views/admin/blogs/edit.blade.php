@extends('layouts.admin')

@section('page-title', 'Edit Blog')

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
      <h2>Edit Blog</h2>
      <nav aria-label="breadcrumb" style="margin-top: 8px;">
        <ol class="breadcrumb" style="background: transparent; padding: 0; margin: 0;">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" style="color: var(--text-secondary); text-decoration: none;">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.blogs.index') }}" style="color: var(--text-secondary); text-decoration: none;">Blogs</a></li>
          <li class="breadcrumb-item active" style="color: var(--text-primary);">Edit</li>
        </ol>
      </nav>
    </div>
  </div>

  <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-lg-8">
        <div class="admin-card">
          <div class="card-header">
            <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Blog Details</h5>
          </div>
          <div class="card-body">
            <div class="mb-3">
              <label for="title" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Title <span style="color: #dc3545;">*</span></label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $blog->title) }}" placeholder="Enter blog title" required>
              @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="excerpt" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Excerpt</label>
              <textarea class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt" rows="3" placeholder="Short description of the blog">{{ old('excerpt', $blog->excerpt) }}</textarea>
              <small class="text-muted" style="font-size: 12px;">Brief summary of the blog (optional)</small>
              @error('excerpt')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="body" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Content <span style="color: #dc3545;">*</span></label>
              <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="12" placeholder="Write your blog content here" required>{{ old('body', $blog->body) }}</textarea>
              @error('body')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="body_images" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Add More Body Images</label>
              <input type="file" class="form-control @error('body_images.*') is-invalid @enderror" id="body_images" name="body_images[]" multiple accept="image/*">
              <small class="text-muted" style="font-size: 12px;">You can select multiple images to add to the blog body (max 2MB per image)</small>
              @error('body_images.*')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            @if($blog->body_images && count($blog->body_images) > 0)
              <div class="mb-3">
                <label class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Current Body Images</label>
                <div class="row g-2" id="body_images_container">
                  @foreach($blog->body_images as $image)
                    <div class="col-md-3" data-image-path="{{ $image }}">
                      <div style="position: relative; border: 1px solid var(--border-color); border-radius: 8px; overflow: hidden;">
                        <img src="{{ storage_url($image) }}" alt="Body Image" style="width: 100%; height: 150px; object-fit: cover;">
                        <button type="button" class="btn btn-sm btn-danger" style="position: absolute; top: 5px; right: 5px; padding: 4px 8px;" onclick="removeBodyImage({{ $blog->id }}, '{{ $image }}', this)">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
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
            <h5 class="mb-0"><i class="fas fa-cog me-2"></i>Settings</h5>
          </div>
          <div class="card-body">
            <div class="mb-3">
              <label for="featured_image" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Featured Image</label>
              @if($blog->featured_image)
                <div style="margin-bottom: 10px;">
                  <img src="{{ storage_url($blog->featured_image) }}" alt="Current Featured Image" style="max-width: 100%; border-radius: 8px; border: 1px solid var(--border-color); margin-bottom: 8px;">
                  <small class="text-muted d-block" style="font-size: 12px;">Current featured image</small>
                </div>
              @endif
              <input type="file" class="form-control @error('featured_image') is-invalid @enderror" id="featured_image" name="featured_image" accept="image/*">
              <small class="text-muted" style="font-size: 12px;">Upload new image to replace current one (max 2MB)</small>
              @error('featured_image')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              <div id="featured_image_preview" style="margin-top: 10px; display: none;">
                <img id="featured_image_preview_img" src="" alt="Preview" style="max-width: 100%; border-radius: 8px; border: 1px solid var(--border-color);">
              </div>
            </div>

            <div class="mb-3">
              <label for="category" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Category</label>
              <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" value="{{ old('category', $blog->category) }}" placeholder="e.g., Career Tips">
              @error('category')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="tags" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Tags</label>
              <input type="text" class="form-control @error('tags') is-invalid @enderror" id="tags" name="tags" value="{{ old('tags', is_array($blog->tags) ? implode(', ', $blog->tags) : '') }}" placeholder="tag1, tag2, tag3">
              <small class="text-muted" style="font-size: 12px;">Separate tags with commas</small>
              @error('tags')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="status" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Status <span style="color: #dc3545;">*</span></label>
              <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                <option value="draft" {{ old('status', $blog->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status', $blog->status) === 'published' ? 'selected' : '' }}>Published</option>
                <option value="archived" {{ old('status', $blog->status) === 'archived' ? 'selected' : '' }}>Archived</option>
              </select>
              @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="published_at" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Published At</label>
              <input type="datetime-local" class="form-control @error('published_at') is-invalid @enderror" id="published_at" name="published_at" value="{{ old('published_at', $blog->published_at ? $blog->published_at->format('Y-m-d\TH:i') : '') }}">
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
              <input type="text" class="form-control @error('meta_title') is-invalid @enderror" id="meta_title" name="meta_title" value="{{ old('meta_title', $blog->meta_title) }}" placeholder="SEO title">
              @error('meta_title')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="meta_description" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Meta Description</label>
              <textarea class="form-control @error('meta_description') is-invalid @enderror" id="meta_description" name="meta_description" rows="3" placeholder="SEO description">{{ old('meta_description', $blog->meta_description) }}</textarea>
              @error('meta_description')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>

        <div class="d-flex gap-2 mt-4">
          <button type="submit" class="btn btn-admin w-100">
            <i class="fas fa-save me-2"></i>Update Blog
          </button>
          <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-primary">
            <i class="fas fa-times me-2"></i>Cancel
          </a>
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

  // Remove body image
  function removeBodyImage(blogId, imagePath, button) {
    if (!confirm('Are you sure you want to remove this image?')) {
      return;
    }

    const routeUrl = '{{ route("admin.blogs.remove-image", ":id") }}'.replace(':id', blogId);
    fetch(routeUrl, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
      body: JSON.stringify({ image_path: imagePath })
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        button.closest('.col-md-3').remove();
      } else {
        alert('Error removing image: ' + data.message);
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('An error occurred while removing the image.');
    });
  }
</script>
@endsection
