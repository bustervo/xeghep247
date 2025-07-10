@extends('layouts.app')

@section('title', 'Thêm bài viết mới - Xe Ghép 247')

@section('content')
<div class="flex min-h-screen bg-gray-100">
  <!-- Sidebar -->
  <aside class="w-64 bg-white p-6 border-r hidden md:block">
    <h2 class="text-xl font-semibold text-green-700 mb-6">Tin Tức & SEO</h2>
    <ul class="space-y-4">
      <li><a href="/dashboard/bai-viet" class="block text-gray-700 hover:text-green-700">📚 Bài viết</a></li>
      <li><a href="/dashboard/bai-viet/create" class="block text-green-700 font-semibold">📝 Thêm bài viết mới</a></li>
      <li><a href="/dashboard/danh-muc" class="block text-gray-700 hover:text-green-700">🏷️ Danh mục</a></li>
      <li><a href="/dashboard/seo" class="block text-gray-700 hover:text-green-700">🔍 SEO & Meta</a></li>
      <li><a href="/dashboard/stats" class="block text-gray-700 hover:text-green-700">📊 Thống kê</a></li>
    </ul>
  </aside>

  <!-- Main -->
  <main class="flex-1 p-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">📝 Thêm bài viết mới</h1>

    {{-- Hiển thị lỗi --}}
    @if ($errors->any())
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
        <ul class="list-disc list-inside">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf

      <!-- Tiêu đề -->
      <div>
        <label class="block font-semibold mb-1">Tiêu đề bài viết</label>
        <input type="text" name="title" value="{{ old('title') }}" class="w-full border px-4 py-2 rounded" placeholder="Nhập tiêu đề..." />
      </div>

      <!-- Slug -->
      <div>
        <label class="block font-semibold mb-1">Slug (đường dẫn)</label>
        <input type="text" name="slug" value="{{ old('slug') }}" class="w-full border px-4 py-2 rounded" placeholder="tu-khoa-seo-url" />
      </div>

      <!-- Danh mục -->
      <div>
        <label class="block font-semibold mb-1">Chuyên mục</label>
        <select name="category_id" class="w-full border px-4 py-2 rounded">
          <option value="">— Chọn chuyên mục —</option>
          @foreach ($categories as $cat)
            <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
              {{ $cat->name }}
            </option>
          @endforeach
        </select>
      </div>

      <!-- Mô tả SEO -->
      <div>
        <label class="block font-semibold mb-1">Tóm tắt / Mô tả SEO</label>
        <textarea name="meta_description" class="w-full border px-4 py-2 rounded" rows="3" placeholder="Mô tả bài viết cho SEO (160 ký tự)...">{{ old('meta_description') }}</textarea>
      </div>

      <!-- Nội dung chính -->
      <div>
        <label class="block font-semibold mb-1">Nội dung bài viết</label>
        <textarea id="editor" name="content" class="w-full border px-4 py-2 rounded min-h-[500px]">{{ old('content') }}</textarea>
      </div>

      <!-- Ảnh đại diện -->
      <div>
        <label class="block font-semibold mb-1">Ảnh đại diện</label>
        <input type="file" name="featured_image" class="block border px-4 py-2 rounded w-full" />
      </div>

      <!-- Trạng thái + Ngày đăng -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
          <label class="block font-semibold mb-1">Trạng thái</label>
          <select name="status" class="w-full border px-4 py-2 rounded">
            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Nháp</option>
            <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Đã đăng</option>
          </select>
        </div>
        <div>
          <label class="block font-semibold mb-1">Ngày đăng</label>
          <input type="datetime-local" name="published_at" value="{{ old('published_at') }}" class="w-full border px-4 py-2 rounded" />
        </div>
      </div>

      <!-- SEO nâng cao -->
      <div class="bg-white p-4 border rounded shadow">
        <h2 class="font-semibold text-lg mb-4 text-green-700">🔍 Cài đặt SEO nâng cao</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div>
            <label class="block font-semibold mb-1">Meta Title (SEO)</label>
            <input type="text" name="meta_title" value="{{ old('meta_title') }}" class="w-full border px-4 py-2 rounded" />
          </div>
          <div>
            <label class="block font-semibold mb-1">Meta Keywords</label>
            <input type="text" name="meta_keywords" value="{{ old('meta_keywords') }}" class="w-full border px-4 py-2 rounded" placeholder="vd: xe ghép, đi ghép Đà Nẵng" />
          </div>
        </div>
      </div>

      <!-- Nút hành động -->
      <div class="flex gap-4 mt-6">
        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">💾 Đăng bài</button>
        <a href="/dashboard/bai-viet" class="px-6 py-2 rounded border border-gray-300 hover:bg-gray-100">❌ Hủy</a>
      </div>
    </form>
  </main>
</div>

<!-- TinyMCE script -->
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js"></script>

<script>
  tinymce.init({
    selector: '#editor',
    height: 500,
    plugins: 'preview code link image table lists',
    toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image table | code preview',
    menubar: false,
    branding: false
  });
</script>
@endpush

@endsection
