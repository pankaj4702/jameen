
<script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/jquery-3.2.1.slim.min.js')}}"></script>
        <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('js/myjs.js') }}"></script>

        <script>
        function getBudget(){

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
            }).get().join(',');
            var location = $('#locality input:checked').map(function() {
                return this.value;
            }).get().join(', ');
            var postedBy = $('#postedByFilter input:checked').map(function() {
                return this.value;
            }).get().join(',');
            var minBudgetValue = "";
            var maxBudgetValue = "";
            var minValue = "";
            var maxValue = "";


            // if ($('#property-area').is(':checked')) {
                var minValue = $('#slider-min-control-area').val();
                var maxValue = $('#slider-max-control-area').val();
            // }
            if ( minValue.trim() === '') {
                minValue = 0;
            }
            if ( maxValue.trim() === '') {
                maxValue = 0;
            }


            // if ($('#propertyBudget').is(':checked')) {
                minBudgetValue = $('#min-budget-price').val();
                maxBudgetValue = $('#max-budget-price').val();
            // }
            if ( minBudgetValue.trim() === '') {
                minBudgetValue = 0;
            }
            if ( maxBudgetValue.trim() === '') {
                maxBudgetValue = 0;
            }


            var propertyLocationChecked = $('#locality input:checked').length > 0;
            var propertyAreaChecked = $('#propertyArea input:checked').length > 0;
            var propertyBudgetChecked = $('#propertyBudget').is(':checked')
            var propertyPostChecked = $('#postedByFilter input:checked').length > 0;
            var propertyConstChecked = $('#constructionStatusFilter input:checked').length > 0;
            var propertyBedChecked = $('#bedroomsFilter input:checked').length > 0;
            var propertyBathChecked = $('#bathroomsFilter input:checked').length > 0;
            if (!propertyLocationChecked && !propertyAreaChecked && !propertyBudgetChecked && !
                propertyPostChecked && !propertyConstChecked && !propertyBedChecked && !propertyBathChecked) {
                // window.location.reload();
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

            // if (minBudgetValue.trim() === '' && minBudgetValue.trim() === '') {
            //     alert("plz fill the budget");
            //     // window.location.reload();
            // }
            // else{
            $.ajax({
                url: "{{ route('propertyFilter') }}",
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
                        $('#paginate').html('');
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
                                    </div></a><div class="apa-wapper-bottom"><h3>₹${data.price}</h3><h4>${data.property_name}</h4><p>${data.property_location}</p><div class="apartment-facility">
                                    ${objBed}
                                    ${objBath}`);
                        });
                    } else {
                        $('#pro_len').html(`${response.length}`);
                        $('#card-box').html(``);
                        $('#paginate').html(``);
                        $('#card-box').html(`<div>No items found.</div>`);
                    }
                },
                error: function(error) {}
            });
        // }
            }

        </script>

        <script>
            $(".banner-left-slider-inner").owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                dots: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 1,
                    },
                    1000: {
                        items: 1,
                    },
                },
            });
        </script>
        <script>
            $(".partner-logo-slider-inner").owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: false,
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 3,
                    },
                    1000: {
                        items: 7,
                    },
                },
            });
        </script>
        <script>
            $(".project-slider-content").owlCarousel({
                loop: true,
                margin: 50,
                nav: false,
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 3,
                    },
                    1000: {
                        items: 3,
                    },
                },
            });
        </script>
        <script>
            $(".testimonials-slider").owlCarousel({
                loop: true,
                margin: 37,
                nav: false,
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 3,
                    },
                    1000: {
                        items: 3,
                    },
                },
            });
        </script>
        <script>
            $("document").ready(function () {
                $(".verified-btn").click(function () {
                    $(this).toggleClass("verified-done");
                });
            });
        </script>

        <script>
        function showNews(){
            var searchValue = $('#news').val();
            $.ajax({
                url: "{{ route('NewsSearch') }}",
                type: 'GET',
                data: {
                    id : searchValue,
                },
                success: function(response) {
                    console.log(response);

                    $('#main_news_div').html('');
                    $.each(response, function(index, data) {
                    var text = data.description;
                    var result = text.substring(0, 150);
                    var dateString = data.date;
                    var dateTime = new Date(dateString);
                    var options = { year: 'numeric', month: 'long', day: 'numeric' };
                    var formattedDate = dateTime.toLocaleDateString('en-US', options);
                    var id = data.id;
                    var encryptedId = data.encrptId;

                        $('#main_news_div').append(`
                        <div class="news-main-left">
                            <a href="{{ url('jameen-news/') }}/${encryptedId}) }}">
                                <div class="row"> <div class="col-sm-6 col-md-4"><div class="news-main-imgage">
                                            <figure> <img src="{{ asset('storage') }}/${data.image}" /> </figure></div></div>
                                    <div class="col-sm-6 col-md-8"><div class="news-main-contant"><h2>${data.title}</h2><p>${result}...</p>
                                            <span class="news-main-date"> <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6.6665 1.66797V4.16797" stroke="#F26C61" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M13.3335 1.66797V4.16797" stroke="#F26C61" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M2.9165 7.57422H17.0832" stroke="#F26C61" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M17.5 7.08464V14.168C17.5 16.668 16.25 18.3346 13.3333 18.3346H6.66667C3.75 18.3346 2.5 16.668 2.5 14.168V7.08464C2.5 4.58464 3.75 2.91797 6.66667 2.91797H13.3333C16.25 2.91797 17.5 4.58464 17.5 7.08464Z"
                                                        stroke="#F26C61" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" ></path>
                                                    <path d="M13.0791 11.4167H13.0866" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M13.0791 13.9167H13.0866" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M9.99607 11.4167H10.0036" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M9.99607 13.9167H10.0036" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M6.91209 11.4167H6.91957" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M6.91209 13.9167H6.91957" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>${formattedDate}</span></div></div></div></a></div>
                        `);

                    });

                    }
                });

        }
        function showInsights(){
            var searchValue = $('#insight').val();
            $.ajax({
                url: "{{ route('InsightSearch') }}",
                type: 'GET',
                data: {
                    id : searchValue,
                },
                success: function(response) {

                    $('#main_insight_div').html('');
                    $.each(response, function(index, data) {
                    var text = data.description;
                    var result = text.substring(0, 150);
                    var dateString = data.date;
                    var dateTime = new Date(dateString);
                    var options = { year: 'numeric', month: 'long', day: 'numeric' };
                    var formattedDate = dateTime.toLocaleDateString('en-US', options);
                    var id = data.id;
                    var encryptedId = data.encrptId;
                        $('#main_insight_div').append(`
                        <div class="news-main-left">
                                <div class="row"> <div class="col-sm-6 col-md-4"><div class="news-main-imgage">
                                    <a href="{{ url('jameen-insight/') }}/${encryptedId}) }}">
                                            <figure> <img src="{{ asset('storage') }}/${data.image}" /> </figure></a></div></div>
                                    <div class="col-sm-6 col-md-8"><div class="news-main-contant"><h2>${data.title}</h2><p>${result}...</p>
                                            <span class="news-main-date"> <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6.6665 1.66797V4.16797" stroke="#F26C61" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M13.3335 1.66797V4.16797" stroke="#F26C61" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M2.9165 7.57422H17.0832" stroke="#F26C61" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M17.5 7.08464V14.168C17.5 16.668 16.25 18.3346 13.3333 18.3346H6.66667C3.75 18.3346 2.5 16.668 2.5 14.168V7.08464C2.5 4.58464 3.75 2.91797 6.66667 2.91797H13.3333C16.25 2.91797 17.5 4.58464 17.5 7.08464Z"
                                                        stroke="#F26C61" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" ></path>
                                                    <path d="M13.0791 11.4167H13.0866" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M13.0791 13.9167H13.0866" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M9.99607 11.4167H10.0036" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M9.99607 13.9167H10.0036" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M6.91209 11.4167H6.91957" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M6.91209 13.9167H6.91957" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>${formattedDate}</span></div></div></div></a></div>
                        `);

                    });

                    }
                });

        }

        function showBlogs(){
            var searchValue = $('#insight').val();
            $.ajax({
                url: "{{ route('BlogSearch') }}",
                type: 'GET',
                data: {
                    id : searchValue,
                },
                success: function(response) {
                    console.log(response);

                    $('#main_blog_div').html('');
                    $.each(response, function(index, data) {
                    var text = data.description;
                    var result = text.substring(0, 150);
                    var dateString = data.date;
                    var dateTime = new Date(dateString);
                    var options = { year: 'numeric', month: 'long', day: 'numeric' };
                    var formattedDate = dateTime.toLocaleDateString('en-US', options);
                    var id = data.id;
                    var encryptedId = data.encrptId;
                        $('#main_blog_div').append(`
                        <div class="news-main-left">
                                <div class="row"> <div class="col-sm-6 col-md-4"><div class="news-main-imgage">
                                    <a href="{{ url('jameen-blog/') }}/${encryptedId}) }}">
                                            <figure> <img src="{{ asset('storage') }}/${data.image}" /> </figure></a></div></div>
                                    <div class="col-sm-6 col-md-8"><div class="news-main-contant"><h2>${data.title}</h2><p>${result}...</p>
                                            <span class="news-main-date"> <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6.6665 1.66797V4.16797" stroke="#F26C61" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M13.3335 1.66797V4.16797" stroke="#F26C61" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M2.9165 7.57422H17.0832" stroke="#F26C61" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M17.5 7.08464V14.168C17.5 16.668 16.25 18.3346 13.3333 18.3346H6.66667C3.75 18.3346 2.5 16.668 2.5 14.168V7.08464C2.5 4.58464 3.75 2.91797 6.66667 2.91797H13.3333C16.25 2.91797 17.5 4.58464 17.5 7.08464Z"
                                                        stroke="#F26C61" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" ></path>
                                                    <path d="M13.0791 11.4167H13.0866" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M13.0791 13.9167H13.0866" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M9.99607 11.4167H10.0036" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M9.99607 13.9167H10.0036" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M6.91209 11.4167H6.91957" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M6.91209 13.9167H6.91957" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>${formattedDate}</span></div></div></div></a></div>
                        `);

                    });

                    }
                });

        }

        function showMedia(){
            var searchValue = $('#insight').val();
            $.ajax({
                url: "{{ route('MediaSearch') }}",
                type: 'GET',
                data: {
                    id : searchValue,
                },
                success: function(response) {
                    console.log(response);

                    $('#main_media_div').html('');
                    $.each(response, function(index, data) {
                    var text = data.description;
                    var result = text.substring(0, 150);
                    var dateString = data.date;
                    var dateTime = new Date(dateString);
                    var options = { year: 'numeric', month: 'long', day: 'numeric' };
                    var formattedDate = dateTime.toLocaleDateString('en-US', options);
                    var id = data.id;
                    var encryptedId = data.encrptId;
                        $('#main_media_div').append(`
                        <div class="news-main-left">


                                <div class="row"> <div class="col-sm-6 col-md-4"><div class="news-main-imgage">
                                    <a href="{{ url('jameen-media/') }}/${encryptedId}) }}">
                                            <figure> <img src="{{ asset('storage') }}/${data.image}" /> </figure></a></div></div>
                                    <div class="col-sm-6 col-md-8"><div class="news-main-contant"><h2>${data.title}</h2><p>${result}...</p>
                                            <span class="news-main-date"> <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6.6665 1.66797V4.16797" stroke="#F26C61" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M13.3335 1.66797V4.16797" stroke="#F26C61" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M2.9165 7.57422H17.0832" stroke="#F26C61" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M17.5 7.08464V14.168C17.5 16.668 16.25 18.3346 13.3333 18.3346H6.66667C3.75 18.3346 2.5 16.668 2.5 14.168V7.08464C2.5 4.58464 3.75 2.91797 6.66667 2.91797H13.3333C16.25 2.91797 17.5 4.58464 17.5 7.08464Z"
                                                        stroke="#F26C61" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" ></path>
                                                    <path d="M13.0791 11.4167H13.0866" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M13.0791 13.9167H13.0866" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M9.99607 11.4167H10.0036" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M9.99607 13.9167H10.0036" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M6.91209 11.4167H6.91957" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M6.91209 13.9167H6.91957" stroke="#F26C61" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>${formattedDate}</span></div></div></div></a></div>
                        `);

                    });

                    }
                });

        }
        </script>

