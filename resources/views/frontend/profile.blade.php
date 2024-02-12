@extends('frontend.main.main')
@section('content_front')
        <!--Profile-Section-->
        <section class="profile">
            <div class="container">
                <div class="profile-inner">
                    <div class="profile-inner-head">
                        <h2>Profile</h2>
                        <a href="{{ route('logout') }}">
                        <button type="button" class="logout-btn">Logout</button>
                        </a>
                    </div>
                    <div class="profile-inner-bottom">
                        <h3>Edit Profile</h3>
                        <div class="profile-inner-bottom-form">
                            <form id="profile_form">
                                <div class="row">
                                <div class="col-md-4">

                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <div class="profile-inner-form-content">
                                    <label>Name</label>
                                    <input type="text" name="user_name" placeholder="Name" autocomplete="off" value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="profile-inner-form-content">
                                    <label>Phone Number</label>
                                    <input type="text" name="phone" id='phone' autocomplete="off" placeholder="1234567890" value="{{ $user->phone }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="profile-inner-form-content">
                                    <label>Date of Birth</label>
                                    <input type="date" name="dob" autocomplete="off" placeholder="00-00-0000" value="{{ $user->dob }}" @if($user->dob) readonly @endif>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="profile-inner-form-content">
                                    <label>Email Address</label>
                                    <input type="email" name="email" autocomplete="off" placeholder="test@123gmail.com"  value="{{ $user->email }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="profile-inner-form-content">
                                    <label>City</label>
                                    <div class="profile-inner-form-box">
                                        <select class="form-select" aria-label="Default select example" name="city">

                                            <option value="{{ isset($user->city) ? $user->city : '' }}" selected>{{ isset($user->city) ? $user->city_name : 'Choose an Option' }}</option>

                                        @foreach($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name}}</option>
                                        @endforeach
                                        </select>
                                        <figure class="property-arrow-down">
                                            <img src="{{ asset('images/arrow-down.png') }}">
                                        </figure>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <button type="submit" class="save-profile-btn" onclick="save_profile()">Save Profile</button>
                </div>
            </div>
        </section>
        <script>
            function save_profile(){
                var csrfToken = "{{ csrf_token() }}"; // Get CSRF token value
                var formData = $('#profile_form').serializeArray();
                formData.push({ name: '_token', value: csrfToken }); // Include CSRF token
                $.ajax({
                        type: 'POST',
                        url: "{{ route('update_profile') }}",
                        data: formData,
                        dataType: 'json',
                        success: function (data) {
                            if(data.status == 1){
                                location.reload();
                            }
                         }
                    });
            }
        </script>
        <script>

            document.addEventListener("DOMContentLoaded", function () {
          var phoneInput = document.getElementById("phone");

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
@endsection
