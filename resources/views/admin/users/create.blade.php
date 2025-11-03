@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
@stop

@section('title', 'إضافة مستخدم')

@section('content_header')
    <h1>إضافة مستخدم جديد</h1>
@stop

@section('content')
<form action="{{ route('admin.users.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>الاسم</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
    </div>

    <div class="form-group">
        <label>البريد الإلكتروني</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
    </div>

    <div class="form-group">
        <label>كلمة المرور</label>
        <input type="password" name="password" class="form-control">
    </div>

    <div class="form-group">
        <label>تأكيد كلمة المرور</label>
        <input type="password" name="password_confirmation" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">حفظ</button>
    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">إلغاء</a>
</form>
@stop
