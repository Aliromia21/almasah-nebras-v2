<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('admin.about.index', compact('about'));
    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'features' => 'nullable|array',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|url',
        ]);

        $validated['image'] = $request->file('image')->store('about', 'public');
        $validated['features'] = json_encode($request->features);

        About::create($validated);

        return redirect()->route('admin.about.index')->with('success', 'تمت إضافة قسم من نحن بنجاح!');
    }

    public function edit(About $about)
    {
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, About $about)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'features' => 'nullable|array',
        'button_text' => 'nullable|string|max:50',
        'button_link' => 'nullable|url',
    ]);

    if ($request->hasFile('image')) {
        Storage::disk('public')->delete($about->image);
        $validated['image'] = $request->file('image')->store('about', 'public');
    }

    $validated['features'] = json_encode($request->features);
    $about->update($validated);

    // ✅ بعد التحديث نوجه المستخدم إلى index
    return redirect()
        ->route('admin.about.index')
        ->with('success', 'تم تعديل قسم من نحن بنجاح!');
}

public function destroy(About $about)
{
    if ($about->image) {
        Storage::disk('public')->delete($about->image);
    }

    $about->delete();

    return redirect()
        ->route('admin.about.index')
        ->with('success', 'تم حذف قسم من نحن بنجاح!');
}

}
