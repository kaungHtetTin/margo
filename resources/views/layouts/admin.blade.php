<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Admin Panel - Margo Manpower')</title>
  <link rel="icon" type="image/png" href="{{ asset('assets/img/margo_logo_circle.png') }}">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <style>
    :root {
      --primary: #0f6fb3;
      --secondary: #29a9e1;
      --dark: #1a1a1a;
      --light: #f8f9fa;
      --sidebar-width: 240px;
      --header-height: 64px;
      --border-color: #e5e7eb;
      --text-primary: #1f2937;
      --text-secondary: #6b7280;
      --bg-hover: #f9fafb;
    }

    * {
      box-sizing: border-box;
    }

    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue', sans-serif;
      margin: 0;
      padding: 0;
      background: #ffffff;
      color: var(--text-primary);
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }

    /* Header - Vimeo Style */
    .admin-header {
      background: #ffffff;
      border-bottom: 1px solid var(--border-color);
      padding: 0 24px;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
      display: flex;
      align-items: center;
      justify-content: space-between;
      height: var(--header-height);
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }

    .admin-header .header-left {
      display: flex;
      align-items: center;
      gap: 16px;
    }

    .admin-header .navbar-brand {
      font-weight: 600;
      font-size: 18px;
      color: var(--text-primary) !important;
      text-decoration: none;
      letter-spacing: -0.02em;
    }

    .admin-header .navbar-nav {
      flex-direction: row;
      gap: 8px;
      align-items: center;
    }

    .admin-header .nav-link {
      color: var(--text-primary) !important;
      text-decoration: none;
      padding: 8px 12px;
      border-radius: 6px;
      transition: all 0.2s ease;
      font-size: 14px;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .admin-header .nav-link:hover {
      background: var(--bg-hover);
      color: var(--primary) !important;
    }

    .admin-header .dropdown-menu {
      border: 1px solid var(--border-color);
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
      border-radius: 8px;
      padding: 8px;
      margin-top: 8px;
      min-width: 200px;
    }

    .admin-header .dropdown-item {
      padding: 10px 12px;
      transition: all 0.2s ease;
      border-radius: 6px;
      font-size: 14px;
      color: var(--text-primary);
    }

    .admin-header .dropdown-item:hover {
      background: var(--bg-hover);
      color: var(--primary);
    }

    .admin-header .dropdown-item i {
      width: 18px;
      margin-right: 8px;
    }

    /* Sidebar - Vimeo Style */
    .admin-sidebar {
      position: fixed;
      top: var(--header-height);
      left: 0;
      width: var(--sidebar-width);
      height: calc(100vh - var(--header-height));
      background: #ffffff;
      border-right: 1px solid var(--border-color);
      z-index: 999;
      overflow-y: auto;
      transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      padding: 16px 0;
    }

    .sidebar-header {
      padding: 0 20px 16px 20px;
      border-bottom: 1px solid var(--border-color);
      margin-bottom: 8px;
    }

    .sidebar-header h5 {
      font-size: 16px;
      font-weight: 600;
      color: var(--text-primary);
      margin: 0;
      letter-spacing: -0.01em;
    }

    .sidebar-header small {
      font-size: 12px;
      color: var(--text-secondary);
      font-weight: 400;
    }

    .sidebar-nav {
      padding: 8px 0;
    }

    .sidebar-nav .nav-link {
      color: var(--text-primary);
      padding: 10px 20px;
      display: flex;
      align-items: center;
      text-decoration: none;
      transition: all 0.2s ease;
      font-size: 14px;
      font-weight: 500;
      border-left: 3px solid transparent;
      margin: 2px 0;
    }

    .sidebar-nav .nav-link:hover {
      background: var(--bg-hover);
      color: var(--primary);
    }

    .sidebar-nav .nav-link.active {
      background: rgba(15, 111, 179, 0.08);
      color: var(--primary);
      border-left-color: var(--primary);
      font-weight: 600;
    }

    .sidebar-nav .nav-link i {
      margin-right: 12px;
      width: 20px;
      font-size: 16px;
      text-align: center;
    }

    /* Main Content Wrapper */
    .main-wrapper {
      display: flex;
      flex: 1;
      margin-top: var(--header-height);
    }

    /* Content - Vimeo Style */
    .admin-content {
      flex: 1;
      padding: 32px;
      background: #ffffff;
      min-height: calc(100vh - var(--header-height));
      margin-left: var(--sidebar-width);
      transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .main-wrapper.sidebar-collapsed .admin-content {
      margin-left: 0;
    }

    /* Cards - Vimeo Style */
    .admin-card {
      border-radius: 12px;
      background: #ffffff;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
      border: 1px solid var(--border-color);
      margin-bottom: 24px;
      overflow: hidden;
    }

    .admin-card .card-header {
      background: #ffffff;
      color: var(--text-primary);
      border-bottom: 1px solid var(--border-color);
      padding: 16px 20px;
      font-weight: 600;
      font-size: 15px;
    }

    .admin-card .card-body {
      padding: 20px;
    }

    /* Buttons - Vimeo Style */
    .btn-admin {
      background: var(--primary);
      border: none;
      border-radius: 6px;
      padding: 10px 20px;
      color: #fff;
      font-weight: 500;
      font-size: 14px;
      transition: all 0.2s ease;
      cursor: pointer;
    }

    .btn-admin:hover {
      background: #0d5a9a;
      transform: translateY(-1px);
      box-shadow: 0 4px 6px -1px rgba(15, 111, 179, 0.2);
    }

    .btn-outline-primary {
      border: 1px solid var(--primary);
      color: var(--primary);
      background: transparent;
      border-radius: 6px;
      padding: 10px 20px;
      font-weight: 500;
      font-size: 14px;
      transition: all 0.2s ease;
    }

    .btn-outline-primary:hover {
      background: rgba(15, 111, 179, 0.08);
      border-color: var(--primary);
      color: var(--primary);
    }

    /* Action Buttons - Consistent Design */
    .btn-action {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 32px;
      height: 32px;
      padding: 0;
      border-radius: 6px;
      border: 1px solid;
      font-size: 13px;
      transition: all 0.2s ease;
      cursor: pointer;
      text-decoration: none;
      margin-right: 6px;
    }

    .btn-action:last-child {
      margin-right: 0;
    }

    .btn-action i {
      font-size: 13px;
    }

    /* Edit Action */
    .btn-action-edit {
      border-color: var(--primary);
      color: var(--primary);
      background: transparent;
    }

    .btn-action-edit:hover {
      background: rgba(15, 111, 179, 0.1);
      border-color: var(--primary);
      color: var(--primary);
      transform: translateY(-1px);
    }

    /* View Action */
    .btn-action-view {
      border-color: #3b82f6;
      color: #3b82f6;
      background: transparent;
    }

    .btn-action-view:hover {
      background: rgba(59, 130, 246, 0.1);
      border-color: #3b82f6;
      color: #3b82f6;
      transform: translateY(-1px);
    }

    /* Delete Action */
    .btn-action-delete {
      border-color: #ef4444;
      color: #ef4444;
      background: transparent;
    }

    .btn-action-delete:hover {
      background: rgba(239, 68, 68, 0.1);
      border-color: #ef4444;
      color: #ef4444;
      transform: translateY(-1px);
    }

    /* Approve Action */
    .btn-action-approve {
      border-color: #22c55e;
      color: #22c55e;
      background: transparent;
    }

    .btn-action-approve:hover {
      background: rgba(34, 197, 94, 0.1);
      border-color: #22c55e;
      color: #22c55e;
      transform: translateY(-1px);
    }

    /* Reject Action */
    .btn-action-reject {
      border-color: #ef4444;
      color: #ef4444;
      background: transparent;
    }

    .btn-action-reject:hover {
      background: rgba(239, 68, 68, 0.1);
      border-color: #ef4444;
      color: #ef4444;
      transform: translateY(-1px);
    }

    /* Download/View Document Action */
    .btn-action-download {
      border-color: var(--text-secondary);
      color: var(--text-secondary);
      background: transparent;
    }

    .btn-action-download:hover {
      background: rgba(107, 114, 128, 0.1);
      border-color: var(--text-secondary);
      color: var(--text-primary);
      transform: translateY(-1px);
    }

    /* Table - Vimeo Style */
    .admin-table {
      border-radius: 8px;
      overflow: hidden;
      border: 1px solid var(--border-color);
    }

    .admin-table thead th {
      background: #f9fafb;
      color: var(--text-primary);
      border: none;
      border-bottom: 1px solid var(--border-color);
      padding: 12px 16px;
      font-weight: 600;
      font-size: 13px;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      text-align: left;
    }

    .admin-table tbody td {
      padding: 14px 16px;
      border-bottom: 1px solid var(--border-color);
      font-size: 14px;
      color: var(--text-primary);
    }

    .admin-table tbody tr:hover {
      background: var(--bg-hover);
    }

    /* Stats Cards - Vimeo Style */
    .stats-card {
      background: #ffffff;
      border: 1px solid var(--border-color);
      border-radius: 12px;
      padding: 24px;
      transition: all 0.2s ease;
    }

    .stats-card:hover {
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
      transform: translateY(-2px);
    }

    .stats-card .stat-number {
      font-size: 32px;
      font-weight: 700;
      margin-bottom: 8px;
      color: var(--text-primary);
      letter-spacing: -0.02em;
    }

    .stats-card .stat-label {
      font-size: 13px;
      color: var(--text-secondary);
      font-weight: 500;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    /* Sidebar Toggle */
    .sidebar-toggle {
      display: flex;
      align-items: center;
      justify-content: center;
      background: none;
      border: none;
      color: var(--text-primary);
      font-size: 20px;
      padding: 8px;
      border-radius: 6px;
      transition: all 0.2s ease;
      cursor: pointer;
      width: 36px;
      height: 36px;
    }

    .sidebar-toggle:hover {
      background: var(--bg-hover);
      color: var(--primary);
    }

    /* Responsive */
    @media (max-width: 768px) {
      .admin-sidebar {
        transform: translateX(-100%);
        box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
      }

      .admin-sidebar.show {
        transform: translateX(0);
      }

      .admin-content {
        margin-left: 0;
        padding: 20px;
      }

      .main-wrapper {
        margin-top: var(--header-height);
      }
    }

    /* Desktop sidebar toggle */
    @media (min-width: 769px) {
      .admin-sidebar.collapsed {
        transform: translateX(-100%);
      }

      .main-wrapper.sidebar-collapsed .admin-content {
        margin-left: 0;
      }
    }

    /* Scrollbar Styling */
    .admin-sidebar::-webkit-scrollbar {
      width: 6px;
    }

    .admin-sidebar::-webkit-scrollbar-track {
      background: transparent;
    }

    .admin-sidebar::-webkit-scrollbar-thumb {
      background: #d1d5db;
      border-radius: 3px;
    }

    .admin-sidebar::-webkit-scrollbar-thumb:hover {
      background: #9ca3af;
    }

    /* Badge Styling */
    .badge {
      padding: 4px 8px;
      border-radius: 4px;
      font-size: 11px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    /* Text Utilities */
    .text-muted {
      color: var(--text-secondary) !important;
    }

    h1, h2, h3, h4, h5, h6 {
      color: var(--text-primary);
      font-weight: 600;
      letter-spacing: -0.02em;
    }
  </style>
</head>
<body>

<!-- Header -->
<header class="admin-header">
  <div class="header-left">
    <button class="sidebar-toggle" onclick="toggleSidebar()">
      <i class="fas fa-bars"></i>
    </button>
    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">@yield('page-title', 'Admin Panel')</a>
  </div>

  <nav class="navbar-nav">
    <a href="{{ localized_route('home') }}" class="nav-link">
      <i class="fas fa-home"></i>
      <span>View Site</span>
    </a>

    <div class="dropdown" style="position: relative;">
      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="position: relative;">
        <i class="fas fa-bell"></i>
        <span class="badge bg-danger rounded-pill" style="position: absolute; top: -2px; right: -2px; font-size: 10px; padding: 2px 5px; min-width: 18px; height: 18px; display: flex; align-items: center; justify-content: center;">3</span>
      </a>
      <ul class="dropdown-menu dropdown-menu-end" style="width: 320px;">
        <li><h6 class="dropdown-header" style="padding: 12px 16px; font-size: 13px; font-weight: 600; color: var(--text-primary);">Notifications</h6></li>
        <li><a class="dropdown-item" href="#">
          <div style="display: flex; align-items: flex-start; gap: 12px;">
            <div style="flex-shrink: 0; width: 32px; height: 32px; border-radius: 50%; background: rgba(15, 111, 179, 0.1); display: flex; align-items: center; justify-content: center;">
              <i class="fas fa-user-plus" style="color: var(--primary); font-size: 14px;"></i>
            </div>
            <div style="flex: 1;">
              <div style="font-size: 13px; color: var(--text-secondary); margin-bottom: 4px;">2 min ago</div>
              <div style="font-size: 14px; color: var(--text-primary); font-weight: 500;">New user registered</div>
            </div>
          </div>
        </a></li>
        <li><a class="dropdown-item" href="#">
          <div style="display: flex; align-items: flex-start; gap: 12px;">
            <div style="flex-shrink: 0; width: 32px; height: 32px; border-radius: 50%; background: rgba(34, 197, 94, 0.1); display: flex; align-items: center; justify-content: center;">
              <i class="fas fa-file-alt" style="color: #22c55e; font-size: 14px;"></i>
            </div>
            <div style="flex: 1;">
              <div style="font-size: 13px; color: var(--text-secondary); margin-bottom: 4px;">15 min ago</div>
              <div style="font-size: 14px; color: var(--text-primary); font-weight: 500;">Job application received</div>
            </div>
          </div>
        </a></li>
        <li><hr class="dropdown-divider" style="margin: 8px 0;"></li>
        <li><a class="dropdown-item text-center" href="#" style="font-weight: 500; color: var(--primary);">View all notifications</a></li>
      </ul>
    </div>

    <div class="dropdown">
      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="{{ asset('assets/img/margo_logo_circle.png') }}" alt="Admin" style="width: 24px; height: 24px; border-radius: 50%; object-fit: cover;">
        <span>Admin</span>
      </a>
      <ul class="dropdown-menu dropdown-menu-end">
        <li><a class="dropdown-item" href="#"><i class="fas fa-user"></i>Profile</a></li>
        <li><a class="dropdown-item" href="{{ route('admin.settings') }}"><i class="fas fa-cog"></i>Settings</a></li>
        <li><hr class="dropdown-divider"></li>
        <li>
          <form method="POST" action="{{ route('admin.logout') }}" style="margin: 0;">
            @csrf
            <button type="submit" class="dropdown-item" style="border: none; background: none; width: 100%; text-align: left; padding: 10px 12px; cursor: pointer; color: var(--text-primary);">
              <i class="fas fa-sign-out-alt"></i>Logout
            </button>
          </form>
        </li>
      </ul>
    </div>
  </nav>
</header>

<!-- Main Content Wrapper -->
<div class="main-wrapper">
  <!-- Sidebar -->
  <div class="admin-sidebar" id="sidebar">
    <div class="sidebar-header">
      <h5>MARGO</h5>
      <small>Admin Panel</small>
    </div>

    <nav class="sidebar-nav">
      <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="fas fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
      <a href="{{ route('admin.users') }}" class="nav-link {{ request()->routeIs('admin.users') ? 'active' : '' }}">
        <i class="fas fa-users"></i>
        <span>Users</span>
      </a>
      <a href="{{ route('admin.jobs') }}" class="nav-link {{ request()->routeIs('admin.jobs') ? 'active' : '' }}">
        <i class="fas fa-briefcase"></i>
        <span>Jobs</span>
      </a>
      <a href="{{ route('admin.applications') }}" class="nav-link {{ request()->routeIs('admin.applications') ? 'active' : '' }}">
        <i class="fas fa-file-alt"></i>
        <span>Applications</span>
      </a>
      <a href="{{ route('admin.teachers.index') }}" class="nav-link {{ request()->routeIs('admin.teachers.*') ? 'active' : '' }}">
        <i class="fas fa-chalkboard-teacher"></i>
        <span>Teachers</span>
      </a>
      <a href="{{ route('admin.courses.index') }}" class="nav-link {{ request()->routeIs('admin.courses.*') ? 'active' : '' }}">
        <i class="fas fa-graduation-cap"></i>
        <span>Courses</span>
      </a>
      <a href="{{ route('admin.faqs.index') }}" class="nav-link {{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
        <i class="fas fa-question-circle"></i>
        <span>FAQs</span>
      </a>
      <a href="{{ route('admin.blogs.index') }}" class="nav-link {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
        <i class="fas fa-blog"></i>
        <span>Blogs</span>
      </a>
      <a href="{{ route('admin.job-forms.index') }}" class="nav-link {{ request()->routeIs('admin.job-forms.*') ? 'active' : '' }}">
        <i class="fas fa-clipboard-list"></i>
        <span>Job Forms</span>
      </a>
      <a href="{{ route('admin.job-form-data.index') }}" class="nav-link {{ request()->routeIs('admin.job-form-data.*') ? 'active' : '' }}">
        <i class="fas fa-list-ul"></i>
        <span>Form Fields</span>
      </a>
      <a href="{{ route('admin.settings') }}" class="nav-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
        <i class="fas fa-cog"></i>
        <span>Settings</span>
      </a>
    </nav>
  </div>

  <!-- Main Content -->
  <main class="admin-content">
    @yield('content')
  </main>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
  function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const header = document.querySelector('.admin-header');
    const mainWrapper = document.querySelector('.main-wrapper');
    const isMobile = window.innerWidth <= 768;

    if (isMobile) {
      // Mobile behavior: overlay sidebar
      sidebar.classList.toggle('show');
    } else {
      // Desktop behavior: collapse/expand sidebar
      sidebar.classList.toggle('collapsed');
      header.classList.toggle('collapsed');
      
      // Toggle class on main-wrapper for content expansion
      if (mainWrapper) {
        mainWrapper.classList.toggle('sidebar-collapsed');
      }

      // Store the state in localStorage
      const isCollapsed = sidebar.classList.contains('collapsed');
      localStorage.setItem('sidebarCollapsed', isCollapsed);
    }
  }

  // Initialize sidebar state on page load
  document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const header = document.querySelector('.admin-header');
    const mainWrapper = document.querySelector('.main-wrapper');
    const isMobile = window.innerWidth <= 768;
    const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';

    if (!isMobile && isCollapsed) {
      sidebar.classList.add('collapsed');
      header.classList.add('collapsed');
      if (mainWrapper) {
        mainWrapper.classList.add('sidebar-collapsed');
      }
    }
  });

  // Close sidebar when clicking outside on mobile
  document.addEventListener('click', function(event) {
    const sidebar = document.getElementById('sidebar');
    const toggle = document.querySelector('.sidebar-toggle');
    const isMobile = window.innerWidth <= 768;

    if (isMobile && !sidebar.contains(event.target) && !toggle.contains(event.target)) {
      sidebar.classList.remove('show');
    }
  });

  // Handle window resize
  window.addEventListener('resize', function() {
    const sidebar = document.getElementById('sidebar');
    const header = document.querySelector('.admin-header');
    const mainWrapper = document.querySelector('.main-wrapper');
    const isMobile = window.innerWidth <= 768;

    if (isMobile) {
      // On mobile, remove desktop classes
      sidebar.classList.remove('collapsed');
      header.classList.remove('collapsed');
      if (mainWrapper) {
        mainWrapper.classList.remove('sidebar-collapsed');
      }
    } else {
      // On desktop, restore collapsed state if it was saved
      const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
      if (isCollapsed) {
        sidebar.classList.add('collapsed');
        header.classList.add('collapsed');
        if (mainWrapper) {
          mainWrapper.classList.add('sidebar-collapsed');
        }
      }
    }
  });
</script>

@yield('scripts')
</body>
</html>