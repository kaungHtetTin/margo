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
    <div style="display: flex; gap: 12px;">
      <button class="btn btn-outline-primary">
        <i class="fas fa-download" style="margin-right: 8px;"></i>Export Report
      </button>
      <button class="btn-admin">
        <i class="fas fa-plus" style="margin-right: 8px;"></i>Add New
      </button>
    </div>
  </div>

  <!-- Stats Cards Row -->
  <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px; margin-bottom: 32px;">
    <div class="stats-card">
      <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px;">
        <div>
          <div class="stat-label">Total Users</div>
          <div class="stat-number">1,245</div>
        </div>
        <div style="width: 48px; height: 48px; border-radius: 12px; background: rgba(15, 111, 179, 0.1); display: flex; align-items: center; justify-content: center;">
          <i class="fas fa-users" style="color: var(--primary); font-size: 20px;"></i>
        </div>
      </div>
      <div style="display: flex; align-items: center; gap: 6px; font-size: 13px; color: #22c55e;">
        <i class="fas fa-arrow-up" style="font-size: 11px;"></i>
        <span>+12% from last month</span>
      </div>
    </div>

    <div class="stats-card">
      <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px;">
        <div>
          <div class="stat-label">Active Jobs</div>
          <div class="stat-number">89</div>
        </div>
        <div style="width: 48px; height: 48px; border-radius: 12px; background: rgba(34, 197, 94, 0.1); display: flex; align-items: center; justify-content: center;">
          <i class="fas fa-briefcase" style="color: #22c55e; font-size: 20px;"></i>
        </div>
      </div>
      <div style="display: flex; align-items: center; gap: 6px; font-size: 13px; color: #22c55e;">
        <i class="fas fa-arrow-up" style="font-size: 11px;"></i>
        <span>+8% from last month</span>
      </div>
    </div>

    <div class="stats-card">
      <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px;">
        <div>
          <div class="stat-label">Applications</div>
          <div class="stat-number">456</div>
        </div>
        <div style="width: 48px; height: 48px; border-radius: 12px; background: rgba(59, 130, 246, 0.1); display: flex; align-items: center; justify-content: center;">
          <i class="fas fa-file-alt" style="color: #3b82f6; font-size: 20px;"></i>
        </div>
      </div>
      <div style="display: flex; align-items: center; gap: 6px; font-size: 13px; color: #3b82f6;">
        <i class="fas fa-arrow-up" style="font-size: 11px;"></i>
        <span>+15% from last month</span>
      </div>
    </div>

    <div class="stats-card">
      <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px;">
        <div>
          <div class="stat-label">New This Week</div>
          <div class="stat-number">23</div>
        </div>
        <div style="width: 48px; height: 48px; border-radius: 12px; background: rgba(245, 158, 11, 0.1); display: flex; align-items: center; justify-content: center;">
          <i class="fas fa-calendar-plus" style="color: #f59e0b; font-size: 20px;"></i>
        </div>
      </div>
      <div style="display: flex; align-items: center; gap: 6px; font-size: 13px; color: #f59e0b;">
        <i class="fas fa-arrow-up" style="font-size: 11px;"></i>
        <span>+5% from last week</span>
      </div>
    </div>
  </div>

  <!-- Charts and Activity Row -->
  <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px; margin-bottom: 32px;">
    <!-- Chart Area -->
    <div class="admin-card">
      <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h6 style="margin: 0; font-size: 15px; font-weight: 600; color: var(--text-primary);">Analytics Overview</h6>
        <div class="dropdown">
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
              data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
              style="color: var(--text-secondary); text-decoration: none; padding: 4px 8px; border-radius: 6px; transition: all 0.2s;">
            <i class="fas fa-ellipsis-v" style="font-size: 14px;"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
            <div class="dropdown-header" style="font-size: 12px; font-weight: 600; color: var(--text-secondary);">Chart Options:</div>
            <a class="dropdown-item" href="#">Last 7 Days</a>
            <a class="dropdown-item" href="#">Last 30 Days</a>
            <a class="dropdown-item" href="#">Last 3 Months</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div style="height: 300px; background: #f9fafb; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
          <div style="text-align: center;">
            <i class="fas fa-chart-line" style="font-size: 48px; color: var(--text-secondary); margin-bottom: 12px; opacity: 0.5;"></i>
            <p style="font-size: 14px; color: var(--text-secondary); margin: 0;">Chart visualization would be displayed here</p>
            <small style="font-size: 12px; color: var(--text-secondary);">Integration with Chart.js or similar library</small>
          </div>
        </div>
      </div>
    </div>

    <!-- Recent Activity -->
    <div class="admin-card">
      <div class="card-header">
        <h6 style="margin: 0; font-size: 15px; font-weight: 600; color: var(--text-primary);">Recent Activity</h6>
      </div>
      <div class="card-body" style="padding: 16px;">
        <div style="display: flex; flex-direction: column; gap: 16px;">
          <div style="display: flex; gap: 12px;">
            <div style="flex-shrink: 0; width: 40px; height: 40px; border-radius: 50%; background: rgba(15, 111, 179, 0.1); display: flex; align-items: center; justify-content: center;">
              <i class="fas fa-user-plus" style="color: var(--primary); font-size: 16px;"></i>
            </div>
            <div style="flex: 1;">
              <div style="font-size: 14px; font-weight: 500; color: var(--text-primary); margin-bottom: 4px;">New user registered</div>
              <div style="font-size: 13px; color: var(--text-secondary); margin-bottom: 4px;">John Doe joined the platform</div>
              <div style="font-size: 12px; color: var(--text-secondary);">2 minutes ago</div>
            </div>
          </div>
          <div style="display: flex; gap: 12px;">
            <div style="flex-shrink: 0; width: 40px; height: 40px; border-radius: 50%; background: rgba(34, 197, 94, 0.1); display: flex; align-items: center; justify-content: center;">
              <i class="fas fa-file-alt" style="color: #22c55e; font-size: 16px;"></i>
            </div>
            <div style="flex: 1;">
              <div style="font-size: 14px; font-weight: 500; color: var(--text-primary); margin-bottom: 4px;">Job application received</div>
              <div style="font-size: 13px; color: var(--text-secondary); margin-bottom: 4px;">Application for Software Developer position</div>
              <div style="font-size: 12px; color: var(--text-secondary);">15 minutes ago</div>
            </div>
          </div>
          <div style="display: flex; gap: 12px;">
            <div style="flex-shrink: 0; width: 40px; height: 40px; border-radius: 50%; background: rgba(59, 130, 246, 0.1); display: flex; align-items: center; justify-content: center;">
              <i class="fas fa-user-edit" style="color: #3b82f6; font-size: 16px;"></i>
            </div>
            <div style="flex: 1;">
              <div style="font-size: 14px; font-weight: 500; color: var(--text-primary); margin-bottom: 4px;">Profile updated</div>
              <div style="font-size: 13px; color: var(--text-secondary); margin-bottom: 4px;">Jane Smith updated her profile information</div>
              <div style="font-size: 12px; color: var(--text-secondary);">1 hour ago</div>
            </div>
          </div>
          <div style="display: flex; gap: 12px;">
            <div style="flex-shrink: 0; width: 40px; height: 40px; border-radius: 50%; background: rgba(245, 158, 11, 0.1); display: flex; align-items: center; justify-content: center;">
              <i class="fas fa-briefcase" style="color: #f59e0b; font-size: 16px;"></i>
            </div>
            <div style="flex: 1;">
              <div style="font-size: 14px; font-weight: 500; color: var(--text-primary); margin-bottom: 4px;">New job posted</div>
              <div style="font-size: 13px; color: var(--text-secondary); margin-bottom: 4px;">Marketing Manager position created</div>
              <div style="font-size: 12px; color: var(--text-secondary);">2 hours ago</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Additional Content Row -->
  <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
    <!-- Quick Actions -->
    <div class="admin-card">
      <div class="card-header">
        <h6 style="margin: 0; font-size: 15px; font-weight: 600; color: var(--text-primary);">Quick Actions</h6>
      </div>
      <div class="card-body">
        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px;">
          <button class="btn btn-outline-primary" style="padding: 20px; display: flex; flex-direction: column; align-items: center; gap: 8px; height: 100%;">
            <i class="fas fa-plus-circle" style="font-size: 24px;"></i>
            <span style="font-size: 13px; font-weight: 500;">Add New Job</span>
          </button>
          <button class="btn btn-outline-primary" style="padding: 20px; display: flex; flex-direction: column; align-items: center; gap: 8px; height: 100%;">
            <i class="fas fa-users" style="font-size: 24px;"></i>
            <span style="font-size: 13px; font-weight: 500;">Manage Users</span>
          </button>
          <button class="btn btn-outline-primary" style="padding: 20px; display: flex; flex-direction: column; align-items: center; gap: 8px; height: 100%;">
            <i class="fas fa-chart-bar" style="font-size: 24px;"></i>
            <span style="font-size: 13px; font-weight: 500;">View Reports</span>
          </button>
          <button class="btn btn-outline-primary" style="padding: 20px; display: flex; flex-direction: column; align-items: center; gap: 8px; height: 100%;">
            <i class="fas fa-cog" style="font-size: 24px;"></i>
            <span style="font-size: 13px; font-weight: 500;">Settings</span>
          </button>
        </div>
      </div>
    </div>

    <!-- System Status -->
    <div class="admin-card">
      <div class="card-header">
        <h6 style="margin: 0; font-size: 15px; font-weight: 600; color: var(--text-primary);">System Status</h6>
      </div>
      <div class="card-body">
        <div style="display: flex; flex-direction: column; gap: 20px;">
          <div>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
              <span style="font-size: 14px; color: var(--text-primary); font-weight: 500;">Server Status</span>
              <span class="badge" style="background: #22c55e; color: white;">Online</span>
            </div>
            <div style="height: 6px; background: #e5e7eb; border-radius: 3px; overflow: hidden;">
              <div style="height: 100%; background: #22c55e; width: 100%;"></div>
            </div>
          </div>
          <div>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
              <span style="font-size: 14px; color: var(--text-primary); font-weight: 500;">Database</span>
              <span class="badge" style="background: #22c55e; color: white;">Healthy</span>
            </div>
            <div style="height: 6px; background: #e5e7eb; border-radius: 3px; overflow: hidden;">
              <div style="height: 100%; background: #22c55e; width: 95%;"></div>
            </div>
          </div>
          <div>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
              <span style="font-size: 14px; color: var(--text-primary); font-weight: 500;">Storage</span>
              <span class="badge" style="background: #f59e0b; color: white;">75% Used</span>
            </div>
            <div style="height: 6px; background: #e5e7eb; border-radius: 3px; overflow: hidden;">
              <div style="height: 100%; background: #f59e0b; width: 75%;"></div>
            </div>
          </div>
          <div>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
              <span style="font-size: 14px; color: var(--text-primary); font-weight: 500;">Memory Usage</span>
              <span class="badge" style="background: #3b82f6; color: white;">Normal</span>
            </div>
            <div style="height: 6px; background: #e5e7eb; border-radius: 3px; overflow: hidden;">
              <div style="height: 100%; background: #3b82f6; width: 60%;"></div>
            </div>
          </div>
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
</style>
@endsection