@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
@stop


@section('title', 'تعديل قسم من نحن')

@section('content_header')
    <h1>تعديل قسم من نحن</h1>
@stop

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- العنوان --}}
        <div class="form-group mb-3">
            <label>العنوان</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $about->title) }}" required>
        </div>

        {{-- الوصف --}}
        <div class="form-group mb-3">
            <label>الوصف</label>
            <textarea name="description" class="form-control" rows="4" required>{{ old('description', $about->description) }}</textarea>
        </div>

        {{-- الصورة --}}
        <div class="form-group mb-3">
            <label>الصورة الحالية</label><br>
            @if ($about->image && file_exists(public_path('storage/'.$about->image)))
                <img src="{{ asset('storage/'.$about->image) }}" alt="Current Image" class="mb-3 rounded" width="250" id="currentImage">
            @else
                <p class="text-muted">لا توجد صورة حالياً</p>
            @endif
            <br>
            <label>تغيير الصورة</label>
            <input type="file" name="image" id="imageInput" class="form-control">
            <img id="previewImage" class="mt-3" style="max-width: 250px; display:none; border-radius:10px;">
        </div>

        {{-- المميزات --}}
        <div class="form-group mb-3">
            <label>النقاط (المميزات)</label>
            <div id="features-wrapper">
                @php
                    $features = json_decode($about->features, true) ?? [];
                @endphp
                @forelse ($features as $feature)
                    <input type="text" name="features[]" class="form-control mb-2" value="{{ $feature }}">
                @empty
                    <input type="text" name="features[]" class="form-control mb-2" placeholder="ميزة جديدة">
                @endforelse
            </div>
            <button type="button" class="btn btn-sm btn-info" id="add-feature">➕ إضافة ميزة</button>
        </div>

        {{-- الزر --}}
        <div class="form-group mb-3">
            <label>نص الزر</label>
            <input type="text" name="button_text" class="form-control" value="{{ old('button_text', $about->button_text) }}">
        </div>

        <div class="form-group mb-3">
            <label>رابط الزر</label>
            <input type="url" name="button_link" class="form-control" value="{{ old('button_link', $about->button_link) }}">
        </div>

        {{-- الأزرار --}}
        <button type="submit" class="btn btn-success">💾 تحديث</button>
        <a href="{{ route('admin.about.index') }}" class="btn btn-secondary">🔙 رجوع</a>
    </form>
@stop

@section('css')
<style>
html, body {
    height: 100% !important;
}
.layout-fixed .wrapper {
    min-height: 100vh !important;
}
</style>
@stop

@section('js')
<script>
document.getElementById('add-feature').addEventListener('click', function() {
    const wrapper = document.getElementById('features-wrapper');
    const input = document.createElement('input');
    input.type = 'text';
    input.name = 'features[]';
    input.classList.add('form-control', 'mb-2');
    input.placeholder = 'ميزة جديدة';
    wrapper.appendChild(input);
});

// 👇 معاينة الصورة الجديدة قبل الحفظ
const imageInput = document.getElementById('imageInput');
const previewImage = document.getElementById('previewImage');
imageInput.addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        previewImage.src = URL.createObjectURL(file);
        previewImage.style.display = 'block';
    }
});
</script>
@stop
