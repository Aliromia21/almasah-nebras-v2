@php
    use App\Models\Footer;
    use App\Models\Blog;
    $footer = Footer::first();
    $footerBlogs = Blog::latest()->take(2)->get();
@endphp

<!-- Footer Start -->
<div class="container-fluid bg-dark text-light mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div id="footer" class="container py-5">
        <div class="row g-5">

            <!-- شعار ومقدمة -->
            <div class="col-lg-3 col-md-6">
                <h2 class="fw-bold text-primary mb-4">
                    {{ $footer->company_name ?? 'ألماســة ونبــراس' }}
                </h2>

                <p class="small">
                    {{ $footer->about_text ?? 'نهتم بتقديم منتجات زراعية طبيعية 100٪، مصدرها مزارعنا السورية، لتصل إليكم طازجة وصحية بكل حب 🌿' }}
                </p>

                <div class="d-flex pt-2">
                    @if(!empty($footer->facebook))
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href="{{ $footer->facebook }}" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    @endif

                    @if(!empty($footer->instagram))
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href="{{ $footer->instagram }}" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                    @endif

                    @if(!empty($footer->youtube))
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href="{{ $footer->youtube }}" target="_blank">
                            <i class="fab fa-youtube"></i>
                        </a>
                    @endif

                    @if(!empty($footer->whatsapp))
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href="{{ $footer->whatsapp }}" target="_blank">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    @endif
                </div>
            </div>

            <!-- معلومات التواصل -->
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">تواصل معنا</h4>
                <p><i class="fa fa-map-marker-alt me-3 text-secondary"></i> {{ $footer->address ?? 'سوريا - دمشق' }}</p>
                <p><i class="fa fa-phone-alt me-3 text-secondary"></i> &nbsp;{{ $footer->phone ?? '+963 987 654 321' }}</p>
                <p><i class="fa fa-envelope me-3 text-secondary"></i>&nbsp;{{ $footer->email ?? 'info@almasah-nebras.com' }}</p>
            </div>

            <!-- روابط سريعة -->
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">روابط سريعة</h4>
                <a class="btn btn-link" href="#about">من نحن</a>
                <a class="btn btn-link" href="#products">منتجاتنا</a>
                <a class="btn btn-link" href="#features">مميزاتنا</a>
                <a class="btn btn-link" href="#blog">المدونة</a>
                <a class="btn btn-link" href="{{ route('contact') }}">تواصل معنا</a>
            </div>

            <!-- آخر المقالات -->
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">آخر المقالات</h4>
                @forelse($footerBlogs as $blog)
                    <div class="d-flex mb-3">
                        <img src="{{ asset('storage/'.$blog->image) }}"
                             alt="{{ $blog->title }}"
                             class="img-fluid me-3 rounded"
                             style="width: 60px; height: 60px; object-fit: cover;">
                        <div>
                            <a href="{{ route('blog.show', $blog->slug) }}"
                               class="text-light d-block fw-bold small mb-1 text-decoration-none">
                                {{ Str::limit($blog->title, 40) }}
                            </a>
                            <small class="text-secondary">
                                {{ $blog->created_at->format('d M, Y') }}
                            </small>
                        </div>
                    </div>
                @empty
                    <p class="text-muted small">لا توجد مقالات حالياً 🌱</p>
                @endforelse
            </div>

        </div>
    </div>

    <!-- حقوق النشر -->
    <div class="container-fluid text-center border-top py-3"
         style="border-color: rgba(255, 255, 255, .1) !important;">
        <p class="mb-0 text-light small">
            جميع الحقوق محفوظة © {{ date('Y') }}
            <a class="text-secondary fw-bold text-decoration-none" href="#">
                {{ $footer->company_name ?? 'الماســة ونبــراس' }}
            </a>
            🌾
        </p>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#carousel" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top">
    <i class="bi bi-arrow-up"></i>
</a>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('js/main.js') }}"></script>
