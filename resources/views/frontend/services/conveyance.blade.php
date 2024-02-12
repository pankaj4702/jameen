@extends('frontend.main.main')

@section('content_front')
<section class="asset-banner-comman conveyance">
    <div class="container">
        <div class="asset-banner-innner">
            <h3>Conveyance Services</h3>
            <h2>Hassle-Free Transactions</h2>
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
 <!--Bottom-white-space-->
<div class="bottom-white-space"></div>

@endsection
