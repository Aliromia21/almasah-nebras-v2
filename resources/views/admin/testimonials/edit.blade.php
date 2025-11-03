@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
@stop

@section('title', 'تعديل رأي عميل')

@section('content_header')
    <h1 class="text-primary fw-bold">تعديل رأي العميل ✏️</h1>
@stop

@section('content')
    <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data" class="card shadow-sm p-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">اسم العميل</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name', $testimonial->name) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">المهنة (اختياري)</label>
            <input type="text" name="profession" class="form-control" value="{{ old('profession', $testimonial->profession) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">نص التقييم</label>
            <textarea name="message" rows="4" class="form-control" required>{{ old('message', $testimonial->message) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">صورة العميل</label><br>
            @if($testimonial->image)
                <img src="{{ asset('storage/'.$testimonial->image) }}" alt="" width="100" class="rounded mb-2">
            @endif
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary px-4">💾 تحديث</button>
            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">رجوع</a>
        </div>
    </form>
@stop
