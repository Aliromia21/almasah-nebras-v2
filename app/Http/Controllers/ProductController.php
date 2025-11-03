<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * عرض كل المنتجات
     */
    public function index()
    {
        $products = Product::latest()->paginate(12);
        return view('admin.products.index', compact('products'));
    }

    /**
     * عرض نموذج إضافة منتج جديد
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * تخزين منتج جديد في قاعدة البيانات
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'old_price' => 'nullable|numeric',
            'image' => 'required|image|max:2048',
            'is_new' => 'boolean',
        ]);

        // رفع الصورة
        $validated['image'] = $request->file('image')->store('products', 'public');

        // إصلاح منطق "منتج جديد"
        $validated['is_new'] = $request->boolean('is_new');

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'تمت إضافة المنتج بنجاح ✅');
    }

    /**
     * عرض نموذج تعديل منتج موجود
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * تحديث المنتج
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'old_price' => 'nullable|numeric',
            'image' => 'nullable|image|max:2048',
            'is_new' => 'boolean',
        ]);

        // لو تم رفع صورة جديدة
        if ($request->hasFile('image')) {
            // حذف القديمة
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            // رفع الجديدة
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        // إصلاح منطق "منتج جديد"
        $validated['is_new'] = $request->boolean('is_new');

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'تم تحديث المنتج بنجاح ✏️');
    }

    /**
     * حذف المنتج
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'تم حذف المنتج 🗑️');
    }
}
