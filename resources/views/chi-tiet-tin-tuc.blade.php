@extends('layouts.app')

@section('title', $post->title . ' | Xe Ghép 247')

@section('meta')
  <meta name="description" content="{{ Str::limit(strip_tags($post->excerpt ?? $post->content), 160) }}">
  <link rel="canonical" href="{{ url($post->slug . '.html') }}">
@endsection


@section('content')
<main style="max-width: 800px; margin: auto; padding: 40px 20px; font-family: 'Segoe UI', sans-serif; line-height: 1.7; color: #333;">

  <!-- Breadcrumb -->
  <nav class="breadcrumb" aria-label="breadcrumb" style="font-size: 14px; color: #777; margin-bottom: 16px;">
    <span>
      <a href="{{ url('/') }}" style="color: #2e7d32; text-decoration: none;">Trang chủ</a> &raquo; 
      <a href="{{ route('posts.public') }}" style="color: #2e7d32; text-decoration: none;">Tin tức</a> &raquo; 
      {{ $post->title }}
    </span>
  </nav>

  <!-- Tiêu đề và ngày -->
  <h1 style="color: #1b5e20; font-size: 28px; font-weight: 700; margin-bottom: 8px;">{{ $post->title }}</h1>
  <div style="font-size: 14px; color: #888; margin-bottom: 20px;">
    📅 Ngày đăng: {{ \Carbon\Carbon::parse($post->published_at)->format('d/m/Y') }} | ✍️ Tác giả: Xe Ghép 247
  </div>

  <!-- Ảnh chính nếu có -->
  @if ($post->featured_image)
    <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}"
         style="width: 100%; border-radius: 12px; margin-bottom: 24px; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
  @endif

  <!-- Nội dung bài viết từ CSDL -->
  <article style="margin-top: 30px; font-size: 16px;">
    {!! $post->content !!}
  </article>

  <!-- Nút đặt xe -->
  <div style="text-align: center; margin-top: 32px;">
    <a href="https://zalo.me/0793459687" target="_blank"
       style="background: #2e7d32; color: #fff; padding: 14px 28px; border-radius: 8px;
              font-size: 16px; font-weight: 600; text-decoration: none; display: inline-block;
              box-shadow: 0 4px 8px rgba(0,0,0,0.1); transition: background 0.3s ease;">
      👉 Đặt xe ngay qua Zalo
    </a>
  </div>

  <!-- Tin liên quan -->
  <h2 style="color: #2e7d32; font-size: 20px; margin-top: 40px;">📰 Tin liên quan</h2>
<ul style="margin-left: 20px;">
  @forelse ($relatedPosts as $related)
    <li>
      <a href="{{ url($related->slug . '.html') }}" style="color: #2e7d32; text-decoration: underline;">
        📝 {{ $related->title }}
      </a>
    </li>
  @empty
    <li>Không có bài viết liên quan</li>
  @endforelse
</ul>



</main>
@endsection
