@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
@stop


@section('title', 'عرض الرسالة')

@section('content_header')
    <h1>📨 عرض تفاصيل الرسالة</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">{{ $contact->subject }}</h5>
        </div>
        <div class="card-body">
            <p><strong>👤 الاسم:</strong> {{ $contact->name }}</p>
            <p><strong>📧 البريد الإلكتروني:</strong> {{ $contact->email }}</p>
            <p><strong>🕒 تاريخ الإرسال:</strong> {{ $contact->created_at->format('Y-m-d H:i') }}</p>

            <hr>
            <h5>💬 محتوى الرسالة:</h5>
            <p style="white-space: pre-wrap;">{{ $contact->message }}</p>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">⬅️ رجوع إلى الرسائل</a>
            <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST"
      onsubmit="return confirm('هل تريد حذف هذه الرسالة؟')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">🗑️ حذف الرسالة</button>
</form>

        </div>
    </div>
@stop
