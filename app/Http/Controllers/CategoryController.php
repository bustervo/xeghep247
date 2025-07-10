<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryController extends Controller
{
    // Hiển thị cây danh mục
    public function index()
    {
        // Lấy tất cả danh mục cha và các danh mục con
        $categories = Category::with('children')->whereNull('parent_id')->get();

        return view('dashboard.danh-muc', compact('categories'));
    }

    // Hiển thị form tạo danh mục mới
    public function create()
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('dashboard.danh-muc.create', compact('categories'));
    }

    // Lưu danh mục mới
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        // Tạo slug từ name
        $baseSlug = Str::slug($request->name);
        $slug = $baseSlug;
        $count = 1;

        // Kiểm tra và tránh slug bị trùng
        while (Category::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $count++;
        }

        Category::create([
            'name'      => $request->name,
            'slug'      => $slug,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('categories.index')->with('success', 'Tạo danh mục thành công.');
    }
}
