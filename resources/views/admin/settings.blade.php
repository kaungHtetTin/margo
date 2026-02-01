@extends('layouts.admin')

@section('page-title', 'System Settings')

@section('content')
<div class="container-fluid">
  <div class="row mb-4">
    <div class="col-12">
      <h2>System Settings</h2>
      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
    </div>
  </div>

  <div class="row">
    <div class="col-md-8">
      <div class="admin-card">
        <div class="card-header">
          <h5 class="mb-0"><i class="fas fa-cog me-2"></i>General Settings</h5>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('admin.settings.general') }}">
            @csrf
            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Company Name</label>
                <input type="text" name="company_name" class="form-control" value="{{ old('company_name', $general['company_name'] ?? 'Margo Manpower Co., Ltd') }}">
              </div>
              <div class="col-md-6">
                <label class="form-label">Contact Email</label>
                <input type="email" name="contact_email" class="form-control" value="{{ old('contact_email', $general['contact_email'] ?? 'info@margomanpower.com') }}">
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Phone Number</label>
                <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $general['phone_number'] ?? '+95 xxx xxx xxx') }}">
              </div>
              <div class="col-md-6">
                <label class="form-label">Website URL</label>
                <input type="url" name="website_url" class="form-control" value="{{ old('website_url', $general['website_url'] ?? 'https://margomanpower.com') }}">
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label">Company Description</label>
              <textarea name="company_description" class="form-control" rows="3">{{ old('company_description', $general['company_description'] ?? 'Overseas Employment & Recruitment Services') }}</textarea>
            </div>

            <div class="mb-3">
              <label class="form-label">Address</label>
              <textarea name="address" class="form-control" rows="2">{{ old('address', $general['address'] ?? 'Yangon, Myanmar') }}</textarea>
            </div>

            <div class="mb-3">
              <label class="form-label">Working Hours</label>
              <input type="text" name="working_hours" class="form-control" value="{{ old('working_hours', $general['working_hours'] ?? 'Mon - Fri: 9:00 AM - 6:00 PM') }}" placeholder="e.g. Mon - Fri: 9:00 AM - 6:00 PM">
            </div>

            <button type="submit" class="btn btn-admin">
              <i class="fas fa-save me-2"></i>Save Changes
            </button>
          </form>
        </div>
      </div>

    </div>

    <div class="col-md-4">
      <div class="admin-card">
        <div class="card-header">
          <h5 class="mb-0"><i class="fas fa-shield-alt me-2"></i>Change Password</h5>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('admin.settings.password') }}">
            @csrf
            <div class="mb-3">
              <label class="form-label" for="current_password">Current Password</label>
              <input type="password" name="current_password" id="current_password" class="form-control @error('current_password') is-invalid @enderror" placeholder="Current password" required autocomplete="current-password">
              @error('current_password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="password">New Password</label>
              <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="New password" required autocomplete="new-password">
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              <small class="text-muted">Min. 8 characters</small>
            </div>
            <div class="mb-3">
              <label class="form-label" for="password_confirmation">Confirm New Password</label>
              <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm new password" required autocomplete="new-password">
            </div>
            <button type="submit" class="btn btn-admin w-100">
              <i class="fas fa-key me-2"></i>Update Password
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection