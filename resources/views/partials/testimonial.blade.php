<!-- Testimonial Start -->
@php
    use App\Models\Testimonial;
    $testimonials = Testimonial::latest()->take(6)->get();
@endphp

@if($testimonials->count() > 0)
<div class="container-fluid bg-light bg-icon py-6 mb-5">
    <div id="testimonials" class="container">
        <div class="section-header text-center mx-auto mb-5" style="max-width: 500px;">
            <h1 class="display-5 mb-3 text-success">آراء عملائنا</h1>
            <p class="text-muted">استمع إلى آراء عملائنا الذين جربوا منتجاتنا الزراعية الطبيعية.</p>
        </div>
        <div class="owl-carousel testimonial-carousel">
            @foreach($testimonials as $testimonial)
                <div class="testimonial-item position-relative bg-white p-5 mt-4 shadow-sm rounded">
                    <i class="fa fa-quote-left fa-3x text-success position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">{{ $testimonial->message }}</p>
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 rounded-circle" 
                             src="{{ $testimonial->image ? asset('storage/'.$testimonial->image) : asset('images/default-user.png') }}" 
                             alt="{{ $testimonial->name }}" 
                             style="width:60px; height:60px; object-fit:cover;">
                        <div class="ms-3">
                            <h5 class="mb-1">{{ $testimonial->name }}</h5>
                            <span class="text-muted">{{ $testimonial->profession }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif
<!-- Testimonial End -->
