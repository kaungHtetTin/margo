@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero" id="home" style="margin-top: 0;">
  <div class="owl-carousel owl-theme">
    <div class="item" style="background-image:url('{{ asset('assets/img/margo_10.JPG') }}');">
      <div class="hero-overlay" data-aos="fade-up">
        <h1>Overseas Job Opportunities</h1>
        <p>Connecting Myanmar workers with trusted international employers.</p>
        <a href="{{ localized_route('register') }}" class="btn btn-primary">{{ __('common.get_started') }}</a>
      </div>
    </div>
    <div class="item" style="background-image:url('{{ asset('assets/img/margo_6.JPG') }}');">
      <div class="hero-overlay" data-aos="fade-up">
        <h1>Trusted Manpower Services</h1>
        <p>Professional recruitment for skilled and unskilled workers.</p>
        <a href="{{ localized_route('register') }}" class="btn btn-primary">{{ __('common.get_started') }}</a>
      </div>
    </div>
  </div>
</section>

<!-- Company Section -->
<section id="company" style="padding-top: 100px; padding-bottom: 80px; background: #f9fafb;">
  <div class="container">
    <div class="gallery-header" data-aos="fade-up">
      <span class="gallery-label">{{ __('common.company_label') }}</span>
      <h2 class="gallery-title">{{ $siteSettings['company_name'] ?? __('common.company_name') }}</h2>
      <p class="gallery-subtitle">{{ $siteSettings['company_description'] ?? __('common.company_tagline') }}</p>
      <div class="gallery-title-line"></div>
    </div>

    <!-- About Our Company -->
    <div class="row align-items-center mb-5 pb-5" data-aos="fade-up" style="border-bottom: 1px solid var(--border-color);">
      <div class="col-lg-5 mb-4 mb-lg-0">
        <div class="company-img-placeholder" style="aspect-ratio: 4/3; background: linear-gradient(135deg, rgba(15, 111, 179, 0.08) 0%, rgba(41, 169, 225, 0.12) 100%); border-radius: 16px; display: flex; align-items: center; justify-content: center; flex-direction: column; color: var(--text-secondary); border: 1px dashed var(--border-color);">
          <i class="fas fa-building" style="font-size: 48px; margin-bottom: 12px; opacity: 0.5;"></i>
          <span style="font-size: 13px;">{{ __('common.company_label') }} {{ __('common.view') }}</span>
        </div>
      </div>
      <div class="col-lg-7">
        <h3 style="font-size: 24px; font-weight: 600; color: var(--text-primary); margin-bottom: 16px;">{{ __('common.about_our_company') }}</h3>
        <p style="font-size: 16px; color: var(--text-secondary); line-height: 1.75;">{{ __('common.about_company_text') }}</p>
      </div>
    </div>

    <!-- Vision and Mission -->
    <div class="row g-4 mb-5 pb-5" data-aos="fade-up" style="border-bottom: 1px solid var(--border-color);">
      <div class="col-md-6">
        <div style="padding: 28px; background: #ffffff; border-radius: 12px; border: 1px solid var(--border-color); height: 100%; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);">
          <div style="width: 48px; height: 48px; border-radius: 12px; background: rgba(15, 111, 179, 0.1); display: flex; align-items: center; justify-content: center; margin-bottom: 16px;">
            <i class="fas fa-eye" style="font-size: 22px; color: var(--primary);"></i>
          </div>
          <h4 style="font-size: 18px; font-weight: 600; color: var(--text-primary); margin-bottom: 10px;">{{ __('common.vision_title') }}</h4>
          <p style="font-size: 15px; color: var(--text-secondary); line-height: 1.65; margin: 0;">{{ __('common.vision_text') }}</p>
        </div>
      </div>
      <div class="col-md-6">
        <div style="padding: 28px; background: #ffffff; border-radius: 12px; border: 1px solid var(--border-color); height: 100%; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);">
          <div style="width: 48px; height: 48px; border-radius: 12px; background: rgba(15, 111, 179, 0.1); display: flex; align-items: center; justify-content: center; margin-bottom: 16px;">
            <i class="fas fa-bullseye" style="font-size: 22px; color: var(--primary);"></i>
          </div>
          <h4 style="font-size: 18px; font-weight: 600; color: var(--text-primary); margin-bottom: 10px;">{{ __('common.mission_title') }}</h4>
          <p style="font-size: 15px; color: var(--text-secondary); line-height: 1.65; margin: 0;">{{ __('common.mission_text') }}</p>
        </div>
      </div>
    </div>

    <!-- Meet Our Team -->
    <div class="row align-items-center mb-5 pb-5" data-aos="fade-up" style="border-bottom: 1px solid var(--border-color);">
      <div class="col-lg-5 order-lg-2 mb-4 mb-lg-0">
        <div class="company-img-placeholder" style="aspect-ratio: 4/3; background: linear-gradient(135deg, rgba(15, 111, 179, 0.08) 0%, rgba(41, 169, 225, 0.12) 100%); border-radius: 16px; display: flex; align-items: center; justify-content: center; flex-direction: column; color: var(--text-secondary); border: 1px dashed var(--border-color);">
          <i class="fas fa-users" style="font-size: 48px; margin-bottom: 12px; opacity: 0.5;"></i>
          <span style="font-size: 13px;">{{ __('common.meet_our_team') }}</span>
        </div>
      </div>
      <div class="col-lg-7 order-lg-1">
        <h3 style="font-size: 24px; font-weight: 600; color: var(--text-primary); margin-bottom: 16px;">{{ __('common.meet_our_team') }}</h3>
        <p style="font-size: 16px; color: var(--text-secondary); line-height: 1.75;">{{ __('common.meet_team_text') }}</p>
      </div>
    </div>

    <!-- Overseas Employment -->
    <div class="mb-5 pb-5" data-aos="fade-up" style="border-bottom: 1px solid var(--border-color);">
      <div style="text-align: center; margin-bottom: 40px;">
        <h3 style="font-size: 24px; font-weight: 600; color: var(--text-primary); margin-bottom: 8px;">{{ __('common.overseas_employment') }}</h3>
        <p style="font-size: 16px; color: var(--text-secondary); max-width: 560px; margin: 0 auto;">{{ __('common.overseas_employment_tagline') }}</p>
      </div>
      <div class="row g-3">
        <div class="col-6 col-md-4">
          <div style="padding: 20px; background: #ffffff; border-radius: 12px; border: 1px solid var(--border-color); height: 100%; display: flex; align-items: center; gap: 14px; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);">
            <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(15, 111, 179, 0.1); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
              <i class="fas fa-user-plus" style="font-size: 18px; color: var(--primary);"></i>
            </div>
            <span style="font-weight: 600; color: var(--text-primary);">{{ __('common.oe_recruiting') }}</span>
          </div>
        </div>
        <div class="col-6 col-md-4">
          <div style="padding: 20px; background: #ffffff; border-radius: 12px; border: 1px solid var(--border-color); height: 100%; display: flex; align-items: center; gap: 14px; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);">
            <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(15, 111, 179, 0.1); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
              <i class="fas fa-chalkboard-teacher" style="font-size: 18px; color: var(--primary);"></i>
            </div>
            <span style="font-weight: 600; color: var(--text-primary);">{{ __('common.oe_training') }}</span>
          </div>
        </div>
        <div class="col-6 col-md-4">
          <div style="padding: 20px; background: #ffffff; border-radius: 12px; border: 1px solid var(--border-color); height: 100%; display: flex; align-items: center; gap: 14px; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);">
            <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(15, 111, 179, 0.1); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
              <i class="fas fa-chart-line" style="font-size: 18px; color: var(--primary);"></i>
            </div>
            <span style="font-weight: 600; color: var(--text-primary);">{{ __('common.oe_development') }}</span>
          </div>
        </div>
        <div class="col-6 col-md-4">
          <div style="padding: 20px; background: #ffffff; border-radius: 12px; border: 1px solid var(--border-color); height: 100%; display: flex; align-items: center; gap: 14px; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);">
            <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(15, 111, 179, 0.1); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
              <i class="fas fa-briefcase" style="font-size: 18px; color: var(--primary);"></i>
            </div>
            <span style="font-weight: 600; color: var(--text-primary);">{{ __('common.oe_employment') }}</span>
          </div>
        </div>
        <div class="col-6 col-md-4">
          <div style="padding: 20px; background: #ffffff; border-radius: 12px; border: 1px solid var(--border-color); height: 100%; display: flex; align-items: center; gap: 14px; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);">
            <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(15, 111, 179, 0.1); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
              <i class="fas fa-tasks" style="font-size: 18px; color: var(--primary);"></i>
            </div>
            <span style="font-weight: 600; color: var(--text-primary);">{{ __('common.oe_kpi_tracking') }}</span>
          </div>
        </div>
        <div class="col-6 col-md-4">
          <div style="padding: 20px; background: #ffffff; border-radius: 12px; border: 1px solid var(--border-color); height: 100%; display: flex; align-items: center; gap: 14px; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);">
            <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(15, 111, 179, 0.1); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
              <i class="fas fa-money-bill-wave" style="font-size: 18px; color: var(--primary);"></i>
            </div>
            <span style="font-weight: 600; color: var(--text-primary);">{{ __('common.oe_salary_management') }}</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Legitimacy and Confidence -->
    <div class="row align-items-center" data-aos="fade-up">
      <div class="col-lg-5 mb-4 mb-lg-0">
        <div class="company-img-placeholder" style="aspect-ratio: 4/3; background: linear-gradient(135deg, rgba(15, 111, 179, 0.08) 0%, rgba(41, 169, 225, 0.12) 100%); border-radius: 16px; display: flex; align-items: center; justify-content: center; flex-direction: column; color: var(--text-secondary); border: 1px dashed var(--border-color);">
          <i class="fas fa-shield-alt" style="font-size: 48px; margin-bottom: 12px; opacity: 0.5;"></i>
          <span style="font-size: 13px;">{{ __('common.legitimacy_confidence') }}</span>
        </div>
      </div>
      <div class="col-lg-7">
        <h3 style="font-size: 24px; font-weight: 600; color: var(--text-primary); margin-bottom: 16px;">{{ __('common.legitimacy_confidence') }}</h3>
        <p style="font-size: 16px; color: var(--text-secondary); line-height: 1.75;">{{ __('common.legitimacy_text') }}</p>
      </div>
    </div>
  </div>
