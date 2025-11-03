<!-- 🌿 Navbar Start -->
<nav class="navbar navbar-expand-lg navbar-light custom-navbar sticky-top shadow-sm" dir="rtl">
    <div class="container-fluid px-lg-5">

        {{-- ✅ الشعار --}}
        <a href="{{ url('/') }}" class="navbar-brand ms-3 d-flex align-items-center">
            <img src="{{ asset('storage/logo.png') }}" 
                 class="img-fluid"
                 style="height: 65px; width: auto;">
        </a>

        {{-- ✅ زر الموبايل --}}
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <i class="fa fa-bars fs-2 text-success"></i>
        </button>

        {{-- ✅ روابط القائمة --}}
        <div class="collapse navbar-collapse justify-content-end mt-3 mt-lg-0" id="navbarCollapse">
            <ul class="navbar-nav align-items-center gap-lg-4">
                <li class="nav-item"><a class="nav-link active" href="#home">الرئيسية</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">من نحن</a></li>
                <li class="nav-item"><a class="nav-link" href="#products">المنتجات</a></li>
                <li class="nav-item"><a class="nav-link" href="#features">مميزاتنا</a></li>
                <li class="nav-item"><a class="nav-link" href="#testimonials">آراء العملاء</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">تواصل معنا</a></li>
            </ul>

            {{-- ✅ أزرار الأدمن --}}
            <div class="d-flex align-items-center mt-3 mt-lg-0 gap-2">
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-success rounded-pill px-4 py-2">
                        <i class="fa fa-tachometer-alt ms-1"></i> لوحة التحكم
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger rounded-pill px-4 py-2">
                            <i class="fa fa-sign-out-alt ms-1"></i> خروج
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-success rounded-pill px-4 py-2">
                        <i class="fa fa-user ms-1"></i> دخول الأدمن
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>
<!-- 🌿 Navbar End -->


<!-- 🌿 Styling -->
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@500;700;800&display=swap" rel="stylesheet">

<style>
/* 🟢 الخط العام */
body, .navbar, .btn, .nav-link, .navbar-brand {
    font-family: 'Tajawal', sans-serif !important;
}

/* تصميم النافبار */
.custom-navbar {
    background: #ffffff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease-in-out;
    z-index: 1030;
}

/* الروابط */
.navbar-nav .nav-link {
    color: #064420 !important;
    font-weight: 800; /* ✅ جعلها بولد */
    font-size: 1.15rem;
    transition: all 0.3s ease;
    position: relative;
}

/* خط تحت الرابط */
.navbar-nav .nav-link::after {
    content: "";
    position: absolute;
    bottom: -5px;
    right: 0;
    width: 0;
    height: 3px;
    background-color: #198754;
    transition: width 0.3s ease;
    border-radius: 2px;
}

.navbar-nav .nav-link:hover::after,
.navbar-nav .nav-link.active::after {
    width: 100%;
}

.navbar-nav .nav-link:hover {
    color: #198754 !important;
}

/* تأثير تمرير */
.custom-navbar.scrolled {
    background: #f8fdf9 !important;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
}

/* الأزرار */
.btn {
    font-weight: 700;
    transition: all 0.3s ease;
}

.btn-outline-success:hover {
    background: #198754 !important;
    color: white !important;
}

.btn-outline-danger:hover {
    background: #dc3545 !important;
    color: white !important;
}

/* الموبايل */
@media (max-width: 992px) {
    .navbar-nav {
        text-align: center;
        background: #ffffff;
        border-radius: 10px;
        padding: 15px 0;
    }

    .navbar-nav .nav-link {
        font-size: 1.05rem;
        font-weight: 700;
    }

    .custom-navbar {
        padding: 10px 20px;
    }
}
</style>

<!-- 🌿 تفاعل تمرير -->
<script>
    const navbar = document.querySelector(".custom-navbar");
    window.addEventListener("scroll", () => {
        if (window.scrollY > 10) navbar.classList.add("scrolled");
        else navbar.classList.remove("scrolled");
    });
</script>
