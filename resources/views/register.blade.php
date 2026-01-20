@extends('layouts.app')

@section('title', 'Register - Margo Manpower')

@section('content')
<!-- Register -->
<section id="register">
  <div class="container">
    <h2 class="section-title text-center">Register for Jobs</h2>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form>
          <input type="text" class="form-control mb-3" placeholder="Full Name">
          <input type="email" class="form-control mb-3" placeholder="Email">
          <input type="text" class="form-control mb-3" placeholder="Phone Number">
          <button class="btn btn-primary w-100">Submit</button>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection