
@extends('frontend.main.main')

@section('content_front')
        <!--Asset-Banner-section-->
        <section class="asset-banner-comman policy-banner">
            <div class="container">
                <div class="asset-banner-innner">
                    <h3>Market Trends</h3>
                    <h2>Property Insights</h2>
                </div>
            </div>
        </section>
        <!--Property-Management-section-->
        <section class="news-main-inner">
            <div class="container">
                <div class="news-main-wapper">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="news-main-wapper-left"  id="main_insight_div">
                                @if($insights)
                                @foreach($insights as $key=>$insight)
                                <div class="news-main-left">
                                    <a href="{{ route('singleInsight',['id'=>encrypt($insight->id)]) }}">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-4">
                                            <div class="news-main-imgage">
                                                <figure>
                                                    <img src="{{ asset('storage/' . $insight->image) }}" />
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-8">
                                            <div class="news-main-contant">
                                                <h2>{{ $insight->title }}</h2>
                                                @php
                                                $text = $insight->description;
                                                $result = substr($text, 0, 120);
                                                $dateString = $insight->date;
                                            $dateTime = new DateTime($dateString);
                                            $formattedDate = $dateTime->format('F d, Y');
                                                @endphp
                                                  <p>{!! $result !!}...</p>
                                                <span class="news-main-date">
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6.6665 1.66797V4.16797" stroke="#F26C61" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M13.3335 1.66797V4.16797" stroke="#F26C61" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M2.9165 7.57422H17.0832" stroke="#F26C61" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path
                                                            d="M17.5 7.08464V14.168C17.5 16.668 16.25 18.3346 13.3333 18.3346H6.66667C3.75 18.3346 2.5 16.668 2.5 14.168V7.08464C2.5 4.58464 3.75 2.91797 6.66667 2.91797H13.3333C16.25 2.91797 17.5 4.58464 17.5 7.08464Z"
                                                            stroke="#F26C61"
                                                            stroke-width="1.5"
                                                            stroke-miterlimit="10"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                        ></path>
                                                        <path d="M13.0791 11.4167H13.0866" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M13.0791 13.9167H13.0866" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M9.99607 11.4167H10.0036" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M9.99607 13.9167H10.0036" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M6.91209 11.4167H6.91957" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M6.91209 13.9167H6.91957" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                    {{$formattedDate }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                                @endforeach
                                @endif

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="news-main-wapper-right">
                                <div class="main-news-search">
                                    <div class="main-news-search-inner">

                                            <label>Search</label>
                                            <div class="main-news-search-box">
                                                <input type="text" name="search" placeholder="Search by title" id="insight" oninput = "showInsights()" />
                                                <span class="news-search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                                            </div>
                                    </div>
                                </div>
                                <div class="main-news-post">
                                    <div class="main-news-post-heading">
                                        <h2>Recent Posts</h2>
                                    </div>
                                    <ul class="main-news-post-content">
                                      @if($insights)
                                      @foreach($insights as $key=>$insight)
                                        <li>
                                            <a href="{{ route('singleInsight',['id'=>encrypt($insight->id)]) }}" style="text-decoration: none;color: inherit; ">
                                                {{ $insight->title }}
                                                </a>
                                            <span class="news-post-date">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6.6665 1.66797V4.16797" stroke="#F26C61" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M13.3335 1.66797V4.16797" stroke="#F26C61" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M2.9165 7.57422H17.0832" stroke="#F26C61" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path
                                                        d="M17.5 7.08464V14.168C17.5 16.668 16.25 18.3346 13.3333 18.3346H6.66667C3.75 18.3346 2.5 16.668 2.5 14.168V7.08464C2.5 4.58464 3.75 2.91797 6.66667 2.91797H13.3333C16.25 2.91797 17.5 4.58464 17.5 7.08464Z"
                                                        stroke="#F26C61"
                                                        stroke-width="1.5"
                                                        stroke-miterlimit="10"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    ></path>
                                                    <path d="M13.0791 11.4167H13.0866" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M13.0791 13.9167H13.0866" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M9.99607 11.4167H10.0036" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M9.99607 13.9167H10.0036" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M6.91209 11.4167H6.91957" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M6.91209 13.9167H6.91957" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                                @php
                                                    $dateString = $insight->date;
                                                    $dateTime = new DateTime($dateString);
                                                    $formatDate = $dateTime->format('F d, Y');
                                                @endphp
                                            {{ $formatDate }}
                                            </span>
                                        </li>
                                        @php
                                        $key++;
                                        if ($key == 3) {
                                              break; // exit the loop after displaying 3 elements
                                          }
                                  @endphp
                                      @endforeach
                                      @endif
                                    </ul>
                                </div>
                                <div class="main-news-category">
                                    <div class="main-news-category-inner">
                                        <div class="main-news-category-head">
                                            <h3>Quick Links</h3>
                                        </div>
                                        <ul class="main-news-category-botom">
                                            <li><a href="{{ route('News') }}"> Jameen online News</a></li>
                                            <li><a href="{{ route('Insights') }}">Property Insights</a></li>
                                            <li><a href="{{ route('Media') }}">Media</a></li>
                                            <li><a href="{{ route('Blog') }}">Blog</a></li>
                                        </ul>
                                    </div>
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
