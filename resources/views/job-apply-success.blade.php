@extends('layouts.app')

@section('title', 'Application Submitted - Margo Manpower')

@section('content')
<!-- Success Page -->
<section id="job-apply-success" style="padding-top: 120px; background: #f9fafb; min-height: calc(100vh - 200px);">
  <div class="container" style="max-width: 600px;">
    <div class="card" style="text-align: center; padding: 48px 32px;">
      <!-- Success Icon -->
      <div style="width: 100px; height: 100px; border-radius: 50%; background: rgba(34, 197, 94, 0.1); display: flex; align-items: center; justify-content: center; margin: 0 auto 24px;">
        <i class="fas fa-check-circle" style="font-size: 48px; color: #22c55e;"></i>
      </div>

      <!-- Success Message -->
      <h2 style="font-size: 28px; font-weight: 600; color: var(--text-primary); margin-bottom: 16px;">
        Application Submitted Successfully!
      </h2>
      
      <p style="font-size: 16px; color: var(--text-secondary); margin-bottom: 8px; line-height: 1.6;">
        Thank you for applying to <strong style="color: var(--text-primary);">{{ $jobForm->title }}</strong>.
      </p>
      
      <p style="font-size: 14px; color: var(--text-secondary); margin-bottom: 32px; line-height: 1.6;">
        We have received your application and will review it shortly. Our team will contact you via the contact information you provided.
      </p>

      <!-- Action Buttons -->
      <div style="display: flex; gap: 12px; justify-content: center; flex-wrap: wrap;">
        <a href="{{ localized_route('job-forms') }}" 
           style="padding: 12px 24px; background: var(--primary); color: white; border: none; border-radius: 6px; font-weight: 500; font-size: 14px; text-decoration: none; transition: all 0.2s ease; display: inline-flex; align-items: center; gap: 8px;"
           onmouseover="this.style.background='#0d5a9a'; this.style.transform='translateY(-1px)'"
           onmouseout="this.style.background='var(--primary)'; this.style.transform='translateY(0)'">
          <i class="fas fa-list"></i>View Other Forms
        </a>
        <a href="{{ localized_route('home') }}" 
           style="padding: 12px 24px; background: white; color: var(--text-primary); border: 1px solid var(--border-color); border-radius: 6px; font-weight: 500; font-size: 14px; text-decoration: none; transition: all 0.2s ease; display: inline-flex; align-items: center; gap: 8px;"
           onmouseover="this.style.background='var(--bg-hover)'; this.style.borderColor='var(--primary)'; this.style.color='var(--primary)'"
           onmouseout="this.style.background='white'; this.style.borderColor='var(--border-color)'; this.style.color='var(--text-primary)'">
          <i class="fas fa-home"></i>Back to Home
        </a>
      </div>
    </div>
  </div>
</section>
@endsection
