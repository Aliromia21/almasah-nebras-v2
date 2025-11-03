@php
use App\Helpers\FeatureIconHelper;
$features = \App\Models\Feature::all();
@endphp

@if($features->count())
<div class="container-fluid bg-light bg-icon my-5 py-6" dir="rtl" style="text-align: right;">
    <div id="features" class="container">
        {{-- ✅ العنوان --}}
        <div class="section-header text-center mx-auto mb-5" style="max-width: 700px;">
            <h1 class="display-5 mb-3 fw-bold text-success" style="font-size: 2.8rem;">مميزاتنا</h1>
            <p class="text-muted" style="font-size: 1.2rem; line-height: 1.9;">
                منتجاتنا تجمع بين الجودة، الصحة، والاستدامة لتمنحك الأفضل دائمًا 🌿
            </p>
        </div>

        {{-- ✅ البطاقات --}}
        <div class="row g-4 justify-content-center">
            @foreach($features as $feature)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $loop->index + 1 }}s">
                    <div class="bg-white text-center h-100 p-4 p-xl-5 rounded-4 shadow-sm feature-card position-relative">
                        <div class="mb-4 feature-icon">
                            {!! FeatureIconHelper::getSvg($feature->svg_icon) !!}
                        </div>
                        <h4 class="mb-3 text-dark fw-bold" style="font-size: 1.4rem;">{{ $feature->title }}</h4>
                        <p class="text-muted" style="font-size: 1.1rem; line-height: 1.8;">
                            {{ $feature->description }}
                        </p>

                        @if($feature->link)
                            <a href="{{ $feature->link }}" target="_blank"
                               class="btn btn-outline-success rounded-pill px-4 py-2 mt-3 fw-semibold"
                               style="font-size: 1rem;">
                                اقرأ المزيد <i class="fa fa-arrow-left me-2"></i>
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

{{-- ✅ تحسينات CSS --}}
<style>
    .feature-card {
        transition: all 0.4s ease;
        border: 1px solid rgba(0, 128, 0, 0.05);
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        border-color: rgba(40, 167, 69, 0.2);
    }

    .feature-icon svg {
        width: 70px;
        height: 70px;
        color: #28a745;
        transition: transform 0.3s ease;
    }

    .feature-card:hover svg {
        transform: scale(1.15);
    }

    .btn-outline-success {
        border-width: 2px;
        transition: all 0.3s ease;
    }

    .btn-outline-success:hover {
        background-color: #28a745;
        color: #fff;
    }

    /* ✅ تحسين العرض على الجوال */
    @media (max-width: 768px) {
        [dir="rtl"] #features {
            text-align: center;
        }
        .feature-card {
            padding: 2rem 1rem;
        }
        .feature-card h4 {
            font-size: 1.3rem;
        }
        .feature-card p {
            font-size: 1rem;
        }
        .feature-icon svg {
            width: 60px;
            height: 60px;
        }
    }
</style>
@endif
