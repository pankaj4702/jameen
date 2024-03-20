@extends('frontend.main.main')
@section('content_front')
<section class="banner">
    <div class="container">
        <div class="banner-inner">
            <div class="row">
                <div class="col-md-6">
                    <div class="banner-left">
                        <div class="banner-left-contect">
                            {{-- @dd($mainSectionData) --}}
                            <h6>Jameen online</h6>
                            <h2>{{ $mainSectionData->main_heading }}</h2>
                            {{-- <p> --}}
                                {!! $mainSectionData->description !!}
                                {{-- Etiam eget elementum elit. Aenean dignissim dapibus vestibulum. Integer a dolor eu sapien sodales vulputate ac in purus.                            </p> --}}
                        </div>
                    </div>
                </div>
                @php
                $images = explode(',',$mainSectionData->images);
                @endphp
                <div class="col-md-6">
                    <div class="banner-right">
                        <div class="banner-left-slider">
                            <div class="owl-carousel banner-left-slider-inner owl-theme">
                                @foreach($images as $image)
                                <div class="item">
                                    <figure>
                                        <img src="{{ asset('storage/' . $image) }}" alt="Slider-image" class="slide-img-home" />
                                    </figure>
                                </div>
                                @endforeach
                            </div>
                            <figure class="slider-shape spin-sec">
                                <img src="images/slider-shape.png" />
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-shape">
        <figure>
            <img src="images/banner-shape.png" />
        </figure>
    </div>
