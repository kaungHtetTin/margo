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
<section id="company" class="company-section">
  <div class="company-section-bg"></div>
  <div class="container position-relative">
    <div class="gallery-header" data-aos="fade-up">
      <span class="gallery-label">{{ __('common.company_label') }}</span>
      <h2 class="gallery-title">{{ $siteSettings['company_name'] ?? __('common.company_name') }}</h2>
      <p class="gallery-subtitle">{{ $siteSettings['company_description'] ?? __('common.company_tagline') }}</p>
      <div class="gallery-title-line"></div>
    </div>

    <!-- About Our Company -->
    <div class="company-subsection company-about" data-aos="fade-up">
      <div class="company-about-grid">
        <div class="company-media">
          <div class="company-media-inner" style="background-image: url('{{ asset('assets/img/margo_4.JPG') }}');"></div>
        </div>
        <div class="company-content">
          <h3 class="company-subtitle">{{ __('common.about_our_company') }}</h3>
          <p class="company-text">{{ __('common.about_company_text') }}</p>
        </div>
      </div>
    </div>

    <!-- KAUNG PYAE Japanese Language Center -->
    <div class="company-subsection company-kaung-pyae" data-aos="fade-up">
      <div class="company-about-grid company-about-grid-reverse">
        <div class="company-media company-media-logo">
          <div class="company-kaung-pyae-logo">
            <img src="{{ asset('assets/img/language_center_logo.jpg') }}" alt="{{ __('common.kaung_pyae_title') }}">
          </div>
        </div>
        <div class="company-content">
          <h3 class="company-subtitle">{{ __('common.kaung_pyae_title') }}</h3>
          <p class="company-text">{{ __('common.kaung_pyae_text') }}</p>
        </div>
      </div>
    </div>

    <!-- Vision and Mission -->
    <div class="company-subsection" data-aos="fade-up">
      <div class="company-vision-mission">
        <div class="company-vm-card">
          <div class="company-vm-icon"><i class="fas fa-eye"></i></div>
          <h4 class="company-vm-title">{{ __('common.vision_title') }}</h4>
          <p class="company-vm-text">{{ __('common.vision_text') }}</p>
        </div>
        <div class="company-vm-card">
          <div class="company-vm-icon"><i class="fas fa-bullseye"></i></div>
          <h4 class="company-vm-title">{{ __('common.mission_title') }}</h4>
          <p class="company-vm-text">{{ __('common.mission_text') }}</p>
        </div>
      </div>
    </div>

    <!-- Meet Our Team -->
    <div class="company-subsection company-team" data-aos="fade-up">
      <div class="company-about-grid company-about-grid-reverse">
        <div class="company-media">
          <div class="company-media-inner" style="background-image: url('{{ asset('assets/img/margo_10.JPG') }}');"></div>
        </div>
        <div class="company-content">
          <h3 class="company-subtitle">{{ __('common.meet_our_team') }}</h3>
          <p class="company-text">{{ __('common.meet_team_text') }}</p>
        </div>
      </div>
    </div>

    <!-- Overseas Employment -->
    <div class="company-subsection" data-aos="fade-up">
      <div class="company-oe-header">
        <h3 class="company-oe-title">{{ __('common.overseas_employment') }}</h3>
        <p class="company-oe-tagline">{{ __('common.overseas_employment_tagline') }}</p>
      </div>
      <div class="company-oe-grid">
        @php
          $oeItems = [
            ['icon' => 'fa-user-plus', 'title' => 'oe_recruiting', 'text' => 'oe_recruiting_text'],
            ['icon' => 'fa-chalkboard-teacher', 'title' => 'oe_training', 'text' => 'oe_training_text'],
            ['icon' => 'fa-chart-line', 'title' => 'oe_development', 'text' => 'oe_development_text'],
            ['icon' => 'fa-briefcase', 'title' => 'oe_employment', 'text' => 'oe_employment_text'],
            ['icon' => 'fa-tasks', 'title' => 'oe_kpi_tracking', 'text' => 'oe_kpi_tracking_text'],
            ['icon' => 'fa-money-bill-wave', 'title' => 'oe_salary_management', 'text' => 'oe_salary_management_text'],
          ];
        @endphp
        @foreach($oeItems as $item)
          <div class="company-oe-card">
            <div class="company-oe-icon"><i class="fas {{ $item['icon'] }}"></i></div>
            <h4 class="company-oe-card-title">{{ __('common.' . $item['title']) }}</h4>
            <p class="company-oe-card-text">{{ __('common.' . $item['text']) }}</p>
          </div>
        @endforeach
      </div>
    </div>

    <!-- Legitimacy and Confidence -->
    <div class="company-subsection company-legitimacy" data-aos="fade-up">
      <div class="company-about-grid">
        <div class="company-media">
          <div class="company-media-inner" style="background-image: url('{{ asset('assets/img/margo_1.JPG') }}');"></div>
        </div>
        <div class="company-content">
          <div class="company-legitimacy-badge"><i class="fas fa-shield-alt"></i></div>
          <h3 class="company-subtitle">{{ __('common.legitimacy_confidence') }}</h3>
          <p class="company-text">{{ __('common.legitimacy_text') }}</p>
        </div>
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
/* Company Section - Redesigned */
.company-section {
  padding: 120px 0 100px;
  background: linear-gradient(180deg, #f8fafc 0%, #ffffff 30%, #f8fafc 70%, #ffffff 100%);
  position: relative;
  overflow: hidden;
}

.company-section-bg {
  position: absolute;
  inset: 0;
  background-image:
    radial-gradient(circle at 10% 30%, rgba(15, 111, 179, 0.04) 0%, transparent 45%),
    radial-gradient(circle at 90% 70%, rgba(41, 169, 225, 0.05) 0%, transparent 45%);
  pointer-events: none;
}

.company-subsection {
  margin-bottom: 80px;
}

.company-subsection:last-child {
  margin-bottom: 0;
}

.company-about-grid {
  display: grid;
  grid-template-columns: 1fr 1.2fr;
  gap: 48px;
  align-items: center;
}

.company-about-grid-reverse {
  direction: rtl;
}

.company-about-grid-reverse > * {
  direction: ltr;
}

.company-media {
  position: relative;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 20px 40px -15px rgba(15, 111, 179, 0.15);
}

.company-media-inner {
  aspect-ratio: 4/3;
  background-size: cover;
  background-position: center;
  transition: transform 0.5s ease;
}

.company-media:hover .company-media-inner {
  transform: scale(1.03);
}

/* KAUNG PYAE - Logo display */
.company-media-logo {
  overflow: visible;
}

.company-media-logo .company-kaung-pyae-logo {
  aspect-ratio: 4/3;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 48px;
  background: linear-gradient(135deg, rgba(15, 111, 179, 0.06) 0%, rgba(41, 169, 225, 0.08) 100%);
  border-radius: 20px;
}

.company-kaung-pyae-logo img {
  max-width: 100%;
  max-height: 180px;
  width: auto;
  height: auto;
  object-fit: contain;
  border-radius: 12px;
  box-shadow: 0 8px 24px -8px rgba(15, 111, 179, 0.2);
  transition: transform 0.3s ease;
}

.company-media-logo:hover .company-kaung-pyae-logo img {
  transform: scale(1.02);
}

.company-content {
  padding: 0 8px;
}

.company-subtitle {
  font-size: 26px;
  font-weight: 700;
  color: var(--text-primary);
  margin-bottom: 20px;
  letter-spacing: -0.02em;
  line-height: 1.2;
}

.company-text {
  font-size: 16px;
  color: var(--text-secondary);
  line-height: 1.8;
  margin: 0;
}

/* Vision & Mission */
.company-vision-mission {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 28px;
}

.company-vm-card {
  padding: 40px 36px;
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid var(--border-color);
  box-shadow: 0 4px 24px -8px rgba(0, 0, 0, 0.08);
  transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
  position: relative;
  overflow: hidden;
}

.company-vm-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 4px;
  height: 100%;
  background: linear-gradient(180deg, var(--primary), var(--secondary));
  transform: scaleY(0);
  transform-origin: bottom;
  transition: transform 0.35s ease;
}

