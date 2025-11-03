<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class SliderController extends Controller
{
    /**
     * عرض جميع السلايدرات
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * عرض نموذج إضافة سلايدر جديد
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * حفظ سلايدر جديد
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:4096',
            'btn1_text' => 'nullable|string|max:50',
            'btn1_link' => 'nullable|url',
            'btn2_text' => 'nullable|string|max:50',
            'btn2_link' => 'nullable|url',
        ]);

        // رفع الصورة
        $validated['image'] = $request->file('image')->store('sliders', 'public');

        Slider::create($validated);

        // تنظيف الكاش لتحديث الواجهة الأمامية فورًا
        Cache::forget('sliders_home');

        return redirect()
            ->route('admin.sliders.index')
            ->with('success', '✅ تمت إضافة السلايد بنجاح!');
    }

    /**
     * عرض نموذج التعديل
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * تحديث السلايدر
     */
    public function update(Request $request, Slider $slider)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            'btn1_text' => 'nullable|string|max:150',
            'btn1_link' => 'nullable|url',
            'btn2_text' => 'nullable|string|max:150',
            'btn2_link' => 'nullable|url',
        ]);

        // في حال تم رفع صورة جديدة نحذف القديمة بأمان
        if ($request->hasFile('image')) {
            if ($slider->image && Storage::disk('public')->exists($slider->image)) {
                Storage::disk('public')->delete($slider->image);
            }

            $validated['image'] = $request->file('image')->store('sliders', 'public');
        }

        $slider->update($validated);

        // تنظيف الكاش لتحديث السلايدرات في الواجهة الأمامية
        Cache::forget('sliders_home');

        return redirect()
            ->route('admin.sliders.index')
            ->with('success', '🖋️ تم تعديل السلايد بنجاح!');
    }

    /**
     * حذف السلايدر
     */
    public function destroy(Slider $slider)
    {
        if ($slider->image && Storage::disk('public')->exists($slider->image)) {
            Storage::disk('public')->delete($slider->image);
        }

        $slider->delete();

        Cache::forget('sliders_home');

        return redirect()
            ->route('admin.sliders.index')
            ->with('success', '🗑️ تم حذف السلايد بنجاح!');
    }
}
