@extends('layouts.app')

@section('title', 'Courses - Margo Manpower')

@section('content')
<!-- Cover Section - School Profile & Cover -->
<section id="courses-cover" class="courses-cover-section">
  <div class="courses-cover-bg" style="background-image: url('{{ asset('assets/img/margo_6.JPG') }}');"></div>
  <div class="courses-cover-overlay"></div>
  <div class="container position-relative">
    <div class="courses-cover-content" data-aos="fade-up">
      <span class="courses-cover-label">{{ __('common.school_label') }}</span>
      <div class="courses-cover-brand">
        <img src="{{ asset('assets/img/language_center_logo.jpg') }}" alt="KAUNG PYAE Japanese Language Center" class="courses-cover-logo">
        <h1 class="courses-cover-title">KAUNG PYAE Japanese Language Center</h1>
      </div>
      <p class="courses-cover-tagline">{{ __('common.courses_cover_tagline') }}</p>
    </div>
  </div>
</section>

<!-- Courses Section -->
<section id="courses" class="courses-main-section">
  <div class="container">
    <div class="gallery-header" data-aos="fade-up">
      <span class="gallery-label">{{ __('common.courses_label') }}</span>
      <h2 class="gallery-title">{{ __('common.available_courses') }}</h2>
      <p class="gallery-subtitle">{{ __('common.courses_tagline') }}</p>
      <div class="gallery-title-line"></div>
    </div>

    @if($courses->count() > 0)
      <div class="row g-4">
        @foreach($courses as $course)
          <div class="col-md-4">
            <article class="course-card" data-aos="fade-up" data-aos-delay="{{ $loop->index % 3 * 75 }}">
            <header class="course-card-header">
              <span class="course-card-level course-card-level-{{ $course->level ?? 'beginner' }}">
                {{ ucfirst($course->level ?? 'Beginner') }}
              </span>
              <h3 class="course-card-title">{{ $course->title }}</h3>
            </header>

            <div class="course-card-body">
              @if($course->description)
                <div class="course-card-block">
                  <h4 class="course-card-label">{{ __('common.course_description') }}</h4>
                  <p class="course-card-description">{{ $course->description }}</p>
                </div>
              @endif

              @if($course->curriculum && (is_array($course->curriculum) ? count($course->curriculum) > 0 : $course->curriculum))
                <div class="course-card-block">
                  <h4 class="course-card-label">{{ __('common.course_curriculum') }}</h4>
                  @if(is_array($course->curriculum))
                    <ul class="course-card-curriculum">
                      @foreach($course->curriculum as $item)
                        <li><i class="fas fa-check"></i> {{ $item }}</li>
                      @endforeach
                    </ul>
                  @else
                    <p class="course-card-description">{{ $course->curriculum }}</p>
                  @endif
                </div>
              @endif

              <div class="course-card-meta">
                @if($course->duration)
                  <div class="course-card-meta-item">
                    <i class="fas fa-clock"></i>
                    <span>{{ $course->duration }}</span>
                  </div>
                @endif
                @if($course->day)
                  <div class="course-card-meta-item">
                    <i class="fas fa-calendar-day"></i>
                    <span>{{ $course->day }}</span>
                  </div>
                @endif
                @if($course->time)
                  <div class="course-card-meta-item">
                    <i class="fas fa-clock"></i>
                    <span>{{ $course->time }}</span>
                  </div>
                @endif
                @if($course->price)
                  <div class="course-card-meta-item course-card-price">
                    <i class="fas fa-tag"></i>
                    <span>${{ number_format($course->price, 2) }}</span>
                  </div>
                @endif
                @if($course->max_students)
                  <div class="course-card-meta-item">
                    <i class="fas fa-users"></i>
                    <span>{{ $course->current_students }}/{{ $course->max_students }} {{ __('common.students') }}</span>
                  </div>
                @endif
                @if($course->start_date)
                  <div class="course-card-meta-item">
                    <i class="fas fa-calendar-alt"></i>
                    <span>{{ $course->start_date->format('M d, Y') }}</span>
                  </div>
                @endif
                @if($course->end_date)
                  <div class="course-card-meta-item">
                    <i class="fas fa-calendar-check"></i>
                    <span>{{ $course->end_date->format('M d, Y') }}</span>
                  </div>
                @endif
              </div>

              @if($course->teacher)
                <div class="course-card-teacher">
                  <div class="course-card-teacher-avatar">
                    @if($course->teacher->image)
                      <img src="{{ asset($course->teacher->image) }}" alt="{{ $course->teacher->name }}">
                    @else
                      <i class="fas fa-user"></i>
                    @endif
                  </div>
                  <div class="course-card-teacher-info">
                    <div class="course-card-teacher-name">{{ $course->teacher->name }}</div>
                    @if($course->teacher->specialization)
                      <div class="course-card-teacher-spec">{{ $course->teacher->specialization }}</div>
                    @endif
                    @if($course->teacher->qualification)
                      <div class="course-card-teacher-qual">{{ $course->teacher->qualification }}</div>
                    @endif
                    @if($course->teacher->experience_years)
                      <div class="course-card-teacher-exp">{{ __('common.years_experience', ['count' => $course->teacher->experience_years]) }}</div>
                    @endif
                  </div>
                </div>
              @endif
            </div>
          </article>
          </div>
        @endforeach
      </div>
    @else
      <div style="text-align: center; padding: 60px 20px;">
        <div style="width: 80px; height: 80px; border-radius: 50%; background: rgba(15, 111, 179, 0.1); display: flex; align-items: center; justify-content: center; margin: 0 auto 24px;">
          <i class="fas fa-book-open" style="font-size: 36px; color: var(--primary);"></i>
        </div>
        <h3 style="font-size: 20px; font-weight: 600; color: var(--text-primary); margin-bottom: 8px;">No Courses Available</h3>
        <p style="font-size: 14px; color: var(--text-secondary);">Check back soon for new course offerings.</p>
      </div>
    @endif
  </div>
