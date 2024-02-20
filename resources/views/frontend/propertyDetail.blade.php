@extends('frontend.main.main')
@section('content_front')
    <!--Apartments-Section-->
    <section class="apartment">
        <div class="container">
            <div class="apartment-inner">
                <div class="apartment-inner-head">
                    {{-- <div class="apartment-breadcumb">
                            <a href="{{ route('home') }}">Home ›</a> <a href="{{ route('BuyPropertyList',['id'=>encrypt($property->type_id)]) }}">{{ $property->type }}</a></span> › {{ $property->porperty_name }}
                        </div> --}}
                </div>
                <div class="apartment-single-bottom">
                    <div class="apartment-bottom-content">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="apartment-single-left">
                                    <div class="apartment-single-left-inner">
                                        <div class="apartment-single-slider-main">
                                            <div class="apart-meni-slider-thumbnil">
                                                <div class="prevContainer">
                                                    <a class="prev" onclick="plusSlides(-1)">
                                                        <i class="fa-solid fa-angle-up"></i>
                                                    </a>
                                                </div>
                                                <div class="apartment-slider-column">
                                                    @php $i = 1; @endphp
                                                    @foreach ($property->images as $key => $image)
                                                        <div class="column">
                                                            <img class="slide-thumbnail"
                                                                src="{{ asset('storage/' . $image) }}"
                                                                onclick="currentSlide({{ $i }})"
                                                                alt="Caption One" />
                                                        </div>
                                                        @php $i++; @endphp
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="holder">
                                                @foreach ($property->images as $image)
                                                    <div class="slides">
                                                        <img src="{{ asset('storage/' . $image) }}" alt="" />
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="apartment-single-right">
                                    <div class="apartment-single-right-head">
                                        <div class="apart-emi">
                                            <button type="button" class="emi-btn">
                                                Popular
                                            </button>
                                            <h2>₹{{ $property->price }}</h2>
                                        </div>
                                        <div class="emi-dashline"></div>
                                        <div class="apart-haven">
                                            {{-- @dd($property) --}}
                                            <h3>{{ $property->property_name }}</h3>
                                            <p>{{ $property->property_location }}</p>
                                        </div>
                                    </div>
                                    <div class="apartment-single-facility">
                                        <ul class="apartment-single-facility-inner">
                                            <li>
                                                <div class="apartment-single-facility-content">
                                                    <span class="apartment-area">
                                                        <img src="{{ asset('images/data-one.png') }}" />
                                                        Area
                                                    </span>
                                                    <div class="super-built">
                                                        <h3>{{ $property->area }}sq/ft.</h3>

                                                    </div>

                                                </div>
                                                <div class="apartment-single-facility-content">
                                                    <span class="apartment-area">
                                                        <img src="{{ asset('images/data-two.png') }}" />
                                                        Configuration
                                                    </span>
                                                    <div class="super-built">
                                                        <h3>{{ $configString }}</h3>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="about-property">
                                        <div class="about-property-inner">
                                            <h4>About Property</h4>
                                            <div class="about-property-content">
                                                <address><b>Address:</b>{{ $property->property_location }}</address>
                                                <p>{{ $property->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Consider-Section-->
    <section class="consider">
        <div class="container">
            <div class="consider-inner">
                <div class="row">
                    <div class="col-md-9">
                        <div class="consider-left">

                            <div class="facts">
                                <div class="facts-inner">
                                    <div class="facts-head">
                                        <h4>Features and Amenities</h4>
                                        <p>Furnishing Details</p>
                                    </div>
                                    <div class="facts-bottom">
                                        <ul class="facts-bottom-inner">
                                            @foreach ($features as $value)
                                                <li>
                                                    <img src="{{ asset('storage/' . $value[1]) }}" class="feature-image" alt="" />
                                                    <span class="facts-bottom-content">{{ $value[0] }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="consider-right">
                            <div class="consider-right-content">
                                <figure>
                                    <img src="{{ asset('images/call.png') }}">
                                </figure>
                                <h2>Contact our Real Estate Experts</h2>
                            </div>
                            <form class="consider-form" id="inquiryForm">
                                <div class="consider-form-inner">
                                    <input type="hidden" name="property_id" value={{ $property->id }}>
                                    <input type="text" name="Name" id="name" placeholder="Full Name"
                                        onkeypress="checkSelectionSell('Name')" autocomplete="off">
                                    <span style="font-size: 11px;color: #f57272;" class="error-Name"></span>
                                </div>
                                <div class="consider-form-inner">
                                    <input type="email" name="email" id="email" placeholder="Email ID"
                                        onkeypress="checkSelectionSell('email')" autocomplete="off">
                                    <span style="font-size: 11px;color: #f57272;" class="error-email"></span>
                                </div>

                                <div class="input-group mb-3 consider-form-inner cls-num-cus-des">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text num-cus-ds" id="basic-addon1">+91</span>
                                    </div>
                                    <input type="number" class="form-control" name="Number" id="number"
                                        placeholder="Phone Number" onkeypress="checkSelectionSell('Number')">
                                    <span style="font-size: 11px;color: #f57272;" class="error-Number"></span>
                                </div>
                                <div class="consider-form-inner">
                                    <textarea class="form-control" id="massage" name="message" id="exampleFormControlTextarea1" placeholder="Message"
                                        rows="3" onkeypress="checkSelectionSell('message')"></textarea>
                                    <span style="font-size: 11px;color: #f57272;" class="error-message"></span>
                                </div>
                                <div class="consider-form-wepper">

                                    <a href="https://wa.me/917878589578" class="consider-whatsApp">
                                        <img src="{{ asset('images/whatsapp.png') }}"> WhatsApp
                                    </a href="javascript::">
                                </div>
                                <div class="consider-form-inner">
                                    <button type="button" class="consider-btn" onclick="submitForm()">Contact
                                        Now</button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Dubai-mania-Section-->
    @if($similar_properties->isNotEmpty())
    <section class="dubai-mania p-0">
        <div class="container">
            <div class="dubai-mania-inner">
                <div class="dubai-mania-head">
                    <h2>Similar Properties You May Like</h2>
                </div>
                <div class="dubai-mania-bottom">
                    <div class="row">
                        @foreach($similar_properties as $similar_property)
                        <div class="col-md-3">
                            <div class="project-slider-wapper">
                                <a href="{{ route('propertyDetail',['id'=>encrypt($similar_property->id)]) }}">
                                <div class="project-slider-wapper-head project-slider-wapper-single">
                                    <figure>
                                        <img src="{{ asset('storage/' . $similar_property->images[0]) }}" />
                                    </figure>
                                    <div class="project-slider-wapper-status discounted-price">
                                        <svg width="14" height="23" viewBox="0 0 14 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.03064 9.83836H9.03008H4.96992C4.48037 9.83836 4.01087 9.64389 3.6647 9.29772C3.31854 8.95156 3.12406 8.48206 3.12406 7.99251C3.12406 7.50295 3.31854 7.03345 3.6647 6.68729C4.01087 6.34112 4.48037 6.14665 4.96992 6.14665H11.4662H11.9662V5.64665V4.02258V3.52258H11.4662H8.51504V1V0.5H8.01504H6.39098H5.89098V1V3.52258H4.96992C3.78442 3.52258 2.64748 3.99352 1.80921 4.83179C0.970936 5.67007 0.5 6.80701 0.5 7.99251C0.5 9.178 0.970937 10.3149 1.80921 11.1532C2.64748 11.9915 3.78442 12.4624 4.96992 12.4624H9.02952C9.51905 12.463 9.98838 12.6577 10.3345 13.0038C10.6807 13.35 10.8754 13.8193 10.8759 14.3088V14.4882C10.8754 14.9777 10.6807 15.4471 10.3345 15.7932C9.98838 16.1394 9.51905 16.3341 9.02952 16.3346H2.15791H1.65791V16.8346V18.4587V18.9587H2.15791H5.89098V21.3008V21.8008H6.39098H8.01504H8.51504V21.3008V18.9587H9.03008H9.03064C10.2156 18.9573 11.3516 18.486 12.1895 17.6482C13.0274 16.8103 13.4987 15.6743 13.5 14.4893V14.4888V14.3083V14.3077C13.4987 13.1228 13.0274 11.9868 12.1895 11.1489C11.3516 10.311 10.2156 9.8397 9.03064 9.83836Z"
                                                fill="#00CE3A" stroke="#00CE3A"></path>
                                        </svg>
                                        Discounted Price
                                    </div>
                                </div>
                            </a>
                                <div class="project-slider-wapper-bottom">
                                    <h3>₹{{ $similar_property->price }}</h3>
                                    <h4>{{ $similar_property->property_name }}</h4>
                                    <p>{{ $similar_property->property_location }}</p>
                                    <div class="project-facility">
                                        @if($similar_property->configuration != null)
                                        @if(isset($similar_property->configuration['Bedroom']))
                                    <div class="project-beds">
                                        <svg width="30" height="22" viewBox="0 0 30 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25 4.5H12V12.0387H10.6154V9.47619C10.6138 8.02433 10.0363 6.63239 9.00971 5.60575C7.9831 4.57912 6.59117 4.00164 5.13931 4H2V0H0V21.5H2V18.5161L28 18.7241V21.5H30V9.5C29.9985 8.17438 29.4712 6.90348 28.5339 5.96613C27.5965 5.02877 26.3256 4.5015 25 4.5ZM2 6H5.13931C6.0609 6.00104 6.94445 6.3676 7.59611 7.01927C8.24777 7.67093 8.61433 8.55447 8.61537 9.47606V12.0386H2V6ZM28 16.724L2 16.516V14.0387H28V16.724ZM28 12.0387H14V6.5H25C25.7954 6.50091 26.5579 6.81727 27.1203 7.37968C27.6827 7.9421 27.9991 8.70463 28 9.5V12.0387Z"
                                                fill="#2B2B2B"
                                            ></path>
                                        </svg>
                                        {{ $similar_property->configuration['Bedroom'] }} Beds
                                    </div>
                                    @endif
                                    @if(isset($similar_property->configuration['Bathroom']))
                                    <div class="project-beds">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M22.4 13.2596H3.2V4.25964C3.19907 3.9207 3.26538 3.58495 3.39509 3.27182C3.5248 2.95868 3.71533 2.67439 3.95565 2.43538L3.97565 2.41539C4.35228 2.03931 4.83584 1.78868 5.36026 1.69774C5.88468 1.6068 6.42438 1.67998 6.90565 1.90728C6.45114 2.66298 6.26222 3.5489 6.36892 4.42427C6.47562 5.29965 6.87181 6.11425 7.49455 6.73864L8.0421 7.28619L7.03425 8.29409L8.16555 9.42539L9.1734 8.41754L14.7579 2.83318L15.7657 1.82533L14.6344 0.693985L13.6264 1.70184L13.0789 1.15429C12.4233 0.50055 11.5592 0.0975642 10.637 0.0155515C9.71481 -0.0664612 8.79309 0.177699 8.03245 0.705485C7.23036 0.198942 6.27983 -0.0197366 5.33702 0.0853734C4.39422 0.190483 3.51519 0.613131 2.84435 1.28389L2.82435 1.30388C2.43497 1.69113 2.12627 2.15177 1.91611 2.65912C1.70595 3.16648 1.59851 3.71048 1.6 4.25964V13.2596H0V14.8596H1.6V16.3946C1.59997 16.5236 1.62077 16.6517 1.6616 16.7741L3.15 21.2391C3.22943 21.4781 3.38216 21.6861 3.5865 21.8334C3.79084 21.9807 4.0364 22.0598 4.2883 22.0596H4.9333L4.35 24.0596H6.01665L6.6 22.0596H17.005L17.605 24.0596H19.275L18.675 22.0596H19.7115C19.9634 22.0599 20.209 21.9807 20.4134 21.8334C20.6178 21.6861 20.7706 21.4782 20.85 21.2391L22.3383 16.7741C22.3791 16.6517 22.4 16.5236 22.4 16.3946V14.8596H24V13.2596H22.4ZM8.626 2.28563C9.0668 1.8458 9.66407 1.59878 10.2868 1.59878C10.9095 1.59878 11.5068 1.8458 11.9476 2.28563L12.495 2.83318L9.17355 6.15463L8.626 5.60718C8.18619 5.16638 7.93918 4.56911 7.93918 3.94641C7.93918 3.32371 8.18619 2.72644 8.626 2.28563ZM20.8 16.3296L19.4234 20.4596H4.5766L3.2 16.3296V14.8596H20.8V16.3296Z"
                                                fill="#2B2B2B"
                                            ></path>
                                        </svg>
                                        {{ $similar_property->configuration['Bathroom']  }} Bath
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
    </section>
    @endif
    <!--Bottom-white-space-->
    <div class="bottom-white-space"></div>



    <script>
        $("document").ready(function() {
            $(".verified-btn").click(function() {
                $(this).toggleClass("verified-done");
            });
        });
    </script>
    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides((slideIndex += n));
        }

        function currentSlide(n) {
            showSlides((slideIndex = n));
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("slides");
            var dots = document.getElementsByClassName("slide-thumbnail");
            var captionText = document.getElementById("caption");
            if (n > slides.length) {
                slideIndex = 1;
            }
            if (n < 1) {
                slideIndex = slides.length;
            }
            console.log(slideIndex);

            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
                // slides[i].style.display = "inline";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            // slides[slideIndex-1].style.display = "inline";
            dots[slideIndex - 1].className += " active";
            captionText.innerHTML = dots[slideIndex - 1].alt;
        }
    </script>
    <script>
        function submitForm() {
            var form = document.getElementById('inquiryForm');
            var formData = new FormData(form);
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            formData.append('_token', csrfToken);

            $.ajax({
                type: 'POST',
                url: "{{ route('storeInquiryData') }}",
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status == 1) {
                        $('#name').val('');
                        $('#email').val('');
                        $('#number').val('');
                        $('#massage').val('');
                    }
                },
                error: function(xhr, status, error) {
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        $.each(xhr.responseJSON.errors, function(key, value) {
                            $('.error-' + key).html('');
                            $('.error-' + key).append(value);
                        });
                    } else {
                        console.error(error);
                    }
                }

            });

        }
    </script>
    <script>
        function checkSelectionSell(element) {
            $('.error-' + element).html('');
        }
    </script>
@endsection
