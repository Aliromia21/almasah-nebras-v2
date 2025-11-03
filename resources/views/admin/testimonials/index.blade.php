@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
@stop

@section('title', 'آراء العملاء')

@section('content_header')
    <h1 class="text-success fw-bold">آراء العملاء 🌿</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="text-end mb-3">
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-success">
            <i class="fas fa-plus-circle me-1"></i> إضافة رأي جديد
        </a>
    </div>

    @if($testimonials->count() > 0)
        <div class="row">
            @foreach($testimonials as $testimonial)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body text-center">
                            <img src="{{ $testimonial->image ? asset('storage/'.$testimonial->image) : asset('images/default-user.png') }}"
                                 class="rounded-circle mb-3"
                                 alt="{{ $testimonial->name }}"
                                 width="90" height="90"
                                 style="object-fit: cover;">

                            <h5 class="fw-bold">{{ $testimonial->name }}</h5>
                            <small class="text-muted d-block mb-2">{{ $testimonial->profession }}</small>
                            <p class="text-secondary">{{ Str::limit($testimonial->message, 100) }}</p>
                        </div>
                        <div class="card-footer bg-light d-flex justify-content-between">
                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i> تعديل
                            </a>
                            <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا الرأي؟');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> حذف</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $testimonials->links() }}
        </div>
    @else
        <div class="alert alert-warning text-center py-5">
            لا توجد آراء حالياً 🌱
        </div>
    @endif
@stop
