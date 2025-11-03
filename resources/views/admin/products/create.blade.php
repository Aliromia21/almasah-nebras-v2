@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
@stop

@section('title', 'إضافة منتج جديد')

@section('content_header')
    <h1>إضافة منتج جديد</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">اسم المنتج</label>
                <input type="text" name="name" class="form-control" placeholder="أدخل اسم المنتج" required>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">الفئة</label>
                <input type="text" name="category" class="form-control" placeholder="مثل: خضروات، فواكه..." required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">الوصف</label>
                <textarea name="description" rows="4" class="form-control" placeholder="أدخل وصفًا موجزًا للمنتج" required></textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="price" class="form-label">السعر (ل.س)</label>
                    <input type="number" name="price" step="0.01" class="form-control" placeholder="السعر بالليرة السورية" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="old_price" class="form-label">السعر القديم (اختياري)</label>
                    <input type="number" name="old_price" step="0.01" class="form-control" placeholder="السعر السابق">
                </div>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">صورة المنتج</label>
                <input type="file" name="image" class="form-control" accept="image/*" required>
            </div>

            <div class="form-check mb-3">
    <input type="hidden" name="is_new" value="0"> {{-- لضمان إرسال القيمة دائماً --}}
    <input class="form-check-input" type="checkbox" name="is_new" id="is_new" value="1" {{ old('is_new') ? 'checked' : '' }}>
    <label class="form-check-label" for="is_new">منتج جديد</label>
</div>


            <button type="submit" class="btn btn-success">💾 حفظ المنتج</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">رجوع</a>
        </form>
    </div>
</div>
@stop
