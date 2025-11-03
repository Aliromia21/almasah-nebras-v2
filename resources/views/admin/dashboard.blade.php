@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
@stop




@section('title', 'لوحة التحكم')



@section('content_header')
    <h1 class="text-success fw-bold">🌿 لوحة التحكم</h1>
@stop

@section('content')
<div class="row">

    {{-- بطاقة الإحصائيات: عدد المقالات --}}
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success shadow">
            <div class="inner">
                <h3>{{ \App\Models\Blog::count() }}</h3>
                <p>عدد المقالات</p>
            </div>
            <div class="icon">
                <i class="fas fa-blog"></i>
            </div>
            <a href="{{ route('admin.blog.index') }}" class="small-box-footer">
                عرض المقالات <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    {{-- عدد المنتجات --}}
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info shadow">
            <div class="inner">
                <h3>{{ \App\Models\Product::count() }}</h3>
                <p>عدد المنتجات</p>
            </div>
            <div class="icon">
                <i class="fas fa-seedling"></i>
            </div>
            <a href="{{ route('admin.products.index') }}" class="small-box-footer">
                عرض المنتجات <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    {{-- عدد الميزات --}}
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning shadow">
            <div class="inner">
                <h3>{{ \App\Models\Feature::count() }}</h3>
                <p>عدد المميزات</p>
            </div>
            <div class="icon">
                <i class="fas fa-star"></i>
            </div>
            <a href="{{ route('admin.features.index') }}" class="small-box-footer">
                إدارة المميزات <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    {{-- آراء الزبائن --}}
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger shadow">
            <div class="inner">
                <h3>{{ \App\Models\Testimonial::count() }}</h3>
                <p>آراء الزبائن</p>
            </div>
            <div class="icon">
                <i class="fas fa-comments"></i>
            </div>
            <a href="{{ route('admin.testimonials.index') }}" class="small-box-footer">
                إدارة الآراء <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

{{-- قسم الترحيب --}}
<div class="card shadow-lg mt-4">
    <div class="card-body text-center">
        <h3 class="text-success fw-bold">مرحبًا بك في لوحة إدارة الموقع 🌱</h3>
        <p class="text-muted mt-3">
            يمكنك إدارة جميع أقسام موقعك من هنا — المنتجات، المقالات، المميزات، السلايدر، وزيارات المزرعة بكل سهولة.
        </p>
        <a href="{{ route('admin.products.index') }}" class="btn btn-success mt-2">
            <i class="fas fa-box"></i> ابدأ بإدارة المنتجات
        </a>
    </div>
</div>
@stop

@section('css')
<style>
    .small-box {
        border-radius: 15px !important;
        transition: transform 0.3s ease-in-out;
    }
    .small-box:hover {
        transform: translateY(-5px);
    }
    .card {
        border-radius: 15px;
    }
</style>
@stop

@section('js')
<script>
    console.log("✅ لوحة التحكم تعمل بنجاح!");
</script>
@stop
