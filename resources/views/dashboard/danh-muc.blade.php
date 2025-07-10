@extends('layouts.app')

@section('title', 'Quản lý Danh Mục - Xe Ghép 247')

@section('content')
<div class="flex min-h-screen bg-gray-100">
  <!-- Sidebar -->
  <aside class="w-64 bg-white p-6 border-r hidden md:block">
    <h2 class="text-xl font-semibold text-green-700 mb-6">Tin Tức & SEO</h2>
    <ul class="space-y-4">
      <li><a href="/dashboard/bai-viet" class="block text-gray-700 hover:text-green-700">📚 Bài viết</a></li>
      <li><a href="/dashboard/bai-viet/create" class="block text-gray-700 hover:text-green-700">📝 Thêm bài viết mới</a></li>
      <li><a href="/dashboard/danh-muc" class="block text-green-700 font-semibold">🏷️ Danh mục</a></li>
      <li><a href="/dashboard/seo" class="block text-gray-700 hover:text-green-700">🔍 SEO & Meta</a></li>
      <li><a href="/dashboard/stats" class="block text-gray-700 hover:text-green-700">📊 Thống kê truy cập</a></li>
    </ul>
  </aside>

  <!-- Main -->
  <main class="flex-1 p-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">🏷️ Quản lý danh mục</h1>

    <!-- Button Thêm -->
    <div class="mb-4">
<a href="{{ route('categories.create') }}" class="bg-green-600 text-white px-5 py-2 rounded hover:bg-green-700 transition">
  + Thêm danh mục
</a>
    </div>

    <!-- Danh sách danh mục -->
    <div class="bg-white rounded-lg shadow p-6">
      <h2 class="text-lg font-semibold text-gray-700 mb-4">📂 Cây danh mục</h2>
      <ul class="space-y-2">
        @foreach ($categories as $category)
          <li>
            <div class="font-medium text-gray-800">{{ $category->name }}</div>
            @if ($category->children->count())
              <ul class="ml-6 list-disc text-gray-600 mt-1">
                @foreach ($category->children as $child)
                  <li>{{ $child->name }}</li>
                @endforeach
              </ul>
            @endif
          </li>
        @endforeach
      </ul>
    </div>
  </main>
</div>
@endsection
