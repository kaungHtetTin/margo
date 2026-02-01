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

      <div class="admin-card mt-4">
        <div class="card-header">
          <h5 class="mb-0"><i class="fas fa-envelope me-2"></i>Email Settings</h5>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('admin.settings.email') }}">
            @csrf
            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">SMTP Host</label>
                <input type="text" name="smtp_host" class="form-control" value="{{ old('smtp_host', $email['smtp_host'] ?? '') }}" placeholder="smtp.example.com">
              </div>
              <div class="col-md-6">
                <label class="form-label">SMTP Port</label>
                <input type="number" name="smtp_port" class="form-control" value="{{ old('smtp_port', $email['smtp_port'] ?? '') }}" placeholder="587">
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">SMTP Username</label>
                <input type="email" name="smtp_username" class="form-control" value="{{ old('smtp_username', $email['smtp_username'] ?? '') }}" placeholder="noreply@example.com">
              </div>
              <div class="col-md-6">
                <label class="form-label">SMTP Password</label>
                <input type="password" name="smtp_password" class="form-control" placeholder="••••••••">
                <small class="text-muted">Leave blank to keep current password</small>
              </div>
            </div>

            <button type="submit" class="btn btn-admin">
              <i class="fas fa-save me-2"></i>Update Email Settings
            </button>
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="admin-card">
        <div class="card-header">
          <h5 class="mb-0"><i class="fas fa-image me-2"></i>Logo Settings</h5>
        </div>
        <div class="card-body text-center">
          <img src="{{ asset('assets/img/margo_logo_circle.png') }}" alt="Current Logo" class="img-fluid mb-3" style="max-height: 100px;">
          <br>
          <button class="btn btn-outline-primary btn-sm" type="button" disabled>
            <i class="fas fa-upload me-2"></i>Change Logo (Coming soon)
          </button>
        </div>
      </div>

      <div class="admin-card mt-4">
        <div class="card-header">
          <h5 class="mb-0"><i class="fas fa-shield-alt me-2"></i>Security</h5>
        </div>
        <div class="card-body">
          <div class="mb-3">
            <label class="form-label">Admin Password</label>
            <input type="password" class="form-control" placeholder="Current password">
          </div>
          <div class="mb-3">
            <label class="form-label">New Password</label>
            <input type="password" class="form-control" placeholder="New password">
          </div>
          <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" class="form-control" placeholder="Confirm new password">
          </div>
          <button class="btn btn-admin w-100" type="button" disabled>
            <i class="fas fa-key me-2"></i>Change Password (Coming soon)
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection