@extends('frontend.main.main')
@section('content_front')
        <!--Asset-Banner-section-->
        <section class="asset-banner-comman view-all-banner">
            <div class="container">
                <div class="asset-banner-innner">
                    <h3>Communities</h3>
                    <h2>Real Estate Community</h2>
                </div>
            </div>
        </section>
        <!--Comprehensive-Services-section-->
        @if(isset($communities))
        <section class="comprehensive-services">
            <div class="container">
                <div class="comprehensive-services-inner">
                    <div class="comprehensive-services-bottom">
                        <div class="row comprehensive-services-wapper">
                            @foreach($communities as $community)
                            <div class="col-sm-6 col-lg-4">
                                <a href="{{ route('commProperty',['id' => encrypt($community->id)]) }}">
                                <div class="comprehensive-services-left">
                                    <div class="comprehensive-services-bottom-inner">
                                        <div class="comprehensive-services-icon view-all-img">
                                            <figure class="">
                                                <img src="{{ asset('storage/' . $community->image) }}" class="community-img" />
                                            </figure>
                                        </div>
                                        <div class="comprehensive-services-content">
                                            <h4>{{$community->title }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            @endforeach
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