</section>

<!-- Courses Section -->
<section id="latest-courses" style="padding-top: 80px; padding-bottom: 80px; background: #ffffff;">
  <div class="container">
    <div class="gallery-header" data-aos="fade-up">
      <span class="gallery-label">{{ __('common.courses_label') }}</span>
      <h2 class="gallery-title">{{ __('common.available_courses') }}</h2>
      <p class="gallery-subtitle">{{ __('common.courses_tagline') }}</p>
      <div class="gallery-title-line"></div>
    </div>

    @if(isset($latestCourses) && $latestCourses->count() > 0)
      <div class="row g-4">
        @foreach($latestCourses as $course)
          <div class="col-md-4">
            <div class="card" style="overflow: hidden; display: flex; flex-direction: column; padding: 0; height: 100%; border: 1px solid var(--border-color); border-radius: 12px; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05); transition: all 0.2s ease;">
              <a href="{{ localized_route('course.detail', ['id' => $course->id]) }}" style="text-decoration: none; display: block; flex: 1;">
                <div style="padding: 24px; flex: 1; display: flex; flex-direction: column;">
                  <div style="margin-bottom: 12px;">
                    <span style="display: inline-block; padding: 4px 12px; border-radius: 4px; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; background: rgba(15, 111, 179, 0.1); color: var(--primary);">
                      {{ ucfirst($course->level ?? 'beginner') }}
                    </span>
                  </div>
                  <h5 style="font-size: 18px; font-weight: 600; margin-bottom: 8px; color: var(--text-primary);">
                    {{ Str::limit($course->title, 55) }}
                  </h5>
                  @if($course->description)
                    <p style="font-size: 14px; color: var(--text-secondary); margin-bottom: 12px; line-height: 1.6; flex: 1;">
                      {{ Str::limit(strip_tags($course->description), 100) }}
                    </p>
                  @endif
                  <div style="display: flex; flex-wrap: wrap; gap: 12px; margin-top: auto; padding-top: 12px; border-top: 1px solid var(--border-color); font-size: 12px; color: var(--text-secondary);">
                    @if($course->duration)
                      <span style="display: flex; align-items: center; gap: 4px;"><i class="fas fa-clock"></i> {{ $course->duration }}</span>
                    @endif
                    @if($course->day)
                      <span style="display: flex; align-items: center; gap: 4px;"><i class="fas fa-calendar-day"></i> {{ $course->day }}</span>
                    @endif
                    @if($course->time)
                      <span style="display: flex; align-items: center; gap: 4px;"><i class="fas fa-clock"></i> {{ $course->time }}</span>
                    @endif
                  </div>
                </div>
              </a>
              <div style="padding: 16px 24px; background: #f9fafb; border-top: 1px solid var(--border-color);">
                <a href="{{ localized_route('course.detail', ['id' => $course->id]) }}" style="font-size: 14px; color: var(--primary); font-weight: 500; text-decoration: none;">
                  {{ __('common.view_details') }} →
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <div style="text-align: center; margin-top: 48px;">
        <a href="{{ localized_route('courses') }}" class="btn btn-outline-primary">
          {{ __('common.view_all_courses') }}
        </a>
      </div>
    @else
      <div style="text-align: center; padding: 60px 20px;">
        <div style="width: 80px; height: 80px; border-radius: 50%; background: rgba(15, 111, 179, 0.1); display: flex; align-items: center; justify-content: center; margin: 0 auto 24px;">
          <i class="fas fa-graduation-cap" style="font-size: 36px; color: var(--primary);"></i>
        </div>
        <h3 style="font-size: 20px; font-weight: 600; color: var(--text-primary); margin-bottom: 8px;">No Courses Available</h3>
        <p style="font-size: 14px; color: var(--text-secondary);">Check back soon for new course offerings.</p>
        <a href="{{ localized_route('courses') }}" class="btn btn-outline-primary" style="margin-top: 16px;">{{ __('common.courses_label') }}</a>
      </div>
    @endif
  </div>
</section>

<!-- Latest Blog Section -->
<section id="latest-blogs" style="padding-top: 80px; padding-bottom: 80px; background: #f9fafb;">
  <div class="container">
    <div class="gallery-header" data-aos="fade-up">
      <span class="gallery-label">{{ __('common.blog_label') }}</span>
      <h2 class="gallery-title">{{ __('common.latest_blogs') }}</h2>
      <p class="gallery-subtitle">{{ __('common.latest_blogs_tagline') }}</p>
      <div class="gallery-title-line"></div>
    </div>

    @if(isset($latestBlogs) && $latestBlogs->count() > 0)
      <div class="row g-4">
        @foreach($latestBlogs as $blog)
          <div class="col-md-4">
            <div class="card" style="overflow: hidden; display: flex; flex-direction: column; padding: 0;">

              @if($blog->featured_image)
                <a href="{{ localized_route('blog.detail', ['slug' => $blog->slug]) }}" style="text-decoration: none; display: block;">
                  <div style="height: 200px; background-image: url('{{ storage_url($blog->featured_image) }}'); background-size: cover; background-position: center; position: relative;">
                    <div style="position: absolute; bottom: 8px; left: 8px; background: rgba(0, 0, 0, 0.6); color: white; padding: 4px 8px; border-radius: 4px; font-size: 12px; display: flex; align-items: center; gap: 4px;">
                      <i class="fas fa-eye"></i>
                      <span>{{ $blog->views }}</span>
                    </div>
                  </div>
                </a>
              @else
                <div style="height: 200px; background: linear-gradient(135deg, var(--primary), var(--secondary)); position: relative;">
                  <div style="position: absolute; bottom: 8px; left: 8px; background: rgba(0, 0, 0, 0.6); color: white; padding: 4px 8px; border-radius: 4px; font-size: 12px; display: flex; align-items: center; gap: 4px;">
                    <i class="fas fa-eye"></i>
                    <span>{{ $blog->views }}</span>
                  </div>
                </div>
              @endif

              <div style="padding: 24px; flex: 1; display: flex; flex-direction: column;">
                @if($blog->category)
                  <div style="margin-bottom: 12px;">
                    <span style="display: inline-block; padding: 4px 12px; border-radius: 4px; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; background: rgba(15, 111, 179, 0.1); color: var(--primary);">
                      {{ $blog->category }}
                    </span>
                  </div>
                @endif

                <h5 style="font-size: 18px; font-weight: 600; margin-bottom: 8px; color: var(--text-primary);">
                  <a href="{{ localized_route('blog.detail', ['slug' => $blog->slug]) }}" style="color: inherit; text-decoration: none;">
                    {{ Str::limit($blog->title, 60) }}
                  </a>
                </h5>

                @if($blog->excerpt)
                  <p style="font-size: 14px; color: var(--text-secondary); margin-bottom: 12px; line-height: 1.6; flex: 1;">
                    {{ Str::limit($blog->excerpt, 100) }}
                  </p>
                @else
                  <p style="font-size: 14px; color: var(--text-secondary); margin-bottom: 12px; line-height: 1.6; flex: 1;">
                    {{ Str::limit(strip_tags($blog->body), 100) }}
                  </p>
                @endif

                <div style="display: flex; align-items: center; justify-content: space-between; margin-top: auto; padding-top: 12px; border-top: 1px solid var(--border-color); font-size: 12px; color: var(--text-secondary);">
                  <div style="display: flex; align-items: center; gap: 12px;">
                    @if($blog->published_at)
                      <div style="display: flex; align-items: center; gap: 4px;">
                        <i class="fas fa-calendar"></i>
                        <span>{{ $blog->published_at->format('M d, Y') }}</span>
                      </div>
                    @endif
                  </div>
                  <a href="{{ localized_route('blog.detail', ['slug' => $blog->slug]) }}" style="font-size: 14px; color: var(--primary); font-weight: 500; text-decoration: none;">
                    {{ __('common.read_more') }} →
                  </a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <div style="text-align: center; margin-top: 48px;">
        <a href="{{ localized_route('blogs') }}" class="btn btn-outline-primary">
          {{ __('common.view_all_blogs') }}
        </a>
      </div>
    @else
      <div style="text-align: center; padding: 60px 20px;">
        <div style="width: 80px; height: 80px; border-radius: 50%; background: rgba(15, 111, 179, 0.1); display: flex; align-items: center; justify-content: center; margin: 0 auto 24px;">
          <i class="fas fa-blog" style="font-size: 36px; color: var(--primary);"></i>
        </div>
        <h3 style="font-size: 20px; font-weight: 600; color: var(--text-primary); margin-bottom: 8px;">No Blogs Available</h3>
        <p style="font-size: 14px; color: var(--text-secondary);">Check back soon for new blog posts.</p>
      </div>
    @endif
  </div>
</section>

<!-- Photo Gallery Section -->
<section id="photo-gallery" class="gallery-section">
  <div class="gallery-bg-pattern"></div>
  <div class="container position-relative">
    <div class="gallery-header" data-aos="fade-up">
      <span class="gallery-label">{{ __('common.gallery_label') }}</span>
      <h2 class="gallery-title">{{ __('common.photo_gallery') }}</h2>
      <p class="gallery-subtitle">{{ __('common.photo_gallery_tagline') }}</p>
      <div class="gallery-title-line"></div>
    </div>

    <div class="gallery-grid">
      @php
        $sizes = ['normal', 'tall', 'normal', 'wide', 'normal', 'tall', 'wide', 'normal', 'normal', 'tall', 'normal', 'wide', 'normal'];
      @endphp
      @foreach(range(1, 13) as $i)
        <a href="#" class="gallery-card gallery-card-{{ $sizes[$i - 1] ?? 'normal' }}" data-bs-toggle="modal" data-bs-target="#galleryModal" data-img="{{ asset('assets/img/margo_' . $i . '.JPG') }}" data-aos="fade-up" data-aos-delay="{{ ($i - 1) % 4 * 75 }}">
          <div class="gallery-card-inner">
            <img src="{{ asset('assets/img/margo_' . $i . '.JPG') }}" alt="Margo {{ $i }}" loading="lazy">
            <div class="gallery-card-overlay">
              <span class="gallery-card-icon">
                <i class="fas fa-expand"></i>
              </span>
              <span class="gallery-card-text">{{ __('common.view') }}</span>
            </div>
          </div>
        </a>
      @endforeach
    </div>
  </div>
</section>

<!-- Gallery Lightbox Modal -->
<div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
    <div class="modal-content gallery-modal-content">
      <button type="button" class="btn-close gallery-modal-close" data-bs-dismiss="modal" aria-label="Close"></button>
      <div class="modal-body p-0 d-flex align-items-center justify-content-center">
        <img id="galleryModalImg" src="" alt="Gallery" class="gallery-modal-img">
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  $('.owl-carousel').owlCarousel({
    loop: true,
    margin: 0,
    nav: false,
    items: 1,
    autoplay: true,
    autoplayTimeout: 5000,
    animateOut: 'fadeOut'
  });

  // Gallery lightbox
  document.getElementById('galleryModal')?.addEventListener('show.bs.modal', function(e) {
    const trigger = e.relatedTarget;
    const imgSrc = trigger?.getAttribute('data-img');
    const modalImg = document.getElementById('galleryModalImg');
    if (modalImg && imgSrc) modalImg.src = imgSrc;
  });
</script>
@endsection

@push('styles')
<style>
/* Gallery Section - Modern Design */
.gallery-section {
  padding: 120px 0 100px;
  background: linear-gradient(180deg, #ffffff 0%, #f8fafc 50%, #ffffff 100%);
  position: relative;
  overflow: hidden;
}

.gallery-bg-pattern {
  position: absolute;
  inset: 0;
  background-image:
    radial-gradient(circle at 20% 20%, rgba(15, 111, 179, 0.03) 0%, transparent 50%),
    radial-gradient(circle at 80% 80%, rgba(41, 169, 225, 0.04) 0%, transparent 50%);
  pointer-events: none;
}

.gallery-header {
  text-align: center;
  margin-bottom: 56px;
  max-width: 640px;
  margin-left: auto;
  margin-right: auto;
}

.gallery-label {
  display: inline-block;
  font-size: 13px;
  font-weight: 600;
  letter-spacing: 0.15em;
  text-transform: uppercase;
  color: var(--primary);
  margin-bottom: 12px;
}

.gallery-title {
  font-size: 38px;
  font-weight: 700;
  color: var(--text-primary);
  letter-spacing: -0.03em;
  margin-bottom: 16px;
  line-height: 1.15;
}

.gallery-subtitle {
  font-size: 17px;
  color: var(--text-secondary);
  line-height: 1.65;
  margin-bottom: 20px;
}

.gallery-title-line {
  width: 64px;
  height: 4px;
  background: linear-gradient(90deg, var(--primary), var(--secondary));
  border-radius: 2px;
  margin: 0 auto;
}

/* CSS Grid Masonry-style Gallery */
.gallery-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-auto-rows: 180px;
  gap: 20px;
  grid-auto-flow: dense;
}

.gallery-card {
  display: block;
  text-decoration: none;
  cursor: pointer;
  border-radius: 16px;
  overflow: hidden;
  position: relative;
  transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
}

.gallery-card:hover {
  transform: translateY(-6px) scale(1.02);
  box-shadow: 0 20px 40px -12px rgba(15, 111, 179, 0.25);
}

.gallery-card-inner {
  width: 100%;
  height: 100%;
  overflow: hidden;
  position: relative;
  border-radius: 16px;
}

.gallery-card img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.gallery-card:hover img {
  transform: scale(1.12);
}

.gallery-card-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(180deg, transparent 40%, rgba(15, 111, 179, 0.7) 100%);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  opacity: 0;
  transition: opacity 0.4s ease;
  border-radius: 16px;
}

.gallery-card:hover .gallery-card-overlay {
  opacity: 1;
}

.gallery-card-icon {
  width: 52px;
  height: 52px;
  background: rgba(255, 255, 255, 0.95);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 8px;
  transform: scale(0.8);
  transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.gallery-card-icon i {
  font-size: 20px;
  color: var(--primary);
}

.gallery-card:hover .gallery-card-icon {
  transform: scale(1);
}

.gallery-card-text {
  font-size: 14px;
  font-weight: 600;
  color: #ffffff;
  letter-spacing: 0.05em;
}

/* Grid layout - varied sizes for masonry effect */
.gallery-card-normal {
  grid-row: span 2;
}

.gallery-card-tall {
  grid-row: span 3;
}

.gallery-card-wide {
  grid-column: span 2;
  grid-row: span 2;
}

/* Modal */
.gallery-modal-content {
  background: transparent !important;
  border: none !important;
  box-shadow: none !important;
}

.gallery-modal-close {
  position: absolute;
  top: -48px;
  right: 0;
  z-index: 1055;
  background: rgba(255, 255, 255, 0.9) !important;
  border-radius: 50% !important;
  width: 40px;
  height: 40px;
  opacity: 1;
  padding: 0;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
  transition: all 0.2s ease;
}

.gallery-modal-close:hover {
  background: #ffffff !important;
  transform: scale(1.05);
}

.gallery-modal-img {
  max-width: 100%;
  max-height: 85vh;
  width: auto;
  height: auto;
  border-radius: 16px;
  box-shadow: 0 32px 64px -12px rgba(0, 0, 0, 0.35);
  animation: galleryModalFadeIn 0.3s ease;
}

@keyframes galleryModalFadeIn {
  from { opacity: 0; transform: scale(0.95); }
  to { opacity: 1; transform: scale(1); }
}

/* Responsive */
@media (max-width: 992px) {
  .gallery-grid {
    grid-template-columns: repeat(2, 1fr);
    grid-auto-rows: 160px;
    gap: 16px;
  }

  .gallery-card-wide {
    grid-column: span 2;
  }

  .gallery-card-tall {
    grid-row: span 2;
  }

  .gallery-title {
    font-size: 30px;
  }
}

@media (max-width: 576px) {
  .gallery-section {
    padding: 80px 0 60px;
  }

  .gallery-grid {
    grid-template-columns: 1fr;
    grid-auto-rows: 220px;
    gap: 12px;
  }

  .gallery-card-wide {
    grid-column: span 1;
    grid-row: span 2;
  }

  .gallery-card-tall {
    grid-row: span 2;
  }

  .gallery-title {
    font-size: 26px;
  }

  .gallery-modal-close {
    top: -44px;
    right: 16px;
  }
}
</style>
@endpush