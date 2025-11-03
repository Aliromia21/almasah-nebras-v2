@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
@stop


@section('title', 'إضافة قسم من نحن')

@section('content_header')
    <h1>إضافة قسم من نحن</h1>
@stop

@section('content')
    <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label>العنوان</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>الوصف</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="form-group mb-3">
            <label>الصورة</label><br>
            <input type="file" name="image" id="imageInput" class="form-control">
            <img id="previewImage" class="mt-3" style="max-width: 250px; display:none; border-radius:10px;">
        </div>

        <div class="form-group mb-3">
            <label>النقاط (المميزات)</label>
            <div id="features-wrapper">
                <input type="text" name="features[]" class="form-control mb-2" placeholder="ميزة 1">
            </div>
            <button type="button" class="btn btn-sm btn-info" id="add-feature">➕ إضافة ميزة</button>
        </div>

        <div class="form-group mb-3">
            <label>نص الزر</label>
            <input type="text" name="button_text" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>رابط الزر</label>
            <input type="url" name="button_link" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">💾 حفظ</button>
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

// 👇 معاينة الصورة قبل الحفظ
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
