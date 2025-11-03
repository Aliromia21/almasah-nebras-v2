@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
@stop

@section('title', 'إدارة المميزات الزراعية')

@section('content_header')
    <h1 class="text-success"><i class="fas fa-leaf"></i> إدارة المميزات الزراعية</h1>
@stop

@section('content')

    {{-- ✅ تنبيه النجاح --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- زر إضافة --}}
    <div class="mb-4 text-end">
        <a href="{{ route('admin.features.create') }}" class="btn btn-success btn-lg rounded-pill shadow">
            <i class="fas fa-plus-circle"></i> إضافة ميزة جديدة
        </a>
    </div>

    {{-- عرض المميزات --}}
    @if($features->count() > 0)
        <div class="row">
            @foreach($features as $feature)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card feature-card shadow-sm border-0 h-100">
                        <div class="card-body text-center p-4">

                            {{-- دائرة الأيقونة --}}
                            <div class="icon-wrapper mb-3">
                                {!! \App\Helpers\FeatureIconHelper::getSvg($feature->svg_icon) !!}
                            </div>

                            <h5 class="fw-bold text-dark mb-2">{{ $feature->title }}</h5>
                            <p class="text-muted small mb-0">{{ Str::limit($feature->description, 100) }}</p>

                        </div>

                        {{-- التذييل --}}
                        <div class="card-footer bg-light d-flex justify-content-between align-items-center">
                            <small class="text-success"><i class="far fa-clock"></i> {{ $feature->created_at->format('Y-m-d') }}</small>
                            <div class="btn-group">
                                <a href="{{ route('admin.features.edit', $feature->id) }}" class="btn btn-sm btn-info text-white" title="تعديل">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.features.destroy', $feature->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="حذف">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- ترقيم الصفحات --}}
        <div class="d-flex justify-content-center mt-3">
            {{ $features->links() }}
        </div>

    @else
        <div class="text-center py-5">
            <i class="fas fa-info-circle fa-3x text-muted mb-3"></i>
            <h4 class="text-muted">لم تتم إضافة أي مميزات بعد.</h4>
        </div>
    @endif
@stop


@section('css')
<style>
/* ✨ بطاقات المميزات */
.feature-card {
    border-radius: 16px;
    transition: all 0.3s ease;
    background: #fff;
}
.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
}

/* 🌿 دائرة الأيقونة */
.icon-wrapper {
    background: #eaf7ef;
    border-radius: 50%;
    width: 110px;
    height: 110px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 15px;
    transition: all 0.3s ease;
}
.icon-wrapper svg {
    width: 60px;
    height: 60px;
}
.feature-card:hover .icon-wrapper {
    background: #d9f6e3;
}

/* 🧭 أزرار التعديل والحذف */
.btn-info {
    background: #17a2b8;
    border: none;
}
.btn-danger {
    background: #e74c3c;
    border: none;
}
.btn-info:hover, .btn-danger:hover {
    opacity: 0.85;
}

/* 💬 تنسيق النصوص */
h5 {
    font-weight: 600;
    color: #2c3e50;
}
.text-muted {
    font-size: 0.9rem;
}
</style>
@stop
