@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
@stop



@section('title', 'رسائل التواصل')

@section('content_header')
    <h1>📩 رسائل التواصل</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($contacts->count() > 0)
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-success">
                <tr>
                    <th>الاسم</th>
                    <th>البريد الإلكتروني</th>
                    <th>الموضوع</th>
                    <th>الرسالة (مختصرة)</th>
                    <th>تاريخ الإرسال</th>
                    <th class="text-center">الخيارات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td>{{ Str::limit($contact->message, 60) }}</td>
                        <td>{{ $contact->created_at->format('Y-m-d H:i') }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-info btn-sm">
                                👁️ عرض
                            </a>
                            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">🗑️ حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $contacts->links() }}
    @else
        <p class="text-center mt-4">لا توجد رسائل حتى الآن 📭</p>
    @endif
@stop
