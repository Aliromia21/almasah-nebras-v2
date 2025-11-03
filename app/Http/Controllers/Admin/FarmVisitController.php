<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FarmVisit; 

use Illuminate\Http\Request;

class FarmVisitController extends Controller
{
    public function index()
    {
        $farmVisit = FarmVisit::first();
        return view('admin.farm_visit.index', compact('farmVisit'));
    }

    public function create()
    {
        return view('admin.farm_visit.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|url|max:255',
            'background_color' => 'nullable|string|max:255',
        ]);

        FarmVisit::create($data);
        return redirect()->route('admin.farm_visit.index')->with('success', 'تم إنشاء القسم بنجاح 🌾');
    }

    public function edit(FarmVisit $farmVisit)
    {
        return view('admin.farm_visit.edit', compact('farmVisit'));
    }

    public function update(Request $request, FarmVisit $farmVisit)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|url|max:255',
            'background_color' => 'nullable|string|max:255',
        ]);

        $farmVisit->update($data);
        return redirect()->route('admin.farm_visit.index')->with('success', 'تم تعديل القسم بنجاح 🌿');
    }

    public function destroy(FarmVisit $farmVisit)
{
    $farmVisit->delete();

    return redirect()
        ->route('admin.farm_visit.index')
        ->with('success', 'تم حذف قسم زيارة المزرعة بنجاح 🗑️');
}

}
