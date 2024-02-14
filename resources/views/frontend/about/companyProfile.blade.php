@extends('frontend.main.main')
@section('content_front')

        <!--Asset-Banner-section-->
        <section class="asset-banner-comman company-banner">
            <div class="container">
                <div class="asset-banner-innner">
                    <h3>About Company</h3>
                    <h2>Company Profile</h2>
                </div>
            </div>
        </section>
        <!--Property-Management-section-->
  @foreach($profiles as $key => $profile)
    @if ($key % 2 == 0)
        <section class="property-mangement">
            <div class="container">
                <div class="property-mangement-inner">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="property-mangement-left">
                                <div class="property-mangement-left-inner">
                                    <h3>Who We Are</h3>
                                    <h2>{{ $profile->title }} </h2>
                                    <p>
                                        {!! $profile->description !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="property-mangement-right">
                                <div class="property-mangement-right-inner">
                                    <figure class="property-main">
                                        <img src="{{ asset('storage/' . $profile->image) }}" />
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
                                        <img src="{{ asset('storage/' . $profile->image) }}" />
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
                                    <h2>{{ $profile->title }} </h2>
                                    <p>
                                        {!! $profile->description !!}
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

        <!--Comprehensive-Services-section-->
        @if($features)
        <section class="comprehensive-services">
            <div class="container">
                <div class="comprehensive-services-inner">
                    <div class="comprehensive-services-head">
                        <h3>Features</h3>
                        <h2>Core Values</h2>
                    </div>
                    <div class="comprehensive-services-bottom">
                        <div class="row comprehensive-services-wapper">
                            @foreach($features as $feature)
                            <div class="col-md-6">
                                <div class="comprehensive-services-left">
                                    <div class="comprehensive-services-bottom-inner">
                                        <div class="comprehensive-services-icon">
                                            <figure class="increased-bg">
                                                <img src="{{ asset('storage/' . $feature->image) }}" />
                                            </figure>
                                        </div>
                                        <div class="comprehensive-services-content">
                                            <h4>{{ $feature->title }}</h4>
                                            {!! $feature->description !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            {{-- <div class="col-md-6">
                                <div class="comprehensive-services-left">
                                    <div class="comprehensive-services-bottom-inner">
                                        <div class="comprehensive-services-icon">
                                            <figure class="regular-bg">
                                                <img src="images/core-two.png" />
                                            </figure>
                                        </div>
                                        <div class="comprehensive-services-content">
                                            <h4>Teamwork</h4>
                                            <p>Our team is strongly aligned with the company’s mission and vision in successive and exponential progress through working hand in hand</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="comprehensive-services-left">
                                    <div class="comprehensive-services-bottom-inner">
                                        <div class="comprehensive-services-icon">
                                            <figure class="advance-bg">
                                                <img src="images/core-three.png" />
                                            </figure>
                                        </div>
                                        <div class="comprehensive-services-content">
                                            <h4>Respect</h4>
                                            <p>It is important we treat our stakeholders with the utmost respect as we believe in garnering strong relationships with anyone we meet.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="comprehensive-services-left">
                                    <div class="comprehensive-services-bottom-inner">
                                        <div class="comprehensive-services-icon">
                                            <figure class="luxury-bg">
                                                <img src="images/core-four.png" />
                                            </figure>
                                        </div>
                                        <div class="comprehensive-services-content">
                                            <h4>Commitment</h4>
                                            <p>We uphold our assurances in an effort to safeguard long-lasting relationships with our clientele.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="comprehensive-services-left">
                                    <div class="comprehensive-services-bottom-inner">
                                        <div class="comprehensive-services-icon">
                                            <figure class="safety-bg">
                                                <img src="images/core-five.png" />
                                            </figure>
                                        </div>
                                        <div class="comprehensive-services-content">
                                            <h4>Fairness</h4>
                                            <p>We place great emphasis on conducting business in a fair and just manner that upholds our clients’ rights.</p>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
        <!--Bottom-white-space-->
        <div class="bottom-white-space"></div>
        <!--Footer-section-->

@endsection
