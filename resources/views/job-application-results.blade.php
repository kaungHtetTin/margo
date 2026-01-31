@extends('layouts.app')

@section('title', 'My Applications - Margo Manpower')

@section('content')
<!-- Application Results -->
<section id="job-application-results" style="padding-top: 120px; background: #f9fafb; min-height: calc(100vh - 200px);">
  <div class="container" style="max-width: 900px;">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" style="margin-bottom: 24px;">
      <ol class="breadcrumb" style="background: transparent; padding: 0; margin: 0;">
        <li class="breadcrumb-item">
          <a href="{{ localized_route('home') }}" style="color: var(--text-secondary); text-decoration: none;">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ localized_route('job-forms') }}" style="color: var(--text-secondary); text-decoration: none;">Job Forms</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ localized_route('job-forms.search') }}" style="color: var(--text-secondary); text-decoration: none;">Search</a>
        </li>
        <li class="breadcrumb-item active" style="color: var(--text-primary);">Results</li>
      </ol>
    </nav>

    <!-- Search Again Button -->
    <div style="margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center;">
      <h2 style="font-size: 28px; font-weight: 600; color: var(--text-primary); margin: 0;">My Applications</h2>
      <a href="{{ localized_route('job-forms.search') }}" 
         style="padding: 10px 20px; background: white; color: var(--primary); border: 1px solid var(--primary); border-radius: 6px; font-weight: 500; font-size: 14px; text-decoration: none; transition: all 0.2s ease; display: inline-flex; align-items: center; gap: 8px;"
         onmouseover="this.style.background='var(--primary)'; this.style.color='white'"
         onmouseout="this.style.background='white'; this.style.color='var(--primary)'">
        <i class="fas fa-search"></i>Search Again
      </a>
    </div>

    @if(count($groupedApplications) > 0)
      <!-- Search Info -->
      <div style="margin-bottom: 24px; padding: 16px; background: rgba(15, 111, 179, 0.05); border-radius: 8px; border-left: 4px solid var(--primary);">
        <p style="font-size: 14px; color: var(--text-primary); margin: 0;">
          <i class="fas fa-info-circle me-2" style="color: var(--primary);"></i>
          Found <strong>{{ count($groupedApplications) }}</strong> application(s) 
          @if($searchEmail)
            for email: <strong>{{ $searchEmail }}</strong>
          @endif
          @if($searchPhone)
            @if($searchEmail), @endif
            for phone: <strong>{{ $searchPhone }}</strong>
          @endif
        </p>
      </div>

      <!-- Applications List -->
      <div style="display: flex; flex-direction: column; gap: 20px;">
        @foreach($groupedApplications as $index => $group)
          <div class="card" style="overflow: hidden; padding: 0;">
            <!-- Thin Gradient Bar -->
            <div style="height: 4px; background: linear-gradient(90deg, var(--primary), var(--secondary));"></div>

            <div style="padding: 24px;">
              <!-- Header (Clickable) -->
              <div style="display: flex; justify-content: space-between; align-items: start; cursor: pointer;"
                   onclick="toggleApplication({{ $index }})"
                   onmouseover="this.style.opacity='0.9'"
                   onmouseout="this.style.opacity='1'">
                <div style="flex: 1;">
                  <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 8px;">
                    <h3 style="font-size: 22px; font-weight: 600; color: var(--text-primary); margin: 0;">
                      {{ $group['jobForm']->title }}
                    </h3>
                    <i class="fas fa-chevron-down application-toggle-icon" 
                       id="toggleIcon{{ $index }}" 
                       style="color: var(--primary); font-size: 14px; transition: transform 0.3s ease;"></i>
                  </div>
                  <div style="display: flex; align-items: center; gap: 16px; font-size: 13px; color: var(--text-secondary);">
                    <span>
                      <i class="fas fa-user me-1"></i>{{ $group['applicant']->name }}
                    </span>
                    <span>
                      <i class="fas fa-calendar me-1"></i>{{ $group['submitted_at']->format('M d, Y h:i A') }}
                    </span>
                  </div>
                </div>
                <span style="padding: 6px 14px; border-radius: 20px; font-size: 12px; font-weight: 600; background: rgba(34, 197, 94, 0.1); color: #22c55e; border: 1px solid rgba(34, 197, 94, 0.2);">
                  Submitted
                </span>
              </div>

              <!-- Collapsible Content -->
              <div class="application-content" 
                   id="applicationContent{{ $index }}" 
                   style="display: none; margin-top: 20px; padding-top: 20px; border-top: 1px solid var(--border-color);">
                
                <!-- Applicant Info -->
                <div style="padding: 16px; background: var(--bg-hover); border-radius: 8px; margin-bottom: 20px;">
                  <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 12px; font-size: 14px;">
                    @if($group['applicant']->phone)
                      <div>
                        <strong style="color: var(--text-secondary); font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Phone</strong>
                        <div style="color: var(--text-primary); margin-top: 4px;">{{ $group['applicant']->phone }}</div>
                      </div>
                    @endif
                    @if($group['applicant']->emails)
                      <div>
                        <strong style="color: var(--text-secondary); font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Email(s)</strong>
                        <div style="color: var(--text-primary); margin-top: 4px;">{{ $group['applicant']->emails }}</div>
                      </div>
                    @endif
                  </div>
                </div>

                <!-- Application Details -->
                <div>
                  <h4 style="font-size: 16px; font-weight: 600; color: var(--text-primary); margin-bottom: 16px;">
                    <i class="fas fa-clipboard-list me-2" style="color: var(--primary);"></i>Application Details
                  </h4>
                  <div style="display: flex; flex-direction: column; gap: 16px;">
                    @foreach($group['applications'] as $application)
                      <div style="padding: 16px; border: 1px solid var(--border-color); border-radius: 8px; background: white;">
                        <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 12px;">
                          <strong style="font-size: 14px; color: var(--text-primary);">
                            {{ $application->jobFormData->title }}
                          </strong>
                          <span style="padding: 4px 10px; border-radius: 12px; font-size: 11px; font-weight: 600; 
                            @if($application->jobFormData->type === 'image') background: rgba(59, 130, 246, 0.1); color: #3b82f6;
                            @else background: rgba(107, 114, 128, 0.1); color: var(--text-secondary);
                            @endif">
                            {{ ucfirst($application->jobFormData->type) }}
                          </span>
                        </div>
                        
                        @if($application->jobFormData->type === 'image')
                          <div style="margin-top: 12px;">
                            <img src="{{ storage_url($application->value) }}" 
                                 alt="{{ $application->jobFormData->title }}" 
                                 style="max-width: 100%; max-height: 300px; border-radius: 8px; border: 1px solid var(--border-color);">
                          </div>
                        @else
                          <div style="margin-top: 8px; padding: 12px; background: var(--bg-hover); border-radius: 6px; font-size: 14px; color: var(--text-primary); line-height: 1.6; white-space: pre-wrap;">
                            {{ $application->value }}
                          </div>
                        @endif
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <!-- No Results -->
      <div class="card" style="text-align: center; padding: 60px 32px;">
        <div style="width: 100px; height: 100px; border-radius: 50%; background: rgba(15, 111, 179, 0.1); display: flex; align-items: center; justify-content: center; margin: 0 auto 24px;">
          <i class="fas fa-search" style="font-size: 48px; color: var(--primary);"></i>
        </div>
        <h3 style="font-size: 24px; font-weight: 600; color: var(--text-primary); margin-bottom: 12px;">No Applications Found</h3>
        <p style="font-size: 16px; color: var(--text-secondary); margin-bottom: 24px; max-width: 400px; margin-left: auto; margin-right: auto;">
          We couldn't find any applications matching your search criteria. Please verify the email or phone number you entered.
        </p>
        <a href="{{ localized_route('job-forms.search') }}" 
           style="display: inline-flex; align-items: center; gap: 8px; padding: 12px 24px; background: var(--primary); color: white; text-decoration: none; border-radius: 8px; font-weight: 500; font-size: 14px; transition: all 0.2s ease;"
           onmouseover="this.style.background='#0d5a9a'"
           onmouseout="this.style.background='var(--primary)'">
          <i class="fas fa-search"></i>Search Again
        </a>
      </div>
    @endif
  </div>
</section>

<script>
  function toggleApplication(index) {
    const content = document.getElementById('applicationContent' + index);
    const icon = document.getElementById('toggleIcon' + index);
    
    if (content.style.display === 'none') {
      content.style.display = 'block';
      icon.style.transform = 'rotate(180deg)';
    } else {
      content.style.display = 'none';
      icon.style.transform = 'rotate(0deg)';
    }
  }
</script>
@endsection
