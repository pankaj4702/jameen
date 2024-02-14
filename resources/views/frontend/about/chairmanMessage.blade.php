
@extends('frontend.main.main')
@section('content_front')
        <!--Asset-Banner-section-->
        <section class="asset-banner-comman chairman-banner">
            <div class="container">
                <div class="asset-banner-innner">
                    <h3>About Chairman & Founder</h3>
                    <h2>Chairman's Message</h2>
                </div>
            </div>
        </section>
        <!--Property-Management-section-->
        <section class="property-mangement pb-0">
            <div class="container">
                <div class="property-mangement-inner">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="property-mangement-left">
                                <div class="property-mangement-left-inner">
                                    <h3>Chairman & Founder</h3>
                                    <h2>{{ $profile->name }}</h2>
                                    {!! $profile->message !!}
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
        <!--Bottom-white-space-->
        <div class="bottom-white-space"></div>
        <!--Footer-section-->
@endsection
