@extends('layouts.admin')

@section('page-title', 'Job Applications')

@section('content')
<div class="container-fluid">
  <div class="row mb-4">
    <div class="col-12">
      <h2>Job Applications</h2>
    </div>
  </div>

  <!-- Stats -->
  <div class="row mb-4">
    <div class="col-md-4">
      <div class="stats-card">
        <div class="stat-number">156</div>
        <div class="stat-label">Total Applications</div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="stats-card">
        <div class="stat-number">23</div>
        <div class="stat-label">Pending Review</div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="stats-card">
        <div class="stat-number">89</div>
        <div class="stat-label">Approved</div>
      </div>
    </div>
  </div>

  <div class="admin-card">
    <div class="card-header">
      <h5 class="mb-0"><i class="fas fa-file-alt me-2"></i>Recent Applications</h5>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table admin-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Applicant</th>
              <th>Job Title</th>
              <th>Applied Date</th>
              <th>Status</th>
              <th>Documents</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>
                <div>
                  <strong>Aung Kyaw</strong><br>
                  <small>aung@example.com</small>
                </div>
              </td>
              <td>Construction Worker</td>
              <td>2024-01-15</td>
              <td><span class="badge bg-warning">Under Review</span></td>
              <td>
                <button class="btn btn-sm btn-outline-secondary">
                  <i class="fas fa-file-pdf"></i> CV
                </button>
              </td>
              <td>
                <button class="btn btn-sm btn-outline-success me-1">
                  <i class="fas fa-check"></i> Approve
                </button>
                <button class="btn btn-sm btn-outline-danger">
                  <i class="fas fa-times"></i> Reject
                </button>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>
                <div>
                  <strong>Mya Thwe</strong><br>
                  <small>mya@example.com</small>
                </div>
              </td>
              <td>Factory Operator</td>
              <td>2024-01-18</td>
              <td><span class="badge bg-success">Approved</span></td>
              <td>
                <button class="btn btn-sm btn-outline-secondary">
                  <i class="fas fa-file-pdf"></i> CV
                </button>
              </td>
              <td>
                <button class="btn btn-sm btn-outline-info">
                  <i class="fas fa-eye"></i> View Details
                </button>
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>
                <div>
                  <strong>Khing Htwe</strong><br>
                  <small>khing@example.com</small>
                </div>
              </td>
              <td>Hotel Staff</td>
              <td>2024-01-20</td>
              <td><span class="badge bg-danger">Rejected</span></td>
              <td>
                <button class="btn btn-sm btn-outline-secondary">
                  <i class="fas fa-file-pdf"></i> CV
                </button>
              </td>
              <td>
                <button class="btn btn-sm btn-outline-info">
                  <i class="fas fa-eye"></i> View Details
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection