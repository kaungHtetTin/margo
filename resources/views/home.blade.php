@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero" id="home" style="margin-top: 0;">
  <div class="owl-carousel owl-theme">
    <div class="item" style="background-image:url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d');">
      <div class="hero-overlay" data-aos="fade-up">
        <h1>Overseas Job Opportunities</h1>
        <p>Connecting Myanmar workers with trusted international employers.</p>
        <a href="{{ route('register') }}" class="btn btn-primary">Get Started</a>
      </div>
    </div>
    <div class="item" style="background-image:url('https://images.unsplash.com/photo-1504384308090-c894fdcc538d');">
      <div class="hero-overlay" data-aos="fade-up">
        <h1>Trusted Manpower Services</h1>
        <p>Professional recruitment for skilled and unskilled workers.</p>
        <a href="{{ route('register') }}" class="btn btn-primary">Get Started</a>
      </div>
    </div>
  </div>
</section>
@endsection

@section('scripts')
<script>
  $('.owl-carousel').owlCarousel({
    loop: true,
    margin: 0,
    nav: false,
    items: 1,
    autoplay: true,
    autoplayTimeout: 5000,
    animateOut: 'fadeOut'
  })
</script>
@endsection