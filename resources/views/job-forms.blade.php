@extends('layouts.app')

@section('title', 'Job Application Forms - Margo Manpower')

@section('content')
<!-- Job Forms -->
<section id="job-forms" style="padding-top: 120px; background: #f9fafb;">
  <div class="container">

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; flex-wrap: wrap; gap: 16px;">
      <div style="flex: 1; min-width: 300px;">
        <h2 class="section-title" style="margin-bottom: 8px;">Job Application Forms</h2>
        <p style="color: var(--text-secondary); font-size: 16px; margin: 0; text-align: center">
          Select a job application form to begin your application process.
        </p>
      </div>
    </div>

    <!-- Search My Application Input -->
    <div style="display: flex; justify-content: center; margin-bottom: 40px;">
      <form action="{{ localized_route('job-forms.search.results') }}" method="GET" style="width: 100%; max-width: 500px; position: relative;">
        <i class="fas fa-search" style="position: absolute; left: 18px; top: 50%; transform: translateY(-50%); color: var(--text-secondary); font-size: 16px; z-index: 1;"></i>
        <input type="text" 
               name="email" 
               placeholder="Search your application by email or phone..." 
               style="width: 100%; padding: 14px 18px 14px 48px; border: 2px solid var(--border-color); border-radius: 12px; font-size: 15px; color: var(--text-primary); background: white; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);"
               onfocus="this.style.borderColor='var(--primary)'; this.style.boxShadow='0 4px 12px rgba(15, 111, 179, 0.15)'"
               onblur="this.style.borderColor='var(--border-color)'; this.style.boxShadow='0 2px 8px rgba(0, 0, 0, 0.05)'">
        <button type="submit" 
                style="position: absolute; right: 8px; top: 50%; transform: translateY(-50%); background: linear-gradient(135deg, var(--primary), var(--secondary)); color: white; border: none; border-radius: 8px; padding: 8px 16px; font-weight: 500; font-size: 14px; cursor: pointer; transition: all 0.2s ease;"
                onmouseover="this.style.transform='translateY(-50%) scale(1.05)'; this.style.boxShadow='0 4px 12px rgba(15, 111, 179, 0.3)'"
                onmouseout="this.style.transform='translateY(-50%) scale(1)'; this.style.boxShadow='none'">
          <i class="fas fa-search me-1"></i>Search
        </button>
      </form>
    </div>
    
    @if(isset($jobForms) && $jobForms->count() > 0)
      <div class="row g-4">
        @foreach($jobForms as $jobForm)
          <div class="col-md-6 col-lg-4">
            <div class="card" style="overflow: hidden; display: flex; flex-direction: column; padding: 0;">
              
              <!-- Thin Gradient Bar at Top -->
              <div style="height: 4px; background: linear-gradient(90deg, var(--primary), var(--secondary));"></div>

              <!-- Content Section -->
              <div style="padding: 24px; flex: 1; display: flex; flex-direction: column;">
                <!-- Status Badge (Top Left) -->
                <div style="margin-bottom: 16px;">
                  <span style="display: inline-block; padding: 6px 14px; border-radius: 20px; font-size: 12px; font-weight: 600; background: rgba(15, 111, 179, 0.1); color: var(--primary);">
                    <i class="fas fa-check-circle me-1" style="font-size: 10px;"></i>Active
                  </span>
                </div>

                <!-- Form Title -->
                <h5 style="font-size: 24px; font-weight: 700; margin-bottom: 16px; color: var(--text-primary); letter-spacing: -0.02em; line-height: 1.2;">
                  {{ $jobForm->title }}
                </h5>
                
                <!-- Description (in green like salary) -->
                @if($jobForm->description)
                  <p style="font-size: 15px; color: #22c55e; font-weight: 500; margin-bottom: 20px; line-height: 1.5;">
                    {{ Str::limit($jobForm->description, 100) }}
                  </p>
                @endif

                <!-- Job Details List with Icons -->
                <div style="margin-bottom: 24px; flex: 1;">
                  <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 12px;">
                    @if($jobForm->formData->count() > 0)
                      @php
                        $textFields = $jobForm->formData->where('type', 'text')->count();
                        $imageFields = $jobForm->formData->where('type', 'image')->count();
                        $requiredFields = $jobForm->formData->where('is_required', true)->count();
                      @endphp
                      
                      <li style="display: flex; align-items: center; gap: 10px; font-size: 14px; color: var(--text-primary);">
                        <i class="fas fa-list-ul" style="color: var(--primary); font-size: 14px; width: 18px; text-align: center;"></i>
                        <span>Fields: {{ $textFields }} text, {{ $imageFields }} image</span>
                      </li>
                      
                      @if($requiredFields > 0)
                        <li style="display: flex; align-items: center; gap: 10px; font-size: 14px; color: var(--text-primary);">
                          <i class="fas fa-asterisk" style="color: #ef4444; font-size: 12px; width: 18px; text-align: center;"></i>
                          <span>Required: {{ $requiredFields }} field(s)</span>
                        </li>
                      @endif
                      
                      <li style="display: flex; align-items: center; gap: 10px; font-size: 14px; color: var(--text-primary);">
                        <i class="fas fa-clock" style="color: var(--primary); font-size: 14px; width: 18px; text-align: center;"></i>
                        <span>Quick Application</span>
                      </li>
                    @else
                      <li style="display: flex; align-items: center; gap: 10px; font-size: 14px; color: var(--text-secondary);">
                        <i class="fas fa-info-circle" style="color: var(--text-secondary); font-size: 14px; width: 18px; text-align: center;"></i>
                        <span>No additional fields required</span>
                      </li>
                    @endif
                  </ul>
                </div>

                <!-- Apply Now Button -->
                <a href="{{ localized_route('job-forms.apply', ['id' => $jobForm->id]) }}" 
                   style="display: flex; align-items: center; justify-content: center; padding: 14px 24px; background: linear-gradient(135deg, var(--primary), var(--secondary)); color: white; text-decoration: none; border-radius: 12px; font-weight: 600; font-size: 15px; transition: all 0.3s ease; width: 100%; margin-top: auto;"
                   onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(15, 111, 179, 0.3)'"
                   onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                  Apply Now
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <div style="text-align: center; padding: 60px 20px;">
        <div style="width: 100px; height: 100px; border-radius: 50%; background: linear-gradient(135deg, rgba(15, 111, 179, 0.1), rgba(41, 169, 225, 0.1)); display: flex; align-items: center; justify-content: center; margin: 0 auto 24px; border: 3px solid rgba(15, 111, 179, 0.1);">
          <i class="fas fa-file-alt" style="font-size: 48px; color: var(--primary);"></i>
        </div>
        <h3 style="font-size: 24px; font-weight: 600; color: var(--text-primary); margin-bottom: 12px;">No Job Forms Available</h3>
        <p style="font-size: 16px; color: var(--text-secondary); max-width: 400px; margin: 0 auto;">Check back soon for new job application forms.</p>
      </div>
    @endif

    <!-- Available Jobs (same data as admin/jobs) - card grid -->
    <div class="available-jobs-section" style="margin-top: 56px; padding-top: 40px; border-top: 1px solid var(--border-color);">
      <div class="gallery-header">
        <span class="gallery-label">{{ __('common.jobs_label') }}</span>
        <h2 class="gallery-title">{{ __('common.available_jobs') }}</h2>
        <p class="gallery-subtitle">{{ __('common.available_jobs_tagline') }}</p>
        <div class="gallery-title-line"></div>
      </div>
      @if(isset($jobs) && $jobs->count() > 0)
        <div class="row g-4">
          @foreach($jobs as $job)
            <div class="col-md-6 col-lg-4">
              <div class="card" style="overflow: hidden; display: flex; flex-direction: column; padding: 0;">
                <div style="height: 4px; background: linear-gradient(90deg, var(--primary), var(--secondary));"></div>
                <div style="padding: 24px; flex: 1; display: flex; flex-direction: column;">
                  <div style="margin-bottom: 16px;">
                    <span style="display: inline-block; padding: 6px 14px; border-radius: 20px; font-size: 12px; font-weight: 600; background: rgba(15, 111, 179, 0.1); color: var(--primary);">
                      <i class="fas fa-briefcase me-1" style="font-size: 10px;"></i>Active
                    </span>
                  </div>
                  <h5 style="font-size: 22px; font-weight: 700; margin-bottom: 16px; color: var(--text-primary); letter-spacing: -0.02em; line-height: 1.2;">
                    {{ $job->title }}
                  </h5>
                  @if($job->description)
                    <p style="font-size: 15px; color: var(--text-secondary); margin-bottom: 20px; line-height: 1.5;">
                      {{ Str::limit($job->description, 100) }}
                    </p>
                  @endif
                  <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 12px; flex: 1;">
                    @if($job->company)
                      <li style="display: flex; align-items: center; gap: 10px; font-size: 14px; color: var(--text-primary);">
                        <i class="fas fa-building" style="color: var(--primary); font-size: 14px; width: 18px; text-align: center;"></i>
                        <span>{{ __('common.job_company') }}: {{ $job->company }}</span>
                      </li>
                    @endif
                    @if($job->location)
                      <li style="display: flex; align-items: center; gap: 10px; font-size: 14px; color: var(--text-primary);">
                        <i class="fas fa-map-marker-alt" style="color: var(--primary); font-size: 14px; width: 18px; text-align: center;"></i>
                        <span>{{ __('common.job_location') }}: {{ $job->location }}</span>
                      </li>
                    @endif
                    @if($job->salary)
                      <li style="display: flex; align-items: center; gap: 10px; font-size: 14px; color: #22c55e; font-weight: 500;">
                        <i class="fas fa-money-bill-wave" style="color: #22c55e; font-size: 14px; width: 18px; text-align: center;"></i>
                        <span>{{ __('common.job_salary') }}: {{ $job->salary }}</span>
                      </li>
                    @endif
                    @if($job->posted_at)
                      <li style="display: flex; align-items: center; gap: 10px; font-size: 14px; color: var(--text-secondary);">
                        <i class="fas fa-calendar" style="color: var(--primary); font-size: 14px; width: 18px; text-align: center;"></i>
                        <span>{{ __('common.job_posted') }}: {{ $job->posted_at->format('Y-m-d') }}</span>
                      </li>
                    @endif
                  </ul>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      @else
        <div style="text-align: center; padding: 40px 20px; background: #fff; border: 1px solid var(--border-color); border-radius: 12px; color: var(--text-secondary);">
          <i class="fas fa-briefcase" style="font-size: 40px; margin-bottom: 12px; opacity: 0.3;"></i>
          <p style="margin: 0;">{{ __('common.no_jobs') }}</p>
          <p style="margin: 8px 0 0 0; font-size: 14px;">{{ __('common.no_jobs_message') }}</p>
        </div>
      @endif
    </div>
  </div>
</section>
@push('styles')
<style>
/* Available Jobs section title - consistent with home page gallery-header */
#job-forms .gallery-header {
  text-align: center;
  margin-bottom: 40px;
  max-width: 640px;
  margin-left: auto;
  margin-right: auto;
}
#job-forms .gallery-label {
  display: inline-block;
  font-size: 13px;
  font-weight: 600;
  letter-spacing: 0.15em;
  text-transform: uppercase;
  color: var(--primary);
  margin-bottom: 12px;
}
#job-forms .gallery-title {
  font-size: 38px;
  font-weight: 700;
  color: var(--text-primary);
  letter-spacing: -0.03em;
  margin-bottom: 16px;
  line-height: 1.15;
}
#job-forms .gallery-subtitle {
  font-size: 17px;
  color: var(--text-secondary);
  line-height: 1.65;
  margin-bottom: 20px;
}
#job-forms .gallery-title-line {
  width: 64px;
  height: 4px;
  background: linear-gradient(90deg, var(--primary), var(--secondary));
  border-radius: 2px;
  margin: 0 auto;
}
@media (max-width: 768px) {
  #job-forms .gallery-title { font-size: 28px; }
  #job-forms .gallery-subtitle { font-size: 15px; }
}
</style>
@endpush
@endsection