</section>
<!--Services-section-->
<section class="rezilla-service">
    <div class="container">
        <div class="rezilla-service-inner">
        </div>
    </div>
    <div class="service-shape">
        <svg width="57" height="101" viewBox="0 0 57 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle opacity="0.5" cx="6.30127" cy="50.3013" r="50" transform="rotate(-30 6.30127 50.3013)" fill="url(#paint0_linear_39_234)" />
            <defs>
                <linearGradient id="paint0_linear_39_234" x1="6.30127" y1="0.30127" x2="6.30127" y2="100.301" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#F26C61" />
                    <stop offset="1" stop-color="#F26C61" stop-opacity="0" />
                </linearGradient>
            </defs>
        </svg>
    </div>
</section>
<!--Partner-section-->
<section class="partner-logo">
    <div class="container-fluid">
        <div class="partner-logo-inner">
            <div class="partner-logo-head">
                <h2>{{$companyLogos->title}}</h2>
            </div>
            @php
                $images = explode(',',$companyLogos->images)
            @endphp
            <div class="partner-logo-slider">
                <div class="owl-carousel partner-logo-slider-inner owl-theme">
                    @foreach($images as $logo)
                    <div class="item">
                        <figure>
                            <img src="{{ asset('storage/' . $logo) }}" />
                        </figure>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
<!--About-section-->
@php
    $image = explode(',',$aboutSectionData->images);
@endphp
<section class="about">
    <div class="container">
        <div class="about-inner">
            <div class="row">
                <div class="col-md-6">
                    <div class="about-left">
                        <div class="about-left-img">
                            <figure class="personal-loan-effect-img">
                                <img src="{{ asset('storage/' . $image[0]) }}" />
                            </figure>
                        </div>
                        <div class="about-right-img">
                            <figure class="about-effect-img">
                                <img src="{{ asset('storage/' . $image[1]) }}" />
                            </figure>
                            <figure class="about-effect-img">
                                <img src="{{ asset('storage/' . $image[2]) }}" />
                            </figure>
                        </div>
                        <figure class="about-shape spin">
                            <img src="images/real-state.png" />
                        </figure>
                        <figure class="about-cricle-shape grow">
                            <img src="images/slider-shape.png" />
                        </figure>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about-right">
                        <div class="about-right-top">
                            <h3>WHO ARE WE</h3>
                            <h2>{{ $aboutSectionData->main_heading }}</h2>
                           {!! $aboutSectionData->description !!}
                        </div>
                        <div class="about-right-bottom">
                            <ul>
                                <li>
                                    <a href="{{ route('getHolidayHomes') }}">
                                    <div class="about-right-bottom-left">
                                        <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M30.5308 39.3529H19.1275C18.3734 39.3529 17.7481 38.7275 17.7481 37.9735C17.7481 37.2194 18.3734 36.594 19.1275 36.594H30.5308C32.4988 36.594 34.43 34.9569 34.761 33.0073L37.2072 18.3672C37.4279 17.043 36.6924 15.1483 35.6624 14.3207L22.9164 4.13147C21.445 2.95436 18.9988 2.95434 17.5458 4.11305L4.79992 14.3207C3.75155 15.1667 3.03425 17.043 3.25496 18.3672L3.76995 21.4753C3.89869 22.2294 3.38373 22.9467 2.62964 23.0571C1.87555 23.2042 1.17666 22.6708 1.04792 21.9167L0.53293 18.827C0.14669 16.5464 1.25025 13.6219 3.07109 12.1689L15.817 1.96108C18.2815 -0.0252982 22.1623 -0.0068875 24.6452 1.97949L37.3911 12.1689C39.1936 13.6219 40.2971 16.5464 39.9293 18.827L37.4831 33.4671C36.9313 36.7226 33.823 39.3529 30.5308 39.3529Z"
                                                fill="#F26C61"
                                            />
                                            <path
                                                d="M7.3575 39.7023C6.60341 39.7023 5.99647 39.0954 5.97807 38.3597C5.9229 35.8767 4.286 34.2398 1.80303 34.1846C1.04894 34.1662 0.441976 33.5409 0.460368 32.7684C0.478761 32.0143 1.08571 31.4258 1.83979 31.4258H1.87656C5.83092 31.5177 8.66336 34.3318 8.73693 38.2861C8.75532 39.0402 8.14835 39.6839 7.39427 39.7023C7.37587 39.7023 7.37589 39.7023 7.3575 39.7023Z"
                                                fill="#F26C61"
                                            />
                                            <path
                                                d="M12.8752 39.7025C12.1211 39.7025 11.4958 39.0955 11.4958 38.3414C11.4774 37.1275 11.275 35.9688 10.9072 34.8837C9.96919 32.1984 7.96442 30.2118 5.27914 29.2554C4.19399 28.8692 3.03527 28.6671 1.82137 28.6671C1.06729 28.6671 0.441964 28.0417 0.460357 27.2692C0.460357 26.5152 1.0857 25.9082 1.83978 25.9082H1.85818C3.38474 25.9266 4.83772 26.1841 6.19875 26.6623C9.67491 27.8946 12.2682 30.4879 13.5005 33.9641C13.9787 35.3251 14.2362 36.7965 14.2546 38.3047C14.2546 39.0771 13.6477 39.7025 12.8752 39.7025Z"
                                                fill="#F26C61"
                                            />
                                            <path
                                                d="M1.83924 40.1624C0.809264 40.1624 0 39.3347 0 38.3231C0 37.3115 0.827656 36.4839 1.83924 36.4839C2.85082 36.4839 3.67847 37.3115 3.67847 38.3231C3.67847 39.3347 2.86921 40.1624 1.83924 40.1624Z"
                                                fill="#F26C61"
                                            />
                                        </svg>
                                    </div>
                                    <div class="about-right-bottom-right">
                                        <h3>Homes & Beyond</h3>
                                        <p>Nullam a lacinia ipsum, nec dignissim purus. Nulla</p>
                                    </div>
                                </a>
                                </li>
                                <li>
                                    <a href="{{ route('investAdvisory') }}">
                                    <div class="about-right-bottom-left">
                                        <svg width="44" height="48" viewBox="0 0 44 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M42 16.966V32.0237C42 34.4893 40.6791 36.7788 38.5437 38.0336L25.4672 45.5846C23.3318 46.8174 20.6901 46.8174 18.5327 45.5846L5.45625 38.0336C3.32086 36.8008 2 34.5113 2 32.0237V16.966C2 14.5004 3.32086 12.2108 5.45625 10.956L18.5327 3.40507C20.6681 2.17227 23.3098 2.17227 25.4672 3.40507L38.5437 10.956C40.6791 12.2108 42 14.4784 42 16.966Z"
                                                stroke="#F26C61"
                                                stroke-width="3"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                            <path
                                                d="M22.0111 22.2939C24.8441 22.2939 27.1404 19.9973 27.1404 17.1644C27.1404 14.3315 24.8441 12.0352 22.0111 12.0352C19.1783 12.0352 16.8818 14.3315 16.8818 17.1644C16.8818 19.9973 19.1783 22.2939 22.0111 22.2939Z"
                                                stroke="#F26C61"
                                                stroke-width="3"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                            <path
                                                d="M30.8166 34.7538C30.8166 30.7912 26.876 27.5771 22.0108 27.5771C17.1456 27.5771 13.2051 30.7912 13.2051 34.7538"
                                                stroke="#F26C61"
                                                stroke-width="3"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                        </svg>
                                    </div>
                                    <div class="about-right-bottom-right">
                                        <h3>Jameen Investments Advisory</h3>
                                        <p>Nullam a lacinia ipsum, nec dignissim purus. Nulla</p>
                                    </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Project-section-->
@if(isset($projects))
<section class="project">
    <div class="container">
        <div class="project-inner">
            <div class="project-inner-head">
                <div class="project-inner-head-left">
                    <h3>CHECKOUT OUR NEW</h3>
                    <h2>Letest Selling Projects in India</h2>
                    <p>Donec porttitor euismod dignissim. Nullam a lacinia ipsum, nec dignissim purus.</p>
                </div>
                {{-- <div class="project-inner-head-right">
                    <button type="button" class="project-head-btn">All</button>
                    <button type="button" class="project-head-btn active">Buy</button>
                    <button type="button" class="project-head-btn">Rent</button>
                </div> --}}
            </div>
            <div class="project-slider">
                <div class="project-slider-inner">
                    <div class="owl-carousel project-slider-content owl-theme">
                        @foreach($projects as $project)
                            <div class="item">
                                <div class="project-slider-wapper">
                                    <div class="project-slider-wapper-head">
                                        <figure>
                                            <a href="{{ route('propertyDetail',['id'=>encrypt($project->id)]) }}">
                                                <img src="{{ asset('storage/' . $project->images[0]) }}" /></a>
                                        </figure>
                                        <div class="project-slider-wapper-status new-listing">
                                            <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M19.5387 8.55713L10.6731 0.400829C10.3849 0.135674 10.0054 -0.00782393 9.61384 0.000329345C9.2223 0.00848263 8.84906 0.167656 8.57214 0.444579L0.418438 8.59833L0 9.01672V21.037H7.85714V13.537H12.1429V21.037H20V8.98159L19.5387 8.55713Z"
                                                    fill="#119BFF"
                                                />
                                            </svg>
                                            New Listing
                                        </div>
                                    </div>
                                    <div class="project-slider-wapper-bottom">
                                        <h3>₹{{ $project->price }}</h3>
                                        <h4>{{ $project->property_name }}</h4>
                                        <p>{{ $project->property_location }}</p>
                                        <div class="project-facility">
                                            @if($project->configuration != null)
                                            @if(isset($project->configuration['Bedroom']))
                                            <div class="project-beds">
                                                <svg width="30" height="22" viewBox="0 0 30 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M25 4.5H12V12.0387H10.6154V9.47619C10.6138 8.02433 10.0363 6.63239 9.00971 5.60575C7.9831 4.57912 6.59117 4.00164 5.13931 4H2V0H0V21.5H2V18.5161L28 18.7241V21.5H30V9.5C29.9985 8.17438 29.4712 6.90348 28.5339 5.96613C27.5965 5.02877 26.3256 4.5015 25 4.5ZM2 6H5.13931C6.0609 6.00104 6.94445 6.3676 7.59611 7.01927C8.24777 7.67093 8.61433 8.55447 8.61537 9.47606V12.0386H2V6ZM28 16.724L2 16.516V14.0387H28V16.724ZM28 12.0387H14V6.5H25C25.7954 6.50091 26.5579 6.81727 27.1203 7.37968C27.6827 7.9421 27.9991 8.70463 28 9.5V12.0387Z"
                                                        fill="#2B2B2B"
                                                    />
                                                </svg>
                                                {{ $project->configuration['Bedroom'] }} Beds
                                            </div>
                                            @endif
                                            @if(isset($project->configuration['Bathroom']))
                                            <div class="project-beds">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M22.4 13.2596H3.2V4.25964C3.19907 3.9207 3.26538 3.58495 3.39509 3.27182C3.5248 2.95868 3.71533 2.67439 3.95565 2.43538L3.97565 2.41539C4.35228 2.03931 4.83584 1.78868 5.36026 1.69774C5.88468 1.6068 6.42438 1.67998 6.90565 1.90728C6.45114 2.66298 6.26222 3.5489 6.36892 4.42427C6.47562 5.29965 6.87181 6.11425 7.49455 6.73864L8.0421 7.28619L7.03425 8.29409L8.16555 9.42539L9.1734 8.41754L14.7579 2.83318L15.7657 1.82533L14.6344 0.693985L13.6264 1.70184L13.0789 1.15429C12.4233 0.50055 11.5592 0.0975642 10.637 0.0155515C9.71481 -0.0664612 8.79309 0.177699 8.03245 0.705485C7.23036 0.198942 6.27983 -0.0197366 5.33702 0.0853734C4.39422 0.190483 3.51519 0.613131 2.84435 1.28389L2.82435 1.30388C2.43497 1.69113 2.12627 2.15177 1.91611 2.65912C1.70595 3.16648 1.59851 3.71048 1.6 4.25964V13.2596H0V14.8596H1.6V16.3946C1.59997 16.5236 1.62077 16.6517 1.6616 16.7741L3.15 21.2391C3.22943 21.4781 3.38216 21.6861 3.5865 21.8334C3.79084 21.9807 4.0364 22.0598 4.2883 22.0596H4.9333L4.35 24.0596H6.01665L6.6 22.0596H17.005L17.605 24.0596H19.275L18.675 22.0596H19.7115C19.9634 22.0599 20.209 21.9807 20.4134 21.8334C20.6178 21.6861 20.7706 21.4782 20.85 21.2391L22.3383 16.7741C22.3791 16.6517 22.4 16.5236 22.4 16.3946V14.8596H24V13.2596H22.4ZM8.626 2.28563C9.0668 1.8458 9.66407 1.59878 10.2868 1.59878C10.9095 1.59878 11.5068 1.8458 11.9476 2.28563L12.495 2.83318L9.17355 6.15463L8.626 5.60718C8.18619 5.16638 7.93918 4.56911 7.93918 3.94641C7.93918 3.32371 8.18619 2.72644 8.626 2.28563ZM20.8 16.3296L19.4234 20.4596H4.5766L3.2 16.3296V14.8596H20.8V16.3296Z"
                                                        fill="#2B2B2B"
                                                    />
                                                </svg>
                                                {{ $project->configuration['Bathroom']  }} Bath
                                            </div>
                                            @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!--Properties-section-->
<section class="properties">
    <div class="container">
        <div class="properties-inner">
            <div class="properties-inner-head">
                <h3>OUR SERVICES</h3>
                <h2>Jameen Properties Services</h2>
            </div>
            <div class="properties-inner-bottom">
                <div class="row">
                    <div class="col-md-4 p-0">
                        <a href="{{ route('getAsset') }}">
                        <div class="properties-bottom-content">
                            <span class="properties-icon">
                                <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M39.6332 32.9763L32.8763 26.2193L27.6789 24.072C29.4095 21.6111 30.3366 18.6751 30.3333 15.6666C30.3333 7.5794 23.7539 1 15.6666 1C7.5794 1 1 7.5794 1 15.6666C1 23.7539 7.5794 30.3333 15.6666 30.3333C18.7013 30.3367 21.6615 29.3936 24.1349 27.6352L26.2765 32.8185L33.0333 39.5758C33.4666 40.0092 33.981 40.353 34.5472 40.5875C35.1134 40.822 35.7203 40.9428 36.3331 40.9428C36.9459 40.9428 37.5528 40.8221 38.119 40.5876C38.6852 40.3531 39.1997 40.0094 39.633 39.576C40.0664 39.1427 40.4102 38.6283 40.6447 38.0621C40.8792 37.4959 41 36.889 41 36.2762C41 35.6633 40.8793 35.0565 40.6448 34.4903C40.4103 33.9241 40.0666 33.4096 39.6332 32.9763ZM3.66666 15.6666C3.66666 9.04998 9.04998 3.66666 15.6666 3.66666C22.2833 3.66666 27.6666 9.04998 27.6666 15.6666C27.6666 22.2833 22.2833 27.6666 15.6666 27.6666C9.04998 27.6666 3.66666 22.2833 3.66666 15.6666ZM37.7475 37.6902C37.3721 38.0648 36.8635 38.2751 36.3333 38.2751C35.803 38.2751 35.2944 38.0648 34.919 37.6902L28.538 31.3093L26.5469 26.4897L31.3666 28.4809L37.7477 34.8618C38.1221 35.2372 38.3324 35.7458 38.3324 36.2761C38.3324 36.8063 38.122 37.3149 37.7475 37.6902Z"
                                        fill="white"
                                        stroke="white"
                                        stroke-width="0.6"
                                    />
                                </svg>
                            </span>
                            <h4>Asset Management</h4>
                            <p>Donec porttitor euismod dignissim. Nullam a lacinia ipsum, nec dignissim purus.</p>
                        </div>
                        </a>
                    </div>

                    <div class="col-md-4 p-0">
                        <a href="{{ route('getCommercial') }}   ">
                        <div class="properties-bottom-content">
                            <span class="properties-icon">
                                <svg width="42" height="44" viewBox="0 0 42 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M40.0773 18.1142L22.3463 1.80166C21.7698 1.27135 21.0108 0.984352 20.2277 1.00066C19.4446 1.01697 18.6981 1.33531 18.1443 1.88916L1.83688 18.1967L1 19.0334V43.0741H16.7143V28.0741H25.2857V43.0741H41V18.9632L40.0773 18.1142ZM20.2891 3.85719C20.3143 3.85719 20.2987 3.86264 20.2879 3.87327C20.2768 3.86264 20.2639 3.85719 20.2891 3.85719ZM38.1429 40.2169H28.1429V28.0741C28.1429 27.3163 27.8418 26.5896 27.306 26.0538C26.7702 25.5179 26.0435 25.2169 25.2857 25.2169H16.7143C15.9565 25.2169 15.2298 25.5179 14.694 26.0538C14.1582 26.5896 13.8571 27.3163 13.8571 28.0741V40.2169H3.85714L3.85714 20.2169L20.2891 3.90943L20.2913 3.9063L38.1429 20.2169V40.2169Z"
                                        fill="white"
                                        stroke="white"
                                        stroke-width="0.6"
                                    />
                                </svg>
                            </span>
                            <h4>Commercial</h4>
                            <p>Donec porttitor euismod dignissim. Nullam a lacinia ipsum, nec dignissim purus.</p>
                        </div>
                        </a>
                    </div>

                    <div class="col-md-4 p-0">
                        <a href="{{ route('getHolidayHomes') }}">
                        <div class="properties-bottom-content">
                            <span class="properties-icon">
                                <svg width="48" height="35" viewBox="0 0 48 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M40 7.2H19.2V19.2619H16.9846V15.1619C16.982 12.8389 16.0581 10.6118 14.4155 8.96921C12.773 7.3266 10.5459 6.40262 8.2229 6.4H3.2V0H0V34.4H3.2V29.6257L44.8 29.9585V34.4H48V15.2C47.9976 13.079 47.154 11.0456 45.6542 9.54581C44.1544 8.04604 42.121 7.20241 40 7.2ZM3.2 9.6H8.2229C9.69744 9.60167 11.1111 10.1882 12.1538 11.2308C13.1964 12.2735 13.7829 13.6872 13.7846 15.1617V19.2617H3.2V9.6ZM44.8 26.7584L3.2 26.4256V22.4619H44.8V26.7584ZM44.8 19.2619H22.4V10.4H40C41.2726 10.4015 42.4926 10.9076 43.3925 11.8075C44.2924 12.7074 44.7985 13.9274 44.8 15.2V19.2619Z"
                                        fill="white"
                                    />
                                </svg>
                            </span>
                            <h4>Holiday Homes</h4>
                            <p>Donec porttitor euismod dignissim. Nullam a lacinia ipsum, nec dignissim purus.</p>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Inspiration-section-->
<section class="inspiration">
    <div class="container">
        <div class="inspiration-inner">
            <div class="inspiration-inner-head">
                <h3>CHECKOUT OUR NEW</h3>
                <h2>{{ $checkoutData->main_heading }}</h2>
                {!! $checkoutData->description  !!}
            </div>
            @php
                $checkoutImage = explode(',',$checkoutData->images);
                $checkoutCity = explode(',',$checkoutData->city_id);
                $cityData = [];

                foreach ($checkoutCity as $cityId) {
                    foreach ($cities as $city) {
                        if ($city->id == $cityId) {
                            $cityData[] = [
                                'cityid' => $city->id,
                                'cityname' => $city->name
                            ];
                            break;
                        }
                    }
                }
                // dd($cityData);
            @endphp
            <div class="inspiration-inner-bottom">
                <div class="row">
                    <ul class="inspiration-inner-bottom-content">
                        <li> <div class="inspiration-bottom-inner">
                            @php
                                $keyword = lcfirst($cityData[0]['cityname']);
                                $city = DB::table('properties')
                                    ->where('property_location', 'like', '%' . $keyword . '%')
                                    ->get();
                                $cities = count($city);
                            @endphp
                            <figure>
                                <img src="{{ asset('storage/' . $checkoutImage[0]) }}" />
                            </figure>
                            <div class="inspiration-bottom-detail">
                                <h4>{{$cities}}</h4>
                                <p>{{$cityData[0]['cityname']}}</p>
                            </div>
                        </div></li>

                    <li>
                        <div class="inspiration-bottom-inner">
                            @php
                                $keyword = lcfirst($cityData[1]['cityname']);
                                $city = DB::table('properties')
                                    ->where('property_location', 'like', '%' . $keyword . '%')
                                    ->get();
                                $cities = count($city);
                            @endphp
                            <figure>
                                <img src="{{ asset('storage/' . $checkoutImage[1]) }}" />
                            </figure>
                            <div class="inspiration-bottom-detail">
                                <h4>{{$cities}}</h4>
                                <p>{{$cityData[1]['cityname']}}</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="inspiration-bottom-inner">
                            @php
                                $keyword = lcfirst($cityData[2]['cityname']);
                                $city = DB::table('properties')
                                    ->where('property_location', 'like', '%' . $keyword . '%')
                                    ->get();
                                $cities = count($city);
                            @endphp
                            <figure>
                                <img src="{{ asset('storage/' . $checkoutImage[2]) }}" />
                            </figure>
                            <div class="inspiration-bottom-detail">
                                <h4>{{$cities}}</h4>
                                <p>{{$cityData[2]['cityname']}}</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="inspiration-bottom-inner">
                            @php
                                $keyword = lcfirst($cityData[3]['cityname']);
                                $city = DB::table('properties')
                                    ->where('property_location', 'like', '%' . $keyword . '%')
                                    ->get();
                                $cities = count($city);
                            @endphp
                            <figure>
                                <img src="{{ asset('storage/' . $checkoutImage[3]) }}" />
                            </figure>
                            <div class="inspiration-bottom-detail">
                                <h4>{{$cities}}</h4>
                                <p>{{$cityData[3]['cityname']}}</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="inspiration-bottom-inner">
                            @php
                                $keyword = lcfirst($cityData[4]['cityname']);
                                $city = DB::table('properties')
                                    ->where('property_location', 'like', '%' . $keyword . '%')
                                    ->get();
                                $cities = count($city);
                            @endphp
                            <figure>
                                <img src="{{ asset('storage/' . $checkoutImage[4]) }}" />
                            </figure>
                            <div class="inspiration-bottom-detail">
                                <h4>{{$cities}}</h4>
                                <p>{{$cityData[4]['cityname']}}</p>
                            </div>
                        </div>
                    </li>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Industry-section-->
<section class="industry">
    <div class="container">
        <div class="industry-inner">
            <div class="row">
                @php
                    $keyword = 'alwar';
                    $blog = DB::table('blogs')->orderBy('id','desc')->first();
                    $text = $blog->description;
                    $result = substr($text, 0, 720);
                @endphp
                <div class="col-md-6">
                    <div class="industry-inner-left">
                        <figure>
                            <img src="{{ asset('storage/' . $blogImage[0]) }}" />
                        </figure>
                        <figure class="industry-left-shape">
                            <img src="{{ asset('storage/' . $blogImage[1]) }}" />
                        </figure>
                         <figure class="industry-left-cricle">
                            <img src="{{ asset('images/industry-cricle.png') }}" />
                        </figure>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="industry-inner-right">
                        <h3>Industry</h3>
                        <h2>{{ $blog->title }}</h2>
                        <p>{!! $result !!}...</p>
                        <a href="{{ route('singleBlog',['id'=>encrypt($blog->id)]) }}">
                        <button type="button" class="industry-right-btn">
                            Read More
                           <i class="fa-solid fa-angles-right"></i>
                        </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Testimonials-section-->
@if(isset($testimonials))
<section class="testimonials">
    <div class="container">
        <div class="testimonials-inner">
            <div class="testimonials-inner-head">
                <h3>Our Testimonials</h3>
                <h2>What Our Customers Says</h2>
                <figure class="testimonials-shape-top">
                    <img src="{{ asset('images/quote-up.png') }}">
                </figure>
            </div>

            <div class="owl-carousel testimonials-slider owl-theme">

                @foreach($testimonials as $testimonial)
                <div class="item">
                    <div class="testimonials-slider-inner">
                        <div class="testimonials-slider-content">
                            <p>{{ $testimonial->message }}</p>
                            <div class="testimonials-content-shape">
                                <svg width="32" height="30" viewBox="0 0 32 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M32 0L15 30L0 0H32Z" fill="white" />
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
                @endforeach


            </div>
             <figure class="testimonials-shape-bottom">
                    <img src="{{ asset('images/quote-up.png') }}">
                </figure>
        </div>
    </div>
</section>
@endif

@endsection

