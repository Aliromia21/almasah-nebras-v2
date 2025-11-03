@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
@stop


@section('title', 'تعديل مقال')

@section('content_header')
    <h1 class="fw-bold text-primary">تعديل مقال ✏️</h1>
@stop

@section('content')
    <form action="{{ route('admin.blog.update', $blog) }}" method="POST" enctype="multipart/form-data" class="card shadow-sm p-4">
        @csrf {{-- ✅ أضفنا التوكن للحماية --}}
        @method('PUT')

        {{-- عنوان المقال --}}
        <div class="mb-3">
            <label class="form-label fw-bold">عنوان المقال</label>
            <input type="text" name="title" class="form-control" 
                   value="{{ old('title', $blog->title) }}" required>
        </div>

        {{-- ملخص المقال --}}
        <div class="mb-3">
            <label class="form-label fw-bold">الملخص (اختياري)</label>
            <textarea name="excerpt" class="form-control" rows="2">{{ old('excerpt', $blog->excerpt) }}</textarea>
        </div>

        {{-- محتوى المقال --}}
        <div class="mb-3">
            <label class="form-label fw-bold">المحتوى</label>
            <textarea name="content" class="form-control" rows="6" required>{{ old('content', $blog->content) }}</textarea>
        </div>

        {{-- صورة المقال --}}
        <div class="mb-3">
            <label class="form-label fw-bold">صورة المقال</label>
            @if($blog->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/'.$blog->image) }}" alt="صورة المقال" 
                         width="180" class="rounded shadow-sm border">
                </div>
            @endif
            <input type="file" name="image" class="form-control">
        </div>

        {{-- الكاتب وتاريخ النشر --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">اسم الكاتب</label>
                <input type="text" name="author" class="form-control" 
                       value="{{ old('author', $blog->author) }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">تاريخ النشر (اختياري)</label>
                <input type="date" name="published_at" class="form-control" 
                       value="{{ old('published_at', $blog->published_at ? \Carbon\Carbon::parse($blog->published_at)->format('Y-m-d') : '') }}">
            </div>
        </div>

        {{-- زر التحديث --}}
        <div class="text-end">
            <button type="submit" class="btn btn-primary px-4">
                <i class="fas fa-save me-1"></i> تحديث المقال
            </button>
        </div>
    </form>
@stop
