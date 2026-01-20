@extends('layouts.app')

@section('title', 'Courses - Margo Manpower')

@section('content')
<!-- Courses Section -->
<section id="courses" style="padding-top: 120px;">
  <div class="container">
    <h2 class="section-title">Available Courses</h2>
    <p style="text-align: center; color: var(--text-secondary); margin-bottom: 60px; font-size: 16px; max-width: 600px; margin-left: auto; margin-right: auto;">
      Explore our comprehensive courses taught by experienced professionals
    </p>

    @if($courses->count() > 0)
      <div class="row g-4">
        @foreach($courses as $course)
          <div class="col-lg-4 col-md-6">
            <div class="card" style="border: 1px solid var(--border-color); border-radius: 12px; overflow: hidden; transition: all 0.2s ease; height: 100%; display: flex; flex-direction: column;" 
                 onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 10px 15px -3px rgba(0, 0, 0, 0.1)'" 
                 onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 1px 3px rgba(0, 0, 0, 0.05)'">
              
              <!-- Course Image -->
              @if($course->image)
                <div style="height: 200px; background-image: url('{{ asset($course->image) }}'); background-size: cover; background-position: center;"></div>
              @else
                <div style="height: 200px; background: linear-gradient(135deg, var(--primary), var(--secondary)); display: flex; align-items: center; justify-content: center;">
                  <i class="fas fa-book" style="font-size: 48px; color: rgba(255, 255, 255, 0.8);"></i>
                </div>
              @endif

              <!-- Course Content -->
              <div style="padding: 24px; flex: 1; display: flex; flex-direction: column;">
                <!-- Level Badge -->
                <div style="margin-bottom: 12px;">
                  <span style="display: inline-block; padding: 4px 12px; border-radius: 4px; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em;
                    @if($course->level === 'beginner') background: rgba(34, 197, 94, 0.1); color: #22c55e;
                    @elseif($course->level === 'intermediate') background: rgba(245, 158, 11, 0.1); color: #f59e0b;
                    @else background: rgba(239, 68, 68, 0.1); color: #ef4444;
                    @endif">
                    {{ ucfirst($course->level) }}
                  </span>
                </div>

                <!-- Course Title -->
                <h5 style="font-size: 20px; font-weight: 600; margin-bottom: 8px; color: var(--text-primary); letter-spacing: -0.01em;">
                  {{ $course->title }}
                </h5>

                <!-- Course Description -->
                <p style="font-size: 14px; color: var(--text-secondary); margin-bottom: 16px; line-height: 1.6; flex: 1;">
                  {{ Str::limit($course->description, 100) }}
                </p>

                <!-- Teacher Info -->
                @if($course->teacher)
                  <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px; padding: 12px; background: var(--bg-hover); border-radius: 8px;">
                    @if($course->teacher->image)
                      <img src="{{ asset($course->teacher->image) }}" alt="{{ $course->teacher->name }}" 
                           style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                    @else
                      <div style="width: 40px; height: 40px; border-radius: 50%; background: rgba(15, 111, 179, 0.1); display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-user" style="color: var(--primary); font-size: 18px;"></i>
                      </div>
                    @endif
                    <div style="flex: 1;">
                      <div style="font-size: 13px; font-weight: 500; color: var(--text-primary);">{{ $course->teacher->name }}</div>
                      @if($course->teacher->specialization)
                        <div style="font-size: 12px; color: var(--text-secondary);">{{ $course->teacher->specialization }}</div>
                      @endif
                    </div>
                  </div>
                @endif

                <!-- Course Details -->
                <div style="display: flex; flex-wrap: wrap; gap: 12px; margin-bottom: 16px; font-size: 13px; color: var(--text-secondary);">
                  @if($course->duration)
                    <div style="display: flex; align-items: center; gap: 6px;">
                      <i class="fas fa-clock" style="font-size: 12px;"></i>
                      <span>{{ $course->duration }}</span>
                    </div>
                  @endif
                  @if($course->price)
                    <div style="display: flex; align-items: center; gap: 6px;">
                      <i class="fas fa-dollar-sign" style="font-size: 12px;"></i>
                      <span>{{ number_format($course->price, 2) }}</span>
                    </div>
                  @endif
                  @if($course->max_students)
                    <div style="display: flex; align-items: center; gap: 6px;">
                      <i class="fas fa-users" style="font-size: 12px;"></i>
                      <span>{{ $course->current_students }}/{{ $course->max_students }} students</span>
                    </div>
                  @endif
                </div>

                <!-- View Details Button -->
                <a href="{{ route('course.detail', $course->id) }}" class="btn btn-primary" style="width: 100%; text-decoration: none; text-align: center;">
                  View Details
                </a>
              </div>
            </div>
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
@endsection
