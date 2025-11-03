@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
@stop

@section('title', 'تعديل الميزة')

@section('content_header')
    <h1 class="text-info"><i class="fas fa-edit"></i> تعديل الميزة</h1>
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
            <form action="{{ route('admin.features.update', $feature->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- العنوان --}}
                <div class="form-group mb-3">
                    <label for="title">عنوان الميزة</label>
                    <input type="text" name="title" id="title" class="form-control"
                           value="{{ old('title', $feature->title) }}" required>
                </div>

                {{-- الوصف --}}
                <div class="form-group mb-3">
                    <label for="description">الوصف</label>
                    <textarea name="description" id="description" rows="4" class="form-control" required>{{ old('description', $feature->description) }}</textarea>
                </div>

                {{-- الرابط --}}
                <div class="form-group mb-3">
                    <label for="link">الرابط (اختياري)</label>
                    <input type="url" name="link" id="link" class="form-control"
                           value="{{ old('link', $feature->link) }}">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.features.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> رجوع
                    </a>
                    <button type="submit" class="btn btn-info">
                        <i class="fas fa-save"></i> حفظ التعديلات
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop
