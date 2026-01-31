@extends('layouts.app')

@section('title', 'Register - Margo Manpower')

@section('content')
<!-- Register -->
<section id="register" style="padding-top: 120px;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">
        <h2 class="section-title">Register for Jobs</h2>
        <p style="text-align: center; color: var(--text-secondary); margin-bottom: 40px; font-size: 16px;">
          Join thousands of workers who have found their dream jobs overseas
        </p>
        <div class="card" style="padding: 40px;">
          <form>
            <div class="mb-3">
              <label for="fullName" style="display: block; font-size: 14px; font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Full Name</label>
              <input type="text" id="fullName" class="form-control" placeholder="Enter your full name">
            </div>
            <div class="mb-3">
              <label for="email" style="display: block; font-size: 14px; font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Email Address</label>
              <input type="email" id="email" class="form-control" placeholder="Enter your email">
            </div>
            <div class="mb-3">
              <label for="phone" style="display: block; font-size: 14px; font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Phone Number</label>
              <input type="text" id="phone" class="form-control" placeholder="Enter your phone number">
            </div>
            <div class="mb-3">
              <label for="skills" style="display: block; font-size: 14px; font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">Skills/Experience</label>
              <textarea id="skills" class="form-control" rows="3" placeholder="Describe your skills and work experience"></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100" style="margin-top: 8px;">Submit Application</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection