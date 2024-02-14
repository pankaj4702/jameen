
@extends('frontend.main.main')
@section('content_front')
        <!--Asset-Banner-section-->
        <section class="asset-banner-comman corporate-banner">
            <div class="container">
                <div class="asset-banner-innner">
                    <h3>About Team</h3>
                    <h2>Corporate Team</h2>
                </div>
            </div>
        </section>
        <!--Property-Management-section-->
        <section class="property-mangement">
            <div class="container">
                <div class="property-mangement-inner">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="property-mangement-left">
                                <div class="property-mangement-left-inner">
                                    <h3>Team</h3>
                                    <h2>Meet the Leaders Behind Our Success</h2>
                                    <p>
                                        As a company, we consistently strive to prosper and grow with our clients. Ensuring the utmost standard of industry service delivered during your discovery for a property you can call home, or invest
                                        in, is the reason why we continue to thrive in our business. What you see in Jameen Properties today is the result of a shared commitment toward excellence. As a leader, my vision is to create the
                                        perfect equilibrium between sharp, modern solutions, and trusted, traditional values in our business and connections with you. We have claimed our spot as a stronghold in the Jameen online market
                                        amongst both investors and tenants, backed by nearly a decade of hardworking, dedicated, and ambitious individuals. My vision is to build on that foundation and position us as the number one firm in
                                        India. What you see in Jameen Properties today is the result of a shared commitment toward excellence. As a leader, my vision is to create the perfect equilibrium between sharp, modern solutions, and
                                        trusted, traditional values in our business and connections with you.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="property-mangement-right">
                                <div class="property-mangement-right-inner">
                                    <figure class="property-main">
                                        <img src="{{ asset('images/husni.png') }}"/>
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
        <!--Corporate-Team-section-->
        @if($teams)
        <section class="corporate">
            <div class="container">
                <div class="corporate-inner">
                    <div class="row">
                        @foreach($teams as $team)
                        <div class="col-sm-6 col-md-3">
                            <div class="team-mamber">
                                <div class="team-mamber-img">
                                    <figure>
                                        <img src="{{ asset('storage/' . $team->image) }}" />
                                    </figure>
                                </div>
                                <div class="team-mamber-detail">
                                    <h2>{{ $team->name }}</h2>
                                    <p>{{ $team->role }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        @endif
        <!--Bottom-white-space-->
        <div class="bottom-white-space"></div>
@endsection

