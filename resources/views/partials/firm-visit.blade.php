@php
    $farmVisit = \App\Models\FarmVisit::first();
@endphp

@if($farmVisit)
    <div class="container-fluid {{ $farmVisit->background_color }} bg-icon mt-5 py-6">
        <div id="farm-visit" class="container">
            <div class="row g-5 align-items-center">
                <div class="col-md-7 wow fadeIn" data-wow-delay="0.1s">
                    <h1 class="display-5 text-white mb-3">{{ $farmVisit->title }}</h1>
                    <p class="text-white mb-0">{{ $farmVisit->description }}</p>
                </div>
                @if($farmVisit->button_text)
                <div class="col-md-5 text-md-end wow fadeIn" data-wow-delay="0.5s">
                    <a class="btn btn-lg btn-secondary rounded-pill py-3 px-5" 
                       href="{{ $farmVisit->button_link ?? '#' }}">
                       {{ $farmVisit->button_text }}
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
@endif
