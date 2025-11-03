@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
@stop


@section('title', 'إضافة سلايد جديد')

@section('content_header')
    <h1>إضافة سلايد جديد</h1>
@stop

@section('content')
    {{-- عرض الأخطاء إن وجدت --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- نموذج إضافة سلايد --}}
    <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label>العنوان الرئيسي</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="أدخل عنوان السلايد">
        </div>

        <div class="form-group mb-3">
            <label>الصورة (jpg / png)</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>نص الزر الأول</label>
            <input type="text" name="btn1_text" class="form-control" value="{{ old('btn1_text') }}" placeholder="مثال: المنتجات">
        </div>

        <div class="form-group mb-3">
            <label>رابط الزر الأول</label>
            <input type="url" name="btn1_link" class="form-control" value="{{ old('btn1_link') }}" placeholder="https://example.com/products">
        </div>

        <div class="form-group mb-3">
            <label>نص الزر الثاني</label>
            <input type="text" name="btn2_text" class="form-control" value="{{ old('btn2_text') }}" placeholder="مثال: الخدمات">
        </div>

        <div class="form-group mb-3">
            <label>رابط الزر الثاني</label>
            <input type="url" name="btn2_link" class="form-control" value="{{ old('btn2_link') }}" placeholder="https://example.com/services">
        </div>

        <div class="form-group mb-3">
            <label>تفعيل السلايد</label>
            <select name="is_active" class="form-control">
                <option value="1" selected>نعم</option>
                <option value="0">لا</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">💾 حفظ</button>
        <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">🔙 رجوع</a>
    </form>
@stop

@section('css')
    <style>
        form {
            max-width: 700px;
        }
    </style>
@stop
