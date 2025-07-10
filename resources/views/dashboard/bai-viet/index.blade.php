@extends('layouts.app')

@section('title', 'Quản lý bài viết - Xe Ghép 247')

@section('content')
<div class="flex min-h-screen bg-gray-100">
  <!-- Sidebar -->
  <aside class="w-64 bg-white p-6 border-r hidden md:block">
    <h2 class="text-xl font-semibold text-green-700 mb-6">Tin Tức & SEO</h2>
    <ul class="space-y-4">
      <li><a href="/dashboard/bai-viet" class="block text-green-700 font-semibold">📚 Bài viết</a></li>
      <li><a href="/dashboard/bai-viet/create" class="block text-gray-700 hover:text-green-700">📝 Thêm bài viết mới</a></li>
      <li><a href="/dashboard/danh-muc" class="block text-gray-700 hover:text-green-700">🏷️ Danh mục</a></li>
      <li><a href="/dashboard/seo" class="block text-gray-700 hover:text-green-700">🔍 SEO & Meta</a></li>
      <li><a href="/dashboard/stats" class="block text-gray-700 hover:text-green-700">📊 Thống kê truy cập</a></li>
    </ul>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 p-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">📚 Danh sách bài viết</h1>

    @if (session('success'))
      <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded mb-4">
        {{ session('success') }}
      </div>
    @endif

    <!-- Bộ lọc và nút thêm -->
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
      <div class="flex gap-2 flex-wrap">
        <input type="text" placeholder="Tìm tiêu đề..." class="px-3 py-2 border rounded-md w-60" />
        <select class="px-3 py-2 border rounded-md">
          <option>Tất cả chuyên mục</option>
        </select>
        <select class="px-3 py-2 border rounded-md">
          <option>Trạng thái</option>
          <option>Đã đăng</option>
          <option>Nháp</option>
        </select>
      </div>
      <a href="{{ route('posts.create') }}" class="bg-green-600 text-white px-5 py-2 rounded hover:bg-green-700 transition">+ Viết bài mới</a>
    </div>

    <!-- Bảng danh sách -->
    <div class="overflow-x-auto">
      <table class="min-w-full bg-white shadow rounded-lg text-sm">
        <thead class="bg-green-100 text-green-700">
          <tr class="text-left">
            <th class="py-3 px-4">Tiêu đề</th>
            <th class="py-3 px-4">Chuyên mục</th>
            <th class="py-3 px-4 text-center">Trạng thái</th>
            <th class="py-3 px-4 text-center">Ngày đăng</th>
            <th class="py-3 px-4 text-center">Hành động</th>
          </tr>
        </thead>
        <tbody class="text-gray-800">
          @forelse ($posts as $post)
            <tr class="border-b hover:bg-gray-50">
              <td class="py-3 px-4 font-medium">{{ $post->title }}</td>
              <td class="py-3 px-4">
                {{ $post->category?->name ?? '—' }}
              </td>
              <td class="py-3 px-4 text-center font-semibold {{ $post->status === 'published' ? 'text-green-600' : 'text-yellow-600' }}">
                {{ $post->status === 'published' ? 'Đã đăng' : 'Nháp' }}
              </td>
              <td class="py-3 px-4 text-center">
                {{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d/m/Y') : '—' }}
              </td>
              <td class="py-3 px-4 text-center space-x-2">
                <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-600 hover:underline">Sửa</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Bạn có chắc muốn xoá?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-red-600 hover:underline">Xoá</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="text-center py-6 text-gray-500">Chưa có bài viết nào.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <!-- Phân trang -->
    <div class="mt-6">
      {{ $posts->links() }}
    </div>
  </main>
</div>
@endsection
