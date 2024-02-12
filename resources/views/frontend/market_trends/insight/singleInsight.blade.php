
@extends('frontend.main.main')

@section('content_front')
        <!--Rele-Estate-News-->
        <section class="rele-estate-news">
            <div class="container">
                <div class="rele-news-banner pb-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="rele-news-banner-inner">
                                <div class="rele-news-banner-head">
                                    <h2>{{ $insight->title }}</h2>
                                    <span class="rele-news-date">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.6665 1.66797V4.16797" stroke="#F26C61" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M13.3335 1.66797V4.16797" stroke="#F26C61" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M2.9165 7.57422H17.0832" stroke="#F26C61" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M17.5 7.08464V14.168C17.5 16.668 16.25 18.3346 13.3333 18.3346H6.66667C3.75 18.3346 2.5 16.668 2.5 14.168V7.08464C2.5 4.58464 3.75 2.91797 6.66667 2.91797H13.3333C16.25 2.91797 17.5 4.58464 17.5 7.08464Z"
                                                stroke="#F26C61"
                                                stroke-width="1.5"
                                                stroke-miterlimit="10"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                            <path d="M13.0791 11.4167H13.0866" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M13.0791 13.9167H13.0866" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M9.99607 11.4167H10.0036" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M9.99607 13.9167H10.0036" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M6.91209 11.4167H6.91957" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M6.91209 13.9167H6.91957" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        @php
                                        $dateString = $insight->date;
                                        $dateTime = new DateTime($dateString);
                                        $formattedDate = $dateTime->format('d-M-Y');
                                            @endphp
                                          {{ $formattedDate }}
                                    </span>
                                </div>
                                <div class="rele-news-banner-middle">
                                    <figure>
                                        <img src="{{ asset('storage/' . $insight->image) }}" />
                                    </figure>
                                </div>
                                <div class="rele-news-banner-content">
                                    {!! $insight->description !!}
                                </div>
                                <div class="rele-news-social-icon">
                                    <ul>
                                        <li>
                                            <a href="javascript::"><img src="{{ asset('images/news-fb.png') }}" /></a>
                                        </li>
                                        <li>
                                            <a href="javascript::"><img src="{{ asset('images/news-insta.png') }}" /></a>
                                        </li>
                                        <li>
                                            <a href="javascript::"><img src="{{ asset('images/news-linkdin.png') }}" /></a>
                                        </li>
                                        <li>
                                            <a href="javascript::"><img src="{{ asset('images/news-twitter.png') }}" /></a>
                                        </li>
                                        <li>
                                            <a href="javascript::"><img src="{{ asset('images/news-picart.png') }}" /></a>
                                        </li>
                                        <li>
                                            <a href="javascript::"><img src="{{ asset('images/news-tetegram.png') }}" /></a>
                                        </li>
                                        <li>
                                            <a href="javascript::"><img src="{{ asset('images/news-link.png') }}" /></a>
                                        </li>
                                    </ul>
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
