<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Margo Manpower Co., Ltd')</title>

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
      padding: 16px 0;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .navbar-brand img {
      height: 32px;
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
    }

    .navbar-nav .nav-link:hover {
      background: var(--bg-hover);
      color: var(--primary) !important;
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
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(8px);
      padding: 80px 60px;
      color: #ffffff;
      max-width: 800px;
      text-align: center;
      border-radius: 16px;
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.2), 0 10px 10px -5px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
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

    /* Services - Vimeo Style */
    .service-card {
      border-radius: 12px;
      background: #ffffff;
      border: 1px solid var(--border-color);
      padding: 32px;
      transition: all 0.2s ease;
      height: 100%;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }

    .service-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
      border-color: var(--primary);
    }

    .service-card h5 {
      font-size: 20px;
      font-weight: 600;
      color: var(--text-primary);
      margin-bottom: 12px;
      letter-spacing: -0.01em;
    }

    .service-card p {
      font-size: 15px;
      color: var(--text-secondary);
      line-height: 1.6;
      margin: 0;
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
      padding: 60px 0 40px 0;
    }

    footer p {
      font-size: 14px;
      color: var(--text-secondary);
      margin: 0;
    }

    footer small {
      font-size: 13px;
      color: var(--text-secondary);
    }

    /* Text Utilities */
    .text-muted {
      color: var(--text-secondary) !important;
    }

    .bg-light {
      background: #f9fafb !important;
    }

    /* Cards */
    .card {
      border: 1px solid var(--border-color);
      border-radius: 12px;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }

    /* Spacing */
    .container {
      max-width: 1200px;
    }
  </style>
  <!-- AOS Animation -->
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">
      <img src="margo-logo.png" alt="Margo Logo" height="32">
      <span>MARGO</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('services') }}">Services</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('courses') }}">Courses</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('blogs') }}">Blogs</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Admin</a></li>
      </ul>
    </div>
  </div>
</nav>

@yield('content')

<!-- Footer -->
<footer>
  <div class="container text-center">
    <p class="mb-1">© 2026 Margo Manpower Co., Ltd</p>
    <small>Overseas Employment & Recruitment Services</small>
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