.company-vm-card:hover {
  transform: translateY(-6px);
  border-color: var(--primary);
  box-shadow: 0 20px 40px -15px rgba(15, 111, 179, 0.2);
}

.company-vm-card:hover::before {
  transform: scaleY(1);
}

.company-vm-icon {
  width: 56px;
  height: 56px;
  border-radius: 14px;
  background: linear-gradient(135deg, rgba(15, 111, 179, 0.12) 0%, rgba(41, 169, 225, 0.15) 100%);
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 24px;
}

.company-vm-icon i {
  font-size: 24px;
  color: var(--primary);
}

.company-vm-title {
  font-size: 20px;
  font-weight: 700;
  color: var(--text-primary);
  margin-bottom: 12px;
  letter-spacing: -0.01em;
}

.company-vm-text {
  font-size: 15px;
  color: var(--text-secondary);
  line-height: 1.7;
  margin: 0;
}

/* Overseas Employment */
.company-oe-header {
  text-align: center;
  margin-bottom: 48px;
}

.company-oe-title {
  font-size: 28px;
  font-weight: 700;
  color: var(--text-primary);
  margin-bottom: 12px;
  letter-spacing: -0.02em;
}

.company-oe-tagline {
  font-size: 16px;
  color: var(--text-secondary);
  max-width: 520px;
  margin: 0 auto;
  line-height: 1.6;
}

