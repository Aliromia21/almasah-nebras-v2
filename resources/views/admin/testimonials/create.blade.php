@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
@stop

@section('title', 'إضافة رأي جديد')

@section('content_header')
    <h1 class="text-success fw-bold">إضافة رأي عميل جديد 🌾</h1>
@stop

@section('content')
    <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data" class="card shadow-sm p-4">
        @csrf

        <div class="mb-3">
            <label class="form-label">اسم العميل</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">المهنة (اختياري)</label>
            <input type="text" name="profession" class="form-control" value="{{ old('profession') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">نص التقييم</label>
            <textarea name="message" rows="4" class="form-control" required>{{ old('message') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">صورة العميل (اختياري)</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-success px-4">💾 حفظ</button>
            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">رجوع</a>
        </div>
    </form>
@stop
