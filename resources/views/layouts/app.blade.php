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

  <style>
    :root {
      --primary: #0f6fb3;
      --secondary: #29a9e1;
      --dark: #1a1a1a;
      --light: #f8f9fa;
    }

    body {
      font-family: 'Poppins', sans-serif;
      scroll-behavior: smooth;
    }

    /* Navbar */
    .navbar {
      background: rgba(255,255,255,0.95);
      backdrop-filter: blur(6px);
      box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    }

    /* Hero */
    .hero .item {
      height: 100vh;
      background-size: cover;
      background-position: center;
      position: relative;
    }
    .hero-overlay {
      background: linear-gradient(135deg, rgba(15,111,179,0.85), rgba(41,169,225,0.85));
      padding: 60px;
      color: #fff;
      max-width: 650px;
      margin-left: 8%;
      border-radius: 20px;
      animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
      0% { transform: translateY(0); }
      50% { transform: translateY(-12px); }
      100% { transform: translateY(0); }
    }

    section {
      padding: 90px 0;
    }

    .section-title {
      font-weight: 700;
      color: var(--primary);
      margin-bottom: 50px;
      position: relative;
    }
    .section-title::after {
      content: '';
      width: 80px;
      height: 4px;
      background: var(--secondary);
      display: block;
      margin: 16px auto 0;
      border-radius: 10px;
    }

    /* Services */
    .service-card {
      border-radius: 20px;
      background: #fff;
      box-shadow: 0 20px 40px rgba(0,0,0,0.08);
      transition: all 0.4s ease;
    }
    .service-card:hover {
      transform: translateY(-12px) scale(1.02);
      box-shadow: 0 30px 60px rgba(0,0,0,0.12);
    }

    /* Buttons */
    .btn-primary {
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      border: none;
      border-radius: 50px;
      padding: 12px 32px;
    }

    /* Footer */
    footer {
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      color: #fff;
      padding: 50px 0;
    }
  </style>
  <!-- AOS Animation -->
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
      <img src="margo-logo.png" alt="Margo Logo" height="40" class="me-2">
      <span>MARGO</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('services') }}">Services</a></li>
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