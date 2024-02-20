
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
        @if(isset($teamHeading))
        <section class="property-mangement">
            <div class="container">
                <div class="property-mangement-inner">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="property-mangement-left">
                                <div class="property-mangement-left-inner">
                                    <h3>Team</h3>
                                    <h2>{{ $teamHeading->title }}</h2>
                                    <p>
                                        {!! $teamHeading->description !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="property-mangement-right">
                                <div class="property-mangement-right-inner">
                                    <figure class="property-main">
                                        <img src="{{ asset('storage/' . $teamHeading->image) }}" />
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
        @endif
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

