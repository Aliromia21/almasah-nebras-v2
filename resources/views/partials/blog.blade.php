<!-- Blog Start -->
@php
    use App\Models\Blog;
    $blogs = Blog::latest()->take(3)->get();
@endphp

<div class="container-xxl py-5">
    <div id="blog" class="container">
        <div class="section-header text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 mb-3 text-success position-relative d-inline-block pb-2" 
                style="border-bottom: 3px solid #FFA500;">آخر المقالات</h1>
            <p class="text-muted">تابع أحدث المقالات الزراعية والنصائح التي نقدمها لك من قلب الطبيعة.</p>
        </div>

        @if($blogs->count() > 0)
            <div class="row g-4">
                @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $loop->iteration }}s">
                        <div class="card border-0 shadow-sm blog-card h-100">
                            <img class="card-img-top" 
                                 src="{{ asset('storage/'.$blog->image) }}" 
                                 alt="{{ $blog->title }}" 
                                 style="height:250px; object-fit:cover; border-top-left-radius:10px; border-top-right-radius:10px;">
                            
                            <div class="card-body bg-light rounded-bottom">
                                <!-- ✅ رابط المقال لعرضه كاملاً -->
                                 <a class="d-block h5 lh-base mb-3 text-decoration-none text-dark"
                                         href="{{ route('blog.show', ['slug' => $blog->slug ?? $blog->id]) }}">
                                               {{ $blog->title }}
                                   </a>



                                <p class="text-secondary small">
                                    {{ Str::limit($blog->excerpt ?? strip_tags($blog->content), 100) }}
                                </p>

                                <div class="text-muted border-top pt-3 d-flex justify-content-between small">
                                    <span><i class="fa fa-user text-success me-2"></i>{{ $blog->author ?? 'Admin' }}</span>
                                    <span>
                                        <i class="fa fa-calendar text-success me-2"></i>
                                        {{ \Carbon\Carbon::parse($blog->published_at ?? $blog->created_at)->format('d M, Y') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <h4 class="text-muted">لا توجد مقالات حالياً 🌱</h4>
            </div>
        @endif
    </div>
</div>

<style>
    .blog-card {
        transition: all 0.3s ease-in-out;
        border-radius: 10px;
    }
    .blog-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }
</style>
<!-- Blog End -->
