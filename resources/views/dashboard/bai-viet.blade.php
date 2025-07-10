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

  <!-- Main content -->
  <main class="flex-1 p-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">📚 Danh sách bài viết</h1>

    <!-- Bộ lọc và nút thêm -->
    <div class="flex flex-col lg:flex-row justify-between items-center gap-4 mb-6">
    <div class="flex flex-wrap gap-4 w-full lg:w-auto">

<input type="text" placeholder="Tìm tiêu đề..." class="px-4 py-2 border rounded-md w-64 shadow-sm" />

<select class="px-4 py-2 border rounded-md w-56 shadow-sm">
  <option>Tất cả chuyên mục</option>
  <option>Khuyến mãi</option>
  <option>Kinh nghiệm</option>
  <option>Tin mới</option>
</select>

<select class="px-4 py-2 border rounded-md w-40 shadow-sm">
  <option>Trạng thái</option>
  <option>Đã đăng</option>
  <option>Nháp</option>
</select>

      </div>
      <a href="/dashboard/bai-viet/create" class="bg-green-600 text-white px-5 py-2 rounded hover:bg-green-700 transition">
        + Viết bài mới
      </a>
    </div>

    <!-- Bảng danh sách -->
<div class="w-full overflow-x-auto">
  <table class="w-full table-auto bg-white shadow rounded-lg">

<thead class="bg-green-100 text-green-700">
  <tr class="text-md lg:text-lg font-semibold">
    <th class="py-3 px-4 text-left min-w-[180px]">Tiêu đề</th>
    <th class="py-3 px-4 text-left min-w-[140px]">Chuyên mục</th>
    <th class="py-3 px-4 text-center min-w-[120px]">Trạng thái</th>
    <th class="py-3 px-4 text-center min-w-[120px]">Ngày đăng</th>
    <th class="py-3 px-4 text-center min-w-[120px]">Lượt xem</th>
    <th class="py-3 px-4 text-center min-w-[100px]">SEO</th>
    <th class="py-3 px-4 text-center min-w-[130px]">Hành động</th>
  </tr>
</thead>

        <tbody class="text-gray-800">
          <tr class="border-b hover:bg-gray-50">
            <td class="py-3 px-4 font-medium">Ưu đãi tháng 7</td>
            <td class="py-3 px-4">Khuyến mãi</td>
            <td class="py-3 px-4 text-center text-green-600 font-semibold">Đã đăng</td>
            <td class="py-3 px-4 text-center">01/07/2025</td>
            <td class="py-3 px-4 text-center">320</td>
            <td class="py-3 px-4 text-center">87/100</td>
            <td class="py-3 px-4 text-center space-x-2">
              <a href="#" class="text-blue-600 hover:underline">Sửa</a>
              <a href="#" class="text-red-600 hover:underline">Xoá</a>
            </td>
          </tr>

          <tr class="border-b hover:bg-gray-50">
            <td class="py-3 px-4 font-medium">Mẹo đi xe đêm an toàn</td>
            <td class="py-3 px-4">Kinh nghiệm</td>
            <td class="py-3 px-4 text-center text-yellow-600 font-semibold">Nháp</td>
            <td class="py-3 px-4 text-center text-gray-400">—</td>
            <td class="py-3 px-4 text-center">—</td>
            <td class="py-3 px-4 text-center">42/100</td>
            <td class="py-3 px-4 text-center space-x-2">
              <a href="#" class="text-blue-600 hover:underline">Sửa</a>
              <a href="#" class="text-red-600 hover:underline">Xoá</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
</div>
@endsection
