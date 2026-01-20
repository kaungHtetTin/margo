@extends('layouts.admin')

@section('page-title', 'Users Management')

@section('content')
<div class="container-fluid">
  <div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
      <h2>Users Management</h2>
      <button class="btn btn-admin">
        <i class="fas fa-plus me-2"></i>Add New User
      </button>
    </div>
  </div>

  <div class="admin-card">
    <div class="card-header">
      <h5 class="mb-0"><i class="fas fa-users me-2"></i>All Users</h5>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table admin-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Status</th>
              <th>Registered</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>John Doe</td>
              <td>john@example.com</td>
              <td>+95 123 456 789</td>
              <td><span class="badge bg-success">Active</span></td>
              <td>2024-01-15</td>
              <td>
                <a href="#" class="btn-action btn-action-edit" title="Edit">
                  <i class="fas fa-edit"></i>
                </a>
                <button type="button" class="btn-action btn-action-delete" title="Delete" onclick="if(confirm('Are you sure you want to delete this user?')) { /* Add delete logic here */ }">
                  <i class="fas fa-trash"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>Jane Smith</td>
              <td>jane@example.com</td>
              <td>+95 987 654 321</td>
              <td><span class="badge bg-warning">Pending</span></td>
              <td>2024-01-18</td>
              <td>
                <a href="#" class="btn-action btn-action-edit" title="Edit">
                  <i class="fas fa-edit"></i>
                </a>
                <button type="button" class="btn-action btn-action-delete" title="Delete" onclick="if(confirm('Are you sure you want to delete this user?')) { /* Add delete logic here */ }">
                  <i class="fas fa-trash"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>Bob Johnson</td>
              <td>bob@example.com</td>
              <td>+95 555 123 456</td>
              <td><span class="badge bg-success">Active</span></td>
              <td>2024-01-20</td>
              <td>
                <a href="#" class="btn-action btn-action-edit" title="Edit">
                  <i class="fas fa-edit"></i>
                </a>
                <button type="button" class="btn-action btn-action-delete" title="Delete" onclick="if(confirm('Are you sure you want to delete this user?')) { /* Add delete logic here */ }">
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