.company-oe-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
}

.company-oe-card {
  padding: 32px 28px;
  background: #ffffff;
  border-radius: 16px;
  border: 1px solid var(--border-color);
  box-shadow: 0 2px 12px -4px rgba(0, 0, 0, 0.06);
  transition: all 0.3s ease;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
}

.company-oe-card:hover {
  transform: translateY(-4px);
  border-color: var(--primary);
  box-shadow: 0 16px 32px -12px rgba(15, 111, 179, 0.18);
}

.company-oe-icon {
  width: 48px;
  height: 48px;
  border-radius: 12px;
  background: linear-gradient(135deg, rgba(15, 111, 179, 0.1) 0%, rgba(41, 169, 225, 0.12) 100%);
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 20px;
}

.company-oe-icon i {
  font-size: 20px;
  color: var(--primary);
}

.company-oe-card-title {
  font-size: 18px;
  font-weight: 700;
  color: var(--text-primary);
  margin-bottom: 10px;
}

.company-oe-card-text {
  font-size: 14px;
  color: var(--text-secondary);
  line-height: 1.65;
  margin: 0;
}

/* Legitimacy Badge */
.company-legitimacy-badge {
  width: 52px;
  height: 52px;
  border-radius: 14px;
  background: linear-gradient(135deg, var(--primary), var(--secondary));
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 24px;
}

.company-legitimacy-badge i {
  font-size: 22px;
  color: #ffffff;
}

/* Responsive */
@media (max-width: 992px) {
  .company-about-grid,
  .company-about-grid-reverse {
    grid-template-columns: 1fr;
    direction: ltr;
    gap: 32px;
  }

  .company-oe-grid {
    grid-template-columns: repeat(2, 1fr);
  }

  .company-vision-mission {
    grid-template-columns: 1fr;
  }
}

@media (max-width: 768px) {
  .company-section {
    padding: 80px 0 60px;
  }

  .company-subsection {
    margin-bottom: 56px;
  }

  .company-subtitle {
    font-size: 22px;
  }

  .company-oe-grid {
    grid-template-columns: 1fr;
    gap: 16px;
  }

  .company-oe-title {
    font-size: 24px;
  }

  .company-vm-card {
    padding: 28px 24px;
  }
}

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