@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')
<div style="max-width: 1400px; margin: 0 auto;">
  <!-- Page Header -->
  <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 32px;">
    <div>
      <h1 style="font-size: 28px; font-weight: 600; color: var(--text-primary); margin: 0 0 8px 0; letter-spacing: -0.02em;">Dashboard</h1>
      <p style="font-size: 14px; color: var(--text-secondary); margin: 0;">Welcome back! Here's what's happening with your business today.</p>
    </div>
  </div>

  <!-- Stats Cards Row -->
  <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px; margin-bottom: 32px;">
    <div class="stats-card">
      <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px;">
        <div>
          <div class="stat-label">Total Applications</div>
          <div class="stat-number">{{ number_format($totalApplications) }}</div>
        </div>
        <div style="width: 48px; height: 48px; border-radius: 12px; background: rgba(15, 111, 179, 0.1); display: flex; align-items: center; justify-content: center;">
          <i class="fas fa-file-alt" style="color: var(--primary); font-size: 20px;"></i>
        </div>
      </div>
      <div style="font-size: 13px; color: var(--text-secondary);">All time job applications</div>
    </div>

    <div class="stats-card">
      <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px;">
        <div>
          <div class="stat-label">Active Jobs</div>
          <div class="stat-number">{{ number_format($activeJobs) }}</div>
        </div>
        <div style="width: 48px; height: 48px; border-radius: 12px; background: rgba(34, 197, 94, 0.1); display: flex; align-items: center; justify-content: center;">
          <i class="fas fa-briefcase" style="color: #22c55e; font-size: 20px;"></i>
        </div>
      </div>
      <a href="{{ route('admin.jobs.index') }}" style="font-size: 13px; color: var(--primary); text-decoration: none;">View jobs</a>
    </div>

    <div class="stats-card">
      <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px;">
        <div>
          <div class="stat-label">Applications This Month</div>
          <div class="stat-number">{{ number_format($applicationsThisMonth) }}</div>
        </div>
        <div style="width: 48px; height: 48px; border-radius: 12px; background: rgba(59, 130, 246, 0.1); display: flex; align-items: center; justify-content: center;">
          <i class="fas fa-calendar-alt" style="color: #3b82f6; font-size: 20px;"></i>
        </div>
      </div>
      @if($applicationsMonthChange !== null)
      <div style="display: flex; align-items: center; gap: 6px; font-size: 13px; color: {{ $applicationsMonthChange >= 0 ? '#22c55e' : '#ef4444' }};">
        <i class="fas fa-arrow-{{ $applicationsMonthChange >= 0 ? 'up' : 'down' }}" style="font-size: 11px;"></i>
        <span>{{ $applicationsMonthChange >= 0 ? '+' : '' }}{{ $applicationsMonthChange }}% from last month</span>
      </div>
      @else
      <div style="font-size: 13px; color: var(--text-secondary);">vs last month</div>
      @endif
    </div>

    <div class="stats-card">
      <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px;">
        <div>
          <div class="stat-label">New This Week</div>
          <div class="stat-number">{{ number_format($applicationsThisWeek) }}</div>
        </div>
        <div style="width: 48px; height: 48px; border-radius: 12px; background: rgba(245, 158, 11, 0.1); display: flex; align-items: center; justify-content: center;">
          <i class="fas fa-calendar-plus" style="color: #f59e0b; font-size: 20px;"></i>
        </div>
      </div>
      @if($applicationsWeekChange !== null)
      <div style="display: flex; align-items: center; gap: 6px; font-size: 13px; color: {{ $applicationsWeekChange >= 0 ? '#22c55e' : '#ef4444' }};">
        <i class="fas fa-arrow-{{ $applicationsWeekChange >= 0 ? 'up' : 'down' }}" style="font-size: 11px;"></i>
        <span>{{ $applicationsWeekChange >= 0 ? '+' : '' }}{{ $applicationsWeekChange }}% from last week</span>
      </div>
      @else
      <div style="font-size: 13px; color: var(--text-secondary);">vs last week</div>
      @endif
    </div>
  </div>

  <!-- Charts Row: Applications per month & per year -->
  <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 32px;">
    <div class="admin-card">
      <div class="card-header">
        <h6 style="margin: 0; font-size: 15px; font-weight: 600; color: var(--text-primary);">Applications per Month (Last 12 Months)</h6>
      </div>
      <div class="card-body">
        <div style="height: 280px; position: relative;">
          <canvas id="applicationsPerMonthChart" height="280"></canvas>
        </div>
      </div>
    </div>
    <div class="admin-card">
      <div class="card-header">
        <h6 style="margin: 0; font-size: 15px; font-weight: 600; color: var(--text-primary);">Applications per Year (Last 6 Years)</h6>
      </div>
      <div class="card-body">
        <div style="height: 280px; position: relative;">
          <canvas id="applicationsPerYearChart" height="280"></canvas>
        </div>
      </div>
    </div>
  </div>

  <!-- Recent Activity -->
  <div style="margin-bottom: 32px;">
    <div class="admin-card">
      <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h6 style="margin: 0; font-size: 15px; font-weight: 600; color: var(--text-primary);">Recent Applications</h6>
        <a href="{{ route('admin.applications.index') }}" class="btn btn-sm btn-outline-primary">View all</a>
      </div>
      <div class="card-body" style="padding: 16px;">
        <div style="display: flex; flex-direction: column; gap: 16px;">
          @forelse($recentApplications as $app)
          <div style="display: flex; gap: 12px;">
            <div style="flex-shrink: 0; width: 40px; height: 40px; border-radius: 50%; background: rgba(59, 130, 246, 0.1); display: flex; align-items: center; justify-content: center;">
              <i class="fas fa-file-alt" style="color: #3b82f6; font-size: 16px;"></i>
            </div>
            <div style="flex: 1;">
              <div style="font-size: 14px; font-weight: 500; color: var(--text-primary); margin-bottom: 4px;">Job application</div>
              <div style="font-size: 13px; color: var(--text-secondary); margin-bottom: 4px;">{{ $app->name }} — {{ $app->job_applications_count }} form field(s)</div>
              <div style="font-size: 12px; color: var(--text-secondary);">{{ $app->created_at->diffForHumans() }}</div>
            </div>
            <a href="{{ route('admin.applications.show', $app->id) }}" class="btn btn-sm btn-outline-primary" style="align-self: center;">View</a>
          </div>
          @empty
          <p style="font-size: 14px; color: var(--text-secondary); margin: 0;">No recent applications.</p>
          @endforelse
        </div>
      </div>
    </div>
  </div>

  <!-- Quick Actions -->
  <div style="display: grid; grid-template-columns: 1fr; gap: 24px;">
    <div class="admin-card">
      <div class="card-header">
        <h6 style="margin: 0; font-size: 15px; font-weight: 600; color: var(--text-primary);">Quick Actions</h6>
      </div>
      <div class="card-body">
        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px;">
          <a href="{{ route('admin.jobs.create') }}" class="btn btn-outline-primary" style="padding: 20px; display: flex; flex-direction: column; align-items: center; gap: 8px; height: 100%; text-decoration: none;">
            <i class="fas fa-plus-circle" style="font-size: 24px;"></i>
            <span style="font-size: 13px; font-weight: 500;">Add New Job</span>
          </a>
          <a href="{{ route('admin.applications.index') }}" class="btn btn-outline-primary" style="padding: 20px; display: flex; flex-direction: column; align-items: center; gap: 8px; height: 100%; text-decoration: none;">
            <i class="fas fa-file-alt" style="font-size: 24px;"></i>
            <span style="font-size: 13px; font-weight: 500;">Applications</span>
          </a>
          <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary" style="padding: 20px; display: flex; flex-direction: column; align-items: center; gap: 8px; height: 100%; text-decoration: none;">
            <i class="fas fa-chart-bar" style="font-size: 24px;"></i>
            <span style="font-size: 13px; font-weight: 500;">Dashboard</span>
          </a>
          <a href="{{ route('admin.settings') }}" class="btn btn-outline-primary" style="padding: 20px; display: flex; flex-direction: column; align-items: center; gap: 8px; height: 100%; text-decoration: none;">
            <i class="fas fa-cog" style="font-size: 24px;"></i>
            <span style="font-size: 13px; font-weight: 500;">Settings</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
