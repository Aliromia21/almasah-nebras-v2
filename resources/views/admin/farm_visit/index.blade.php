@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
@stop


@section('title', 'قسم زيارة المزرعة')

@section('content_header')
    <h1 class="fw-bold text-success">قسم زيارة المزرعة</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($farmVisit)
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h3 class="text-success mb-3">{{ $farmVisit->title ?? 'زوروا مزرعتنا' }}</h3>
                <p class="text-muted fs-5">{{ $farmVisit->description ?? 'لم يتم إضافة وصف بعد.' }}</p>

                @if($farmVisit->button_text && $farmVisit->button_link)
                    <a href="{{ $farmVisit->button_link }}" target="_blank" class="btn btn-outline-success rounded-pill">
                        <i class="fas fa-external-link-alt me-1"></i> {{ $farmVisit->button_text }}
                    </a>
                @endif

                <div class="mt-4">
                    <a href="{{ route('admin.farm_visit.edit', $farmVisit->id) }}" class="btn btn-primary me-2">
                        <i class="fas fa-edit"></i> تعديل
                    </a>

                    <form action="{{ route('admin.farm_visit.destroy', $farmVisit->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('هل أنت متأكد من حذف هذا القسم؟');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> حذف
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-5 bg-light rounded shadow-sm">
            <h4 class="text-muted mb-3">🚜 لا يوجد قسم لزيارة المزرعة حتى الآن</h4>
            <a href="{{ route('admin.farm_visit.create') }}" class="btn btn-success rounded-pill px-4 py-2">
                <i class="fas fa-plus-circle me-1"></i> إنشاء قسم جديد
            </a>
        </div>
    @endif
@stop

@section('css')
    <style>
        .card-body p {
            line-height: 1.8;
        }
    </style>
@stop
