@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
@stop


@section('title', 'المنتجات')

@section('content_header')
    <h1>قائمة المنتجات</h1>
@stop

@section('content')
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="mb-3">
    <a href="{{ route('admin.products.create') }}" class="btn btn-success">➕ إضافة منتج جديد</a>
</div>

@if($products->count() > 0)
<div class="row">
    @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 220px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="text-muted mb-1">{{ $product->category }}</p>
                    <p>{{ Str::limit($product->description, 80) }}</p>
                    <p class="fw-bold text-success mb-1">
                        {{ number_format($product->price, 0) }} ل.س
                        @if($product->old_price)
                            <span class="text-muted text-decoration-line-through ms-1">{{ number_format($product->old_price, 0) }} ل.س</span>
                        @endif
                    </p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary btn-sm">✏️ تعديل</a>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">🗑️ حذف</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
@else
    <div class="text-center py-5">
        <h4 class="mt-3 text-success">🚜 لا توجد منتجات حالياً</h4>
    </div>
@endif
@stop
