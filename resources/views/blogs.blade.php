@extends('layouts.app')

@section('title', 'Blogs - Margo Manpower')

@section('content')
<!-- Blogs -->
<section id="blogs" style="padding-top: 120px; background: #f9fafb;">
  <div class="container">
    <h2 class="section-title">Latest Blogs</h2>
    <p style="text-align: center; color: var(--text-secondary); margin-bottom: 60px; font-size: 16px; max-width: 600px; margin-left: auto; margin-right: auto;">
      Career tips, overseas job updates and manpower news to help you succeed.
    </p>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card" style="border: 1px solid var(--border-color); overflow: hidden; transition: all 0.2s ease;" onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 10px 15px -3px rgba(0, 0, 0, 0.1)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 1px 3px rgba(0, 0, 0, 0.05)'">
          <div style="height: 200px; background: linear-gradient(135deg, var(--primary), var(--secondary));"></div>
          <div style="padding: 24px;">
            <h5 style="font-size: 18px; font-weight: 600; margin-bottom: 8px; color: var(--text-primary);">Career Tips for Overseas Workers</h5>
            <p style="font-size: 14px; color: var(--text-secondary); margin-bottom: 12px;">Essential advice for workers planning to work abroad...</p>
            <a href="#" style="font-size: 14px; color: var(--primary); font-weight: 500; text-decoration: none;">Read more →</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card" style="border: 1px solid var(--border-color); overflow: hidden; transition: all 0.2s ease;" onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 10px 15px -3px rgba(0, 0, 0, 0.1)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 1px 3px rgba(0, 0, 0, 0.05)'">
          <div style="height: 200px; background: linear-gradient(135deg, var(--primary), var(--secondary));"></div>
          <div style="padding: 24px;">
            <h5 style="font-size: 18px; font-weight: 600; margin-bottom: 8px; color: var(--text-primary);">Job Market Updates 2026</h5>
            <p style="font-size: 14px; color: var(--text-secondary); margin-bottom: 12px;">Latest trends and opportunities in the international job market...</p>
            <a href="#" style="font-size: 14px; color: var(--primary); font-weight: 500; text-decoration: none;">Read more →</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card" style="border: 1px solid var(--border-color); overflow: hidden; transition: all 0.2s ease;" onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 10px 15px -3px rgba(0, 0, 0, 0.1)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 1px 3px rgba(0, 0, 0, 0.05)'">
          <div style="height: 200px; background: linear-gradient(135deg, var(--primary), var(--secondary));"></div>
          <div style="padding: 24px;">
            <h5 style="font-size: 18px; font-weight: 600; margin-bottom: 8px; color: var(--text-primary);">Success Stories</h5>
            <p style="font-size: 14px; color: var(--text-secondary); margin-bottom: 12px;">Inspiring stories from workers who found success overseas...</p>
            <a href="#" style="font-size: 14px; color: var(--primary); font-weight: 500; text-decoration: none;">Read more →</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection