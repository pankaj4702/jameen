<!DOCTYPE html>
<html lang="en">
   @include('frontend.layouts.head')
    <body>
        <!--Login-->
        <section class="login">
            <div class="container">
                <div class="login-inner">
                    <div class="login-top">
                        <div class="login-top-wapper">
                            <div class="login-top-content">
                                <h2>Register</h2>
                                <p>Plese Enter Your Profile Details</p>
                                <a href="{{ route('home') }}">
                                    <span class="close-btn"><i class="fa-regular fa-circle-xmark"></i></span>
                                    </a>
                            </div>

                            <form id="signupform" class="form-login" action="{{ route('register') }}" method="POST" >
                                @csrf
                                <div class="login-form-wapper">
                                    <div class="row">
                                    <div class="col-md-6">
                                    <div class="login-form-inner">
                                    <label>Name</label>
                                    <input type="text" name="user_name" id="user_name" placeholder="Name" autocomplete="off" onkeyup="errorFunction('user_name')" />
                                    <div>
                                        <span class="error-span-user_name error" style="font-size:75%; color:#F26C61"></span>
                                    </div>
                                </div> </div>
                                        <div class="col-md-6"> <div class="login-form-inner">
                                    <label>Phone Number</label>
                                    <input type="number" name="number" id="user-number" placeholder="012346789" onkeyup="errorFunction('number')" />
                                    <div>
                                        <span class="error-span-number error" style="font-size:75%; color:#F26C61"></span>
                                    </div>
                                </div></div>
                                        <div class="col-md-6"> <div class="login-form-inner">
                                    <label>Email</label>
                                    <input type="email" name="email" placeholder="Enter Your Email" autocomplete="off" onkeyup="errorFunction('email')"  />
                                    <div>
                                        <span class="error-span-email error" style="font-size:75%; color:#F26C61"></span>
                                    </div>
                                </div></div>
                                        <div class="col-md-6"> <div class="login-form-inner">
                                    <label>Password</label>
                                    <input type="Password" name="password" id="password" placeholder="*******" onkeyup="errorFunction('password')"  />
                                    <div>
                                        <span class="error-span-password error" style="font-size:75%; color:#F26C61"></span>
                                    </div>
                                </div></div>
                                        <div class="col-md-12">
                                            <div class="login-form-inner">
                                    <button class="continue-btn" type="button" onclick="submitForm()">Sign Up</button>
                                </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="divider">
                        <span class="divider-inner">or</span>
                    </div>
                    <div class="continue-google">
                        <a href="javascript::">
                            <img src="images/google-logo.png" />
                            <span>Continue with Google/Username</span>
                        </a>
                    </div>
                    <div class="rezilla-sign-in">
                        <span class="rezilla-account">By Clicking you agree to <a href="javascript::">Terms and Conditions</a></span>
                    </div>
                </div>
            </div>
        </section>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <script>
            function errorFunction(text) {
             $('.error-span-'+text).html('');
            }
            </script>

        <script>
            function submitForm(){
                var csrfToken = "{{ csrf_token() }}"; // Get CSRF token value
                var formData = $('#signupform').serializeArray();
                formData.push({ name: '_token', value: csrfToken }); // Include CSRF token
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('register') }}",
                        data: formData,
                        dataType: 'json',
                        success: function (data) {

                            var homeRoute = "{{ route('home') }}";
                            if(data.status == 1){
                             location.href = homeRoute;
                         }
                        },
                        error: function (xhr, status, error) {
                             if (xhr.responseJSON && xhr.responseJSON.errors) {
                                $.each(xhr.responseJSON.errors, function (key, value) {
                                    $('.error-span-'+key).html('');
                        $('.error-span-'+key).append(value);
                    });
                            } else {
                                console.error(error);
                              }
                         }
                    });
                }
        </script>

<script>

    document.addEventListener("DOMContentLoaded", function () {
  var phoneInput = document.getElementById("user-number");

  phoneInput.addEventListener("keypress", function (e) {
      var length = this.value.length;

      if (length > 9) {
          e.preventDefault();
      } else if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {
          e.preventDefault();
      } else if (length === 0 && e.which === 48) {
          e.preventDefault();
      }
  });
});
        </script>
    </body>
</html>
