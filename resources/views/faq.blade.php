@extends('layouts.app')

@section('title', 'FAQ - Margo Manpower')

@section('content')
<!-- FAQ -->
<section id="faq" style="padding-top: 120px; background: #f9fafb;">
  <div class="container">
    <h2 class="section-title">Frequently Asked Questions</h2>
    <p style="text-align: center; color: var(--text-secondary); margin-bottom: 60px; font-size: 16px; max-width: 600px; margin-left: auto; margin-right: auto;">
      Find answers to common questions about our services, job opportunities, and application process.
    </p>
    <div class="row justify-content-center">
      <div class="col-lg-8">
        @if($faqs->count() > 0)
          <div class="accordion" id="faqAccordion">
            @foreach($faqs as $index => $faq)
              <div class="card mb-3" style="overflow: hidden; padding: 0;">
                <div class="card-header" style="background: #ffffff; border-bottom: 1px solid var(--border-color); padding: 0;">
                  <button class="btn btn-link w-100 text-left" type="button" data-bs-toggle="collapse" data-bs-target="#faq{{ $faq->id }}" style="padding: 20px; text-decoration: none; color: var(--text-primary); font-weight: 600; font-size: 16px; display: flex; justify-content: space-between; align-items: center;">
                    <span>{{ $faq->question }}</span>
                    <i class="fas fa-chevron-down" style="transition: transform 0.3s;"></i>
                  </button>
                </div>
                <div id="faq{{ $faq->id }}" class="collapse" data-bs-parent="#faqAccordion">
                  <div class="card-body" style="padding: 20px; color: var(--text-secondary); font-size: 14px; line-height: 1.6;">
                    {{ $faq->answer }}
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        @else
          <div style="text-align: center; padding: 60px 20px; color: var(--text-secondary);">
            <i class="fas fa-question-circle" style="font-size: 64px; margin-bottom: 20px; opacity: 0.3;"></i>
            <p style="font-size: 18px; margin: 0;">No FAQs available at the moment. Please check back later.</p>
          </div>
        @endif
      </div>
    </div>
  </div>
</section>
@endsection

@section('scripts')
<script>
  // Add rotation animation to chevron icons
  document.querySelectorAll('[data-bs-toggle="collapse"]').forEach(button => {
    button.addEventListener('click', function() {
      const icon = this.querySelector('.fa-chevron-down');
      if (icon) {
        const target = document.querySelector(this.getAttribute('data-bs-target'));
        if (target.classList.contains('show')) {
          icon.style.transform = 'rotate(0deg)';
        } else {
          icon.style.transform = 'rotate(180deg)';
        }
      }
    });
  });
</script>
@endsection
