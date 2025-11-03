@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
@stop


@section('title', 'قسم من نحن')

@section('content_header')
    <h1 class="text-primary"><i class="fas fa-info-circle"></i> قسم من نحن</h1>
@stop

@section('content')
    {{-- ✅ رسالة النجاح --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- ✅ التحقق من وجود بيانات --}}
    @if ($about)
        <div class="card shadow-lg border-0 rounded-3">
            <div class="card-header bg-gradient-primary text-white">
                <h4 class="mb-0"><i class="fas fa-address-card"></i> معلومات القسم</h4>
            </div>

            <div class="card-body p-4">
                <div class="row align-items-center">
                    {{-- الصورة --}}
                    <div class="col-md-4 text-center mb-4 mb-md-0">
                        @if ($about->image && file_exists(public_path('storage/'.$about->image)))
                            <img src="{{ asset('storage/'.$about->image) }}" alt="About Image"
                                 class="img-fluid rounded shadow" style="max-height: 300px; object-fit: cover;">
                        @else
                            <img src="{{ asset('images/placeholder.jpg') }}" alt="Placeholder"
                                 class="img-fluid rounded shadow" style="max-height: 300px; object-fit: cover;">
                        @endif
                    </div>

                    {{-- التفاصيل --}}
                    <div class="col-md-8">
                        <h3 class="text-dark fw-bold mb-3">{{ $about->title }}</h3>
                        <p class="text-muted" style="line-height: 1.8;">
                            {!! nl2br(e($about->description)) !!}
                        </p>

                        @if ($about->features)
                            <h6 class="fw-bold mt-4 mb-2 text-primary"><i class="fas fa-star"></i> المميزات:</h6>
                            <ul class="list-unstyled">
                                @foreach (json_decode($about->features) as $feature)
                                    <li class="mb-1"><i class="fa fa-check text-success me-2"></i>{{ $feature }}</li>
                                @endforeach
                            </ul>
                        @endif

                        @if ($about->button_text)
                            <a href="{{ $about->button_link }}" target="_blank" class="btn btn-outline-primary mt-3">
                                <i class="fas fa-link"></i> {{ $about->button_text }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            {{-- الأزرار --}}
            <div class="card-footer d-flex justify-content-between align-items-center bg-light">
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.about.edit', $about) }}" class="btn btn-info">
                        <i class="fas fa-edit"></i> تعديل
                    </a>

                    <form action="{{ route('admin.about.destroy', $about->id) }}" method="POST"
                          onsubmit="return confirm('هل أنت متأكد أنك تريد حذف هذا القسم؟');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i> حذف
                        </button>
                    </form>
                </div>

                <small class="text-muted">
                    آخر تحديث: {{ $about->updated_at->format('Y-m-d H:i') }}
                </small>
            </div>
        </div>
    @else
        {{-- لا توجد بيانات --}}
        <div class="text-center py-5">
            <i class="fas fa-exclamation-circle fa-3x text-muted mb-3"></i>
            <h4 class="text-secondary mb-4">لم تتم إضافة قسم "من نحن" بعد.</h4>
            <a href="{{ route('admin.about.create') }}" class="btn btn-success btn-lg rounded-pill">
                <i class="fas fa-plus-circle"></i> إنشاء قسم من نحن
            </a>
        </div>
    @endif
@stop

@section('css')
<style>
.card {
    transition: all 0.3s ease;
}
.card:hover {
    transform: translateY(-3px);
}
.btn i {
    margin-left: 5px;
}
</style>
@stop
