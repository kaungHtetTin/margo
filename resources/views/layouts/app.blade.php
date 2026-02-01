<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Margo Manpower Co., Ltd')</title>
  <link rel="icon" type="image/png" href="{{ asset('assets/img/margo_logo_circle.png') }}">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Owl Carousel -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

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
      --text-primary: #1f2937;
      --text-secondary: #6b7280;
      --border-color: #e5e7eb;
      --bg-hover: #f9fafb;
    }

    * {
      box-sizing: border-box;
    }

    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue', sans-serif;
      scroll-behavior: smooth;
      color: var(--text-primary);
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      margin: 0;
      padding: 0;
      background: #ffffff;
    }

    /* Navbar - Vimeo Style */
    .navbar {
      background: #ffffff;
      border-bottom: 1px solid var(--border-color);
      padding: 0;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }

    .navbar .container {
      padding: 0 24px;
    }

    .navbar-brand {
      font-weight: 600;
      font-size: 18px;
      color: var(--text-primary) !important;
      text-decoration: none;
      letter-spacing: -0.02em;
      padding: 12px 0;
      display: flex;
      align-items: center;
      gap: 12px;
      transition: opacity 0.2s ease;
    }

    .navbar-brand:hover {
      opacity: 0.8;
    }

    .navbar-brand img {
      height: 40px;
      width: auto;
      object-fit: contain;
    }

    .navbar-brand span {
      font-size: 20px;
      font-weight: 600;
      letter-spacing: -0.02em;
    }

    .navbar-nav {
      gap: 8px;
    }

    .navbar-nav .nav-link {
      color: var(--text-primary) !important;
      font-weight: 500;
      font-size: 14px;
      padding: 12px 16px !important;
      border-radius: 6px;
      transition: all 0.2s ease;
      text-decoration: none;
      position: relative;
    }

    .navbar-nav .nav-link:hover {
      background: var(--bg-hover);
      color: var(--primary) !important;
    }

    .navbar-nav .nav-link.active {
      color: var(--primary) !important;
      font-weight: 600;
      background: rgba(15, 111, 179, 0.08);
    }

    .navbar-nav .nav-link.active::after {
      content: '';
      position: absolute;
      bottom: 8px;
      left: 50%;
      transform: translateX(-50%);
      width: 4px;
      height: 4px;
      background: var(--primary);
      border-radius: 50%;
    }

    /* Language Switcher */
    .language-switcher {
      position: relative;
      display: inline-block;
    }

    .language-switcher .dropdown-toggle {
      display: flex;
      align-items: center;
      gap: 6px;
      padding: 8px 12px;
      border-radius: 6px;
      color: var(--text-primary);
      text-decoration: none;
      font-size: 13px;
      font-weight: 500;
      transition: all 0.2s ease;
      border: 1px solid transparent;
    }

    .language-switcher .dropdown-toggle:hover {
      background: var(--bg-hover);
      color: var(--primary);
    }

    .language-switcher .dropdown-menu {
      border: 1px solid var(--border-color);
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      padding: 8px;
      margin-top: 8px;
      min-width: 150px;
    }

    .language-switcher .dropdown-item {
      padding: 8px 12px;
      border-radius: 6px;
      font-size: 14px;
      color: var(--text-primary);
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 8px;
      transition: all 0.2s ease;
    }

    .language-switcher .dropdown-item:hover {
      background: var(--bg-hover);
      color: var(--primary);
    }

    .language-switcher .dropdown-item.active {
      background: rgba(15, 111, 179, 0.1);
      color: var(--primary);
      font-weight: 600;
    }

    .language-switcher .flag-icon {
      width: 20px;
      height: 15px;
      border-radius: 2px;
      object-fit: cover;
    }

    .navbar-toggler {
      border: none;
      padding: 8px;
    }

    .navbar-toggler:focus {
      box-shadow: none;
    }

    /* Hero - Vimeo Style */
    .hero {
      margin-top: 0;
    }

    .hero .item {
      height: 100vh;
      min-height: 600px;
      background-size: cover;
      background-position: center;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .hero-overlay {
      background: rgba(0, 0, 0, 0.2);
      padding: 80px 60px;
      color: #ffffff;
      max-width: 800px;
      text-align: center;
      border-radius: 16px;
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.2), 0 10px 10px -5px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.15);
    }

    .hero-overlay h1 {
      font-size: 48px;
      font-weight: 700;
      margin-bottom: 20px;
      color: #ffffff;
      letter-spacing: -0.03em;
      line-height: 1.1;
      text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .hero-overlay p {
      font-size: 18px;
      color: rgba(255, 255, 255, 0.95);
      margin-bottom: 32px;
      line-height: 1.6;
      text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    }

    @media (max-width: 768px) {
      .hero-overlay {
        padding: 60px 40px;
        margin: 0 20px;
      }

      .hero-overlay h1 {
        font-size: 36px;
      }

      .hero-overlay p {
        font-size: 16px;
      }
    }

    section {
      padding: 100px 0;
    }

    @media (max-width: 768px) {
      section {
        padding: 60px 0;
      }
    }

    .section-title {
      font-weight: 600;
      font-size: 36px;
      color: var(--text-primary);
      margin-bottom: 60px;
      text-align: center;
      letter-spacing: -0.02em;
    }

    @media (max-width: 768px) {
      .section-title {
        font-size: 28px;
        margin-bottom: 40px;
      }
    }

    /* Buttons - Vimeo Style */
    .btn-primary {
      background: var(--primary);
      border: none;
      border-radius: 6px;
      padding: 12px 24px;
      font-weight: 500;
      font-size: 14px;
      color: #ffffff;
      transition: all 0.2s ease;
      cursor: pointer;
      text-decoration: none;
      display: inline-block;
    }

    .btn-primary:hover {
      background: #0d5a9a;
      transform: translateY(-1px);
      box-shadow: 0 4px 6px -1px rgba(15, 111, 179, 0.2);
      color: #ffffff;
    }

    .hero-overlay .btn-primary {
      background: rgba(255, 255, 255, 0.95);
      color: var(--primary);
      font-weight: 600;
    }

    .hero-overlay .btn-primary:hover {
      background: #ffffff;
      color: var(--primary);
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.2);
    }

    .btn-outline-primary {
      border: 1px solid var(--primary);
      color: var(--primary);
      background: transparent;
      border-radius: 6px;
      padding: 12px 24px;
      font-weight: 500;
      font-size: 14px;
      transition: all 0.2s ease;
    }

    .btn-outline-primary:hover {
      background: rgba(15, 111, 179, 0.08);
      border-color: var(--primary);
      color: var(--primary);
    }

    /* Forms - Vimeo Style */
    .form-control {
      border: 1px solid var(--border-color);
      border-radius: 6px;
      padding: 12px 16px;
      font-size: 14px;
      transition: all 0.2s ease;
      background: #ffffff;
      color: var(--text-primary);
    }

    .form-control::placeholder {
      color: var(--text-secondary);
    }

    .form-control:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(15, 111, 179, 0.1);
      outline: none;
    }

    textarea.form-control {
      resize: vertical;
      min-height: 100px;
    }

    /* Footer - Vimeo Style */
    footer {
      background: #ffffff;
      border-top: 1px solid var(--border-color);
      color: var(--text-primary);
      padding: 60px 0 30px 0;
    }

    .footer-content {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 40px;
      margin-bottom: 40px;
    }

    .footer-section h5 {
      font-size: 16px;
      font-weight: 600;
      color: var(--text-primary);
      margin-bottom: 20px;
      letter-spacing: -0.01em;
    }

    .footer-section p,
    .footer-section a {
      font-size: 14px;
      color: var(--text-secondary);
      text-decoration: none;
      line-height: 1.8;
      display: block;
      margin-bottom: 8px;
      transition: color 0.2s ease;
    }

    .footer-section a:hover {
      color: var(--primary);
    }

    .footer-links {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .footer-links li {
      margin-bottom: 10px;
    }

    .footer-links a {
      display: flex;
      align-items: center;
      gap: 8px;
      color: var(--text-secondary);
      text-decoration: none;
      transition: color 0.2s ease;
    }

    .footer-links a:hover {
      color: var(--primary);
    }

    .footer-links i {
      font-size: 12px;
      width: 16px;
    }

    .footer-contact-item {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      margin-bottom: 16px;
    }

    .footer-contact-item i {
      color: var(--primary);
      font-size: 16px;
      margin-top: 2px;
      width: 20px;
      flex-shrink: 0;
    }

    .footer-contact-item div {
      flex: 1;
    }

    .footer-contact-item strong {
      display: block;
      font-size: 13px;
      color: var(--text-primary);
      margin-bottom: 2px;
    }

    .footer-contact-item span {
      font-size: 14px;
      color: var(--text-secondary);
    }

    .footer-bottom {
      border-top: 1px solid var(--border-color);
      padding-top: 30px;
      text-align: center;
    }

    .footer-bottom p {
      font-size: 14px;
      color: var(--text-secondary);
      margin: 0 0 8px 0;
    }

    .footer-bottom small {
      font-size: 13px;
      color: var(--text-secondary);
    }

    .social-link {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 36px;
      height: 36px;
      border-radius: 50%;
      background: var(--bg-hover);
      color: var(--text-secondary);
      text-decoration: none;
      transition: all 0.2s ease;
    }

    .social-link:hover {
      background: var(--primary);
      color: #ffffff;
      transform: translateY(-2px);
    }

    @media (max-width: 768px) {
      .footer-content {
        grid-template-columns: 1fr;
        gap: 30px;
      }
    }

    /* Text Utilities */
    .text-muted {
      color: var(--text-secondary) !important;
    }

    .bg-light {
      background: #f9fafb !important;
    }

    /* Cards - Consistent with service-card design */
    .card {
      border-radius: 12px;
      background: #ffffff;
      border: 1px solid var(--border-color);
      padding: 32px;
      transition: all 0.2s ease;
      height: 100%;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }

    .card:hover {
      transform: translateY(-4px);
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
      border-color: var(--primary);
    }

    .card-body {
      padding: 24px;
    }

    /* Spacing */
    .container {
      max-width: 1200px;
    }
  </style>
  <!-- AOS Animation -->
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  @stack('styles')
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand" href="{{ localized_route('home') }}">
      <img src="{{ asset('assets/img/margo_logo_circle.png') }}" alt="Margo Logo" onerror="this.style.display='none'; this.nextElementSibling.style.display='inline-block';">
      <span style="">MARGO</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ localized_route('home') }}">{{ __('nav.home') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('courses') || request()->routeIs('course.detail') ? 'active' : '' }}" href="{{ localized_route('courses') }}">{{ __('nav.courses') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('blogs') || request()->routeIs('blog.detail') ? 'active' : '' }}" href="{{ localized_route('blogs') }}">{{ __('nav.blogs') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('job-forms*') ? 'active' : '' }}" href="{{ localized_route('job-forms') }}">{{ __('nav.apply_job') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ localized_route('contact') }}">{{ __('nav.contact') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('faq') ? 'active' : '' }}" href="{{ localized_route('faq') }}">{{ __('nav.faq') }}</a>
        </li>
        <li class="nav-item">
          <div class="language-switcher">
            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-globe"></i>
              <span>{{ strtoupper(app()->getLocale()) }}</span>
              <i class="fas fa-chevron-down" style="font-size: 10px;"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item {{ app()->getLocale() === 'en' ? 'active' : '' }}" href="{{ route('locale.switch', 'en') }}">
                  <span>🇬🇧</span>
                  <span>English</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item {{ app()->getLocale() === 'ja' ? 'active' : '' }}" href="{{ route('locale.switch', 'ja') }}">
                  <span>🇯🇵</span>
                  <span>日本語</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item {{ app()->getLocale() === 'my' ? 'active' : '' }}" href="{{ route('locale.switch', 'my') }}">
                  <span>🇲🇲</span>
                  <span>မြန်မာ</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>

@yield('content')

<!-- Footer -->
<footer>
  <div class="container">
    <div class="footer-content">
      <!-- Company Info -->
      <div class="footer-section">
        <h5>{{ $siteSettings['company_name'] ?? 'Margo Manpower' }}</h5>
        <p>{{ $siteSettings['company_description'] ?? 'Connecting Myanmar workers with trusted international employers. Your gateway to overseas employment opportunities.' }}</p>
        <div style="margin-top: 20px; display: flex; gap: 12px;">
          <a href="#" class="social-link" title="Facebook">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" class="social-link" title="Twitter">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#" class="social-link" title="LinkedIn">
            <i class="fab fa-linkedin-in"></i>
          </a>
          <a href="#" class="social-link" title="Instagram">
            <i class="fab fa-instagram"></i>
          </a>
        </div>
      </div>

      <!-- Quick Links -->
      <div class="footer-section">
        <h5>Quick Links</h5>
        <ul class="footer-links">
          <li><a href="{{ localized_route('home') }}"><i class="fas fa-chevron-right"></i> {{ __('nav.home') }}</a></li>
          <li><a href="{{ localized_route('courses') }}"><i class="fas fa-chevron-right"></i> {{ __('nav.courses') }}</a></li>
          <li><a href="{{ localized_route('blogs') }}"><i class="fas fa-chevron-right"></i> {{ __('nav.blogs') }}</a></li>
          <li><a href="{{ localized_route('job-forms') }}"><i class="fas fa-chevron-right"></i> {{ __('nav.apply_job') }}</a></li>
          <li><a href="{{ localized_route('faq') }}"><i class="fas fa-chevron-right"></i> {{ __('nav.faq') }}</a></li>
        </ul>
      </div>

      <!-- Contact Information -->
      <div class="footer-section">
        <h5>Contact Us</h5>
        <div class="footer-contact-item">
          <i class="fas fa-map-marker-alt"></i>
          <div>
            <strong>Address</strong>
            <span>{{ $siteSettings['address'] ?? 'Yangon, Myanmar' }}</span>
          </div>
        </div>
        <div class="footer-contact-item">
          <i class="fas fa-phone"></i>
          <div>
            <strong>Phone</strong>
            <span>{{ $siteSettings['phone_number'] ?? '+95 1 234 5678' }}</span>
          </div>
        </div>
        <div class="footer-contact-item">
          <i class="fas fa-envelope"></i>
          <div>
            <strong>Email</strong>
            <span>{{ $siteSettings['contact_email'] ?? 'info@margomanpower.com' }}</span>
          </div>
        </div>
        <div class="footer-contact-item">
          <i class="fas fa-clock"></i>
          <div>
            <strong>Working Hours</strong>
            <span>{{ $siteSettings['working_hours'] ?? 'Mon - Fri: 9:00 AM - 6:00 PM' }}</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
      <p>© {{ date('Y') }} {{ $siteSettings['company_name'] ?? 'Margo Manpower Co., Ltd' }}. All rights reserved.</p>
      <small>{{ $siteSettings['company_description'] ?? 'Overseas Employment & Recruitment Services' }}</small>
    </div>
  </div>
</footer>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

@yield('scripts')

<!-- AOS Script -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1000,
    once: true
  });
</script>
</body>
</html>