</section>

<!-- Teachers Section -->
<section id="teachers" class="teachers-section">
  <div class="container">
    <div class="gallery-header" data-aos="fade-up">
      <span class="gallery-label">{{ __('common.teachers_label') }}</span>
      <h2 class="gallery-title">{{ __('common.our_teachers') }}</h2>
      <p class="gallery-subtitle">{{ __('common.teachers_tagline') }}</p>
      <div class="gallery-title-line"></div>
    </div>

    @if(isset($teachers) && $teachers->count() > 0)
      <div class="row g-4">
        @foreach($teachers as $teacher)
          <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="{{ $loop->index % 4 * 75 }}">
            <div class="teacher-card">
              <div class="teacher-card-image">
                @if($teacher->image)
                  <img src="{{ storage_url($teacher->image) }}" alt="{{ $teacher->name }}">
                @else
                  <div class="teacher-card-placeholder">
                    <i class="fas fa-user"></i>
                  </div>
                @endif
              </div>
              <div class="teacher-card-body">
                <h5 class="teacher-card-name">{{ $teacher->name }}</h5>
                @if($teacher->specialization)
                  <p class="teacher-card-spec">{{ $teacher->specialization }}</p>
                @endif
                @if($teacher->qualification)
                  <p class="teacher-card-qual">{{ $teacher->qualification }}</p>
                @endif
                @if($teacher->experience_years)
                  <p class="teacher-card-exp"><i class="fas fa-award"></i> {{ __('common.years_experience', ['count' => $teacher->experience_years]) }}</p>
                @endif
                @if($teacher->bio)
                  <p class="teacher-card-bio">{{ Str::limit($teacher->bio, 80) }}</p>
                @endif
                @if($teacher->activeCourses->count() > 0)
                  <p class="teacher-card-courses"><i class="fas fa-book"></i> {{ __('common.course_count', ['count' => $teacher->activeCourses->count()]) }}</p>
                @endif
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <div style="text-align: center; padding: 60px 20px;">
        <div style="width: 80px; height: 80px; border-radius: 50%; background: rgba(15, 111, 179, 0.1); display: flex; align-items: center; justify-content: center; margin: 0 auto 24px;">
          <i class="fas fa-chalkboard-teacher" style="font-size: 36px; color: var(--primary);"></i>
        </div>
        <h3 style="font-size: 20px; font-weight: 600; color: var(--text-primary); margin-bottom: 8px;">{{ __('common.no_teachers') }}</h3>
        <p style="font-size: 14px; color: var(--text-secondary);">{{ __('common.no_teachers_message') }}</p>
      </div>
    @endif
  </div>
