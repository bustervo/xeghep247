<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // Hiển thị danh sách bài viết trong dashboard
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('dashboard.bai-viet.index', compact('posts'));
    }

    // Hiển thị form tạo bài viết
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.bai-viet.create', compact('categories'));
    }

    // Lưu bài viết mới
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required',
            'content' => 'required',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('uploads', 'public');
        }

        Post::create([
            'title'         => $request->title,
            'slug'          => $request->slug ?? Str::slug($request->title),
            'excerpt'       => $request->meta_description,
            'content'       => $request->content,
            'category_id'   => $request->category_id,
            'status'        => $request->status ?? 'draft',
            'published_at'  => $request->published_at,
            'meta_title'    => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'featured_image'=> $imagePath,
        ]);

        return redirect()->route('posts.index')->with('success', 'Đăng bài thành công!');
    }

    // Hiển thị form chỉnh sửa bài viết
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('dashboard.bai-viet.edit', compact('post', 'categories'));
    }

    // Cập nhật bài viết
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'   => 'required',
            'content' => 'required',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $post = Post::findOrFail($id);

        // Xử lý ảnh
        if ($request->hasFile('featured_image')) {
            if ($post->featured_image) {
                Storage::disk('public')->delete($post->featured_image);
            }
            $imagePath = $request->file('featured_image')->store('uploads', 'public');
            $post->featured_image = $imagePath;
        }

        $post->update([
            'title'         => $request->title,
            'slug'          => $request->slug ?? Str::slug($request->title),
            'excerpt'       => $request->meta_description,
            'content'       => $request->content,
            'category_id'   => $request->category_id,
            'status'        => $request->status ?? 'draft',
            'published_at'  => $request->published_at,
            'meta_title'    => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
        ]);

        return redirect()->route('posts.index')->with('success', 'Cập nhật bài viết thành công!');
    }

    // Xoá bài viết
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post->featured_image) {
            Storage::disk('public')->delete($post->featured_image);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Đã xoá bài viết!');
    }

    // Trang tin tức hiển thị ngoài public
    public function list()
    {
        $posts = Post::where('status', 'published')
                     ->whereNotNull('published_at')
                     ->orderBy('published_at', 'desc')
                     ->paginate(6);
        return view('tin-tuc', compact('posts'));
    }

    // Hiển thị chi tiết bài viết ngoài trang public
   public function show($slug)
{
    $post = Post::where('slug', $slug)->firstOrFail();

    // Lấy 5 bài cùng danh mục, trừ bài hiện tại
    $relatedPosts = Post::where('category_id', $post->category_id)
        ->where('id', '!=', $post->id)
        ->where('status', 'published')
        ->latest('published_at')
        ->limit(5)
        ->get();

    return view('chi-tiet-tin-tuc', compact('post', 'relatedPosts'));
}

}
