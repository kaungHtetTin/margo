@extends('layouts.app')

@section('title', 'Contact - Margo Manpower')

@section('content')
<!-- Contact -->
<section id="contact" style="padding-top: 120px; background: #f9fafb;">
  <div class="container">
    <h2 class="section-title">Contact Us</h2>
    <p style="text-align: center; color: var(--text-secondary); margin-bottom: 60px; font-size: 16px; max-width: 600px; margin-left: auto; margin-right: auto;">
      Get in touch with us for inquiries about our services, job opportunities, or any questions you may have.
    </p>
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="row g-4">
          <div class="col-md-6">
            <div class="card" style="text-align: center;">
              <div style="width: 56px; height: 56px; border-radius: 12px; background: rgba(15, 111, 179, 0.1); display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                <i class="fas fa-envelope" style="color: var(--primary); font-size: 24px;"></i>
              </div>
              <h5 style="font-size: 18px; font-weight: 600; margin-bottom: 8px; color: var(--text-primary);">Email</h5>
              <p style="font-size: 14px; color: var(--text-secondary); margin: 0;">info@margomanpower.com</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card" style="text-align: center;">
              <div style="width: 56px; height: 56px; border-radius: 12px; background: rgba(15, 111, 179, 0.1); display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                <i class="fas fa-phone" style="color: var(--primary); font-size: 24px;"></i>
              </div>
              <h5 style="font-size: 18px; font-weight: 600; margin-bottom: 8px; color: var(--text-primary);">Phone</h5>
              <p style="font-size: 14px; color: var(--text-secondary); margin: 0;">+95 xxx xxx xxx</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection