@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
@stop

@section('title', 'إضافة مقال جديد')

@section('content_header')
    <h1 class="fw-bold text-success">📝 إضافة مقال جديد</h1>
@stop

@section('content')
    <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data" class="card shadow-sm p-4">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-bold">عنوان المقال</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="اكتب عنوان المقال هنا..." required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">ملخص (اختياري)</label>
            <textarea name="excerpt" class="form-control" rows="2" placeholder="ملخص بسيط عن المقال...">{{ old('excerpt') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">المحتوى</label>
            <textarea name="content" class="form-control" rows="6" placeholder="اكتب محتوى المقال هنا..." required>{{ old('content') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">الصورة</label>
            <input type="file" name="image" class="form-control">
            <small class="text-muted">يفضل أن تكون الصورة بجودة عالية (jpg أو png).</small>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">اسم الكاتب</label>
                <input type="text" name="author" class="form-control" value="{{ old('author', 'Admin') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">تاريخ النشر (اختياري)</label>
                <input type="date" name="published_at" class="form-control" value="{{ old('published_at') }}">
            </div>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-success px-4">
                <i class="fas fa-save me-1"></i> حفظ المقال
            </button>
        </div>
    </form>
@stop
