@extends('layouts.app')

@section('title', 'Tạo danh mục mới')

@section('content')
<div class="p-8">
    <h1 class="text-2xl font-bold mb-6">🏷️ Tạo danh mục mới</h1>

    <form action="{{ route('categories.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block font-semibold">Tên danh mục</label>
            <input type="text" name="name" class="w-full border px-4 py-2 rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Danh mục cha (nếu có)</label>
            <select name="parent_id" class="w-full border px-4 py-2 rounded">
                <option value="">— Không chọn —</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">💾 Lưu</button>
    </form>
</div>
@endsection
