@extends('layouts.app')

@section('title', 'Services - Margo Manpower')

@section('content')
<!-- Services -->
<section id="services">
  <div class="container">
    <h2 class="section-title text-center">Our Services</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card service-card p-4 text-center" data-aos="zoom-in">
          <h5>Overseas Recruitment</h5>
          <p>Legal and reliable overseas employment opportunities.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card service-card p-4 text-center" data-aos="zoom-in">
          <h5>Documentation Support</h5>
          <p>Visa, passport and contract processing assistance.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card service-card p-4 text-center" data-aos="zoom-in">
          <h5>Employer Matching</h5>
          <p>Matching candidates with the right international employers.</p>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection