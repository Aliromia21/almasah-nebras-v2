<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; // ✅ ضروري جدًا
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * عرض كل المميزات في لوحة التحكم
     */
    public function index()
    {
        $features = Feature::latest()->paginate(9);
        return view('admin.features.index', compact('features'));
    }

    /**
     * عرض نموذج إنشاء ميزة جديدة
     */
    public function create()
    {
        return view('admin.features.create');
    }

    /**
     * تخزين ميزة جديدة في قاعدة البيانات
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'nullable|url|max:255',
        ]);

        // 🎨 توليد أيقونة SVG عشوائية من مجموعة زراعية
        $icons = ['leaf', 'tractor', 'sun', 'water', 'apple', 'seedling', 'plant', 'field', 'farmer', 'flower'];
        $validated['svg_icon'] = $icons[array_rand($icons)];

        Feature::create($validated);

        return redirect()->route('admin.features.index')->with('success', 'تم إنشاء الميزة بنجاح 🌿');
    }

    /**
     * عرض نموذج تعديل ميزة
     */
    public function edit(Feature $feature)
    {
        return view('admin.features.edit', compact('feature'));
    }

    /**
     * تحديث ميزة موجودة
     */
    public function update(Request $request, Feature $feature)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'nullable|url|max:255',
        ]);

        // ✅ إذا لم يكن لديها أيقونة مسبقًا، نولد واحدة جديدة
        if (!$feature->svg_icon) {
            $icons = ['leaf', 'tractor', 'sun', 'water', 'apple', 'seedling', 'plant', 'field', 'farmer', 'flower'];
            $validated['svg_icon'] = $icons[array_rand($icons)];
        }

        $feature->update($validated);

        return redirect()->route('admin.features.index')->with('success', 'تم تعديل الميزة بنجاح ✏️');
    }

    /**
     * حذف ميزة
     */
    public function destroy(Feature $feature)
    {
        $feature->delete();

        return redirect()->route('admin.features.index')->with('success', 'تم حذف الميزة بنجاح 🗑️');
    }
}
