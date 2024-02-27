@extends('frontend.main.main')

@section('content_front')
<section class="asset-banner-comman investments">
    <div class="container">
        <div class="asset-banner-innner">
            <h3>Property Valuation</h3>
            <h2>Know Your Property’s Worth</h2>
        </div>
    </div>
</section>
@foreach($services as $key => $service)
        @if ($key % 2 == 0)
        <section class="property-mangement">
            <div class="container">
                <div class="property-mangement-inner">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="property-mangement-left">
                                <div class="property-mangement-left-inner">
                                    <h2>{{ $service->title }}</h2>
                                    <p>
                                        {{ $service->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="property-mangement-right">
                                <div class="property-mangement-right-inner">
                                    <figure class="property-main">
                                        <img src="{{ asset('storage/' . $service->image) }}" />
                                    </figure>
                                    <figure class="property-dot-shape">
                                        <img src="{{ asset('images/property-shape.png') }}" />
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @elseif($key % 2 != 0)
        <section class="financial-mangement">
            <div class="container">
                <div class="financial-mangement-inner">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="financial-mangement-right">
                                <div class="financial-mangement-right-inner">
                                    <figure class="facility-main">
                                        <img src="{{ asset('storage/' . $service->image) }}" />
                                    </figure>
                                    <figure class="financial-dot-shape">
                                        <img src="{{ asset('images/property-shape.png') }}" />
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="financial-mangement-left">
                                <div class="financial-mangement-left-inner">
                                    <h2>{{ $service->title }}</h2>
                                    <p>
                                        {{ $service->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
        @endforeach

@if($faqs->isNotEmpty())
<section class="asset-faq beyond-bg-white">
    <div class="container">
        <div class="asset-faq-inner">
            <div class="asset-faq-head">
                <h3>FAQ</h3>
                <h2>Property Valuation</h2>
            </div>
            <div class="asset-faq-bottom">
                <div class="accordion" id="accordionExample">

                    @foreach($faqs as $key => $faq)
                     @if($key == 0)
                    <div class="accordion-item active">
                     @else
                     <div class="accordion-item">
                     @endif
                        <h2 class="accordion-header" id="heading{{ $key }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}" aria-expanded="false" aria-controls="collapseFour">
                              {{ $faq->title }}
                            </button>
                        </h2>
                        <div id="collapse{{ $key }}" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                               {{ $faq->description }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@endsection
