@extends('adminlte::page')

@section('title', isset($slider) ? 'تعديل سلايد' : 'إضافة سلايد')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
    <style>
        .preview-img {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-bottom: 10px;
            object-fit: cover;
        }

        .form-label {
            font-weight: bold;
            color: #198754;
        }

        .alert {
            font-size: 16px;
        }
    </style>
@stop

@section('content_header')
    <h1 class="text-center">{{ isset($slider) ? 'تعديل السلايدر' : 'إضافة سلايدر جديد' }}</h1>
@stop

@section('content')
<div class="container">
    
    {{-- ✅ إشعار النجاح --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- ⚠️ إشعارات الأخطاء --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>حدثت أخطاء أثناء الحفظ:</strong>
            <ul class="mt-2 mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- 📝 نموذج تعديل / إضافة --}}
    <form action="{{ isset($slider) ? route('admin.sliders.update', $slider) : route('admin.sliders.store') }}" 
          method="POST" enctype="multipart/form-data" id="sliderForm">
        @csrf
        @if(isset($slider)) @method('PUT') @endif

        <div class="card p-4 shadow-sm">
            <div class="form-group mb-3">
                <label class="form-label">العنوان</label>
                <input type="text" name="title" class="form-control" 
                       value="{{ old('title', $slider->title ?? '') }}" required>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">الصورة</label><br>
                @if(isset($slider))
                    <img src="{{ asset('storage/'.$slider->image) }}" width="200" class="preview-img" id="current-image">
                @endif
                <input type="file" name="image" class="form-control" accept="image/*" id="imageInput">
                <img id="preview" src="#" width="200" class="preview-img d-none mt-2" alt="Preview">
            </div>

            <div class="form-group mb-3">
                <label class="form-label">النص الأول</label>
                <input type="text" name="btn1_text" class="form-control" 
                       value="{{ old('btn1_text', $slider->btn1_text ?? '') }}">
            </div>

            <div class="form-group mb-3">
                <label class="form-label">رابط الزر الأول</label>
                <input type="url" name="btn1_link" class="form-control" 
                       value="{{ old('btn1_link', $slider->btn1_link ?? '') }}">
            </div>

            <div class="form-group mb-3">
                <label class="form-label">النص الثاني</label>
                <input type="text" name="btn2_text" class="form-control" 
                       value="{{ old('btn2_text', $slider->btn2_text ?? '') }}">
            </div>

            <div class="form-group mb-3">
                <label class="form-label">رابط الزر الثاني</label>
                <input type="url" name="btn2_link" class="form-control" 
                       value="{{ old('btn2_link', $slider->btn2_link ?? '') }}">
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success px-4" id="saveBtn">
                    💾 حفظ التعديلات
                </button>
                <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary px-4">🔙 رجوع</a>
            </div>
        </div>
    </form>
</div>
@stop

@section('js')
<script>
    // ✅ معاينة الصورة قبل الرفع
    document.getElementById('imageInput').addEventListener('change', function(event){
        let preview = document.getElementById('preview');
        let current = document.getElementById('current-image');
        if(event.target.files.length > 0){
            let src = URL.createObjectURL(event.target.files[0]);
            preview.src = src;
            preview.classList.remove('d-none');
            if(current) current.classList.add('d-none');
        }
    });

    // 💾 زر التحميل المتحرك
    document.getElementById('sliderForm').addEventListener('submit', function(){
        let btn = document.getElementById('saveBtn');
        btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> جاري الحفظ...';
        btn.disabled = true;
    });
</script>
@stop
