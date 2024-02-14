@extends('frontend.main.main')
@section('content_front')

    <!--Header-->

    <!--Apartments-Section-->
    <section class="apartment">
        <div class="container">
            <div class="apartment-inner">
                <div class="apartment-inner-head">
                    {{-- <div class="apartment-breadcumb">
                            <a href="{{ route('home') }}">Home </a> > <span>{{ $property_type->name }}</span>
                        </div> --}}
                </div>
                <div class="apartment-inner-bottom">
                    <div class="apartment-bottom-content">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="apartment-inner-left">
                                    <div class="verified-main">
                                        <div class="verified">
                                        </div>
                                        <div class="budget">
                                            <div class="budget-value">
                                                <div class="budget-head">
                                                    <h3>Budget(₹)</h3>
                                                </div>
                                                <div class="budget-inner">
                                                    <div class="slidecontainer">
                                                        <div class="l-row">
                                                            <div class="l-column">
                                                                <div id="slider" class="push-bottom">
                                                                    <div class="results push-bottom" id="propertyBudget">
                                                                        <p>
                                                                            <span class="budget-detail">Min Budget:
                                                                            </span>
                                                                            <input name="-th" type="text"
                                                                                value="" min="0" max="100"
                                                                                id="min-budget-price"
                                                                                class="slider-min-control" />
                                                                        </p>
                                                                        <p>
                                                                            <span class="budget-detail">Max
                                                                                Budget:</span>
                                                                            <input name="slider-max" type="text"
                                                                                value="" min="0" max="100"
                                                                                id="max-budget-price"
                                                                                class="slider-max-control" />
                                                                        </p>
                                                                        <input type="checkbox"
                                                                            class="property-type-checkbox d-none">
                                                                        <label for="property-type" class="areabtn">
                                                                            <span class="ar-apl-btn">apply</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="property-type" id="bedroomsFilter">
                                            <div class="property-type-heading">
                                                <h4>No. of Bedrooms</h4>
                                            </div>
                                            <div class="property-type-apartment number-bedrooms">
                                                <label><input type="checkbox" class="property-type-checkbox" value="1">
                                                    1 BHK</label>
                                                <label><input type="checkbox" class="property-type-checkbox" value="2">
                                                    2 BHK</label>
                                                <label><input type="checkbox" class="property-type-checkbox" value="3">
                                                    3 BHK</label>
                                                <label><input type="checkbox" class="property-type-checkbox" value="4">
                                                    4 BHK</label>
                                                <label><input type="checkbox" class="property-type-checkbox" value="5">
                                                    5 BHK</label>
                                                {{-- <span class="property-type-more">+ 5 more</span> --}}
                                            </div>
                                        </div>
                                        <div class="property-type" id="bathroomsFilter">
                                            <div class="property-type-heading">
                                                <h4>No. of Bathroms</h4>
                                            </div>
                                            <div class="property-type-apartment number-bedrooms">
                                                <label><input type="checkbox" class="property-type-checkbox"
                                                        value="1">One</label>
                                                <label><input type="checkbox" class="property-type-checkbox"
                                                        value="2">Two</label>
                                                <label><input type="checkbox" class="property-type-checkbox"
                                                        value="3">Three</label>
                                                <label><input type="checkbox" class="property-type-checkbox"
                                                        value="4">Four</label>
                                                <label><input type="checkbox" class="property-type-checkbox"
                                                        value="5">Five</label>
                                                <label><input type="checkbox" class="property-type-checkbox"
                                                        value="6">Six</label>
                                                {{-- <span class="property-type-more">+ 5 more</span> --}}
                                            </div>
                                        </div>

                                        <div class="property-type" id="constructionStatusFilter">
                                            <div class="property-type-heading">
                                                <h4>Construction Status</h4>
                                            </div>
                                            <div class="property-type-apartment number-bedrooms">
                                                @foreach ($property_status as $status)
                                                    <label><input type="checkbox" class="property-type-checkbox"
                                                            value="{{ $status->id }}">{{ $status->name }}</label>
                                                @endforeach
                                            </div>
                                        </div>
                                        @if (isset($post_users[0]))
                                            <div class="property-type" id="postedByFilter">
                                                <div class="property-type-heading">
                                                    <h4>Posted by</h4>
                                                </div>
                                                <div class="property-type-apartment number-bedrooms">
                                                    @foreach ($post_users as $post_user)
                                                        <label><input type="checkbox" class="property-type-checkbox"
                                                                value="{{ $post_user->id }}">{{ $post_user->name }}</label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                        <div class="budget">
                                            <div class="budget-value">
                                                <div class="budget-head">
                                                    <h3>Area</h3>
                                                    <p>sq.ft.</p>
                                                </div>
                                                <div class="budget-inner">
                                                    <div class="slidecontainer">
                                                        <div class="l-row">
                                                            <div class="l-column">
                                                                <div id="slider" class="push-bottom">
                                                                    <div class="results push-bottom" id="propertyArea">
                                                                        <p>
                                                                            <span class="budget-detail">Min Area:
                                                                            </span>
                                                                            <input name="-th" type="number"
                                                                                value="1" min="0"
                                                                                max="100" id="slider-min-control"
                                                                                class="slider-min-control" />
                                                                        </p>
                                                                        <p>
                                                                            <span class="budget-detail">Max
                                                                                Area:</span>
                                                                            <input name="slider-max" type="number"
                                                                                value="100" min="0"
                                                                                max="100" id="slider-max-control"
                                                                                class="slider-max-control" />
                                                                        </p>
                                                                        <input type="checkbox" id="property-type"
                                                                            class="property-type-checkbox d-none"
                                                                            value="1">
                                                                        <label for="property-type" class="areabtn">
                                                                            <span class="ar-apl-btn">apply</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="property-type" id="locality">
                                            <div class="property-type-heading">
                                                <h4>Localities</h4>
                                            </div>
                                            <div class="property-type-apartment number-bedrooms">
                                                <form action="/action_page.php">
                                                    @foreach ($cities as $key => $city)
                                                        <div class="location-form">
                                                            <input type="checkbox" id="location{{ $key }}"
                                                                class="property-type-checkbox" name="location1"
                                                                value="{{ $city->name }}" />
                                                            <label
                                                                for="location{{ $key }}">{{ $city->name }}</label>
                                                            <span class="location-rating">4.1</span>
                                                        </div>
                                                    @endforeach

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="apartment-inner-right">
                                    <div class="jfsio" style="display: flex;justify-content: space-between;">
                                    @if (isset($property_type))
                                        <div class="apartment-right-head" id="type-id"
                                            data-value = "{{ $property_type->id }}">
                                            <h2 id='property_count'><span id="pro_len">{{ count($properties) }} </span>
                                                results |
                                                <b>{{ $property_type->category_name }}</b>
                                            </h2>
                                        </div>
                                    @endif
                                    @if (isset($property_cat_status_id))
                                        @if ($property_cat_status_id->category_status == 1)
                                            <div class="apartment-right-head" id="catstatus-id"
                                                data-value = "{{ $property_cat_status_id->category_status }}">
                                                <h2 id='dek-dik'>{{ count($properties) }} results | Buy </h2>
                                            </div>
                                        @elseif($property_cat_status_id->category_status == 2)
                                            <div class="apartment-right-head" id="catstatus-id"
                                                data-value = "{{ $property_cat_status_id->category_status }}">
                                                <h2 id='dek-dik'>{{ count($properties) }} results | Rent </h2>
                                            </div>
                                        @elseif($property_cat_status_id->category_status == 3)
                                            <div class="apartment-right-head" id="catstatus-id"
                                                data-value = "{{ $property_cat_status_id->category_status }}">
                                                <h2 id='dek-dik'>{{ count($properties) }} results | PG </h2>
                                            </div>
                                        @elseif($property_cat_status_id->category_status == 3)
                                            <div class="apartment-right-head" id="catstatus-id"
                                                data-value = "{{ $property_cat_status_id->category_status }}">
                                                <h2 id='dek-dik'>{{ count($properties) }} results | Commercial </h2>
                                            </div>
                                        @endif
                                    @endif

                                        {{-- <div class="main-news-search-inner">
                                            <form>
                                                <div class="main-news-search-box">
                                                    <input type="text" name="search" placeholder="Search Property" id="insight" autocomplete="off" oninput = "" />
                                                    <span class="news-search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                                                </div>
                                            </form>
                                        </div> --}}
                                    </div>
                                    <div class="apartment-right-bottom">
                                        <div class="apartment-right-bottom-inner">
                                            <div class="row" id="card-box">
                                                @forelse ($properties as $property)
                                                    <div class="col-md-4">
                                                        <div class="project-slider-wapper">
                                                            <a
                                                                href="{{ route('propertyDetail', ['id' => encrypt($property->id)]) }}">
                                                                <div
                                                                    class="project-slider-wapper-head project-slider-wapper-single">
                                                                    <figure>
                                                                        <img
                                                                            src="{{ asset('storage/' . $property->images[0]) }}" />
                                                                    </figure>

                                                                </div>
                                                            </a>
                                                            <div class="apa-wapper-bottom">
                                                                <h3>₹{{ $property->price }}</h3>
                                                                <h4>{{ $property->property_name }}</h4>
                                                                <p>{{ $property->property_location }}</p>
                                                                <div class="apartment-facility">
                                                                    @if ($property->configuration != null)
                                                                        @if (isset($property->configuration['Bedroom']))
                                                                            <div class="apartment-beds">
                                                                                <svg width="30" height="22"
                                                                                    viewBox="0 0 30 22" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path
                                                                                        d="M25 4.5H12V12.0387H10.6154V9.47619C10.6138 8.02433 10.0363 6.63239 9.00971 5.60575C7.9831 4.57912 6.59117 4.00164 5.13931 4H2V0H0V21.5H2V18.5161L28 18.7241V21.5H30V9.5C29.9985 8.17438 29.4712 6.90348 28.5339 5.96613C27.5965 5.02877 26.3256 4.5015 25 4.5ZM2 6H5.13931C6.0609 6.00104 6.94445 6.3676 7.59611 7.01927C8.24777 7.67093 8.61433 8.55447 8.61537 9.47606V12.0386H2V6ZM28 16.724L2 16.516V14.0387H28V16.724ZM28 12.0387H14V6.5H25C25.7954 6.50091 26.5579 6.81727 27.1203 7.37968C27.6827 7.9421 27.9991 8.70463 28 9.5V12.0387Z"
                                                                                        fill="#2B2B2B"></path>
                                                                                </svg>
                                                                                {{ $property->configuration['Bedroom'] }}
                                                                                Beds
                                                                            </div>
                                                                        @endif
                                                                        @if (isset($property->configuration['Bathroom']))
                                                                            <div class="apartment-beds">
                                                                                <svg width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path
                                                                                        d="M22.4 13.2596H3.2V4.25964C3.19907 3.9207 3.26538 3.58495 3.39509 3.27182C3.5248 2.95868 3.71533 2.67439 3.95565 2.43538L3.97565 2.41539C4.35228 2.03931 4.83584 1.78868 5.36026 1.69774C5.88468 1.6068 6.42438 1.67998 6.90565 1.90728C6.45114 2.66298 6.26222 3.5489 6.36892 4.42427C6.47562 5.29965 6.87181 6.11425 7.49455 6.73864L8.0421 7.28619L7.03425 8.29409L8.16555 9.42539L9.1734 8.41754L14.7579 2.83318L15.7657 1.82533L14.6344 0.693985L13.6264 1.70184L13.0789 1.15429C12.4233 0.50055 11.5592 0.0975642 10.637 0.0155515C9.71481 -0.0664612 8.79309 0.177699 8.03245 0.705485C7.23036 0.198942 6.27983 -0.0197366 5.33702 0.0853734C4.39422 0.190483 3.51519 0.613131 2.84435 1.28389L2.82435 1.30388C2.43497 1.69113 2.12627 2.15177 1.91611 2.65912C1.70595 3.16648 1.59851 3.71048 1.6 4.25964V13.2596H0V14.8596H1.6V16.3946C1.59997 16.5236 1.62077 16.6517 1.6616 16.7741L3.15 21.2391C3.22943 21.4781 3.38216 21.6861 3.5865 21.8334C3.79084 21.9807 4.0364 22.0598 4.2883 22.0596H4.9333L4.35 24.0596H6.01665L6.6 22.0596H17.005L17.605 24.0596H19.275L18.675 22.0596H19.7115C19.9634 22.0599 20.209 21.9807 20.4134 21.8334C20.6178 21.6861 20.7706 21.4782 20.85 21.2391L22.3383 16.7741C22.3791 16.6517 22.4 16.5236 22.4 16.3946V14.8596H24V13.2596H22.4ZM8.626 2.28563C9.0668 1.8458 9.66407 1.59878 10.2868 1.59878C10.9095 1.59878 11.5068 1.8458 11.9476 2.28563L12.495 2.83318L9.17355 6.15463L8.626 5.60718C8.18619 5.16638 7.93918 4.56911 7.93918 3.94641C7.93918 3.32371 8.18619 2.72644 8.626 2.28563ZM20.8 16.3296L19.4234 20.4596H4.5766L3.2 16.3296V14.8596H20.8V16.3296Z"
                                                                                        fill="#2B2B2B"></path>
                                                                                </svg>
                                                                                {{ $property->configuration['Bathroom'] }}
                                                                                Bath
                                                                            </div>
                                                                        @endif
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <!-- Content to display if the loop is empty -->
                                                    No items found.
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" cls-listing-pg">
                                    <div class="paginate-nav-link">
                                        @if ($properties->onFirstPage())
                                            <span class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                                <span aria-hidden="true">
                                                    < Previous</span>
                                                </span>
                                            @else
                                                <a href="{{ $properties->previousPageUrl() }}" rel="prev"
                                                    aria-label="@lang('pagination.previous')">
                                                    < Previous</a>
                                        @endif

                                        @if ($properties->hasMorePages())
                                            <a href="{{ $properties->nextPageUrl() }}" rel="next"
                                                aria-label="@lang('pagination.next')">Next ></a>
                                        @else
                                            <span class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                                <span aria-hidden="true">Next ></span>
                                            </span>
                                        @endif
                                    </div>

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
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <script>
        $("document").ready(function() {
            $(".verified-btn").click(function() {
                $(this).toggleClass("verified-done");
            });
        });
    </script>
    <script>
        function checkInputValue() {
            try {
                // Attempt to execute your code
                alert('this');
            } catch (error) {
                // Log any errors to the console
                console.error('Error in checkInputValue:', error);
            }
        }
    </script>
    <!-- filteration -->
    <script>
        $('.property-type-checkbox').on('change', function() {
            var type = $('#type-id').data('value');
            var status_id = $('#catstatus-id').data('value');
            var configArray = [];
            var bedrooms = $('#bedroomsFilter input:checked').map(function() {
                return this.value;
            }).get().join(',');
            var bathrooms = $('#bathroomsFilter input:checked').map(function() {
                return this.value;
            }).get().join(',');
            var category = $('#categoryFilter input:checked').map(function() {
                return this.value;
            }).get().join(', ');
            var constructionStatus = $('#constructionStatusFilter input:checked').map(function() {
                return this.value;
            }).get().join(', ');
            var location = $('#locality input:checked').map(function() {
                return this.value;
            }).get().join(', ');
            postedByFilter
            var postedBy = $('#postedByFilter input:checked').map(function() {
                return this.value;
            }).get().join(', ');

            if ($('#propertyArea input:checked')) {
                var minValue = $('#slider-min-control').val();
                var maxValue = $('#slider-max-control').val();
            }
            if ($('#propertyBudget input:checked')) {
                var minBudgetValue = $('#min-budget-price').val();
                var maxBudgetValue = $('#max-budget-price').val();
            }

            configArray.push({
                key: 'bedroom',
                value: bedrooms
            });
            configArray.push({
                key: 'bathroom',
                value: bathrooms
            });
            var configuration = {};
            configArray.forEach(function(config) {
                configuration[config.key] = config.value;
            });
            $.ajax({
                url: "{{ route('getbedroom') }}",
                type: 'GET',
                data: {
                    property_type: type,
                    cat_status_id: status_id,
                    configurations: configuration,
                    min_area: minValue,
                    max_area: maxValue,
                    min_budget: minBudgetValue,
                    max_budget: maxBudgetValue,
                    category: category,
                    post_user: postedBy,
                    construction_status: constructionStatus,
                    location: location
                },
                success: function(response) {
                    console.log(response);
                    if (response != '') {
                        if (response[0].category_status == 1) {
                            $('#dek-dik').html(` ${response.length} results | Buy`);
                        }
                        if (response[0].category_status == 2) {
                            $('#dek-dik').html(` ${response.length} results | Rent`);
                        }
                        if (response[0].category_status == 3) {
                            $('#dek-dik').html(` ${response.length} results | PG`);
                        }
                        if (response[0].category_status == 4) {
                            $('#dek-dik').html(` ${response.length} results | Commercial`);
                        } else if (response[0].category_status == undefined) {
                            $('#pro_len').html(`${response.length}`);
                        }
                        $('#card-box').html('');
                        $.each(response, function(index, data) {
                            var encryptedId = data.encrptId;
                            var decodedObject = JSON.parse(data.configuration);
                            var decodedArray = Object.entries(decodedObject);
                            if (decodedObject['Bedroom'] != undefined) {
                                var objBed = `<div class="apartment-beds">
                                        <svg width="30" height="22" viewBox="0 0 30 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M25 4.5H12V12.0387H10.6154V9.47619C10.6138 8.02433 10.0363 6.63239 9.00971 5.60575C7.9831 4.57912 6.59117 4.00164 5.13931 4H2V0H0V21.5H2V18.5161L28 18.7241V21.5H30V9.5C29.9985 8.17438 29.4712 6.90348 28.5339 5.96613C27.5965 5.02877 26.3256 4.5015 25 4.5ZM2 6H5.13931C6.0609 6.00104 6.94445 6.3676 7.59611 7.01927C8.24777 7.67093 8.61433 8.55447 8.61537 9.47606V12.0386H2V6ZM28 16.724L2 16.516V14.0387H28V16.724ZM28 12.0387H14V6.5H25C25.7954 6.50091 26.5579 6.81727 27.1203 7.37968C27.6827 7.9421 27.9991 8.70463 28 9.5V12.0387Z"
                                                fill="#2B2B2B"></path></svg>${decodedObject['Bedroom']} Beds</div>`;
                            } else {
                                var objBed = ``;
                            }
                            if (decodedObject['Bathroom'] != undefined) {
                                var objBath = `<div class="apartment-beds"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M22.4 13.2596H3.2V4.25964C3.19907 3.9207 3.26538 3.58495 3.39509 3.27182C3.5248 2.95868 3.71533 2.67439 3.95565 2.43538L3.97565 2.41539C4.35228 2.03931 4.83584 1.78868 5.36026 1.69774C5.88468 1.6068 6.42438 1.67998 6.90565 1.90728C6.45114 2.66298 6.26222 3.5489 6.36892 4.42427C6.47562 5.29965 6.87181 6.11425 7.49455 6.73864L8.0421 7.28619L7.03425 8.29409L8.16555 9.42539L9.1734 8.41754L14.7579 2.83318L15.7657 1.82533L14.6344 0.693985L13.6264 1.70184L13.0789 1.15429C12.4233 0.50055 11.5592 0.0975642 10.637 0.0155515C9.71481 -0.0664612 8.79309 0.177699 8.03245 0.705485C7.23036 0.198942 6.27983 -0.0197366 5.33702 0.0853734C4.39422 0.190483 3.51519 0.613131 2.84435 1.28389L2.82435 1.30388C2.43497 1.69113 2.12627 2.15177 1.91611 2.65912C1.70595 3.16648 1.59851 3.71048 1.6 4.25964V13.2596H0V14.8596H1.6V16.3946C1.59997 16.5236 1.62077 16.6517 1.6616 16.7741L3.15 21.2391C3.22943 21.4781 3.38216 21.6861 3.5865 21.8334C3.79084 21.9807 4.0364 22.0598 4.2883 22.0596H4.9333L4.35 24.0596H6.01665L6.6 22.0596H17.005L17.605 24.0596H19.275L18.675 22.0596H19.7115C19.9634 22.0599 20.209 21.9807 20.4134 21.8334C20.6178 21.6861 20.7706 21.4782 20.85 21.2391L22.3383 16.7741C22.3791 16.6517 22.4 16.5236 22.4 16.3946V14.8596H24V13.2596H22.4ZM8.626 2.28563C9.0668 1.8458 9.66407 1.59878 10.2868 1.59878C10.9095 1.59878 11.5068 1.8458 11.9476 2.28563L12.495 2.83318L9.17355 6.15463L8.626 5.60718C8.18619 5.16638 7.93918 4.56911 7.93918 3.94641C7.93918 3.32371 8.18619 2.72644 8.626 2.28563ZM20.8 16.3296L19.4234 20.4596H4.5766L3.2 16.3296V14.8596H20.8V16.3296Z"
                                                fill="#2B2B2B" ></path></svg>
                                        ${decodedObject['Bathroom']} Bath</div></div></div></div></div>`;
                            } else {
                                var objBath = ``;
                            }

                            $('#card-box').append(`
                        <div class="col-md-4">
                            <div class="project-slider-wapper"><a href="{{ url('property-detail/') }}/${encryptedId}) }}"><div class="project-slider-wapper-head project-slider-wapper-single"><figure><img src="{{ asset('storage/') }}/${data.images[0]}" alt="myimage" /></figure>
                                    <div class="project-slider-wapper-status"><svg width="20" height="23" viewBox="0 0 20 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.4076 11.2528C12.6672 10.8265 12.9355 10.3857 13.2006 9.93118C14.0877 8.41044 14.2505 6.87814 13.6846 5.37676C12.5427 2.34747 8.72575 0.501751 7.84209 0.207261L7.22073 0L6.25093 1.93998L6.71893 2.32231C6.72417 2.32651 7.244 2.78073 7.27865 3.4693C7.30824 4.0571 6.986 4.69229 6.32112 5.35736C5.8594 5.81904 5.35264 6.26547 4.8161 6.73805C2.55865 8.72608 0 10.98 0 15.2439C0 15.3024 0.000550676 15.3607 0.00165204 15.4185C0.0180119 16.3595 0.2201 17.2879 0.596308 18.1505C0.972516 19.0131 1.51543 19.7928 2.19387 20.445C3.55621 21.7701 5.38285 22.5097 7.28332 22.5056H11.6306L11.0939 21.4166C8.91356 16.9914 10.4555 14.459 12.4076 11.2528Z"
                                                fill="#FF1111" ></path><path d="M19.8227 15.1957C19.8102 15.1458 19.797 15.0957 19.7834 15.0454C19.2384 13.0473 16.2217 10.4781 15.8795 10.1917L15.1924 9.6167L14.7418 10.3912C13.7151 12.1565 12.8339 13.7666 12.4498 15.5933C12.0118 17.6765 12.3066 19.7937 13.3513 22.0661L13.5534 22.5058H14.0669C14.9712 22.5084 15.8641 22.3034 16.6767 21.9065C17.4894 21.5096 18.2 20.9314 18.754 20.2166C19.3045 19.5173 19.6872 18.701 19.8725 17.8305C20.0578 16.96 20.0408 16.0586 19.8227 15.1957Z"
                                                fill="#FF1111"></path></svg>Popular</div></div></a><div class="apa-wapper-bottom"><h3>₹${data.price}</h3><h4>${data.property_name}</h4><p>${data.property_location}</p><div class="apartment-facility">
                                    ${objBed}
                                    ${objBath}`);
                        });
                    }
                },
                error: function(error) {
                }
            });
        });
    </script>




@endsection
