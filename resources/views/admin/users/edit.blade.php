@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
@stop

@section('title', 'تعديل مستخدم')

@section('content_header')
    <h1>تعديل المستخدم</h1>
@stop

@section('content')
<form action="{{ route('admin.users.update', $user) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>الاسم</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
    </div>

    <div class="form-group">
        <label>البريد الإلكتروني</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
    </div>

    <div class="form-group">
        <label>كلمة المرور الجديدة (اختياري)</label>
        <input type="password" name="password" class="form-control">
    </div>

    <div class="form-group">
        <label>تأكيد كلمة المرور</label>
        <input type="password" name="password_confirmation" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">تحديث</button>
    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">إلغاء</a>
</form>
@stop
