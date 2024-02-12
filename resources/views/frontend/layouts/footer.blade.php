<footer>
    <div class="container">
        <div class="footer-inner">
            <div class="row">
                <div class="col-md">
                    <div class="footer-inner-content">
                        <h2>About Us</h2>
                        <ul class="footer-menu">
                            <li><a href="{{ route('companyProfile') }}">Company Profile</a></li>
                            <li><a href="javascript::">Chairman’s Message</a></li>
                            <li><a href="javascript::">CEO Message</a></li>
                            <li><a href="javascript::">Corporate Team</a></li>
                            <li><a href="{{ route('reviews') }}">Client Reviews</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="footer-inner-content">
                        <h2>Services</h2>
                        <ul class="footer-menu">
                            <li><a href="{{ route('getAsset') }}">Asset Management</a></li>
                            <li><a href="{{ route('getHolidayHomes') }}">Holiday Homes</a></li>
                            <li><a href="{{ route('getCommercial') }}">Commercial</a></li>
                            <li><a href="{{ route('investAdvisory') }}">Investments & Advisory</a></li>
                            <li><a href="{{ route('conveyance') }}">Conveyance</a></li>
                            <li><a href="{{ route('valuation') }}">Property Valuation</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="footer-inner-content">
                        <h2>Quick Links</h2>
                        <ul class="footer-menu">
                            <li><a href="{{ route('propertyList',['id'=>encrypt('1')]) }}">Buy</a></li>
                            <li><a href="{{ route('propertyList',['id'=>encrypt('2')]) }}">Rent</a></li>
                            <li><a href="{{ route('propertyList',['id'=>encrypt('3')]) }}">PG</a></li>
                            <li><a href="{{ route('propertyList',['id'=>encrypt('4')]) }}">Commercial</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="footer-inner-content">
                        <h2>Market Trends</h2>
                        <ul class="footer-menu">
                            <li><a href="{{ route('News') }}">Jameen online News</a></li>
                            <li><a href="{{ route('Insights') }}">Property Insights</a></li>
                            <li><a href="{{ route('Media') }}">Media</a></li>
                            <li><a href="{{ route('Blog') }}">Blog</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="footer-inner-content">
                        <h2>Subscribe to our Newsletter!</h2>
                        <form class="news-letter">
                            <input type="email" name="subscriberEmail" id="subscriberEmail" placeholder="Email Address" autocomplete="off" />
                            <button type="button" class="news-letter-btn" onclick="subscribe()">
                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.7071 8.70711C17.0976 8.31658 17.0976 7.68342 16.7071 7.29289L10.3431 0.928932C9.95262 0.538408 9.31946 0.538408 8.92893 0.928932C8.53841 1.31946 8.53841 1.95262 8.92893 2.34315L14.5858 8L8.92893 13.6569C8.53841 14.0474 8.53841 14.6805 8.92893 15.0711C9.31946 15.4616 9.95262 15.4616 10.3431 15.0711L16.7071 8.70711ZM0 9H16V7H0V9Z"
                                        fill="white"
                                    />
                                </svg>
                            </button>
                        </form>
                        <div class="social-icon">
                            <h2>Follow Us on</h2>
                            <ul>
                                <li>
                                    <a href="javascript::"><i class="fa-brands fa-linkedin-in"></i></a>
                                </li>
                                <li>
                                    <a href="javascript::"><i class="fa-brands fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="javascript::"><i class="fa-brands fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-inner">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="footer-bottom-inner-left">
                            <figure>
                                <img src="{{ asset('images/footer-logo.png') }}" />
                            </figure>
                            <p>© Jameen online – All rights reserved</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-bottom-inner-right">
                            <ul>
                                <li><a href="terms-conditions.html">Terms and Conditions</a></li>
                                <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                <li><a href="javascript::">Disclaimer</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function subscribe(){
        var address = $('#subscriberEmail').val();
        $.ajax({
                  url: "{{ route('subscribe') }}",
                  type: 'GET',
                  data:{
                    mail_address: address,
                  },
                  success: function(response) {
                    if(response.status == 2){
                        $('#subscriberEmail').val('');
                        location.href = "{{ route('loginpage') }}";
                    }
                    else if(response.status == 1){
                        Swal.fire({
                            title: 'Subscribe',
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $('#subscriberEmail').val('');
                                 }
                                });
                            }
                    else if(response.status == 3){
                        Swal.fire({
                            title: 'This User Already Subscriber',
                            icon: 'warning',
                            showCancelButton: true,
                            showConfirmButton: false,
                            cancelButtonColor: '#e76363',
                        }).then((result) => {
                            if (result.dismiss) {
                                $('#subscriberEmail').val('');
                                 }
                                });
                            }
                        },
                  });
}
</script>
