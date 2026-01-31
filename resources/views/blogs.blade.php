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
    
    @if(isset($blogs) && $blogs->count() > 0)
      <div class="row g-4">
        @foreach($blogs as $blog)
          <div class="col-md-4">
            <div class="card" style="overflow: hidden; display: flex; flex-direction: column; padding: 0;">
              
              <!-- Featured Image -->
              @if($blog->featured_image)
                <a href="{{ localized_route('blog.detail', ['slug' => $blog->slug]) }}" style="text-decoration: none; display: block;">
                  <div style="height: 200px; background-image: url('{{ storage_url($blog->featured_image) }}'); background-size: cover; background-position: center; position: relative;">
                    <div style="position: absolute; bottom: 8px; left: 8px; background: rgba(0, 0, 0, 0.6); color: white; padding: 4px 8px; border-radius: 4px; font-size: 12px; display: flex; align-items: center; gap: 4px;">
                      <i class="fas fa-eye"></i>
                      <span>{{ $blog->views }}</span>
                    </div>
                  </div>
                </a>
              @else
                <div style="height: 200px; background: linear-gradient(135deg, var(--primary), var(--secondary)); position: relative;">
                  <div style="position: absolute; bottom: 8px; left: 8px; background: rgba(0, 0, 0, 0.6); color: white; padding: 4px 8px; border-radius: 4px; font-size: 12px; display: flex; align-items: center; gap: 4px;">
                    <i class="fas fa-eye"></i>
                    <span>{{ $blog->views }}</span>
                  </div>
                </div>
              @endif
              
              <div style="padding: 24px; flex: 1; display: flex; flex-direction: column;">
                <!-- Category Badge -->
                @if($blog->category)
                  <div style="margin-bottom: 12px;">
                    <span style="display: inline-block; padding: 4px 12px; border-radius: 4px; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; background: rgba(15, 111, 179, 0.1); color: var(--primary);">
                      {{ $blog->category }}
                    </span>
                  </div>
                @endif

                <!-- Blog Title -->
                <h5 style="font-size: 18px; font-weight: 600; margin-bottom: 8px; color: var(--text-primary);">
                  <a href="{{ localized_route('blog.detail', ['slug' => $blog->slug]) }}" style="color: inherit; text-decoration: none;">
                    {{ Str::limit($blog->title, 60) }}
                  </a>
                </h5>
                
                <!-- Excerpt -->
                @if($blog->excerpt)
                  <p style="font-size: 14px; color: var(--text-secondary); margin-bottom: 12px; line-height: 1.6; flex: 1;">
                    {{ Str::limit($blog->excerpt, 100) }}
                  </p>
                @else
                  <p style="font-size: 14px; color: var(--text-secondary); margin-bottom: 12px; line-height: 1.6; flex: 1;">
                    {{ Str::limit(strip_tags($blog->body), 100) }}
                  </p>
                @endif

                <!-- Meta Info -->
                <div style="display: flex; align-items: center; justify-content: space-between; margin-top: auto; padding-top: 12px; border-top: 1px solid var(--border-color); font-size: 12px; color: var(--text-secondary);">
                  <div style="display: flex; align-items: center; gap: 12px;">
                    @if($blog->published_at)
                      <div style="display: flex; align-items: center; gap: 4px;">
                        <i class="fas fa-calendar"></i>
                        <span>{{ $blog->published_at->format('M d, Y') }}</span>
                      </div>
                    @endif
                  </div>
                  <a href="{{ localized_route('blog.detail', ['slug' => $blog->slug]) }}" style="font-size: 14px; color: var(--primary); font-weight: 500; text-decoration: none;">
                    Read more →
                  </a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <!-- Pagination -->
      @if($blogs->hasPages())
        <div style="margin-top: 60px;">
          {{-- Results Info --}}
          <div style="text-align: center; margin-bottom: 24px; color: var(--text-secondary); font-size: 14px;">
            Showing <strong style="color: var(--text-primary);">{{ $blogs->firstItem() }}</strong> to <strong style="color: var(--text-primary);">{{ $blogs->lastItem() }}</strong> of <strong style="color: var(--text-primary);">{{ $blogs->total() }}</strong> results
          </div>

          {{-- Pagination Navigation --}}
          <div style="display: flex; justify-content: center; align-items: center; gap: 8px; flex-wrap: wrap;">
            {{-- First Page Link --}}
            @if ($blogs->currentPage() > 3)
              <a href="{{ $blogs->url(1) }}" style="padding: 8px 12px; border: 1px solid var(--border-color); border-radius: 6px; color: var(--text-primary); text-decoration: none; background: white; transition: all 0.2s ease; display: inline-flex; align-items: center; justify-content: center; min-width: 36px; height: 36px; font-size: 14px; font-weight: 500;" 
                 onmouseover="this.style.background='var(--bg-hover)'; this.style.borderColor='var(--primary)'; this.style.color='var(--primary)'" 
                 onmouseout="this.style.background='white'; this.style.borderColor='var(--border-color)'; this.style.color='var(--text-primary)'">
                1
              </a>
              @if ($blogs->currentPage() > 4)
                <span style="padding: 8px 4px; color: var(--text-secondary); font-size: 14px;">...</span>
              @endif
            @endif

            {{-- Previous Page Link --}}
            @if ($blogs->onFirstPage())
              <span style="padding: 8px 12px; border: 1px solid var(--border-color); border-radius: 6px; color: var(--text-secondary); background: white; cursor: not-allowed; opacity: 0.5; display: inline-flex; align-items: center; justify-content: center; min-width: 36px; height: 36px;">
                <i class="fas fa-chevron-left" style="font-size: 12px;"></i>
              </span>
            @else
              <a href="{{ $blogs->previousPageUrl() }}" 
                 style="padding: 8px 12px; border: 1px solid var(--border-color); border-radius: 6px; color: var(--text-primary); text-decoration: none; background: white; transition: all 0.2s ease; display: inline-flex; align-items: center; justify-content: center; min-width: 36px; height: 36px;" 
                 onmouseover="this.style.background='var(--bg-hover)'; this.style.borderColor='var(--primary)'; this.style.color='var(--primary)'" 
                 onmouseout="this.style.background='white'; this.style.borderColor='var(--border-color)'; this.style.color='var(--text-primary)'">
                <i class="fas fa-chevron-left" style="font-size: 12px;"></i>
              </a>
            @endif

            {{-- Page Numbers --}}
            @php
              $currentPage = $blogs->currentPage();
              $lastPage = $blogs->lastPage();
              $startPage = max(1, $currentPage - 2);
              $endPage = min($lastPage, $currentPage + 2);
              
              // Adjust range if we're near the start or end
              if ($currentPage <= 3) {
                $startPage = 1;
                $endPage = min(5, $lastPage);
              }
              if ($currentPage >= $lastPage - 2) {
                $startPage = max(1, $lastPage - 4);
                $endPage = $lastPage;
              }
            @endphp

            @for ($page = $startPage; $page <= $endPage; $page++)
              @if ($page == $blogs->currentPage())
                <span style="padding: 8px 12px; border: 1px solid var(--primary); border-radius: 6px; color: white; background: var(--primary); font-weight: 600; min-width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center; font-size: 14px;">
                  {{ $page }}
                </span>
              @else
                <a href="{{ $blogs->url($page) }}" 
                   style="padding: 8px 12px; border: 1px solid var(--border-color); border-radius: 6px; color: var(--text-primary); text-decoration: none; background: white; transition: all 0.2s ease; min-width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center; font-size: 14px; font-weight: 500;" 
                   onmouseover="this.style.background='var(--bg-hover)'; this.style.borderColor='var(--primary)'; this.style.color='var(--primary)'" 
                   onmouseout="this.style.background='white'; this.style.borderColor='var(--border-color)'; this.style.color='var(--text-primary)'">
                  {{ $page }}
                </a>
              @endif
            @endfor

            {{-- Next Page Link --}}
            @if ($blogs->hasMorePages())
              <a href="{{ $blogs->nextPageUrl() }}" 
                 style="padding: 8px 12px; border: 1px solid var(--border-color); border-radius: 6px; color: var(--text-primary); text-decoration: none; background: white; transition: all 0.2s ease; display: inline-flex; align-items: center; justify-content: center; min-width: 36px; height: 36px;" 
                 onmouseover="this.style.background='var(--bg-hover)'; this.style.borderColor='var(--primary)'; this.style.color='var(--primary)'" 
                 onmouseout="this.style.background='white'; this.style.borderColor='var(--border-color)'; this.style.color='var(--text-primary)'">
                <i class="fas fa-chevron-right" style="font-size: 12px;"></i>
              </a>
            @else
              <span style="padding: 8px 12px; border: 1px solid var(--border-color); border-radius: 6px; color: var(--text-secondary); background: white; cursor: not-allowed; opacity: 0.5; display: inline-flex; align-items: center; justify-content: center; min-width: 36px; height: 36px;">
                <i class="fas fa-chevron-right" style="font-size: 12px;"></i>
              </span>
            @endif

            {{-- Last Page Link --}}
            @if ($blogs->currentPage() < $blogs->lastPage() - 2)
              @if ($blogs->currentPage() < $blogs->lastPage() - 3)
                <span style="padding: 8px 4px; color: var(--text-secondary); font-size: 14px;">...</span>
              @endif
              <a href="{{ $blogs->url($blogs->lastPage()) }}" 
                 style="padding: 8px 12px; border: 1px solid var(--border-color); border-radius: 6px; color: var(--text-primary); text-decoration: none; background: white; transition: all 0.2s ease; display: inline-flex; align-items: center; justify-content: center; min-width: 36px; height: 36px; font-size: 14px; font-weight: 500;" 
                 onmouseover="this.style.background='var(--bg-hover)'; this.style.borderColor='var(--primary)'; this.style.color='var(--primary)'" 
                 onmouseout="this.style.background='white'; this.style.borderColor='var(--border-color)'; this.style.color='var(--text-primary)'">
                {{ $blogs->lastPage() }}
              </a>
            @endif
          </div>
        </div>
      @endif
    @else
      <div style="text-align: center; padding: 60px 20px;">
        <div style="width: 80px; height: 80px; border-radius: 50%; background: rgba(15, 111, 179, 0.1); display: flex; align-items: center; justify-content: center; margin: 0 auto 24px;">
          <i class="fas fa-blog" style="font-size: 36px; color: var(--primary);"></i>
        </div>
        <h3 style="font-size: 20px; font-weight: 600; color: var(--text-primary); margin-bottom: 8px;">No Blogs Available</h3>
        <p style="font-size: 14px; color: var(--text-secondary);">Check back soon for new blog posts.</p>
      </div>
    @endif
  </div>
</section>
@endsection
