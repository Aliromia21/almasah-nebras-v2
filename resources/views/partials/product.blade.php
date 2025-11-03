<!-- Product Start -->
@php
    use App\Models\Product;
    $products = Product::latest()->take(8)->get();
@endphp

<div id="products" class="container-xxl py-5" dir="rtl" style="text-align: right;">
    <div class="container text-center">
        
        {{-- 🟢 العنوان الرئيسي --}}
        <div class="wow fadeInUp mb-5" data-wow-delay="0.1s">
            <h1 class="display-5 mb-3 text-success fw-bold" style="font-size: 2.8rem;">منتجاتنا الزراعية</h1>
            <p class="mx-auto text-muted" style="max-width: 700px; font-size: 1.2rem; line-height: 1.9;">
                نقدم لك منتجات طبيعية طازجة بجودة عالية،
                نزرعها ونعتني بها لتصل إليك بأفضل شكل وصحة ممكنة 🌿
            </p>
        </div>

        {{-- ✅ عند وجود منتجات --}}
        @if($products->count() > 0)
        <div class="tab-content">
            <div id="tab-all" class="tab-pane fade show p-0 active">
                <div class="row g-4 justify-content-center">
                    @foreach($products as $product)
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $loop->iteration }}s">
                            <div class="product-item border-0 shadow-sm rounded-4 overflow-hidden h-100 bg-white product-card">
                                
                                {{-- 🖼 الصورة --}}
                                <div class="position-relative bg-light overflow-hidden rounded-top">
                                    <img class="img-fluid w-100"
                                         src="{{ asset('storage/'.$product->image) }}"
                                         alt="{{ $product->name }}"
                                         style="height:260px; object-fit:cover; transition: transform 0.4s ease;">
                                    @if($product->is_new)
                                        <div class="bg-success rounded-pill text-white position-absolute end-0 top-0 m-3 py-1 px-3 small fw-semibold">
                                            جديد 🌱
                                        </div>
                                    @endif
                                </div>

                                {{-- 🧾 التفاصيل --}}
                                <div class="text-center p-4">
                                    <h5 class="mb-2 text-dark fw-bold" style="font-size: 1.2rem;">
                                        {{ $product->name }}
                                    </h5>
                                    
                                    @if($product->category)
                                        <small class="text-muted d-block mb-2" style="font-size: 1rem;">
                                            {{ $product->category }}
                                        </small>
                                    @endif

                                    <p class="text-success mb-0 fw-bold" style="font-size: 1.1rem;">
                                        {{ number_format($product->price, 0) }} ل.س
                                        @if($product->old_price)
                                            <span class="text-muted text-decoration-line-through ms-1" style="font-size: 0.95rem;">
                                                {{ number_format($product->old_price, 0) }} ل.س
                                            </span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- 🟩 زر التصفح --}}
        <div class="col-12 text-center mt-5">
            <a class="btn btn-success rounded-pill py-3 px-5 shadow-sm fw-semibold"
               href="#"
               style="font-size: 1.1rem;">
               تصفح المزيد من المنتجات <i class="fa fa-arrow-left me-2"></i>
            </a>
        </div>

        {{-- 🚜 لا توجد منتجات --}}
        @else
        <div class="text-center py-5 my-5">
            <h3 class="mt-4 text-success">🚜 لا توجد منتجات حالياً</h3>
            <p class="text-muted" style="font-size: 1.1rem;">نحن نعمل على إضافة منتجات جديدة قريباً، تابعنا لتعرف المزيد 🌱</p>
        </div>
        @endif
    </div>
</div>
<!-- Product End -->

{{-- 🎨 تحسينات CSS --}}
<style>
    .product-card {
        transition: all 0.4s ease;
        border: 1px solid rgba(0, 128, 0, 0.05);
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .product-card img:hover {
        transform: scale(1.05);
    }

    .product-card h5, .product-card p, .product-card small {
        text-align: center;
    }

    .btn-success {
        transition: all 0.3s ease;
    }

    .btn-success:hover {
        background-color: #198754;
        color: #fff !important;
        box-shadow: 0 6px 20px rgba(25, 135, 84, 0.3);
    }

    /* ✅ تجاوب كامل */
    @media (max-width: 768px) {
        #products {
            text-align: center;
        }

        .product-card img {
            height: 220px !important;
        }

        .product-card h5 {
            font-size: 1.1rem;
        }

        .product-card p {
            font-size: 1rem;
        }

        .btn {
            font-size: 1rem;
        }
    }
</style>
