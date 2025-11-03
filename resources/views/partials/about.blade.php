@php
$about = \App\Models\About::first();
@endphp

@if($about)
<div id="about" class="container-xxl py-5" dir="rtl" style="text-align: right;">
    <div class="container">
        <div class="row g-5 align-items-center flex-row-reverse">
            {{-- ✅ صورة القسم --}}
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s" >
                <div class="about-img position-relative overflow-hidden p-5 pe-0">
                    <img class="img-fluid w-100" 
                         src="{{ asset('storage/'.$about->image) }}" 
                         alt="صورة من نحن" 
                         style="object-fit: cover; border-radius: 15px;">
                </div>
            </div>

            {{-- ✅ النصوص --}}
            <div class="col-lg-6">
                <h1 class="display-5 mb-4 text-success fw-bold">{{ $about->title }}</h1>
                <p class="mb-4 text-secondary fw-bold" style="line-height: 1.8;">
                    {{ $about->description }}
                </p>

                {{-- ✅ المميزات --}}
                @if($about->features)
                    <div class="mb-4">
                        @foreach (json_decode($about->features) as $feature)
                            <p class="mb-2">
                                <i class="fa fa-check-circle text-success ms-2"></i>
                                {{ $feature }}
                            </p>
                        @endforeach
                    </div>
                @endif

                {{-- ✅ زر مخصص --}}
                @if($about->button_text)
                    <a class="btn btn-success rounded-pill py-3 px-5 shadow-sm fw-semibold" 
                       href="{{ $about->button_link }}">
                        {{ $about->button_text }}
                        <i class="fa fa-arrow-left me-2"></i>
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endif

{{-- ✅ تحسينات CSS إضافية --}}
<style>
    #about {
        background: #f8fdf9;
    }

    #about .about-img img {
        transition: transform 0.6s ease, box-shadow 0.6s ease;
    }

    #about .about-img img:hover {
        transform: scale(1.05);
        box-shadow: 0 0 020px rgba(0, 0, 0, 0.15);
    }

    @media (max-width: 768px) {
        #about {
            text-align: center;
        }
        #about .row {
            flex-direction: column !important;
        }
        #about .btn {
            margin-top: 1rem;
        }
    }
</style>
