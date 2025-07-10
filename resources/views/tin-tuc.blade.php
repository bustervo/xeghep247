@extends('layouts.app')

@section('title', 'Tin Tức Xe Ghép 247 – Cập nhật mới nhất')

@section('content')
<style>
  .news-wrapper {
    max-width: 1200px;
    margin: auto;
    padding: 40px 20px;
    font-family: 'Segoe UI', sans-serif;
  }

  .news-title {
    text-align: center;
    font-size: 32px;
    font-weight: bold;
    color: #1b5e20;
    margin-bottom: 40px;
  }

  .news-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 30px;
  }

  .news-card {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    transition: 0.3s ease;
    border: 1px solid #e0e0e0;
    display: flex;
    flex-direction: column;
  }

  .news-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 24px rgba(0, 0, 0, 0.12);
    border-color: #2e7d32;
  }

  .news-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
  }

  .news-card .content {
    padding: 18px 20px;
    flex: 1;
  }

  .news-card h3 {
    font-size: 20px;
    font-weight: 700;
    color: #2e7d32;
    margin: 0 0 12px;
  }

  .news-card p {
    font-size: 14px;
    color: #555;
    line-height: 1.5;
    margin: 0;
    overflow: hidden;
    text-overflow: ellipsis;
    max-height: 66px;
  }

  .news-card a {
    margin-top: 16px;
    display: inline-block;
    font-weight: 600;
    font-size: 14px;
    color: #2e7d32;
    text-decoration: none;
  }

  .news-card:hover h3,
  .news-card:hover a {
    color: #1b5e20;
    text-decoration: underline;
  }

  .pagination {
    margin-top: 40px;
    text-align: center;
  }

  .pagination .page-link {
    padding: 8px 14px;
    margin: 0 4px;
    background: #f1f8e9;
    color: #2e7d32;
    border-radius: 6px;
    border: 1px solid #c8e6c9;
    font-weight: 500;
  }

  .pagination .active .page-link {
    background: #2e7d32;
    color: white;
    border: none;
  }
</style>

<div class="news-wrapper">
  <h1 class="news-title">📰 Tin tức mới nhất từ Xe Ghép 247</h1>

  <div class="news-grid">
    @forelse ($posts as $post)
      <div class="news-card">
        <img src="{{ $post->featured_image ? asset('storage/' . $post->featured_image) : asset('assets/default.jpg') }}" alt="{{ $post->title }}">
        <div class="content">
          <h3>{{ $post->title }}</h3>
          <p>{{ $post->excerpt }}</p>
          <a href="{{ route('posts.show', $post->slug) }}">Đọc tiếp →</a>
        </div>
      </div>
    @empty
      <p class="text-gray-600 col-span-full">Chưa có bài viết nào.</p>
    @endforelse
  </div>

  <div class="pagination">
    {{ $posts->links() }}
  </div>
</div>
@endsection
