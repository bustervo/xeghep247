@extends('layouts.app')

@section('title', 'Dashboard Tin Tức - Xe Ghép 247')

@section('content')
<div class="flex min-h-screen bg-gray-100">
  <!-- Sidebar -->
  <aside class="w-64 bg-white p-6 border-r hidden md:block">
    <h2 class="text-xl font-semibold text-green-700 mb-6">Tin Tức & SEO</h2>
    <ul class="space-y-4">
      <li><a href="/dashboard/bai-viet" class="block text-gray-700 hover:text-green-700">📚 Bài viết</a></li>
      <li><a href="/dashboard/bai-viet/create" class="block text-gray-700 hover:text-green-700">📝 Thêm bài viết mới</a></li>
      <li><a href="/dashboard/danh-muc" class="block text-gray-700 hover:text-green-700">🏷️ Danh mục</a></li>
      <li><a href="/dashboard/seo" class="block text-gray-700 hover:text-green-700">🔍 SEO & Meta</a></li>
      <li><a href="/dashboard/stats" class="block text-gray-700 hover:text-green-700">📊 Thống kê truy cập</a></li>
    </ul>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 p-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">📊 Tổng quan tin tức</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-sm text-gray-500">Tổng số bài viết</h3>
        <p class="text-3xl font-bold text-green-700">120</p>
      </div>
      <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-sm text-gray-500">Bài viết trong tháng</h3>
        <p class="text-3xl font-bold text-green-700">14</p>
      </div>
      <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-sm text-gray-500">Bài chưa có meta SEO</h3>
        <p class="text-3xl font-bold text-red-500">6</p>
      </div>
    </div>

    <div class="mt-10">
      <h2 class="text-xl font-semibold mb-4 text-gray-800">🔥 Top bài viết được click nhiều</h2>
      <table class="w-full bg-white shadow rounded-lg text-left">
        <thead>
          <tr class="border-b bg-gray-50">
            <th class="p-4">Tiêu đề</th>
            <th class="p-4">Lượt click</th>
            <th class="p-4">SEO</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-b hover:bg-gray-50">
            <td class="p-4">Ưu đãi tháng 7 - Giảm 10%</td>
            <td class="p-4">542</td>
            <td class="p-4 text-green-600">✔️ Hoàn chỉnh</td>
          </tr>
          <tr class="border-b hover:bg-gray-50">
            <td class="p-4">TP.HCM - Gia Nghĩa khai trương tuyến</td>
            <td class="p-4">428</td>
            <td class="p-4 text-yellow-600">⚠️ Thiếu mô tả</td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
</div>
@endsection
