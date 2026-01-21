@extends('layouts.app')

@section('title', ($blog->meta_title ?? $blog->title) . ' - Margo Manpower')

@section('meta')
@if($blog->meta_description)
  <meta name="description" content="{{ $blog->meta_description }}">
@endif
@if($blog->meta_title)
  <meta name="keywords" content="{{ $blog->tags ? implode(', ', $blog->tags) : '' }}">
@endif
<!-- Open Graph / Facebook -->
<meta property="og:type" content="article">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="{{ $blog->meta_title ?? $blog->title }}">
<meta property="og:description" content="{{ $blog->meta_description ?? Str::limit($blog->excerpt ?? strip_tags($blog->body), 160) }}">
@if($blog->featured_image)
<meta property="og:image" content="{{ storage_url($blog->featured_image) }}">
@endif
<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ url()->current() }}">
<meta property="twitter:title" content="{{ $blog->meta_title ?? $blog->title }}">
<meta property="twitter:description" content="{{ $blog->meta_description ?? Str::limit($blog->excerpt ?? strip_tags($blog->body), 160) }}">
@if($blog->featured_image)
<meta property="twitter:image" content="{{ storage_url($blog->featured_image) }}">
@endif
@endsection

@section('content')
<!-- Blog Detail Section -->
<section id="blog-detail" style="padding-top: 120px;">
  <div class="container">
    <div class="row">
      <!-- Main Content -->
      <div class="col-lg-8">

        <!-- Featured Image -->
        @if($blog->featured_image)
          <div style="margin-bottom: 32px; border-radius: 12px; overflow: hidden;">
            <img src="{{ storage_url($blog->featured_image) }}" alt="{{ $blog->title }}" style="width: 100%; height: 400px; object-fit: cover;">
          </div>
        @endif

        <!-- Category Badge -->
        @if($blog->category)
          <div style="margin-bottom: 16px;">
            <span style="display: inline-block; padding: 6px 16px; border-radius: 6px; font-size: 13px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; background: rgba(15, 111, 179, 0.1); color: var(--primary);">
              {{ $blog->category }}
            </span>
          </div>
        @endif

        <!-- Blog Title -->
        <h1 style="font-size: 36px; font-weight: 600; color: var(--text-primary); margin-bottom: 16px; letter-spacing: -0.02em; line-height: 1.2;">
          {{ $blog->title }}
        </h1>

        <!-- Meta Information -->
        <div style="display: flex; align-items: center; gap: 24px; margin-bottom: 32px; padding-bottom: 24px; border-bottom: 1px solid var(--border-color); flex-wrap: wrap;">
          @if($blog->author)
            <div style="display: flex; align-items: center; gap: 8px; color: var(--text-secondary); font-size: 14px;">
              <i class="fas fa-user"></i>
              <span>{{ $blog->author->name }}</span>
            </div>
          @endif
          
          @if($blog->published_at)
            <div style="display: flex; align-items: center; gap: 8px; color: var(--text-secondary); font-size: 14px;">
              <i class="fas fa-calendar"></i>
              <span>{{ $blog->published_at->format('F d, Y') }}</span>
            </div>
          @endif

          <div style="display: flex; align-items: center; gap: 8px; color: var(--text-secondary); font-size: 14px;">
            <i class="fas fa-eye"></i>
            <span>{{ $blog->views }} {{ $blog->views == 1 ? 'view' : 'views' }}</span>
          </div>
        </div>

        <!-- Blog Body Content -->
        <div style="margin-bottom: 32px;">
          <div style="font-size: 15px; color: var(--text-secondary); line-height: 1.8;">
            {!! nl2br(e($blog->body)) !!}
          </div>
        </div>

        <!-- Body Images -->
        @if($blog->body_images && count($blog->body_images) > 0)
          <div style="margin-bottom: 32px;">
            <div class="row g-3">
              @foreach($blog->body_images as $image)
                <div class="col-md-6">
                  <img src="{{ storage_url($image) }}" alt="Blog Image" style="width: 100%; border-radius: 8px; border: 1px solid var(--border-color);">
                </div>
              @endforeach
            </div>
          </div>
        @endif

        <!-- Tags -->
        @if($blog->tags && count($blog->tags) > 0)
          <div style="margin-bottom: 32px; padding-top: 24px; border-top: 1px solid var(--border-color);">
            <h3 style="font-size: 20px; font-weight: 600; color: var(--text-primary); margin-bottom: 16px;">Tags</h3>
            <div style="display: flex; flex-wrap: wrap; gap: 8px;">
              @foreach($blog->tags as $tag)
                <span style="display: inline-block; padding: 6px 12px; border-radius: 6px; font-size: 13px; background: rgba(15, 111, 179, 0.1); color: var(--primary); border: 1px solid rgba(15, 111, 179, 0.2);">
                  {{ $tag }}
                </span>
              @endforeach
            </div>
          </div>
        @endif

        <!-- Share Section -->
        <div class="card" style="border: 1px solid var(--border-color); border-radius: 12px; padding: 24px; margin-bottom: 32px;">
          <h3 style="font-size: 20px; font-weight: 600; color: var(--text-primary); margin-bottom: 20px;">Share this article</h3>
          <div style="display: flex; align-items: center; gap: 12px; flex-wrap: wrap;">
            @php
              $blogUrl = url()->current();
              $blogTitle = urlencode($blog->title);
              $blogDescription = urlencode($blog->excerpt ?? Str::limit(strip_tags($blog->body), 100));
            @endphp
            
            <!-- Facebook Share -->
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($blogUrl) }}" 
               target="_blank" 
               rel="noopener noreferrer"
               style="display: inline-flex; align-items: center; gap: 8px; padding: 10px 16px; border-radius: 8px; background: #1877f2; color: white; text-decoration: none; font-size: 14px; font-weight: 500; transition: all 0.2s ease;"
               onmouseover="this.style.opacity='0.9'; this.style.transform='translateY(-2px)'"
               onmouseout="this.style.opacity='1'; this.style.transform='translateY(0)'">
              <i class="fab fa-facebook-f"></i>
              <span>Facebook</span>
            </a>

            <!-- Twitter Share -->
            <a href="https://twitter.com/intent/tweet?url={{ urlencode($blogUrl) }}&text={{ $blogTitle }}" 
               target="_blank" 
               rel="noopener noreferrer"
               style="display: inline-flex; align-items: center; gap: 8px; padding: 10px 16px; border-radius: 8px; background: #1da1f2; color: white; text-decoration: none; font-size: 14px; font-weight: 500; transition: all 0.2s ease;"
               onmouseover="this.style.opacity='0.9'; this.style.transform='translateY(-2px)'"
               onmouseout="this.style.opacity='1'; this.style.transform='translateY(0)'">
              <i class="fab fa-twitter"></i>
              <span>Twitter</span>
            </a>

            <!-- LinkedIn Share -->
            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode($blogUrl) }}" 
               target="_blank" 
               rel="noopener noreferrer"
               style="display: inline-flex; align-items: center; gap: 8px; padding: 10px 16px; border-radius: 8px; background: #0077b5; color: white; text-decoration: none; font-size: 14px; font-weight: 500; transition: all 0.2s ease;"
               onmouseover="this.style.opacity='0.9'; this.style.transform='translateY(-2px)'"
               onmouseout="this.style.opacity='1'; this.style.transform='translateY(0)'">
              <i class="fab fa-linkedin-in"></i>
              <span>LinkedIn</span>
            </a>

            <!-- WhatsApp Share -->
            <a href="https://wa.me/?text={{ $blogTitle }}%20{{ urlencode($blogUrl) }}" 
               target="_blank" 
               rel="noopener noreferrer"
               style="display: inline-flex; align-items: center; gap: 8px; padding: 10px 16px; border-radius: 8px; background: #25d366; color: white; text-decoration: none; font-size: 14px; font-weight: 500; transition: all 0.2s ease;"
               onmouseover="this.style.opacity='0.9'; this.style.transform='translateY(-2px)'"
               onmouseout="this.style.opacity='1'; this.style.transform='translateY(0)'">
              <i class="fab fa-whatsapp"></i>
              <span>WhatsApp</span>
            </a>

            <!-- Copy Link Button -->
            <button onclick="copyBlogLink()" 
                    style="display: inline-flex; align-items: center; gap: 8px; padding: 10px 16px; border-radius: 8px; background: var(--primary); color: white; font-size: 14px; font-weight: 500; border: none; cursor: pointer; transition: all 0.2s ease;"
                    onmouseover="this.style.opacity='0.9'; this.style.transform='translateY(-2px)'"
                    onmouseout="this.style.opacity='1'; this.style.transform='translateY(0)'"
                    id="copyLinkBtn">
              <i class="fas fa-link"></i>
              <span id="copyLinkText">Copy Link</span>
            </button>
          </div>
        </div>

        <!-- Related Blogs -->
        @if(isset($relatedBlogs) && $relatedBlogs->count() > 0)
          <div style="margin-bottom: 48px; padding-top: 40px; border-top: 2px solid var(--border-color);">
            <div style="margin-bottom: 32px;">
              <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 8px;">
                <div style="width: 5px; height: 28px; background: var(--primary); border-radius: 3px;"></div>
                <h3 style="font-size: 26px; font-weight: 700; color: var(--text-primary); margin: 0; letter-spacing: -0.02em;">Related Articles</h3>
              </div>
              <p style="font-size: 14px; color: var(--text-secondary); margin: 0; padding-left: 17px;">Discover more articles you might find interesting</p>
            </div>
            <div class="row g-4">
              @foreach($relatedBlogs as $relatedBlog)
                <div class="col-md-6">
                  <div class="card" style="border: 1px solid var(--border-color); border-radius: 12px; overflow: hidden; height: 100%;">
                    @if($relatedBlog->featured_image)
                      <a href="{{ localized_route('blog.detail', ['slug' => $relatedBlog->slug]) }}" style="text-decoration: none; display: block;">
                        <img src="{{ storage_url($relatedBlog->featured_image) }}" alt="{{ $relatedBlog->title }}" style="width: 100%; height: 200px; object-fit: cover;">
                      </a>
                    @endif
                    <div class="card-body">
                      @if($relatedBlog->category)
                        <span style="display: inline-block; padding: 4px 12px; border-radius: 4px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; background: rgba(15, 111, 179, 0.1); color: var(--primary); margin-bottom: 12px;">
                          {{ $relatedBlog->category }}
                        </span>
                      @endif
                      <h5 class="card-title" style="font-size: 18px; font-weight: 600; margin-bottom: 12px;">
                        <a href="{{ localized_route('blog.detail', ['slug' => $relatedBlog->slug]) }}" style="color: var(--text-primary); text-decoration: none;">
                          {{ Str::limit($relatedBlog->title, 70) }}
                        </a>
                      </h5>
                      @if($relatedBlog->excerpt)
                        <p class="card-text" style="font-size: 14px; color: var(--text-secondary); margin-bottom: 12px;">
                          {{ Str::limit($relatedBlog->excerpt, 100) }}
                        </p>
                      @endif
                      <div style="font-size: 13px; color: var(--text-secondary);">
                        <span><i class="fas fa-eye"></i> {{ $relatedBlog->views }} {{ $relatedBlog->views == 1 ? 'view' : 'views' }}</span>
                        @if($relatedBlog->published_at)
                          <span class="ms-3"><i class="fas fa-calendar-alt"></i> {{ $relatedBlog->published_at->format('M d, Y') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        @endif
      </div>

      <!-- Sidebar -->
      <div class="col-lg-4">
        <div>
          <!-- Latest Blogs -->
          @if(isset($latestBlogs) && $latestBlogs->count() > 0)
            <div class="card" style="border: 1px solid var(--border-color); border-radius: 12px; padding: 0; margin-bottom: 24px; overflow: hidden; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);">
              <!-- Section Header -->
              <div style="padding: 20px 24px; border-bottom: 2px solid var(--primary); background: linear-gradient(135deg, rgba(15, 111, 179, 0.05), rgba(15, 111, 179, 0.02));">
                <h4 style="font-size: 18px; font-weight: 700; color: var(--text-primary); margin: 0; display: flex; align-items: center; gap: 10px; letter-spacing: -0.01em;">
                  <div style="width: 4px; height: 20px; background: var(--primary); border-radius: 2px;"></div>
                  <i class="fas fa-clock" style="color: var(--primary); font-size: 16px;"></i>
                  Latest Articles
                </h4>
              </div>
              
              <div style="padding: 20px 24px;">
                <div style="display: flex; flex-direction: column; gap: 0;">
                  @foreach($latestBlogs as $index => $latestBlog)
                    <a href="{{ localized_route('blog.detail', ['slug' => $latestBlog->slug]) }}" 
                       style="text-decoration: none; display: block; padding: 16px; border-radius: 10px; margin-bottom: {{ $index < $latestBlogs->count() - 1 ? '12px' : '0' }}; border: 1px solid var(--border-color);">
                      <div class="row g-3">
                        <!-- Blog Image -->
                        <div class="col-4">
                          @if($latestBlog->featured_image)
                            <img src="{{ storage_url($latestBlog->featured_image) }}" 
                                 alt="{{ $latestBlog->title }}" 
                                 style="width: 100%; height: 100px; object-fit: cover; border-radius: 8px;">
                          @else
                            <div style="width: 100%; height: 100px; border-radius: 8px; background: linear-gradient(135deg, var(--primary), var(--secondary)); display: flex; align-items: center; justify-content: center;">
                              <i class="fas fa-blog" style="color: rgba(255, 255, 255, 0.9); font-size: 24px;"></i>
                            </div>
                          @endif
                        </div>
                        
                        <!-- Blog Content -->
                        <div class="col-8">
                          <!-- Category Badge -->
                          @if($latestBlog->category)
                            <div style="margin-bottom: 6px;">
                              <span style="display: inline-block; padding: 3px 10px; border-radius: 4px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; background: rgba(15, 111, 179, 0.1); color: var(--primary);">
                                {{ $latestBlog->category }}
                              </span>
                            </div>
                          @endif
                          
                          <h6 style="font-size: 14px; font-weight: 600; color: var(--text-primary); margin: 0 0 8px 0; line-height: 1.4;">
                            {{ Str::limit($latestBlog->title, 60) }}
                          </h6>
                          
                          <div style="font-size: 12px; color: var(--text-secondary);">
                            <span><i class="fas fa-eye"></i> {{ $latestBlog->views }}</span>
                            @if($latestBlog->published_at)
                              <span class="ms-2"><i class="fas fa-calendar-alt"></i> {{ $latestBlog->published_at->format('M d') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>
                    </a>
                  @endforeach
                </div>
              </div>
            </div>
          @endif

          <!-- Related Blogs -->
          @if(isset($relatedBlogs) && $relatedBlogs->count() > 0)
            <div class="card" style="border: 1px solid var(--border-color); border-radius: 12px; padding: 0; overflow: hidden; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);">
              <!-- Section Header -->
              <div style="padding: 20px 24px; border-bottom: 2px solid var(--primary); background: linear-gradient(135deg, rgba(15, 111, 179, 0.05), rgba(15, 111, 179, 0.02));">
                <h4 style="font-size: 18px; font-weight: 700; color: var(--text-primary); margin: 0; display: flex; align-items: center; gap: 10px; letter-spacing: -0.01em;">
                  <div style="width: 4px; height: 20px; background: var(--primary); border-radius: 2px;"></div>
                  <i class="fas fa-link" style="color: var(--primary); font-size: 16px;"></i>
                  Related Articles
                </h4>
              </div>
              
              <div style="padding: 20px 24px;">
                <div style="display: flex; flex-direction: column; gap: 0;">
                  @foreach($relatedBlogs as $index => $relatedBlog)
                    <a href="{{ localized_route('blog.detail', ['slug' => $relatedBlog->slug]) }}" 
                       style="text-decoration: none; display: block; padding: 16px; border-radius: 10px; margin-bottom: {{ $index < $relatedBlogs->count() - 1 ? '12px' : '0' }}; border: 1px solid var(--border-color);">
                      <div class="row g-3">
                        <!-- Blog Image -->
                        <div class="col-4">
                          @if($relatedBlog->featured_image)
                            <img src="{{ storage_url($relatedBlog->featured_image) }}" 
                                 alt="{{ $relatedBlog->title }}" 
                                 style="width: 100%; height: 100px; object-fit: cover; border-radius: 8px;">
                          @else
                            <div style="width: 100%; height: 100px; border-radius: 8px; background: linear-gradient(135deg, var(--primary), var(--secondary)); display: flex; align-items: center; justify-content: center;">
                              <i class="fas fa-blog" style="color: rgba(255, 255, 255, 0.9); font-size: 24px;"></i>
                            </div>
                          @endif
                        </div>
                        
                        <!-- Blog Content -->
                        <div class="col-8">
                          <!-- Category Badge -->
                          @if($relatedBlog->category)
                            <div style="margin-bottom: 6px;">
                              <span style="display: inline-block; padding: 3px 10px; border-radius: 4px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; background: rgba(15, 111, 179, 0.1); color: var(--primary);">
                                {{ $relatedBlog->category }}
                              </span>
                            </div>
                          @endif
                          
                          <h6 style="font-size: 14px; font-weight: 600; color: var(--text-primary); margin: 0 0 8px 0; line-height: 1.4;">
                            {{ Str::limit($relatedBlog->title, 60) }}
                          </h6>
                          
                          <div style="font-size: 12px; color: var(--text-secondary);">
                            <span><i class="fas fa-eye"></i> {{ $relatedBlog->views }}</span>
                            @if($relatedBlog->published_at)
                              <span class="ms-2"><i class="fas fa-calendar-alt"></i> {{ $relatedBlog->published_at->format('M d') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>
                    </a>
                  @endforeach
                </div>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  function copyBlogLink() {
    const blogUrl = window.location.href;
    navigator.clipboard.writeText(blogUrl).then(function() {
      const btn = document.getElementById('copyLinkBtn');
      const text = document.getElementById('copyLinkText');
      const originalText = text.textContent;
      text.textContent = 'Copied!';
      btn.style.background = '#22c55e';
      
      setTimeout(function() {
        text.textContent = originalText;
        btn.style.background = '';
      }, 2000);
    }).catch(function(err) {
      console.error('Failed to copy:', err);
      alert('Failed to copy link. Please copy manually: ' + blogUrl);
    });
  }
</script>
@endsection
