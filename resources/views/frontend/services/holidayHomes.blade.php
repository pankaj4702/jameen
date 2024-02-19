@extends('frontend.main.main')

@section('content_front')
        <!--Asset-Banner-section-->
        <section class="asset-banner-comman holiday-banner">
            <div class="container">
                <div class="asset-banner-innner">
                    <h3>Holiday Homes Division</h3>
                    <h2>Homes & Beyond</h2>
                </div>
            </div>
        </section>
        <!--Home-Process-section-->
        <section class="home-process">
            <div class="container">
                <div class="home-process-inner">
                    <h2>How the Holiday Home Process Works</h2>
                    <p>
                        1. Free consultation. 2. Homes & Beyond registers your property with DTCM. 3. Free interior design quotation. 4. Furnishing and photography. 5. Marketing campaign. 6. Guest books holiday home. 7. Security deposit
                        collected. 8. Concierge services provided. 9. Guest enjoys stay. 10. Maintenance and clean-up upon leave.
                    </p>
                </div>
            </div>
        </section>
        <!--Property-Management-section-->
        <section class="home-beyond">
            <!--Financial-Management-section-->
            @foreach($assets as $key => $asset)
            @if ($key % 2 == 0)
            <div class="financial-mangement beyond-bg-white">
                <div class="container">
                    <div class="financial-mangement-inner">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="financial-mangement-right">
                                    <div class="financial-mangement-right-inner">
                                        <figure class="facility-main">
                                            <img src="{{ asset('storage/' . $asset->image) }}" />
                                        </figure>
                                        <figure class="financial-dot-shape">
                                            <img src="{{ asset('images/property-shape.png') }}" />
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="financial-mangement-left">
                                    <div class="financial-mangement-left-wapper">
                                        <div class="financial-mangement-content-icon">
                                            <figure class="bound">
                                                <img src="{{ asset('images/wapper-one.png') }}" />
                                            </figure>
                                            <h5>0{{$loop->iteration}}</h5>
                                        </div>
                                    </div>

                                    <div class="financial-mangement-left-inner">
                                        <h2>{{ $asset->title }}</h2>
                                    <p>
                                        {{ $asset->description }}
                                   </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @elseif($key % 2 != 0)
            <div class="property-mangement">
                <div class="container">
                    <div class="property-mangement-inner">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="property-mangement-left">
                                    <div class="financial-mangement-content-icon">
                                        <figure class="earn">
                                            <img src="{{ asset('images/wapper-two.png') }}" />
                                        </figure>
                                        <h5>0{{$loop->iteration}}</h5>
                                    </div>
                                    <div class="property-mangement-left-inner">
                                        <h2>{{ $asset->title }}</h2>
                                        <p>
                                            {{ $asset->description }}
                                       </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="property-mangement-right">
                                    <div class="property-mangement-right-inner">
                                        <figure class="property-main">
                                            <img src="{{ asset('storage/' . $asset->image) }}" />
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
            </div>
            @endif
            @endforeach
            <!--Property-Management-section-->


        </section>
        <!--Comprehensive-Services-section-->
        <section class="comprehensive-services beyond-bg-white">
            <div class="container">
                <div class="comprehensive-services-inner">
                    <div class="comprehensive-services-head">
                        <h3>WHO ARE WE</h3>
                        <h2>Why Rent a Holiday Home?</h2>
                    </div>
                    <div class="comprehensive-services-bottom">
                        <div class="row comprehensive-services-wapper">
                            @foreach($services as $service)
                            <div class="col-md-6">
                                <div class="comprehensive-services-left">
                                    <div class="comprehensive-services-bottom-inner">
                                        <div class="comprehensive-services-icon">
                                            <figure class="increased-bg">
                                                <img src="{{ asset('storage/' . $service->image) }}" />
                                            </figure>
                                        </div>
                                        <div class="comprehensive-services-content">
                                            <h4>{{ $service->title }}</h4>
                                            <p>
                                                 {{ $service->description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Asset-Accordion-section-->
        @if($faqs->isNotEmpty())
        <section class="asset-faq beyond-bg-color">
            <div class="container">
                <div class="asset-faq-inner">
                    <div class="asset-faq-head">
                        <h3>FAQ</h3>
                        <h2>Holiday Homes in Dubai</h2>
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
        <!--Footer-section-->


    @endsection
