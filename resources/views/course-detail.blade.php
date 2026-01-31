@extends('layouts.app')

@section('title', $course->title . ' - Margo Manpower')

@section('content')
<!-- Course Detail Section -->
<section id="course-detail" style="padding-top: 120px;">
  <div class="container">
    <div class="row">
      <!-- Main Content -->
      <div class="col-lg-8">
        <!-- Course Image -->
        @if($course->image)
          <div style="height: 400px; background-image: url('{{ asset($course->image) }}'); background-size: cover; background-position: center; border-radius: 12px; margin-bottom: 32px;"></div>
        @else
          <div style="height: 400px; background: linear-gradient(135deg, var(--primary), var(--secondary)); border-radius: 12px; margin-bottom: 32px; display: flex; align-items: center; justify-content: center;">
            <i class="fas fa-book" style="font-size: 80px; color: rgba(255, 255, 255, 0.8);"></i>
          </div>
        @endif

        <!-- Course Title and Level -->
        <div style="margin-bottom: 24px;">
          <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 12px;">
            <span style="display: inline-block; padding: 6px 16px; border-radius: 6px; font-size: 13px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em;
              @if($course->level === 'beginner') background: rgba(34, 197, 94, 0.1); color: #22c55e;
              @elseif($course->level === 'intermediate') background: rgba(245, 158, 11, 0.1); color: #f59e0b;
              @else background: rgba(239, 68, 68, 0.1); color: #ef4444;
              @endif">
              {{ ucfirst($course->level) }}
            </span>
            @if($course->status === 'upcoming')
              <span style="display: inline-block; padding: 6px 16px; border-radius: 6px; font-size: 13px; font-weight: 600; background: rgba(59, 130, 246, 0.1); color: #3b82f6;">
                Upcoming
              </span>
            @endif
          </div>
          <h1 style="font-size: 36px; font-weight: 600; color: var(--text-primary); margin-bottom: 16px; letter-spacing: -0.02em;">
            {{ $course->title }}
          </h1>
        </div>

        <!-- Course Description -->
        <div style="margin-bottom: 32px;">
          <h3 style="font-size: 20px; font-weight: 600; color: var(--text-primary); margin-bottom: 12px;">About This Course</h3>
          <p style="font-size: 15px; color: var(--text-secondary); line-height: 1.8;">
            {{ $course->description }}
          </p>
        </div>

        <!-- Curriculum -->
        @if($course->curriculum)
          <div style="margin-bottom: 32px;">
            <h3 style="font-size: 20px; font-weight: 600; color: var(--text-primary); margin-bottom: 16px;">Course Curriculum</h3>
            <div class="card">
              @if(is_array($course->curriculum))
                <ul style="list-style: none; padding: 0; margin: 0;">
                  @foreach($course->curriculum as $item)
                    <li style="padding: 12px 0; border-bottom: 1px solid var(--border-color); display: flex; align-items: center; gap: 12px;">
                      <i class="fas fa-check-circle" style="color: var(--primary); font-size: 16px;"></i>
                      <span style="font-size: 14px; color: var(--text-primary);">{{ $item }}</span>
                    </li>
                  @endforeach
                </ul>
              @else
                <p style="font-size: 14px; color: var(--text-secondary); white-space: pre-line;">{{ $course->curriculum }}</p>
              @endif
            </div>
          </div>
        @endif
      </div>

      <!-- Sidebar -->
      <div class="col-lg-4">
        <div style="position: sticky; top: 100px;">
          <!-- Course Info Card -->
          <div class="card" style="margin-bottom: 24px;">
            @if($course->price)
              <div style="margin-bottom: 20px;">
                <div style="font-size: 13px; color: var(--text-secondary); margin-bottom: 4px;">Course Price</div>
                <div style="font-size: 32px; font-weight: 700; color: var(--primary);">${{ number_format($course->price, 2) }}</div>
              </div>
            @endif

            <div style="display: flex; flex-direction: column; gap: 16px; margin-bottom: 24px;">
              @if($course->duration)
                <div style="display: flex; align-items: center; gap: 12px;">
                  <div style="width: 40px; height: 40px; border-radius: 8px; background: rgba(15, 111, 179, 0.1); display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-clock" style="color: var(--primary); font-size: 18px;"></i>
                  </div>
                  <div>
                    <div style="font-size: 13px; color: var(--text-secondary);">Duration</div>
                    <div style="font-size: 14px; font-weight: 500; color: var(--text-primary);">{{ $course->duration }}</div>
                  </div>
                </div>
              @endif

              @if($course->start_date)
                <div style="display: flex; align-items: center; gap: 12px;">
                  <div style="width: 40px; height: 40px; border-radius: 8px; background: rgba(15, 111, 179, 0.1); display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-calendar" style="color: var(--primary); font-size: 18px;"></i>
                  </div>
                  <div>
                    <div style="font-size: 13px; color: var(--text-secondary);">Start Date</div>
                    <div style="font-size: 14px; font-weight: 500; color: var(--text-primary);">{{ $course->start_date->format('M d, Y') }}</div>
                  </div>
                </div>
              @endif

              @if($course->max_students)
                <div style="display: flex; align-items: center; gap: 12px;">
                  <div style="width: 40px; height: 40px; border-radius: 8px; background: rgba(15, 111, 179, 0.1); display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-users" style="color: var(--primary); font-size: 18px;"></i>
                  </div>
                  <div>
                    <div style="font-size: 13px; color: var(--text-secondary);">Enrollment</div>
                    <div style="font-size: 14px; font-weight: 500; color: var(--text-primary);">
                      {{ $course->current_students }} / {{ $course->max_students }} students
                    </div>
                  </div>
                </div>
              @endif
            </div>

            <button class="btn btn-primary" style="width: 100%;">
              <i class="fas fa-user-plus me-2"></i>Enroll Now
            </button>
          </div>

          <!-- Teacher Card -->
          @if($course->teacher)
            <div class="card">
              <h4 style="font-size: 18px; font-weight: 600; color: var(--text-primary); margin-bottom: 16px;">Instructor</h4>
              <div style="display: flex; align-items: flex-start; gap: 16px;">
                @if($course->teacher->image)
                  <img src="{{ asset($course->teacher->image) }}" alt="{{ $course->teacher->name }}" 
                       style="width: 64px; height: 64px; border-radius: 50%; object-fit: cover;">
                @else
                  <div style="width: 64px; height: 64px; border-radius: 50%; background: rgba(15, 111, 179, 0.1); display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-user" style="color: var(--primary); font-size: 28px;"></i>
                  </div>
                @endif
                <div style="flex: 1;">
                  <h5 style="font-size: 16px; font-weight: 600; color: var(--text-primary); margin-bottom: 4px;">
                    {{ $course->teacher->name }}
                  </h5>
                  @if($course->teacher->specialization)
                    <p style="font-size: 13px; color: var(--text-secondary); margin-bottom: 8px;">
                      {{ $course->teacher->specialization }}
                    </p>
                  @endif
                  @if($course->teacher->experience_years)
                    <p style="font-size: 13px; color: var(--text-secondary); margin-bottom: 8px;">
                      <i class="fas fa-star me-1" style="color: #f59e0b;"></i>
                      {{ $course->teacher->experience_years }} years experience
                    </p>
                  @endif
                  @if($course->teacher->bio)
                    <p style="font-size: 13px; color: var(--text-secondary); line-height: 1.6; margin-top: 8px;">
                      {{ Str::limit($course->teacher->bio, 100) }}
                    </p>
                  @endif
                </div>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
