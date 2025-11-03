<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(8);
        return view('admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'image' => 'nullable|image|max:10240', // 10MB
            'author' => 'nullable|string|max:100',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('blogs', 'public');
        }

        Blog::create($validated);

        return redirect()->route('admin.blog.index')->with('success', 'تم إضافة المقال بنجاح 📝');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

   public function update(Request $request, Blog $blog)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'excerpt' => 'nullable|string',
        'content' => 'required|string',
        'image' => 'nullable|image|max:2048',
        'author' => 'nullable|string|max:255',
        'published_at' => 'nullable|date',
    ]);

    if ($request->hasFile('image')) {
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }
        $validated['image'] = $request->file('image')->store('blogs', 'public');
    }

    $blog->update($validated);

    return redirect()->route('admin.blog.index')->with('success', 'تم تعديل المقال بنجاح ✏️');
}

public function destroy(Blog $blog)
{
    if ($blog->image) {
        Storage::disk('public')->delete($blog->image);
    }
    $blog->delete();

    return redirect()->route('admin.blog.index')->with('success', 'تم حذف المقال 🗑️');
}
}
