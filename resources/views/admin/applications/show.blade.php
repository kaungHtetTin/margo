@extends('layouts.admin')

@section('page-title', 'Application Details')

@section('content')
<style>
  /* Application detail: sheet-style layout, admin theme */
  .app-detail-console { font-size: 14px; color: var(--text-primary); }

  /* Toolbar */
  .app-detail-console .app-toolbar {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    padding: 12px 0 20px;
    border-bottom: 1px solid var(--border-color);
    margin-bottom: 24px;
  }
  .app-detail-console .app-toolbar-left { display: flex; align-items: center; gap: 16px; flex-wrap: wrap; }
  .app-detail-console .app-toolbar-right { display: flex; align-items: center; gap: 12px; flex-wrap: wrap; }
  .app-detail-console .app-back {
    display: inline-flex; align-items: center; gap: 6px;
    color: var(--primary); text-decoration: none; font-size: 14px; font-weight: 500;
  }
  .app-detail-console .app-back:hover { color: #0d5a9a; background: var(--bg-hover); text-decoration: none; padding: 6px 10px; margin: -6px -10px; border-radius: 6px; }
  .app-detail-console .app-title { font-size: 22px; font-weight: 600; color: var(--text-primary); margin: 0; letter-spacing: -0.02em; }
  .app-detail-console .app-meta { font-size: 13px; color: var(--text-secondary); margin-top: 4px; }
  .app-detail-console .app-timestamp { font-size: 13px; color: var(--text-secondary); }
  .app-detail-console .app-chip {
    display: inline-flex; align-items: center; gap: 4px;
    padding: 5px 12px; border-radius: 6px; font-size: 12px; font-weight: 600;
  }
  .app-detail-console .app-chip-pending { background: #fef3c7; color: #92400e; }
  .app-detail-console .app-chip-approved { background: rgba(15, 111, 179, 0.12); color: #0d5a9a; }
  .app-detail-console .app-chip-rejected { background: #fee2e2; color: #991b1b; }
  .app-detail-console .app-actions .btn { font-size: 14px; padding: 8px 16px; border-radius: 6px; }

  /* Sheet layout - admin-card style */
  .app-detail-console .app-layout { display: flex; gap: 24px; align-items: flex-start; }
  @media (max-width: 991.98px) { .app-detail-console .app-layout { flex-direction: column; } }
  .app-detail-console .app-sheet-wrap { flex: 1; min-width: 0; }
  .app-detail-console .app-sheet {
    background: #fff;
    border: 1px solid var(--border-color);
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    margin-bottom: 24px;
  }
  .app-detail-console .app-sheet-head {
    padding: 16px 20px;
    border-bottom: 1px solid var(--border-color);
    background: #fff;
    font-weight: 600;
    font-size: 15px;
    color: var(--text-primary);
  }
  .app-detail-console .app-sheet-head i { color: var(--primary); margin-right: 8px; }
  /* Simple table */
  .app-detail-console .app-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 14px;
  }
  .app-detail-console .app-table th,
  .app-detail-console .app-table td {
    padding: 6px 10px;
    border: 1px solid var(--border-color);
    text-align: left;
    vertical-align: top;
  }
  .app-detail-console .app-table th {
    background: var(--bg-hover);
    color: var(--text-secondary);
    font-weight: 500;
    width: 180px;
  }
  .app-detail-console .app-table td {
    color: var(--text-primary);
    line-height: 1.5;
    white-space: pre-wrap;
    word-break: break-word;
  }
  .app-detail-console .app-table td.app-empty { color: var(--text-secondary); font-style: italic; }
  .app-detail-console .app-table td img { max-width: 100%; max-height: 200px; display: block; }

  /* Sidebar panels - admin-card style */
  .app-detail-console .app-sidebar { flex: 0 0 280px; }
  .app-detail-console .app-panel {
    background: #fff;
    border: 1px solid var(--border-color);
    border-radius: 12px;
    overflow: hidden;
    margin-bottom: 24px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
  }
  .app-detail-console .app-panel-head {
    padding: 16px 20px;
    border-bottom: 1px solid var(--border-color);
    font-weight: 600;
    font-size: 15px;
    color: var(--text-primary);
  }
  .app-detail-console .app-panel-head i { margin-right: 8px; color: var(--primary); }
  .app-detail-console .app-panel-body { padding: 20px; }
  .app-detail-console .app-respondent-row {
    display: flex; flex-direction: column; gap: 2px;
    padding: 10px 0;
    border-bottom: 1px solid var(--border-color);
    font-size: 14px;
  }
  .app-detail-console .app-respondent-row:last-child { border-bottom: none; padding-bottom: 0; }
  .app-detail-console .app-respondent-row:first-child { padding-top: 0; }
  .app-detail-console .app-respondent-row .label { color: var(--text-secondary); font-size: 12px; font-weight: 500; }
  .app-detail-console .app-respondent-row .value { color: var(--text-primary); font-weight: 500; word-break: break-word; }
  .app-detail-console .app-status-form .form-select {
    font-size: 14px;
    border-radius: 6px;
    border-color: var(--border-color);
    padding: 10px 12px;
  }
  .app-detail-console .app-status-form .btn-admin { width: 100%; margin-top: 12px; }
  .app-detail-console .app-empty-state {
    text-align: center;
    padding: 48px 24px;
    color: var(--text-secondary);
    font-size: 14px;
  }
  .app-detail-console .app-empty-state .icon { font-size: 48px; opacity: 0.3; margin-bottom: 12px; }

  /* Print / PDF – data sheet only */
  @media print {
    body * { visibility: hidden; }
    .app-detail-console .app-sheet-wrap,
    .app-detail-console .app-sheet-wrap * { visibility: visible; }
    .app-detail-console .app-sheet-wrap {
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
      margin: 0;
      padding: 0;
    }
    .app-detail-console .app-sheet { box-shadow: none; border: 1px solid #333; }
    .app-detail-console .app-table tr { break-inside: avoid; }
  }
</style>

<div class="container-fluid app-detail-console">
  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 8px; margin-bottom: 24px;">
      <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 8px; margin-bottom: 24px;">
      <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  {{-- Toolbar: Back, title, timestamp, status, actions --}}
  <div class="app-toolbar">
    <div class="app-toolbar-left">
      <a href="{{ route('admin.applications.index') }}" class="app-back">
        <i class="fas fa-arrow-left"></i> Back to responses
      </a>
      <div>
        <h1 class="app-title">{{ $applicant->name }}</h1>
        @if($jobForm)
          <div class="app-meta">{{ $jobForm->title }}</div>
        @endif
      </div>
    </div>
    <div class="app-toolbar-right">
      <span class="app-timestamp">{{ $applicant->created_at->format('M j, Y, g:i A') }}</span>
      @php $status = $applicant->status ?? 'pending'; @endphp
      <span class="app-chip app-chip-{{ $status }}">
        @if($status === 'pending')<i class="fas fa-clock" style="font-size:10px"></i> Pending
        @elseif($status === 'approved')<i class="fas fa-check" style="font-size:10px"></i> Approved
        @else<i class="fas fa-times" style="font-size:10px"></i> Rejected
        @endif
      </span>
      <div class="app-actions">
        <button type="button" class="btn btn-outline-secondary btn-sm" onclick="window.print()" title="Print or Save as PDF">
          <i class="fas fa-print me-1"></i> Print / PDF
        </button>
        <form action="{{ route('admin.applications.destroy', $applicant->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this response?');">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash me-1"></i> Delete</button>
        </form>
      </div>
    </div>
  </div>

  <div class="app-layout">
    {{-- Main: sheet of Q/A rows --}}
    <div class="app-sheet-wrap">
      <div class="app-sheet">
        <div class="app-sheet-head"><i class="fas fa-clipboard-list"></i> Response</div>
        @if($applications->count() > 0)
          <table class="app-table">
            <tbody>
              @foreach($applications as $application)
                @php
                  $formData = $application->jobFormData;
                  $title = $formData ? ($formData->title ?? 'Field') : 'Field';
                  $type = $formData ? ($formData->type ?? 'text') : 'text';
                  $value = $application->value;
                  $isImage = $type === 'image';
                  $valueEmpty = $value === null || $value === '';
                @endphp
                <tr>
                  <th>{{ $title }}</th>
                  <td class="{{ !$isImage && $valueEmpty ? 'app-empty' : '' }}">@if($isImage)
                    @if($value)
                      <img src="{{ storage_url($value) }}" alt="{{ $title }}">
                    @else
                      <span class="app-empty">No file uploaded</span>
                    @endif
                  @else{{ $value ?? '—' }}@endif</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @else
          <div class="app-empty-state">
            <div class="icon"><i class="fas fa-inbox"></i></div>
            <p class="mb-0">No responses in this submission.</p>
          </div>
        @endif
      </div>
    </div>

    {{-- Sidebar: respondent info + status --}}
    <div class="app-sidebar">
      <div class="app-panel">
        <div class="app-panel-head"><i class="fas fa-user"></i> Respondent</div>
        <div class="app-panel-body">
          <div class="app-respondent-row">
            <span class="label">Name</span>
            <span class="value">{{ $applicant->name }}</span>
          </div>
          @if($applicant->emails)
            <div class="app-respondent-row">
              <span class="label">Email</span>
              <span class="value">{{ $applicant->emails }}</span>
            </div>
          @endif
          @if($applicant->phone)
            <div class="app-respondent-row">
              <span class="label">Phone</span>
              <span class="value">{{ $applicant->phone }}</span>
            </div>
          @endif
          <div class="app-respondent-row">
            <span class="label">Submitted</span>
            <span class="value">{{ $applicant->created_at->format('M j, Y g:i A') }}</span>
          </div>
        </div>
      </div>
      <div class="app-panel">
        <div class="app-panel-head"><i class="fas fa-flag"></i> Status</div>
        <div class="app-panel-body">
          <form action="{{ route('admin.applications.update', $applicant->id) }}" method="POST" class="app-status-form">
            @csrf
            @method('PUT')
            <select name="status" id="app-status" class="form-select">
              <option value="pending" {{ ($applicant->status ?? 'pending') === 'pending' ? 'selected' : '' }}>Pending</option>
              <option value="approved" {{ ($applicant->status ?? '') === 'approved' ? 'selected' : '' }}>Approved</option>
              <option value="rejected" {{ ($applicant->status ?? '') === 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
            <button type="submit" class="btn btn-admin"><i class="fas fa-save me-1"></i> Update status</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
