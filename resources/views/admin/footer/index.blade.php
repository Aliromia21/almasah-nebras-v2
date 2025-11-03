@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
@stop


@section('title', 'إعدادات الفوتر')

@section('content_header')
    <h1 class="fw-bold text-primary">⚙️ إعدادات الفوتر</h1>
@stop

@section('content')
<div class="card shadow-sm p-4">
    <form action="{{ route('admin.footer.update') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">اسم الشركة</label>
            <input type="text" name="company_name" class="form-control" value="{{ old('company_name', $footer->company_name ?? '') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">نبذة مختصرة</label>
            <textarea name="about_text" class="form-control" rows="3">{{ old('about_text', $footer->about_text ?? '') }}</textarea>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">العنوان</label>
                <input type="text" name="address" class="form-control" value="{{ old('address', $footer->address ?? '') }}">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">رقم الهاتف</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $footer->phone ?? '') }}">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">البريد الإلكتروني</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $footer->email ?? '') }}">
        </div>

        <hr>
        <h5 class="text-success">روابط التواصل الاجتماعي 🌐</h5>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Facebook</label>
                <input type="url" name="facebook" class="form-control" value="{{ old('facebook', $footer->facebook ?? '') }}">
            </div>
            <div class="col-md-6 mb-3">
                <label>Instagram</label>
                <input type="url" name="instagram" class="form-control" value="{{ old('instagram', $footer->instagram ?? '') }}">
            </div>
            <div class="col-md-6 mb-3">
                <label>YouTube</label>
                <input type="url" name="youtube" class="form-control" value="{{ old('youtube', $footer->youtube ?? '') }}">
            </div>
            <div class="col-md-6 mb-3">
                <label>WhatsApp</label>
                <input type="url" name="whatsapp" class="form-control" value="{{ old('whatsapp', $footer->whatsapp ?? '') }}">
            </div>
        </div>

        <div class="text-end mt-3">
            <button type="submit" class="btn btn-primary px-4">
                <i class="fas fa-save me-1"></i> حفظ التعديلات
            </button>
        </div>
    </form>
</div>
@stop
