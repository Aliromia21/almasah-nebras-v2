@extends('layouts.inner')

@section('title', $blog->title)

@section('content')
<div class="container py-5">
    <div class="text-center mb-4">
        <h1 class="text-success fw-bold">{{ $blog->title }}</h1>
        <p class="text-muted">
            <i class="fa fa-user text-success"></i> {{ $blog->author ?? 'Admin' }}
            &nbsp; | &nbsp;
            <i class="fa fa-calendar text-success"></i>
            {{ $blog->created_at->format('d M, Y') }}
        </p>
    </div>

    @if($blog->image)
        <div class="text-center mb-4">
            <img src="{{ asset('storage/'.$blog->image) }}" class="img-fluid rounded shadow" style="max-height:400px; object-fit:cover;">
        </div>
    @endif

    <div class="mx-auto" style="max-width:800px; line-height:1.8; font-size:18px;">
        {!! nl2br(e($blog->content)) !!}
    </div>

    <div class="text-center mt-5">
        <a href="{{ route('home') }}#blog" class="btn btn-outline-success rounded-pill px-4 py-2">
            <i class="fa fa-arrow-left me-2"></i> العودة إلى المقالات
        </a>
    </div>
</div>
@endsection