</section>
@endsection

@push('styles')
<style>
/* Section Header (shared with home) */
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

/* Cover Section */
.courses-cover-section {
  min-height: 50vh;
  min-height: 400px;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-top: 0;
}

.courses-cover-bg {
  position: absolute;
  inset: 0;
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}

.courses-cover-overlay {
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.4);
}

.courses-cover-content {
  position: relative;
  z-index: 1;
  text-align: center;
  color: #ffffff;
  padding: 40px 20px;
}

.courses-cover-brand {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 20px;
  flex-wrap: wrap;
  margin-bottom: 16px;
}

.courses-cover-logo {
  height: 72px;
  width: auto;
  object-fit: contain;
  border-radius: 8px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
}

.courses-cover-brand .courses-cover-title {
  margin-bottom: 0;
}

.courses-cover-label {
  display: inline-block;
  font-size: 13px;
  font-weight: 600;
  letter-spacing: 0.15em;
  text-transform: uppercase;
  color: rgba(255, 255, 255, 0.9);
  margin-bottom: 12px;
}

.courses-cover-title {
  font-size: 42px;
  font-weight: 700;
  letter-spacing: -0.03em;
  margin-bottom: 16px;
  line-height: 1.15;
  text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
}

.courses-cover-tagline {
  font-size: 18px;
  color: rgba(255, 255, 255, 0.95);
  line-height: 1.6;
  max-width: 560px;
  margin: 0 auto;
  text-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);
}

@media (max-width: 768px) {
  .courses-cover-brand {
    flex-direction: column;
    gap: 16px;
  }

  .courses-cover-logo {
    height: 56px;
  }

  .courses-cover-title { font-size: 24px; }
  .courses-cover-tagline { font-size: 16px; }
  .gallery-title { font-size: 28px; }
}

/* Courses Main Section */
.courses-main-section {
  padding: 100px 0;
  background: #ffffff;
}

/* Course Card - Grid Layout (blog-style) */
.course-card {
  background: #ffffff;
  border: 1px solid var(--border-color);
  border-radius: 16px;
  overflow: hidden;
  transition: all 0.3s ease;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
  height: 100%;
  display: flex;
  flex-direction: column;
}

.course-card:hover {
  border-color: var(--primary);
  box-shadow: 0 8px 24px -8px rgba(15, 111, 179, 0.15);
}

.course-card-header {
  padding: 20px 24px;
  border-bottom: 1px solid var(--border-color);
  background: linear-gradient(180deg, #fafbfc 0%, #ffffff 100%);
  display: flex;
  align-items: center;
  gap: 12px;
  flex-wrap: wrap;
  flex-shrink: 0;
}

.course-card-level {
  display: inline-block;
  padding: 6px 14px;
  border-radius: 8px;
  font-size: 12px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  flex-shrink: 0;
}

.course-card-level-beginner {
  background: rgba(34, 197, 94, 0.12);
  color: #16a34a;
}

.course-card-level-intermediate {
  background: rgba(245, 158, 11, 0.12);
  color: #d97706;
}

.course-card-level-advanced {
  background: rgba(239, 68, 68, 0.12);
  color: #dc2626;
}

.course-card-title {
  font-size: 18px;
  font-weight: 600;
  color: var(--text-primary);
  letter-spacing: -0.02em;
  margin: 0;
  line-height: 1.3;
}

.course-card-body {
  padding: 24px;
  flex: 1;
  display: flex;
  flex-direction: column;
}

.course-card-block {
  margin-bottom: 16px;
}

.course-card-block:last-of-type {
  margin-bottom: 0;
}

.course-card-label {
  font-size: 11px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: var(--primary);
  margin-bottom: 8px;
}

.course-card-description {
  font-size: 14px;
  color: var(--text-secondary);
  line-height: 1.6;
  margin: 0;
}

.course-card-curriculum {
  list-style: none;
  padding: 0;
  margin: 0;
}

.course-card-curriculum li {
  padding: 8px 0;
  border-bottom: 1px solid var(--border-color);
  font-size: 13px;
  color: var(--text-primary);
  display: flex;
  align-items: flex-start;
  gap: 10px;
}

.course-card-curriculum li:last-child {
  border-bottom: none;
}

.course-card-curriculum li i {
  color: var(--primary);
  font-size: 11px;
  margin-top: 4px;
  flex-shrink: 0;
}

.course-card-meta {
  display: flex;
  flex-wrap: wrap;
  gap: 12px 16px;
  margin: 16px 0;
  padding: 16px;
  background: var(--bg-hover);
  border-radius: 10px;
  flex-shrink: 0;
}

.course-card-meta-item {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 13px;
  color: var(--text-secondary);
}

.course-card-meta-item i {
  color: var(--primary);
  font-size: 12px;
  width: 16px;
  text-align: center;
}

.course-card-price {
  font-weight: 600;
  color: var(--primary);
}

.course-card-teacher {
  display: flex;
  align-items: flex-start;
  gap: 12px;
  padding: 16px;
  background: linear-gradient(135deg, rgba(15, 111, 179, 0.04) 0%, rgba(41, 169, 225, 0.06) 100%);
  border-radius: 10px;
  border: 1px solid rgba(15, 111, 179, 0.1);
  margin-top: auto;
  flex-shrink: 0;
}

.course-card-teacher-avatar {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: rgba(15, 111, 179, 0.1);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  overflow: hidden;
}

.course-card-teacher-avatar img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.course-card-teacher-avatar i {
  font-size: 18px;
  color: var(--primary);
}

.course-card-teacher-info {
  flex: 1;
  min-width: 0;
}

.course-card-teacher-name {
  font-size: 15px;
  font-weight: 600;
  color: var(--text-primary);
  margin-bottom: 2px;
}

.course-card-teacher-spec {
  font-size: 13px;
  font-weight: 500;
  color: var(--primary);
  margin-bottom: 2px;
}

.course-card-teacher-qual,
.course-card-teacher-exp {
  font-size: 13px;
  color: var(--text-secondary);
  margin-top: 2px;
}

@media (max-width: 768px) {
  .course-card-header,
  .course-card-body {
    padding: 20px;
  }

  .course-card-title {
    font-size: 18px;
  }

  .course-card-meta {
    gap: 16px;
  }
}

/* Teachers Section */
.teachers-section {
  padding: 100px 0;
  background: #f9fafb;
}

.teacher-card {
  background: #ffffff;
  border-radius: 16px;
  overflow: hidden;
  border: 1px solid var(--border-color);
  transition: all 0.3s ease;
  height: 100%;
  box-shadow: 0 2px 12px rgba(0, 0, 0, 0.04);
}

.teacher-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 24px -8px rgba(15, 111, 179, 0.2);
  border-color: var(--primary);
}

.teacher-card-image {
  height: 180px;
  overflow: hidden;
  background: linear-gradient(135deg, var(--primary), var(--secondary));
}

.teacher-card-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.teacher-card-placeholder {
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.teacher-card-placeholder i {
  font-size: 64px;
  color: rgba(255, 255, 255, 0.5);
}

.teacher-card-body {
  padding: 24px;
}

.teacher-card-name {
  font-size: 18px;
  font-weight: 600;
  color: var(--text-primary);
  margin-bottom: 8px;
}

.teacher-card-spec {
  font-size: 14px;
  font-weight: 500;
  color: var(--primary);
  margin-bottom: 4px;
}

.teacher-card-qual,
.teacher-card-exp,
.teacher-card-courses {
  font-size: 13px;
  color: var(--text-secondary);
  margin-bottom: 4px;
}

.teacher-card-bio {
  font-size: 13px;
  color: var(--text-secondary);
  line-height: 1.5;
  margin-top: 12px;
  margin-bottom: 0;
}
</style>
@endpush
