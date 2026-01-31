@extends('layouts.app')

@section('title', 'Search My Application - Margo Manpower')

@section('content')
<!-- Application Search -->
<section id="job-application-search" style="padding-top: 120px; background: #f9fafb; min-height: calc(100vh - 200px);">
  <div class="container" style="max-width: 600px;">
    @if(session('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 8px; margin-bottom: 24px; background: #fee2e2; border: 1px solid #ef4444; color: #991b1b;">
        <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
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
        <li class="breadcrumb-item active" style="color: var(--text-primary);">Search Application</li>
      </ol>
    </nav>

    <!-- Search Card -->
    <div class="card" style="overflow: hidden; padding: 0;">
      <div style="background: linear-gradient(135deg, var(--primary), var(--secondary)); padding: 32px; color: white; text-align: center;">
        <div style="width: 80px; height: 80px; border-radius: 50%; background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; border: 2px solid rgba(255, 255, 255, 0.3);">
          <i class="fas fa-search" style="font-size: 36px; color: white;"></i>
        </div>
        <h2 style="font-size: 28px; font-weight: 600; margin: 0 0 8px 0; color: white;">Search Your Application</h2>
        <p style="font-size: 16px; margin: 0; opacity: 0.95;">Find your submitted job applications</p>
      </div>

      <div style="padding: 32px;">
        <form action="{{ localized_route('job-forms.search.results') }}" method="GET">
          <div class="mb-4">
            <label for="email" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">
              <i class="fas fa-envelope me-2" style="color: var(--primary);"></i>Email Address
            </label>
            <input type="text" 
                   class="form-control @error('email') is-invalid @enderror" 
                   id="email" 
                   name="email" 
                   value="{{ old('email') }}" 
                   placeholder="Enter the email you used when applying"
                   style="border: 1px solid var(--border-color); border-radius: 6px; padding: 12px 14px; font-size: 14px;">
            <small style="font-size: 12px; color: var(--text-secondary); margin-top: 4px; display: block;">Enter the email address you provided in your application</small>
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div style="text-align: center; margin: 24px 0; position: relative;">
            <div style="position: absolute; top: 50%; left: 0; right: 0; height: 1px; background: var(--border-color);"></div>
            <span style="position: relative; background: white; padding: 0 16px; color: var(--text-secondary); font-size: 14px;">OR</span>
          </div>

          <div class="mb-4">
            <label for="phone" class="form-label" style="font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">
              <i class="fas fa-phone me-2" style="color: var(--primary);"></i>Phone Number
            </label>
            <input type="text" 
                   class="form-control @error('phone') is-invalid @enderror" 
                   id="phone" 
                   name="phone" 
                   value="{{ old('phone') }}" 
                   placeholder="Enter the phone number you used when applying"
                   style="border: 1px solid var(--border-color); border-radius: 6px; padding: 12px 14px; font-size: 14px;">
            <small style="font-size: 12px; color: var(--text-secondary); margin-top: 4px; display: block;">Enter the phone number you provided in your application</small>
            @error('phone')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div style="display: flex; gap: 12px; margin-top: 32px;">
            <button type="submit" 
                    style="flex: 1; padding: 14px 24px; background: linear-gradient(135deg, var(--primary), var(--secondary)); color: white; border: none; border-radius: 8px; font-weight: 600; font-size: 15px; cursor: pointer; transition: all 0.3s ease;"
                    onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(15, 111, 179, 0.3)'"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
              <i class="fas fa-search me-2"></i>Search
            </button>
            <a href="{{ localized_route('job-forms') }}" 
               style="padding: 14px 24px; background: white; color: var(--text-primary); border: 1px solid var(--border-color); border-radius: 8px; font-weight: 500; font-size: 15px; text-decoration: none; transition: all 0.2s ease; display: inline-flex; align-items: center;"
               onmouseover="this.style.background='var(--bg-hover)'; this.style.borderColor='var(--primary)'; this.style.color='var(--primary)'"
               onmouseout="this.style.background='white'; this.style.borderColor='var(--border-color)'; this.style.color='var(--text-primary)'">
              <i class="fas fa-times me-2"></i>Cancel
            </a>
          </div>
        </form>
      </div>
    </div>

    <!-- Info Box -->
    <div style="margin-top: 24px; padding: 20px; background: rgba(15, 111, 179, 0.05); border-radius: 8px; border-left: 4px solid var(--primary);">
      <div style="display: flex; align-items: start; gap: 12px;">
        <i class="fas fa-info-circle" style="color: var(--primary); font-size: 20px; margin-top: 2px;"></i>
        <div>
          <strong style="color: var(--text-primary); font-size: 14px; display: block; margin-bottom: 4px;">Need Help?</strong>
          <p style="font-size: 13px; color: var(--text-secondary); margin: 0; line-height: 1.5;">
            Enter the email address or phone number you used when submitting your job application. You can search with either one or both.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
