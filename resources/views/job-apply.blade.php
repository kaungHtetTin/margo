@extends('layouts.app')

@section('title', 'Apply for ' . $jobForm->title . ' - Margo Manpower')

@section('content')
<!-- Job Application Form -->
<section id="job-apply" style="padding-top: 120px; background: #f9fafb; min-height: calc(100vh - 200px);">
  <div class="container" style="max-width: 800px;">
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 8px; margin-bottom: 24px; background: #d1fae5; border: 1px solid #10b981; color: #065f46;">
        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @if(session('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 8px; margin-bottom: 24px; background: #fee2e2; border: 1px solid #ef4444; color: #991b1b;">
        <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @if($errors->any())
      <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 8px; margin-bottom: 24px; background: #fee2e2; border: 1px solid #ef4444; color: #991b1b;">
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

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" style="margin-bottom: 24px;">
      <ol class="breadcrumb" style="background: transparent; padding: 0; margin: 0;">
        <li class="breadcrumb-item">
          <a href="{{ localized_route('home') }}" style="color: var(--text-secondary); text-decoration: none;">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ localized_route('job-forms') }}" style="color: var(--text-secondary); text-decoration: none;">Job Forms</a>
        </li>
        <li class="breadcrumb-item active" style="color: var(--text-primary);">Apply</li>
      </ol>
    </nav>

    <!-- Form Card -->
    <div class="card" style="overflow: hidden; padding: 0;">
      <div style="background: linear-gradient(135deg, var(--primary), var(--secondary)); padding: 32px; color: white;">
        <h2 style="font-size: 28px; font-weight: 600; margin: 0 0 8px 0; color: white;">{{ $jobForm->title }}</h2>
        @if($jobForm->description)
          <p style="font-size: 16px; margin: 0; opacity: 0.95; line-height: 1.6;">{{ $jobForm->description }}</p>
        @endif
      </div>

      <div style="padding: 32px;">
        <form action="{{ localized_route('job-forms.apply.store', ['id' => $jobForm->id]) }}" method="POST" enctype="multipart/form-data">
          @csrf

          <!-- Applicant Information Section -->
          <div style="margin-bottom: 32px;">
            <h4 style="font-size: 18px; font-weight: 600; color: var(--text-primary); margin-bottom: 20px; padding-bottom: 12px; border-bottom: 2px solid var(--border-color);">
              <i class="fas fa-user me-2" style="color: var(--primary);"></i>Your Information
            </h4>

            <div class="row g-3">
              <div class="col-md-12">
                <label for="name" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">
                  Full Name <span style="color: #ef4444;">*</span>
                </label>
                <input type="text" 
                       class="form-control @error('name') is-invalid @enderror" 
                       id="name" 
                       name="name" 
                       value="{{ old('name') }}" 
                       placeholder="Enter your full name" 
                       required
                       style="border: 1px solid var(--border-color); border-radius: 6px; padding: 10px 14px; font-size: 14px;">
                @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-md-6">
                <label for="phone" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">
                  Phone Number
                </label>
                <input type="text" 
                       class="form-control @error('phone') is-invalid @enderror" 
                       id="phone" 
                       name="phone" 
                       value="{{ old('phone') }}" 
                       placeholder="Enter your phone number"
                       style="border: 1px solid var(--border-color); border-radius: 6px; padding: 10px 14px; font-size: 14px;">
                @error('phone')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-md-6">
                <label for="emails" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">
                  Email Address(es)
                </label>
                <input type="text" 
                       class="form-control @error('emails') is-invalid @enderror" 
                       id="emails" 
                       name="emails" 
                       value="{{ old('emails') }}" 
                       placeholder="Enter email(s), separated by commas"
                       style="border: 1px solid var(--border-color); border-radius: 6px; padding: 10px 14px; font-size: 14px;">
                <small style="font-size: 12px; color: var(--text-secondary);">You can enter multiple emails separated by commas</small>
                @error('emails')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>

          <!-- Form Fields Section -->
          @if($jobForm->formData->count() > 0)
            <div style="margin-bottom: 32px;">
              <h4 style="font-size: 18px; font-weight: 600; color: var(--text-primary); margin-bottom: 20px; padding-bottom: 12px; border-bottom: 2px solid var(--border-color);">
                <i class="fas fa-clipboard-list me-2" style="color: var(--primary);"></i>Application Details
              </h4>

              <div class="row g-3">
                @foreach($jobForm->formData as $field)
                  <div class="col-12">
                    <label for="field_{{ $field->id }}" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">
                      {{ $field->title }}
                      @if($field->is_required)
                        <span style="color: #ef4444;">*</span>
                      @endif
                    </label>

                    @if($field->type === 'image')
                      <input type="file" 
                             class="form-control @error('field_' . $field->id) is-invalid @enderror" 
                             id="field_{{ $field->id }}" 
                             name="field_{{ $field->id }}" 
                             accept="image/*"
                             @if($field->is_required) required @endif
                             style="border: 1px solid var(--border-color); border-radius: 6px; padding: 10px 14px; font-size: 14px;">
                      <small style="font-size: 12px; color: var(--text-secondary);">Accepted formats: JPG, PNG, GIF, WEBP (Max 5MB)</small>
                      @error('field_' . $field->id)
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                      <div id="preview_{{ $field->id }}" style="margin-top: 12px; display: none;">
                        <img id="preview_img_{{ $field->id }}" src="" alt="Preview" style="max-width: 200px; border-radius: 8px; border: 1px solid var(--border-color);">
                      </div>
                    @else
                      <textarea class="form-control @error('field_' . $field->id) is-invalid @enderror" 
                                id="field_{{ $field->id }}" 
                                name="field_{{ $field->id }}" 
                                rows="4" 
                                placeholder="Enter {{ strtolower($field->title) }}"
                                @if($field->is_required) required @endif
                                style="border: 1px solid var(--border-color); border-radius: 6px; padding: 10px 14px; font-size: 14px; resize: vertical;">{{ old('field_' . $field->id) }}</textarea>
                      @error('field_' . $field->id)
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    @endif
                  </div>
                @endforeach
              </div>
            </div>
          @endif

          <!-- Submit Button -->
          <div style="display: flex; gap: 12px; margin-top: 32px; padding-top: 24px; border-top: 1px solid var(--border-color);">
            <button type="submit" 
                    style="flex: 1; padding: 14px 24px; background: var(--primary); color: white; border: none; border-radius: 6px; font-weight: 500; font-size: 16px; cursor: pointer; transition: all 0.2s ease;"
                    onmouseover="this.style.background='#0d5a9a'; this.style.transform='translateY(-1px)'"
                    onmouseout="this.style.background='var(--primary)'; this.style.transform='translateY(0)'">
              <i class="fas fa-paper-plane me-2"></i>Submit Application
            </button>
            <a href="{{ localized_route('job-forms') }}" 
               style="padding: 14px 24px; background: white; color: var(--text-primary); border: 1px solid var(--border-color); border-radius: 6px; font-weight: 500; font-size: 16px; text-decoration: none; transition: all 0.2s ease; display: inline-flex; align-items: center;"
               onmouseover="this.style.background='var(--bg-hover)'; this.style.borderColor='var(--primary)'; this.style.color='var(--primary)'"
               onmouseout="this.style.background='white'; this.style.borderColor='var(--border-color)'; this.style.color='var(--text-primary)'">
              <i class="fas fa-times me-2"></i>Cancel
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<script>
  // Image preview functionality
  document.querySelectorAll('input[type="file"]').forEach(function(input) {
    input.addEventListener('change', function(e) {
      const file = e.target.files[0];
      if (file) {
        const fieldId = e.target.id.replace('field_', '');
        const previewDiv = document.getElementById('preview_' + fieldId);
        const previewImg = document.getElementById('preview_img_' + fieldId);
        
        if (previewDiv && previewImg) {
          const reader = new FileReader();
          reader.onload = function(e) {
            previewDiv.style.display = 'block';
            previewImg.src = e.target.result;
          };
          reader.readAsDataURL(file);
        }
      }
    });
  });
</script>
@endsection
