<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Login - Margo Manpower</title>

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
      margin: 0;
      padding: 0;
      background: #ffffff;
      color: var(--text-primary);
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-container {
      width: 100%;
      max-width: 440px;
      padding: 40px;
    }

    .login-header {
      text-align: center;
      margin-bottom: 40px;
    }

    .login-header h1 {
      font-size: 32px;
      font-weight: 600;
      color: var(--text-primary);
      margin-bottom: 8px;
      letter-spacing: -0.02em;
    }

    .login-header p {
      font-size: 15px;
      color: var(--text-secondary);
      margin: 0;
    }

    .login-card {
      background: #ffffff;
      border: 1px solid var(--border-color);
      border-radius: 12px;
      padding: 40px;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }

    .form-group {
      margin-bottom: 24px;
    }

    .form-group label {
      display: block;
      font-size: 14px;
      font-weight: 500;
      color: var(--text-primary);
      margin-bottom: 8px;
    }

    .form-control {
      width: 100%;
      padding: 12px 16px;
      font-size: 14px;
      border: 1px solid var(--border-color);
      border-radius: 6px;
      transition: all 0.2s ease;
      background: #ffffff;
      color: var(--text-primary);
    }

    .form-control:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(15, 111, 179, 0.1);
      outline: none;
    }

    .form-control::placeholder {
      color: var(--text-secondary);
    }

    .input-group {
      position: relative;
    }

    .input-group-icon {
      position: absolute;
      left: 16px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--text-secondary);
      font-size: 16px;
    }

    .input-group .form-control {
      padding-left: 44px;
    }

    .btn-primary {
      width: 100%;
      background: var(--primary);
      border: none;
      border-radius: 6px;
      padding: 12px 24px;
      font-weight: 500;
      font-size: 14px;
      color: #ffffff;
      transition: all 0.2s ease;
      cursor: pointer;
      margin-top: 8px;
    }

    .btn-primary:hover {
      background: #0d5a9a;
      transform: translateY(-1px);
      box-shadow: 0 4px 6px -1px rgba(15, 111, 179, 0.2);
    }

    .btn-primary:disabled {
      opacity: 0.6;
      cursor: not-allowed;
      transform: none;
    }

    .alert {
      padding: 12px 16px;
      border-radius: 6px;
      margin-bottom: 24px;
      font-size: 14px;
    }

    .alert-danger {
      background: #fef2f2;
      border: 1px solid #fecaca;
      color: #991b1b;
    }

    .alert-success {
      background: #f0fdf4;
      border: 1px solid #bbf7d0;
      color: #166534;
    }

    .back-link {
      text-align: center;
      margin-top: 24px;
    }

    .back-link a {
      color: var(--primary);
      text-decoration: none;
      font-size: 14px;
      font-weight: 500;
      transition: color 0.2s ease;
    }

    .back-link a:hover {
      color: #0d5a9a;
    }

    .logo {
      text-align: center;
      margin-bottom: 32px;
    }

    .logo img {
      height: 40px;
    }

    .logo-text {
      font-size: 20px;
      font-weight: 600;
      color: var(--text-primary);
      letter-spacing: -0.01em;
      margin-top: 8px;
    }

    @media (max-width: 768px) {
      .login-container {
        padding: 20px;
      }

      .login-card {
        padding: 32px 24px;
      }

      .login-header h1 {
        font-size: 28px;
      }
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="logo">
      <img src="{{ asset('margo-logo.png') }}" alt="Margo Logo" onerror="this.style.display='none'">
      <div class="logo-text">MARGO</div>
    </div>

    <div class="login-header">
      <h1>Admin Login</h1>
      <p>Sign in to access the admin panel</p>
    </div>

    <div class="login-card">
      @if(session('error'))
        <div class="alert alert-danger">
          <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
        </div>
      @endif

      @if(session('success'))
        <div class="alert alert-success">
          <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        </div>
      @endif

      @error('email')
        <div class="alert alert-danger">
          <i class="fas fa-exclamation-circle me-2"></i>{{ $message }}
        </div>
      @enderror

      @error('password')
        <div class="alert alert-danger">
          <i class="fas fa-exclamation-circle me-2"></i>{{ $message }}
        </div>
      @enderror

      <form method="POST" action="{{ route('admin.login') }}">
        @csrf

        <div class="form-group">
          <label for="email">Email Address</label>
          <div class="input-group">
            <i class="fas fa-envelope input-group-icon"></i>
            <input 
              type="email" 
              id="email" 
              name="email" 
              class="form-control" 
              placeholder="Enter your email"
              value="{{ old('email') }}"
              required
              autofocus
            >
          </div>
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <div class="input-group">
            <i class="fas fa-lock input-group-icon"></i>
            <input 
              type="password" 
              id="password" 
              name="password" 
              class="form-control" 
              placeholder="Enter your password"
              required
            >
          </div>
        </div>

        <div class="form-group" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px;">
          <label style="margin: 0; font-weight: 400; cursor: pointer;">
            <input type="checkbox" name="remember" style="margin-right: 8px;">
            <span style="font-size: 14px; color: var(--text-secondary);">Remember me</span>
          </label>
        </div>

        <button type="submit" class="btn btn-primary">
          <i class="fas fa-sign-in-alt me-2"></i>Sign In
        </button>
      </form>

      <div class="back-link">
        <a href="{{ route('home') }}">
          <i class="fas fa-arrow-left me-2"></i>Back to Home
        </a>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
