@extends('frontend.main.main')
@section('content_front')


        <!--Asset-Banner-section-->
        <section class="asset-banner-comman corporate-banner">
            <div class="container">
                <div class="asset-banner-innner">
                    <h3>Our Testimonials</h3>
                    <h2>Our Client Reviews</h2>
                </div>
            </div>
        </section>
        <!--Our-clients-section-->
        <section class="our-clients">
            <div class="container">
                <div class="our-clients-inner">
                    <h2 class="clients-heading">Our Client Reviews</h2>
                    <div class="our-clients-content">
                        <div class="row">
                            @foreach($testimonials as $testimonial)
                            <div class="col-sm-6 col-md-4">
                                <div class="our-clients-wapper">
                                    <div class="testimonials-slider-inner">
                                        <div class="testimonials-slider-content">
                                            <p>{{ $testimonial->message }}</p>
                                            <div class="testimonials-content-shape">
                                                <svg width="32" height="30" viewBox="0 0 32 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M32 0L15 30L0 0H32Z" fill="white"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="testimonials-slider-wapper">
                                            <figure class="testimonials-user">
                                                <img src="{{ asset('storage/' . $testimonial->image) }}" style="border-radius: 30px;" />
                                            </figure>
                                            <div class="testimonials-user-detail">
                                                <h5>{{ $testimonial->name }}</h5>
                                                <p>Customer</p>
                                            </div>
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
        <!--Bottom-white-space-->
        <div class="bottom-white-space"></div>
        <!--Footer-section-->



        @endsection

