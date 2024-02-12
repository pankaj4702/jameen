@extends('frontend.main.main')
@section('content_front')
<style>
    /* Custom styles for pink buttons */
     #subs-pills{
        font-family: Bell MT;
    }
    .nav-pills .nav-link.active, .nav-pills .nav-link:focus, .nav-pills .nav-link:active {
        background-color: black;
        color: white;
    }
    .nav-pills .nav-link {
        color: black;
        }
    .continue{
        background-color: black;
        color: white;
        border:none;
        width:100%;
        padding: 7px 0px;
        border-radius: 5px;
    }
    .price-contain{
        display: flex;
        gap: 170px;
    }
</style>

<!-- Button trigger modal -->
@if($property_count > 0 && $subscriber == null)
<button type="button" class="btn btn-primary d-none" id="modalBtn" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Subscription
  </button>
@endif

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <div>
          <h1 class="modal-title fs-5" id="exampleModalLabel">Subscription</h1>
          <P style="font-size: 12px;">Add the first property for <b>Free</b> and then choose a <b>plan</b> !</P>
            </div>
           <button type="button" id="clsbtn" class="btn btn-secondary" data-bs-dismiss="modal"> <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active"  id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Basic</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link"  id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Standerd</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Premium</button>
                </li>
              </ul><hr>
              <div class="tab-content" id="subs-pills">

                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0"><div class="price-contain">
                   <div class="package-div" ><h5><b>BASIC PACKAGE </b></h5></div>
                    <div><h5>500/mo.</h5></div>
                </div><br>
                    <div><p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. A vel accusamus laudantium? Voluptate, amet quibusdam. Ad molestiae magni.</p></div>
                    <div id="paypal-button-container-P-8G715519VC094944SMWYLC5Q"></div>
                    </div>

                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                    <div class="price-contain">
                        <div class="package-div"><h5><b>STANDARD PACKAGE </b></h5></div>
                        <div><h5>1000/mo.</h5></div>
                    </div><br>
                    <div><p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. A vel accusamus laudantium? Voluptate, amet quibusdam. Ad molestiae magni.</p></div>
                    <div id="paypal-button-container-s-P-3RK77677LG1149824MWYLC5Y"></div>
                </div>

                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0"><div class="price-contain">
                    <div class="package-div"><h5><b>PREMIUM PACKAGE </b></h5></div>
                    <div><h5>1500/mo.</h5></div>
                </div><br>
                    <div><p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. A vel accusamus laudantium? Voluptate, amet quibusdam. Ad molestiae magni.</p></div>
                    <div id="paypal-button-container-t-P-1A979851D0322544MMWYLC6A"></div>
                </div>
              </div>
        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
          {{-- <div></div> --}}


        </div>
      </div>
    </div>
  </div>
    <!--Asset-Banner-section-->
    <section class="asset-banner-comman sell-property-banner">
        <div class="container">
            <div class="asset-banner-innner">
                <h3>Sell Property</h3>
                <h2>List Your Property</h2>
            </div>
        </div>
    </section>

    <!--Property-Listing-section-->
    <section class="property-listing pb-0">
        <div class="container">
            <div class="property-listing-inner">
                <div class="property-listing-head">
                    <h2>Listing Detail</h2>
                    <p>
                        If you're looking to list a property in Dubai either for sale or for rent, trust the experts. With
                        our experience in the Dubai market, we'll get you the best price for your property.
                    </p>
                </div>
                <div class="property-listing-bottom">
                    <h3>
                        Property Details
                    </h3>
                    <div class="property-listing-tab">
                        <ul class="nav nav-pills mb-3 property-listing-tab-main" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link property-listing-sell-btn active" id="pills-sell-tab" data-value="1"
                                    data-bs-toggle="pill" data-bs-target="#pills-sell" type="button" role="tab"
                                    aria-controls="pills-sell" aria-selected="true">
                                    sell
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link property-listing-sell-btn" id="pills-rent-tab" data-value="2"
                                    data-bs-toggle="pill" data-bs-target="#pills-rent" type="button" role="tab"
                                    aria-controls="pills-rent" aria-selected="false">
                                    rent
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-sell" role="tabpanel"
                                aria-labelledby="pills-sell-tab" tabindex="0">
                                <div class="property-listing-tab-inner">
                                    <div class="property-listing-tab-wapper">
                                        <form id="sell-form" enctype="multipart/form-data">
                                            @php
                                                $userId = session('user_id');
                                                $user = App\Models\User::find($userId);
                                            @endphp
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="property-listing-tab-content">
                                                        <label>Property Type</label>
                                                        <div class="property-type-content">
                                                            <select class="form-select" aria-label="Default select example"
                                                                name="property_type" id="property_type"
                                                                onchange="checkPropertyTypeForSell(this)">
                                                                <option value="" selected>Please Select</option>
                                                                @foreach ($configurations as $configuration)
                                                                    <option value="{{ $configuration->typeId }}">
                                                                        {{ $configuration->type_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div>
                                                                <span class="error-span-property_type error"
                                                                    style="font-size:75%; color:#F26C61"></span>
                                                            </div>
                                                            <figure class="property-arrow-down">
                                                                <img src="{{ asset('images/arrow-down.png') }}" />
                                                            </figure>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4" id="area-div">
                                                    <div class="property-listing-tab-content">
                                                        <label>Area(sq.ft)</label>
                                                        <div class="property-type-content">
                                                            <input type="text" class="area" name="property_area"
                                                                placeholder="Enter your Property Area" autocomplete="off"
                                                                onkeyup="checkSelectionSell('property_area')">
                                                            <div>
                                                                <span class="error-span-property_area error"
                                                                    style="font-size:75%; color:#F26C61"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" id="area-div">
                                                    <div class="property-listing-tab-content">
                                                        <label>Property Name</label>
                                                        <div class="property-type-content">
                                                            <input type="text" name="property_name"
                                                                placeholder="Enter your Property Name" autocomplete="off"
                                                                onkeyup="checkSelectionSell('property_name')">
                                                            <div>
                                                                <span class="error-span-property_name error"
                                                                    style="font-size:75%; color:#F26C61"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="property-listing-tab-content">
                                                        <label>Property Status</label>
                                                        <div class="property-type-content">
                                                            <select class="form-select"
                                                                aria-label="Default select example" name="property_status"
                                                                onchange="checkSelectionSell('property_status')">
                                                                <option value="" selected>Please Select</option>
                                                                @foreach ($property_status as $property_statu)
                                                                    <option value="{{ $property_statu->id }}">
                                                                        {{ $property_statu->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div>
                                                                <span class="error-span-property_status error"
                                                                    style="font-size:75%; color:#F26C61"></span>
                                                            </div>
                                                            <figure class="property-arrow-down">
                                                                <img src="{{ asset('images/arrow-down.png') }}" />
                                                            </figure>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="property-listing-tab-content">
                                                        <label>How did you hear of DandB?</label>
                                                        <div class="property-type-content">
                                                            <select class="form-select"
                                                                aria-label="Default select example" name="property_source"
                                                                onchange="checkSelectionSell('property_source')">
                                                                <option value="" selected>Please Select</option>
                                                                @foreach ($property_sources as $property_source)
                                                                    <option value="{{ $property_source->id }}">
                                                                        {{ $property_source->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div>
                                                                <span class="error-span-property_source error"
                                                                    style="font-size:75%; color:#F26C61"></span>
                                                            </div>
                                                            <figure class="property-arrow-down">
                                                                <img src="{{ asset('images/arrow-down.png') }}" />
                                                            </figure>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="property-listing-tab-content">
                                                        <div class="property-listing-tab-content">
                                                            <label>Where is the property located ?</label>
                                                            <div class="property-type-content">
                                                                <input type="text" name="property_location"
                                                                    id="sell_pro_location"
                                                                    placeholder="Enter your Pin Code" autocomplete="off"
                                                                    onkeyup="checkSelectionSell('property_location')">
                                                                <div>
                                                                    <span class="error-span-property_location error"
                                                                        style="font-size:75%; color:#F26C61"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="property-listing-tab-content">
                                                        <div class="property-listing-tab-content">
                                                            <label>What is the expected price?</label>
                                                            <div class="property-type-content">
                                                                <input type="number" name="price"
                                                                    placeholder="Enter your Expected Price"
                                                                    autocomplete="off" onkeyup="checkSelectionSell('price')">
                                                                <div>
                                                                    <span class="error-span-price error"
                                                                        style="font-size:75%; color:#F26C61"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="property-listing-tab-content">
                                                        <label>Property Images</label>
                                                        <div class="property-type-content">
                                                            <input type="file" id="imageInput" name="image[]" onchange="checkSelectionSell('image')"
                                                                multiple>
                                                            <div>
                                                                <span class="error-span-image error"
                                                                    style="font-size:75%; color:#F26C61"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="property-listing-tab-content">
                                                        <label>Post User</label>
                                                        <div class="property-type-content">
                                                            <select class="form-select"
                                                                aria-label="Default select example" name="post_user"
                                                                onchange="checkSelectionSell('post_user')">
                                                                <option value="" selected>Please Select</option>
                                                                @foreach ($post_users as $post_user)
                                                                    <option value="{{ $post_user->id }}">
                                                                        {{ $post_user->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div>
                                                                <span class="error-span-post_user error"
                                                                    style="font-size:75%; color:#F26C61"></span>
                                                            </div>
                                                            <figure class="property-arrow-down">
                                                                <img src="{{ asset('images/arrow-down.png') }}" />
                                                            </figure>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="property-listing-tab-content">
                                                        <label>Your Message</label>
                                                        <div class="property-type-content">
                                                            <input type="text" name="seller_message" onkeyup="checkSelectionSell('seller_message')"
                                                                placeholder="Type your Message" autocomplete="off">
                                                            <div>
                                                                <span class="error-span-seller_message error"
                                                                    style="font-size:75%; color:#F26C61"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="bedroom-div">
                                            </div>

                                            <button type="button" class="property-listing-submit-btn"
                                                onclick="save_sell_list()">Sumbit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-rent" role="tabpanel" aria-labelledby="pills-rent-tab"
                                tabindex="0">
                                <div class="property-listing-tab-inner">
                                    <div class="property-listing-tab-wapper">
                                        <form id="rent-form" enctype="multipart/form-data">
                                            @php
                                                $userId = session('user_id');
                                                $user = App\Models\User::find($userId);
                                            @endphp
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="property-listing-tab-content">
                                                        <label>Property Type</label>
                                                        <div class="property-type-content">
                                                            <select class="form-select"   onchange="checkPropertyTypeForRent(this)"
                                                                aria-label="Default select example" name="property_type"
                                                                id="property_rent-type">
                                                                <option value="" selected>Please Select</option>
                                                                @foreach ($property_types as $property_type)
                                                                    <option value="{{ $property_type->id }}">
                                                                        {{ $property_type->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div>
                                                                <span class="error-rent-property_type error"
                                                                    style="font-size:75%; color:#F26C61"></span>
                                                            </div>
                                                            <figure class="property-arrow-down">
                                                                <img src="{{ asset('images/arrow-down.png') }}" />
                                                            </figure>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4" id="area-rent-div">
                                                    <div class="property-listing-tab-content">
                                                        <label>Area(sq.ft)</label>
                                                        <div class="property-type-content">
                                                            <input type="text" class="area" name="property_area" onkeyup="checkSelectionRent('property_area')"
                                                                placeholder="Enter your Property Area" autocomplete="off">
                                                            <div>
                                                                <span class="error-rent-property_area error"
                                                                    style="font-size:75%; color:#F26C61"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="property-listing-tab-content">
                                                        <label>Property Name</label>
                                                        <div class="property-type-content">
                                                            <input type="text" name="property_name" onkeyup="checkSelectionRent('property_name')"
                                                                placeholder="Enter your Property Name" autocomplete="off">
                                                            <div>
                                                                <span class="error-rent-property_name error"
                                                                    style="font-size:75%; color:#F26C61"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="property-listing-tab-content">
                                                        <label>Property Status</label>
                                                        <div class="property-type-content">
                                                            <select class="form-select" onchange="checkSelectionRent('property_status')"
                                                                aria-label="Default select example"
                                                                name="property_status">
                                                                <option value="" selected>Please Select</option>
                                                                @foreach ($property_status as $property_statu)
                                                                    <option value="{{ $property_statu->id }}">
                                                                        {{ $property_statu->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div>
                                                                <span class="error-rent-property_status error"
                                                                    style="font-size:75%; color:#F26C61"></span>
                                                            </div>
                                                            <figure class="property-arrow-down">
                                                                <img src="{{ asset('images/arrow-down.png') }}" />
                                                            </figure>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="property-listing-tab-content">
                                                        <label>How did you hear of DandB?</label>
                                                        <div class="property-type-content">
                                                            <select class="form-select" onchange="checkSelectionRent('property_source')"
                                                                aria-label="Default select example"
                                                                name="property_source">
                                                                <option value="" selected>Please Select</option>
                                                                @foreach ($property_sources as $property_source)
                                                                    <option value="{{ $property_source->id }}">
                                                                        {{ $property_source->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div>
                                                                <span class="error-rent-property_source error"
                                                                    style="font-size:75%; color:#F26C61"></span>
                                                            </div>
                                                            <figure class="property-arrow-down">
                                                                <img src="{{ asset('images/arrow-down.png') }}" />
                                                            </figure>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="property-listing-tab-content">
                                                        <div class="property-listing-tab-content">
                                                            <label>Where is the property located ?</label>
                                                            <div class="property-type-content">
                                                                <input type="text" name="property_location" onkeyup="checkSelectionRent('property_location')"
                                                                    id="rent_pro_location"
                                                                    placeholder="Enter your Property Location"
                                                                    autocomplete="off">
                                                                <div>
                                                                    <span class="error-rent-property_location error"
                                                                        style="font-size:75%; color:#F26C61"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="property-listing-tab-content">
                                                        <div class="property-listing-tab-content">
                                                            <label>What is the expected price?</label>
                                                            <div class="property-type-content">
                                                                <input type="text" name="price" onkeyup="checkSelectionRent('price')"
                                                                    placeholder="Enter your Expected Price"
                                                                    autocomplete="off">
                                                                <div>
                                                                    <span class="error-rent-price error"
                                                                        style="font-size:75%; color:#F26C61"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="property-listing-tab-content">
                                                        <label>Property Images</label>
                                                        <div class="property-type-content">
                                                            <input type="file" id="imageInput" name="image[]" onchange="checkSelectionRent('image')"
                                                                multiple>
                                                            <div>
                                                                <span class="error-rent-image error"
                                                                    style="font-size:75%; color:#F26C61"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="property-listing-tab-content">
                                                        <label>Post User</label>
                                                        <div class="property-type-content">
                                                            <select class="form-select" onchange="checkSelectionRent('post_user')"
                                                                aria-label="Default select example"
                                                                name="post_user">
                                                                <option value="" selected>Please Select</option>
                                                                @foreach ($post_users as $post_user)
                                                                    <option value="{{ $post_user->id }}">
                                                                        {{ $post_user->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div>
                                                                <span class="error-rent-post_user error"
                                                                    style="font-size:75%; color:#F26C61"></span>
                                                            </div>
                                                            <figure class="property-arrow-down">
                                                                <img src="{{ asset('images/arrow-down.png') }}" />
                                                            </figure>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="property-listing-tab-content">
                                                        <label>Your Message</label>
                                                        <div class="property-type-content">
                                                            <input type="text" name="seller_message" onkeyup="checkSelectionRent('seller_message')"
                                                                placeholder="Type your Message" autocomplete="off">
                                                            <div>
                                                                <span class="error-rent-seller_message error"
                                                                    style="font-size:75%; color:#F26C61"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="bedroom-rent-div">

                                            </div>

                                            <button type="button" class="property-listing-submit-btn"
                                                onclick="save_rent_list()">Sumbit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="height: 80px;"></div>
            </div>
        </div>
    </section>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=Ad7FmonAEv6O7YQmD4cepFlG96Pa4GbLRMZQgeFTnkOxAGqIpBxTVHESPwfDTghXEKwcS-wqMfnOKD_U&vault=true&intent=subscription" data-sdk-integration-source="button-factory"></script>
    <script>
        function mygetfunc(odId, subsId){
            $.ajax({
                type: 'GET',
                url: "{{ route('payment_store') }}",
                data: {
                    orderId : odId,
                    subscriptionId : subsId,
                },
                success: function(data) {
                    if(data.status == 1){
                        $('#clsbtn').click();
                    }
                },
                error: function(xhr, status, error) {
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        $.each(xhr.responseJSON.errors, function(key, value) {
                            console.log(value);
                        });
                    } else {
                        console.error(error);
                    }
                }
            });
        }
      </script>
    <script>
        paypal.Buttons({
            style: {
                shape: 'pill',
                color: 'black',
                layout: 'horizontal',
                label: 'subscribe'
            },
            createSubscription: function(data, actions) {
              var dynamicPlanPrice = 500;
              return actions.subscription.create({
                /* Creates the subscription */
                plan_id: 'P-8G715519VC094944SMWYLC5Q',


              });
            },
            onApprove: function(data, actions) {
            //   alert(data.subscriptionID); // You can add optional success message for the subscriber here
            if(data.subscriptionID){
                var orderId = data.orderID;
                var subscriptionID = data.subscriptionID
                mygetfunc(orderId, subscriptionID);
            }
            }
        }).render('#paypal-button-container-P-8G715519VC094944SMWYLC5Q'); // Renders the PayPal button
      </script>

      <script>

        paypal.Buttons({
            style: {
                shape: 'pill',
                color: 'black',
                layout: 'horizontal',
                label: 'subscribe'
            },
            createSubscription: function(data, actions) {
              var dynamicPlanPrice = 1000;
              return actions.subscription.create({
                /* Creates the subscription */
                plan_id: 'P-3RK77677LG1149824MWYLC5Y',


              });
            },
            onApprove: function(data, actions) {
            //   alert(data.subscriptionID); // You can add optional success message for the subscriber here
            if(data.subscriptionID){
                var orderId = data.orderID;
                var subscriptionID = data.subscriptionID
                mygetfunc(orderId, subscriptionID);
            }
            }
        }).render('#paypal-button-container-s-P-3RK77677LG1149824MWYLC5Y'); // Renders the PayPal button
      </script>
      <script>

        paypal.Buttons({
            style: {
                shape: 'pill',
                color: 'black',
                layout: 'horizontal',
                label: 'subscribe'
            },
            createSubscription: function(data, actions) {
              var dynamicPlanPrice = 1500;
              return actions.subscription.create({
                /* Creates the subscription */
                plan_id: 'P-1A979851D0322544MMWYLC6A',


              });
            },
            onApprove: function(data, actions) {
            //   alert(data.subscriptionID); // You can add optional success message for the subscriber here
            if(data.subscriptionID){
                var orderId = data.orderID;
                var subscriptionID = data.subscriptionID
                mygetfunc(orderId, subscriptionID);
            }
            }
        }).render('#paypal-button-container-t-P-1A979851D0322544MMWYLC6A'); // Renders the PayPal button
      </script>
    <script>
            $("document").ready(function () {

                $("#modalBtn").click();
            });
        </script>
    <script>
        function save_sell_list() {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var formData = new FormData($('#sell-form')[0]);
            formData.append('_token', csrfToken);
            var dataValue = $('#pills-sell-tab').data('value');
            formData.append('seller_value', 1);
            console.log(formData);
            $.ajax({
                type: 'POST',
                url: "{{ route('sell_property_store') }}",
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status == 1) {
                        Swal.fire({
                            title: 'Property Submitted Successful.',
                            icon: 'success',
                            showCancelButton: false,
                            showConfirmButton: true,
                            confirmButtonColor: '#F26C61',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                                 }
                                });
                     }

                    else if(data.status == 0){
                        Swal.fire({
                            title: 'Please, Check subscription plans first !',
                            icon: 'warning',
                            showCancelButton: true,
                            showConfirmButton: false,
                            cancelButtonColor: '#e76363',
                        }).then((result) => {
                            if (result.dismiss) {
                                window.location.reload();
                                 }
                                });
                    }

                    else {
                        $('.error-span-' + data.key).html('');
                        $('.error-span-' + data.key).append(data.error);
                    }
                },
                error: function(xhr, status, error) {
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        $.each(xhr.responseJSON.errors, function(key, value) {
                            var field = key.replace(/\./g, '_');
                            $('.error-span-' + field).html('');
                            $('.error-span-' + field).append(value);
                        });
                    } else {
                        console.error(error);
                    }
                }
            });
        }
    </script>
    <script>
        function save_rent_list() {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var formData = new FormData($('#rent-form')[0]);
            formData.append('_token', csrfToken);
            var dataValue = $('#pills-sell-tab').data('value');
            formData.append('seller_value', 2);
            $.ajax({
                type: 'POST',
                url: "{{ route('sell_property_store') }}",
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status == 1) {
                        Swal.fire({
                            title: 'Property Submitted Successful.',
                            icon: 'success',
                            showCancelButton: false,
                            showConfirmButton: true,
                            confirmButtonColor: '#F26C61',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                                 }
                                });
                    }
                    else if(data.status == 0){
                        Swal.fire({
                            title: 'Please, Check subscription plans first !',
                            icon: 'warning',
                            showCancelButton: true,
                            showConfirmButton: false,
                            cancelButtonColor: '#e76363',
                        }).then((result) => {
                            if (result.dismiss) {
                                window.location.reload();
                                 }
                                });
                    }

                },
                error: function(xhr, status, error) {
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        $.each(xhr.responseJSON.errors, function(key, value) {
                            var field = key.replace(/\./g, '_');
                            $('.error-rent-' + field).html('');
                            $('.error-rent-' + field).append(value);
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
            $('.error-span-' + element).html('');
        }
        function checkSelectionRent(element) {
            $('.error-rent-' + element).html('');
        }
        function checkPropertyTypeForSell(element){
            var elementName = element.name;
            $('.error-span-' + elementName).html('');
            var selectValue = element.value;
            $.ajax({
                type: 'GET',
                url: "{{ route('configuration') }}",
                data:{
                    typeValue: selectValue,
                },
                success: function(response) {
                    // console.log(response);
                    $('#bedroom-div').html('');
                    // $('#bedroom-div').removeClass('d-none');
                    $.each(response, function(index, data){
                        console.log(data.numbers);
                        $('#bedroom-div').append(`
                        <div class="col-md-4">
                        <div class="property-listing-tab-content">
                            <label>No. of ${data.name}</label>
                            <div class="property-type-content">
                                <select class="form-select" aria-label="Default select example"
                                    name="configuration[${data.name}]" onchange="checkSelectionSell('configuration_${data.name}')">
                                    <option value="" selected>Please Select</option>
                                    ${generateOptions(data.numbers)}
                                </select>
                                <div>
                                    <span class="error-span-configuration_${data.name} error"
                                        style="font-size:75%; color:#F26C61"></span>
                                </div>
                                <figure class="property-arrow-down">
                                    <img src="{{ asset('images/arrow-down.png') }}" />
                                </figure>
                            </div>
                            </div>
                        </div>
                        `);

                    });
                },
                error: function(xhr, status, error) {
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        $.each(xhr.responseJSON.errors, function(key, value) {
                            console.log(value);
                        });
                    } else {
                        console.error(error);
                    }
                }
            });

            function generateOptions(numbers) {
                var myArray = numbers.split(',').map(Number);
                let options = '';
                $.each(myArray, function(index, number) {
                    options += `<option value="${number}">${number}</option>`;
                });
                return options;
            }


        }
        function checkPropertyTypeForRent(element){
            var elementName = element.name;
            $('.error-rent-' + elementName).html('');
            var selectValue = element.value;
            $.ajax({
                type: 'GET',
                url: "{{ route('configuration') }}",
                data:{
                    typeValue: selectValue,
                },
                success: function(response) {
                    $('#bedroom-rent-div').html('');
                    $.each(response, function(index, data){
                        $('#bedroom-rent-div').append(`
                        <div class="col-md-4">
                        <div class="property-listing-tab-content">
                            <label>No. of ${data.name}</label>
                            <div class="property-type-content">
                                <select class="form-select" aria-label="Default select example"
                                    name="configuration[${data.name}]" onchange="checkSelectionRent('configuration_${data.name}')">
                                    <option value="" selected>Please Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                                <div>
                                    <span class="error-rent-configuration_${data.name} error"
                                        style="font-size:75%; color:#F26C61"></span>
                                </div>
                                <figure class="property-arrow-down">
                                    <img src="{{ asset('images/arrow-down.png') }}" />
                                </figure>
                            </div>
                        </div>
                    </div>
                        `);

                    });
                },
                error: function(xhr, status, error) {
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        $.each(xhr.responseJSON.errors, function(key, value) {
                            console.log(value);
                        });
                    } else {
                        console.error(error);
                    }
                }
            });


        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var phoneInput = document.getElementById("sell_pro_location");
            var phoneInputRent = document.getElementById("rent_pro_location");

            phoneInput.addEventListener("keypress", function(e) {
                var length = this.value.length;

                if (length > 5) {
                    e.preventDefault();
                } else if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {
                    e.preventDefault();
                } else if (length === 0 && e.which === 48) {
                    e.preventDefault();
                }
            });
            phoneInputRent.addEventListener("keypress", function(e) {
                var length = this.value.length;

                if (length > 5) {
                    e.preventDefault();
                } else if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {
                    e.preventDefault();
                } else if (length === 0 && e.which === 48) {
                    e.preventDefault();
                }
            });
            var areainputs = document.getElementsByClassName("area");

                for (var i = 0; i < areainputs.length; i++) {
                    areainputs[i].addEventListener("keypress", function(e) {
                        var length = this.value.length;

                        if (length > 6) {
                            e.preventDefault();
                        } else if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {
                            e.preventDefault();
                        } else if (length === 0 && e.which === 48) {
                            e.preventDefault();
                        }
                    });
                }

        });
    </script>
@endsection
