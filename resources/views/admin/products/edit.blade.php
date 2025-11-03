@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
@stop

@section('title', 'تعديل المنتج')

@section('content_header')
    <h1>تعديل المنتج</h1>
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

        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">اسم المنتج</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">الفئة</label>
                <input type="text" name="category" class="form-control" value="{{ old('category', $product->category) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">الوصف</label>
                <textarea name="description" rows="4" class="form-control" required>{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="price" class="form-label">السعر (ل.س)</label>
                    <input type="number" name="price" step="0.01" class="form-control" value="{{ old('price', $product->price) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="old_price" class="form-label">السعر القديم (اختياري)</label>
                    <input type="number" name="old_price" step="0.01" class="form-control" value="{{ old('old_price', $product->old_price) }}">
                </div>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">صورة المنتج</label><br>
                @if($product->image)
                    <img src="{{ asset('storage/'.$product->image) }}" width="150" class="mb-2 rounded">
                @endif
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>

             <div class="form-check mb-3">
    <input type="hidden" name="is_new" value="0"> {{-- لضمان إرسال القيمة دائماً --}}
    <input class="form-check-input" type="checkbox" name="is_new" id="is_new" value="1" {{ old('is_new') ? 'checked' : '' }}>
    <label class="form-check-label" for="is_new">منتج جديد</label>
</div>
            <button type="submit" class="btn btn-success">💾 تحديث المنتج</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">رجوع</a>
        </form>
    </div>
</div>
@stop
