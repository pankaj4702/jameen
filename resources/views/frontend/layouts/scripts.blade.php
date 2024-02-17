
<script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/jquery-3.2.1.slim.min.js')}}"></script>
        <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('js/myjs.js') }}"></script>


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

