@extends('layouts.admin')

@section('page-title', 'Jobs Management')

@section('content')
<div class="container-fluid">
  <div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
      <h2>Jobs Management</h2>
      <button class="btn btn-admin">
        <i class="fas fa-plus me-2"></i>Post New Job
      </button>
    </div>
  </div>

  <div class="admin-card">
    <div class="card-header">
      <h5 class="mb-0"><i class="fas fa-briefcase me-2"></i>Available Jobs</h5>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table admin-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Job Title</th>
              <th>Company</th>
              <th>Location</th>
              <th>Salary</th>
              <th>Status</th>
              <th>Posted</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Construction Worker</td>
              <td>ABC Builders Ltd</td>
              <td>Singapore</td>
              <td>$1,200/month</td>
              <td><span class="badge bg-success">Active</span></td>
              <td>2024-01-10</td>
              <td>
                <a href="#" class="btn-action btn-action-edit" title="Edit">
                  <i class="fas fa-edit"></i>
                </a>
                <a href="#" class="btn-action btn-action-view" title="View">
                  <i class="fas fa-eye"></i>
                </a>
                <button type="button" class="btn-action btn-action-delete" title="Delete" onclick="if(confirm('Are you sure you want to delete this job?')) { /* Add delete logic here */ }">
                  <i class="fas fa-trash"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>Factory Operator</td>
              <td>XYZ Manufacturing</td>
              <td>Malaysia</td>
              <td>$900/month</td>
              <td><span class="badge bg-success">Active</span></td>
              <td>2024-01-12</td>
              <td>
                <a href="#" class="btn-action btn-action-edit" title="Edit">
                  <i class="fas fa-edit"></i>
                </a>
                <a href="#" class="btn-action btn-action-view" title="View">
                  <i class="fas fa-eye"></i>
                </a>
                <button type="button" class="btn-action btn-action-delete" title="Delete" onclick="if(confirm('Are you sure you want to delete this job?')) { /* Add delete logic here */ }">
                  <i class="fas fa-trash"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>Hotel Staff</td>
              <td>Paradise Hotel</td>
              <td>Thailand</td>
              <td>$800/month</td>
              <td><span class="badge bg-warning">Pending</span></td>
              <td>2024-01-18</td>
              <td>
                <a href="#" class="btn-action btn-action-edit" title="Edit">
                  <i class="fas fa-edit"></i>
                </a>
                <a href="#" class="btn-action btn-action-view" title="View">
                  <i class="fas fa-eye"></i>
                </a>
                <button type="button" class="btn-action btn-action-delete" title="Delete" onclick="if(confirm('Are you sure you want to delete this job?')) { /* Add delete logic here */ }">
                  <i class="fas fa-trash"></i>
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