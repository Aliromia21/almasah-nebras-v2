<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <title>تواصل معنا - Almasah & Nebras</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Style -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Tajawal', sans-serif;
        }
        /* ===== Navbar ثابتة بخلفية بيضاء وظل خفيف ===== */
        .navbar {
            background-color: #fff !important;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        .navbar-nav .nav-link {
            color: #0f5132 !important;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: #198754 !important;
        }

        /* ===== اللون الأساسي الأخضر ===== */
        .bg-primary {
            background-color: #198754 !important;
        }
        .btn-primary {
            background-color: #198754;
            border: none;
        }
        .btn-primary:hover {
            background-color: #157347;
        }

        /* ===== الفوتر ===== */
        footer {
            margin-top: 60px;
            opacity: 0.95;
        }

        /* ===== Responsive adjustments ===== */
        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 26px;
            }
        }
    </style>
</head>

<body>
    <!-- Spinner -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-success" role="status"></div>
    </div>

    <!-- Navbar -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <nav class="navbar navbar-expand-lg navbar-light custom-navbar sticky-top shadow-sm" dir="rtl">
    <div class="container-fluid px-lg-5">

        {{-- ✅ الشعار --}}
        <a href="{{ url('/') }}" class="navbar-brand ms-3 d-flex align-items-center">
            <img src="{{ asset('storage/logo.png') }}" 
                 class="img-fluid"
                 style="height: 65px; width: auto;">
        </a>
            <button class="navbar-toggler me-4" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="{{ url('/') }}" class="nav-item nav-link">الرئيسية</a>
                    <a href="{{ url('/#about') }}" class="nav-item nav-link">من نحن</a>
                    <a href="{{ url('/#products') }}" class="nav-item nav-link">منتجاتنا</a>
                    <a href="{{ url('/#features') }}" class="nav-item nav-link">مميزاتنا</a>
                    <a href="{{ url('/#testimonials') }}" class="nav-item nav-link">آراء العملاء</a>
                    <a href="{{ route('contact') }}" class="nav-item nav-link active">تواصل معنا</a>
                </div>
            </div>
        </nav>
    </div>


    <!-- Contact Section -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="display-6 mb-3 text-success">نحن في خدمتك</h1>
                <p class="text-muted">يسعدنا تواصلك معنا لأي استفسار أو اقتراح 🌿</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row g-5 justify-content-center">
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-primary text-white p-5 rounded shadow-sm">
                        <h5 class="text-white mb-3">📞 اتصل بنا</h5>
                        <p class="mb-4"><i class="fa fa-phone-alt me-2"></i> 240 088  932 963</p>
                        <h5 class="text-white mb-3">✉️ البريد الإلكتروني</h5>
                        <p class="mb-4"><i class="fa fa-envelope me-2"></i> Nebras.haidar@almasah-nebras.com</p>
                        <h5 class="text-white mb-3">📍 العنوان</h5>
                        <p class="mb-4"><i class="fa fa-map-marker-alt me-2"></i> سورية , بانياس , حريصون , رأس الوطى </p>

                        
                    </div>
                </div>

                <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.5s">
                    <form method="POST" action="{{ route('contact.send') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="الاسم الكامل" required>
                                    <label for="name">الاسم الكامل</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="البريد الإلكتروني" required>
                                    <label for="email">البريد الإلكتروني</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" name="subject" class="form-control" id="subject" placeholder="الموضوع" required>
                                    <label for="subject">الموضوع</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea name="message" class="form-control" id="message" placeholder="اكتب رسالتك هنا" style="height: 150px" required></textarea>
                                    <label for="message">الرسالة</label>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">إرسال الرسالة</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('partials.footer')

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top">
        <i class="bi bi-arrow-up"></i>
    </a>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <!-- Smooth Scroll -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
        window.addEventListener('load', () => {
            document.getElementById('spinner').style.display = 'none';
        });
    </script>
</body>
</html>
