@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
@stop


@section('title', 'إضافة قسم زيارة المزرعة')

@section('content_header')
    <h1>➕ إضافة قسم زيارة المزرعة</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.farm_visit.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">العنوان</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', 'زوروا مزرعتنا') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">الوصف</label>
                    <textarea name="description" class="form-control" rows="4" required>{{ old('description', 'ندعوك لاكتشاف عالم الزراعة الطبيعية عن قرب!') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">نص الزر</label>
                    <input type="text" name="button_text" class="form-control" value="{{ old('button_text', 'زرنا الآن') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">رابط الزر (اختياري)</label>
                    <input type="url" name="button_link" class="form-control" value="{{ old('button_link') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">لون الخلفية</label>
                    <select name="background_color" class="form-select">
                        <option value="bg-primary">أزرق زراعي (افتراضي)</option>
                        <option value="bg-success">أخضر طبيعي</option>
                        <option value="bg-dark">غامق أنيق</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">💾 حفظ</button>
                <a href="{{ route('admin.farm_visit.index') }}" class="btn btn-secondary">🔙 رجوع</a>
            </form>
        </div>
    </div>
@stop
