@extends('layouts.admin')

@section('page-title', 'System Settings')

@section('content')
<div class="container-fluid">
  <div class="row mb-4">
    <div class="col-12">
      <h2>System Settings</h2>
    </div>
  </div>

  <div class="row">
    <div class="col-md-8">
      <div class="admin-card">
        <div class="card-header">
          <h5 class="mb-0"><i class="fas fa-cog me-2"></i>General Settings</h5>
        </div>
        <div class="card-body">
          <form>
            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Company Name</label>
                <input type="text" class="form-control" value="Margo Manpower Co., Ltd">
              </div>
              <div class="col-md-6">
                <label class="form-label">Contact Email</label>
                <input type="email" class="form-control" value="info@margomanpower.com">
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Phone Number</label>
                <input type="text" class="form-control" value="+95 xxx xxx xxx">
              </div>
              <div class="col-md-6">
                <label class="form-label">Website URL</label>
                <input type="url" class="form-control" value="https://margomanpower.com">
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label">Company Description</label>
              <textarea class="form-control" rows="3">Overseas Employment & Recruitment Services</textarea>
            </div>

            <div class="mb-3">
              <label class="form-label">Address</label>
              <textarea class="form-control" rows="2">Yangon, Myanmar</textarea>
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
          <form>
            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">SMTP Host</label>
                <input type="text" class="form-control" placeholder="smtp.example.com">
              </div>
              <div class="col-md-6">
                <label class="form-label">SMTP Port</label>
                <input type="number" class="form-control" placeholder="587">
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">SMTP Username</label>
                <input type="email" class="form-control" placeholder="noreply@example.com">
              </div>
              <div class="col-md-6">
                <label class="form-label">SMTP Password</label>
                <input type="password" class="form-control" placeholder="••••••••">
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
          <img src="margo-logo.png" alt="Current Logo" class="img-fluid mb-3" style="max-height: 100px;">
          <br>
          <button class="btn btn-outline-primary btn-sm">
            <i class="fas fa-upload me-2"></i>Change Logo
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
          <button class="btn btn-admin w-100">
            <i class="fas fa-key me-2"></i>Change Password
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection