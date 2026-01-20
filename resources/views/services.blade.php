@extends('layouts.app')

@section('title', 'Services - Margo Manpower')

@section('content')
<!-- Services -->
<section id="services" style="padding-top: 120px;">
  <div class="container">
    <h2 class="section-title">Our Services</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="service-card" data-aos="fade-up" data-aos-delay="0">
          <div style="width: 48px; height: 48px; border-radius: 12px; background: rgba(15, 111, 179, 0.1); display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
            <i class="fas fa-globe" style="color: var(--primary); font-size: 24px;"></i>
          </div>
          <h5>Overseas Recruitment</h5>
          <p>Legal and reliable overseas employment opportunities for skilled and unskilled workers across various industries.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="service-card" data-aos="fade-up" data-aos-delay="100">
          <div style="width: 48px; height: 48px; border-radius: 12px; background: rgba(15, 111, 179, 0.1); display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
            <i class="fas fa-file-alt" style="color: var(--primary); font-size: 24px;"></i>
          </div>
          <h5>Documentation Support</h5>
          <p>Comprehensive assistance with visa processing, passport applications, and contract documentation.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="service-card" data-aos="fade-up" data-aos-delay="200">
          <div style="width: 48px; height: 48px; border-radius: 12px; background: rgba(15, 111, 179, 0.1); display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
            <i class="fas fa-handshake" style="color: var(--primary); font-size: 24px;"></i>
          </div>
          <h5>Employer Matching</h5>
          <p>Intelligent matching system connecting qualified candidates with the right international employers.</p>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection