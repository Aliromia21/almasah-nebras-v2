@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
@stop

@section('title', 'إدارة السلايدر')

@section('content_header')
    <h1>السلايدر</h1>
@stop

@section('content')
    <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary mb-3">➕ إضافة سلايد جديد</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>الصورة</th>
                <th>العنوان</th>
                <th>الأزرار</th>
                <th>العمليات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sliders as $slider)
                <tr>
                    <td><img src="{{ asset('storage/'.$slider->image) }}" width="150"></td>
                    <td>{{ $slider->title }}</td>
                    <td>
                        {{ $slider->btn1_text }} / {{ $slider->btn2_text }}
                    </td>
                    <td>
                        <a href="{{ route('admin.sliders.edit', $slider) }}" class="btn btn-sm btn-info">تعديل</a>
                        <form action="{{ route('admin.sliders.destroy', $slider) }}" method="POST" style="display:inline-block">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('تأكيد الحذف؟')">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
