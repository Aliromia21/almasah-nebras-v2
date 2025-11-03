@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
@stop


@section('title', 'تعديل قسم زيارة المزرعة')

@section('content_header')
    <h1>✏️ تعديل قسم زيارة المزرعة</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.farm_visit.update', $farmVisit) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">العنوان</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $farmVisit->title) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">الوصف</label>
                    <textarea name="description" class="form-control" rows="4" required>{{ old('description', $farmVisit->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">نص الزر</label>
                    <input type="text" name="button_text" class="form-control" value="{{ old('button_text', $farmVisit->button_text) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">رابط الزر (اختياري)</label>
                    <input type="url" name="button_link" class="form-control" value="{{ old('button_link', $farmVisit->button_link) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">لون الخلفية</label>
                    <select name="background_color" class="form-select">
                        <option value="bg-primary" {{ $farmVisit->background_color == 'bg-primary' ? 'selected' : '' }}>أخضر زراعي (افتراضي)</option>
                        <option value="bg-success" {{ $farmVisit->background_color == 'bg-success' ? 'selected' : '' }}>أخضر طبيعي</option>
                        <option value="bg-dark" {{ $farmVisit->background_color == 'bg-dark' ? 'selected' : '' }}>غامق أنيق</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">💾 تحديث</button>
                <a href="{{ route('admin.farm_visit.index') }}" class="btn btn-secondary">🔙 رجوع</a>
            </form>
        </div>
    </div>
@stop
