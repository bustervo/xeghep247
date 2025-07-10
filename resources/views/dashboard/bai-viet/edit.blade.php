@extends('layouts.app')

@section('title', 'Chỉnh sửa bài viết')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-6">✏️ Chỉnh sửa bài viết</h1>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 p-4 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold mb-1">Tiêu đề</label>
            <input type="text" name="title" class="w-full border rounded px-4 py-2" value="{{ old('title', $post->title) }}" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Chuyên mục</label>
            <select name="category_id" class="w-full border rounded px-4 py-2">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected($category->id == $post->category_id)>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Ảnh đại diện</label>
            @if ($post->featured_image)
                <img src="{{ asset('storage/' . $post->featured_image) }}" class="h-32 mb-2">
            @endif
            <input type="file" name="featured_image" class="w-full border rounded px-4 py-2">
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Tóm tắt</label>
            <input type="text" name="meta_description" class="w-full border rounded px-4 py-2" value="{{ old('meta_description', $post->excerpt) }}">
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Nội dung</label>
            <textarea name="content" class="w-full border rounded px-4 py-2" rows="10">{{ old('content', $post->content) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Trạng thái</label>
            <select name="status" class="w-full border rounded px-4 py-2">
                <option value="draft" @selected($post->status === 'draft')>Nháp</option>
                <option value="published" @selected($post->status === 'published')>Đã đăng</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Ngày đăng</label>
            <input type="datetime-local" name="published_at" class="w-full border rounded px-4 py-2"
                   value="{{ old('published_at', \Carbon\Carbon::parse($post->published_at)->format('Y-m-d\TH:i')) }}">
        </div>

        <div class="text-right">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                💾 Cập nhật
            </button>
        </div>
    </form>
</div>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/tinymce@6.8.2/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
    selector: 'textarea[name=content]',
    height: 400,
    menubar: false,
    plugins: 'link image code lists table',
    toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image table | code',
    content_css: '//www.tiny.cloud/css/codepen.min.css'
  });
</script>
@endpush

@endsection
