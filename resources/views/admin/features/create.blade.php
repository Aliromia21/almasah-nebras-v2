@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
@stop


@section('title', 'إضافة ميزة جديدة')

@section('content_header')
    <h1 class="text-success"><i class="fas fa-plus-circle"></i> إضافة ميزة جديدة</h1>
@stop

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form action="{{ route('admin.features.store') }}" method="POST">
                @csrf

                {{-- العنوان --}}
                <div class="form-group mb-3">
                    <label for="title">عنوان الميزة</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="مثلاً: منتجات طبيعية" required>
                </div>

                {{-- الوصف --}}
                <div class="form-group mb-3">
                    <label for="description">الوصف</label>
                    <textarea name="description" id="description" rows="4" class="form-control" placeholder="أدخل وصف الميزة" required></textarea>
                </div>

                {{-- الرابط --}}
                <div class="form-group mb-3">
                    <label for="link">الرابط (اختياري)</label>
                    <input type="url" name="link" id="link" class="form-control" placeholder="https://example.com">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.features.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> رجوع
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> حفظ الميزة
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop
