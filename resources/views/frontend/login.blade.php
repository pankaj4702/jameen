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
                            <h2>Login</h2>
                            <p>Please Enter Your Details</p>
                            <span class=" error-div" style="font-size:90%; color:#F26C61"></span>

                            <a href="{{ route('home') }}">
                            <span class="close-btn"><i class="fa-regular fa-circle-xmark"></i></span>
                            </a>
                        </div>
                        <form id="loginform" class="form-login" action="{{ route('login') }}" method="POST" >
                            @csrf
                        <div class="login-form-inner">
                            <label>Email ID</label>
                            <input type="email" name="email" id="email" autocomplete="off" onkeyup="myFunction('email')"  />
                            <div>
                                <span class="error-span-email error" style="font-size:75%; color:#F26C61"></span>
                            </div>
                        </div>
                        <div class="login-form-inner">
                            <label>Password</label>
                            <input type="password" name="password" id="password" onkeyup="myFunction('password')"  />
                            <div>
                                <span class="error-span-password error" style="font-size:75%; color:#F26C61"></span>
                            </div>
                        </div>

                        <div class="login-form-inner " id="loginDiv">
                            <button class="continue-btn"  id="loginBtn" type="button" onclick="signIn()">Sign In</button>
                            <a href="{{ route('signup') }}">sign up</a>
                        </div>
                    </form>
                    </div>

                    </div>
                    <div class="divider">
                        <span class="divider-inner">or</span>
                    </div>
                   <div class="continue-google">
                            <a href="javascript::">
                                <img src="{{ asset('images/google-logo.png')}}" />
                                <span>Continue with Google/Username</span>
                            </a>
                        </div>
                    <div class="rezilla-sign-in">
                        <span class="rezilla-account">By Clicking you agree to <a href="javascript::">Terms and Conditions</a></span>
                    </div>
                </div>
             </div>
         </section>

        </footer>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-3.2.1.slim.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>

        <script>
            function myFunction(text) {
             $('.error-span-'+text).html('');
             $('.error-div').html('');
            }
            </script>
        <script>
            function signIn(){
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                var email =$('#email').val();
                var password =$('#password').val();
                $.ajax({
                    url: "{{ route('login') }}",
                    type: 'POST',
                    data:{
                        _token: csrfToken,
                        email :email,
                        password :password,
                    },
                    success: function(response) {
                        if(response.status == 1){
                            location.href =  "{{ route('home') }}";
                          }
                        else if(response.status == 2){
                            $('.error-div').html(response.error);

                        }
                        else if(response.status == 0){
                            $('.error-div').html(response.error);
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

    </body>
</html>
