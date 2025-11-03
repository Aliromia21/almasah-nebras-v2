@php
$sliders = \App\Models\Slider::where('is_active', true)->get();
@endphp

@if($sliders->count())
<div id="carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
    <div class="carousel-inner">
        @foreach ($sliders as $index => $slider)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <img class="w-100" src="{{ asset('storage/'.$slider->image) }}" alt="Slider Image" style="object-fit: cover; height: 100vh;">
                
                <div class="carousel-caption d-flex align-items-center justify-content-center text-center text-lg-start">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-7">
                                <!-- ✅ تأثير الكتابة -->
                                <h1 class="display-2 fw-bold mb-4 text-white slider-title">
                                    <span class="typing-text" data-text="{{ $slider->title }}"></span>
                                </h1>

                                <div class="d-flex flex-wrap gap-3">
                                    @if($slider->btn1_text)
                                        <a href="{{ $slider->btn1_link }}"
                                           class="btn btn-success rounded-pill py-sm-3 px-sm-5 shadow-lg slider-btn-primary">
                                            {{ $slider->btn1_text }}
                                        </a>
                                    @endif

                                    @if($slider->btn2_text)
                                        <a href="{{ $slider->btn2_link }}"
                                           class="btn btn-outline-light rounded-pill py-sm-3 px-sm-5 slider-btn-secondary">
                                            {{ $slider->btn2_text }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- ✅ أزرار التنقل -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<style>
    /* ===========================
   🎨 تنسيق السلايدر
=========================== */
.carousel-item img {
    filter: brightness(60%);
}

.slider-title {
    font-size: 2.8rem; /* ✅ كان 4.5rem، الآن أكثر توازنًا */
    line-height: 1.3;
    text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
    letter-spacing: 0.5px;
    min-height: 70px;
}

/* ✨ تأثير الكتابة */
.typing-text {
    border-left: 3px solid #fff;
    white-space: nowrap;
    overflow: hidden;
    display: inline-block;
    animation: blink 0.7s infinite;
}

@keyframes blink {
    0%, 50%, 100% { border-color: transparent; }
    25%, 75% { border-color: #fff; }
}

/* الأزرار */
.slider-btn-primary {
    background: linear-gradient(135deg, #198754, #28a745);
    border: none;
    color: #fff;
    font-weight: 600;
    transition: all 0.3s ease;
}

.slider-btn-primary:hover {
    background: linear-gradient(135deg, #157347, #1e8b4a);
    transform: translateY(-3px);
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.25);
}

.slider-btn-secondary {
    border: 2px solid #fff;
    color: #fff;
    font-weight: 600;
    transition: all 0.3s ease;
}

.slider-btn-secondary:hover {
    background: #fff;
    color: #198754;
    transform: translateY(-3px);
    box-shadow: 0 6px 15px rgba(255, 255, 255, 0.25);
}

/* 📱 تحسين العرض على الموبايل */
@media (max-width: 992px) {
    .slider-title {
        font-size: 2.2rem;
        text-align: center;
        line-height: 1.4;
    }
}

@media (max-width: 576px) {
    .slider-title {
        font-size: 1.7rem;
        text-align: center;
    }

    .slider-btn-primary,
    .slider-btn-secondary {
        width: 100%;
        text-align: center;
    }

    .d-flex.flex-wrap.gap-3 {
        justify-content: center;
    }
}

</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const elements = document.querySelectorAll('.typing-text');

    elements.forEach(el => {
        const text = el.getAttribute('data-text');
        let charIndex = 0;
        let isDeleting = false;

        function typeEffect() {
            const visibleText = text.substring(0, charIndex);
            el.textContent = visibleText;

            if (!isDeleting && charIndex < text.length) {
                charIndex++;
            } else if (isDeleting && charIndex > 0) {
                charIndex--;
            }

            if (charIndex === text.length + 5) isDeleting = true;
            else if (charIndex === 0) isDeleting = false;

            const speed = isDeleting ? 50 : 100;
            setTimeout(typeEffect, speed);
        }

        typeEffect();
    });
});
</script>
@endif
