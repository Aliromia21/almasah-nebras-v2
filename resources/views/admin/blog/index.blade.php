@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
@stop


@section('title', 'إدارة المقالات')

@section('content_header')
    <h1 class="fw-bold text-primary">📰 إدارة المقالات</h1>
@stop

@section('content')

    {{-- إشعار بالنجاح --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">جميع المقالات</h4>
        <a href="{{ route('admin.blog.create') }}" class="btn btn-success">
            <i class="fas fa-plus-circle me-1"></i> إضافة مقال جديد
        </a>
    </div>

    @if ($blogs->count())
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm border-0 h-100">
                        {{-- صورة المقال --}}
                        <img src="{{ asset('storage/' . $blog->image) }}"
                             alt="{{ $blog->title }}"
                             class="card-img-top"
                             style="height: 200px; object-fit: cover; border-radius: .5rem .5rem 0 0;">

                        <div class="card-body">
                            <h5 class="fw-bold">{{ $blog->title }}</h5>
                            <p class="text-muted small mb-2">
                                <i class="fa fa-user text-success me-1"></i> {{ $blog->author ?? 'غير معروف' }}
                            </p>
                            <p>{{ Str::limit($blog->excerpt ?? strip_tags($blog->content), 100) }}</p>
                        </div>

                        <div class="card-footer bg-light d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="fa fa-calendar text-success me-1"></i>
                                {{ optional($blog->published_at ?? $blog->created_at)->format('Y-m-d') }}
                            </small>
                            <div>
                                <a href="{{ route('admin.blog.edit', $blog) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.blog.destroy', $blog) }}" method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('هل تريد حذف هذا المقال؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- روابط التصفح --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $blogs->links() }}
        </div>
    @else
        <div class="text-center py-5 bg-light rounded">
            <h5 class="text-muted mb-3">لا توجد مقالات حالياً</h5>
            <a href="{{ route('admin.blog.create') }}" class="btn btn-success">
                <i class="fas fa-plus-circle me-1"></i> إضافة مقال
            </a>
        </div>
    @endif

@stop