/* Responsive adjustments for dashboard */
@media (max-width: 1200px) {
  .admin-content > div[style*="grid-template-columns: 2fr 1fr"] {
    grid-template-columns: 1fr !important;
  }
  
  .admin-content > div[style*="grid-template-columns: 1fr 1fr"] {
    grid-template-columns: 1fr !important;
  }
}

@media (max-width: 768px) {
  .admin-content > div[style*="grid-template-columns"] {
    grid-template-columns: 1fr !important;
  }
  
  .admin-content {
    padding: 20px !important;
  }
}

/* Charts row responsive */
@media (max-width: 900px) {
  .admin-content > div[style*="grid-template-columns: 1fr 1fr"] {
    grid-template-columns: 1fr !important;
  }
}
</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script>
(function () {
  var chartDefaults = {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: { display: false }
    },
    scales: {
      y: {
        beginAtZero: true,
        ticks: { precision: 0 }
      }
    }
  };

  var monthlyData = @json($last12Months);
  var monthlyCtx = document.getElementById('applicationsPerMonthChart');
  if (monthlyCtx) {
    new Chart(monthlyCtx, {
      type: 'bar',
      data: {
        labels: monthlyData.map(function (d) { return d.label; }),
        datasets: [{
          label: 'Applications',
          data: monthlyData.map(function (d) { return d.count; }),
          backgroundColor: 'rgba(15, 111, 179, 0.6)',
          borderColor: 'rgb(15, 111, 179)',
          borderWidth: 1
        }]
      },
      options: chartDefaults
    });
  }

  var yearlyData = @json($last6Years);
  var yearlyCtx = document.getElementById('applicationsPerYearChart');
  if (yearlyCtx) {
    new Chart(yearlyCtx, {
      type: 'bar',
      data: {
        labels: yearlyData.map(function (d) { return d.label; }),
        datasets: [{
          label: 'Applications',
          data: yearlyData.map(function (d) { return d.count; }),
          backgroundColor: 'rgba(34, 197, 94, 0.6)',
          borderColor: 'rgb(34, 197, 94)',
          borderWidth: 1
        }]
      },
      options: chartDefaults
    });
  }
})();
</script>
@endsection