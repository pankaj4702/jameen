@extends('admin.main.main')

@section('content-admin')
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
    <!--Property-Listing-section-->
    <section class="property-listing pb-0">
        <div class="container">
            <div class="property-listing-inner">

                <div class="property-listing-bottom">
                    <h3 style="color:white; font-size: 30px;">
                        Property Details
                    </h3>
                    <div class="property-listing-tab">
                        <ul class="nav nav-pills mb-3 property-listing-tab-main" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link property-listing-sell-btn-admin active" id="pills-sell-tab" data-value="1"
                                    data-bs-toggle="pill" data-bs-target="#pills-sell" type="button" role="tab"
                                    aria-controls="pills-sell" aria-selected="true" onclick="showCategory(1)">
                                    Sell
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link property-listing-sell-btn-admin" id="pills-sell-tab" data-value="1"
                                    data-bs-toggle="pill" data-bs-target="#pills-sell" type="button" role="tab"
                                    aria-controls="pills-sell" aria-selected="true" onclick="showCategory(2)">
                                    Rent
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link property-listing-sell-btn-admin" id="pills-sell-tab" data-value="1"
                                    data-bs-toggle="pill" data-bs-target="#pills-sell" type="button" role="tab"
                                    aria-controls="pills-sell" aria-selected="true" onclick="showCategory(3)">
                                    PG
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link property-listing-sell-btn-admin" id="pills-sell-tab" data-value="1"
                                    data-bs-toggle="pill" data-bs-target="#pills-sell" type="button" role="tab"
                                    aria-controls="pills-sell" aria-selected="true" onclick="showCategory(4)">
                                    Commercial
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-sell" role="tabpanel"
                                aria-labelledby="pills-sell-tab" tabindex="0">
                                <div class="property-listing-tab-inner">
                                    <div class="property-listing-tab-wapper">
                                        <form id="sell-form" enctype="multipart/form-data">
                                            <input type="hidden" name='seller_value' id="sellerValue" value="1">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="property-listing-tab-content">
                                                        <label>Property Category</label>
                                                        <div class="property-type-content">
                                                            <select class="form-select" aria-label="Default select example"
                                                                name="property_cat" id="property_cat" onchange="checkPropertyCategory(this)" >
                                                                <option value="" selected>Choose Value</option>
                                                                @foreach ($PropertyCategories as $PropertyCategory)
                                                                    <option value="{{ $PropertyCategory->id }}">
                                                                        {{ $PropertyCategory->category_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div>
                                                                <span class="error-span-property_cat error"
                                                                style="font-size:90%; color:#f7cadc"></span>
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
                                                            <input type="text" class="area" id="area_inpt" name="property_area"
                                                                placeholder="Enter your Property Area" autocomplete="off"
                                                                onkeyup="checkSelectionSell('property_area')">
                                                            <div>
                                                                <span class="error-span-property_area error"
                                                                style="font-size:90%; color:#f7cadc"></span>
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
                                                                style="font-size:90%; color:#f7cadc"></span>
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
                                                                style="font-size:90%; color:#f7cadc"></span>
                                                            </div>
                                                            <figure class="property-arrow-down">
                                                                <img src="{{ asset('images/arrow-down.png') }}" />
                                                            </figure>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-md-4">
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
                                                                style="font-size:90%; color:#f7cadc"></span>
                                                            </div>
                                                            <figure class="property-arrow-down">
                                                                <img src="{{ asset('images/arrow-down.png') }}" />
                                                            </figure>
                                                        </div>
                                                    </div>
                                                </div> --}}
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
                                                                    style="font-size:90%; color:#f7cadc"></span>
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
                                                                    style="font-size:90%; color:#f7cadc"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="property-listing-tab-content">
                                                        <label>Property Images</label>
                                                        <div class="property-type-content">
                                                            <input type="file" id="imageInput" style="height:55px;" name="image[]" onchange="checkSelectionSell('image')"
                                                                multiple>
                                                            <div>
                                                                <span class="error-span-image error"
                                                                style="font-size:90%; color:#f7cadc"></span>
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
                                                                style="font-size:90%; color:#f7cadc"></span>
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
                                                                style="font-size:90%; color:#f7cadc"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="config-div">
                                            </div>
                                            <div class="row" id="bedroom-div">
                                            </div>
                                            <span class="error-span-features error"
                                            style="font-size:90%; color:#f7cadc"></span>

                                            <button type="button" class="property-listing-submit-btn-admin"
                                                onclick="saveProperty()">Sumbit</button>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        function saveProperty() {
            var myValue = document.getElementById('property_cat').value;
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var formData = new FormData($('#sell-form')[0]);
            formData.append('_token', csrfToken);
            var dataValue = $('#pills-sell-tab').data('value');
            $.ajax({
                type: 'POST',
                url: "{{ route('store_property') }}",
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status == 1) {
                        Swal.fire({
                        icon: "success",
                        title: "Property has been saved",
                        showConfirmButton: true,
                        allowOutsideClick: false
                        }).then((result) => {
                if (result.isConfirmed) {
                    location.reload();
                        }
                    });
                     }
                    else if(data.status == 0){
                        $('.error-span-' + data.key).html('');
                        $('.error-span-' + data.key).append(data.error);
                    }
                    else {
                        $('.error-span-' + data.key).html('');
                        $('.error-span-' + data.key).append(data.error);
                    }
                },
                error: function(xhr, status, error) {
                    if(myValue == ""){
                alert('please salect the property category');
            }
            else{
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        $.each(xhr.responseJSON.errors, function(key, value) {
                            var field = key.replace(/\./g, '_');
                            $('.error-span-'+field).html('');
                            $('.error-span-'+field).append(value);
                        });
                    } else {
                        console.error(error);
                    }
                }
                }
            });
        }
    </script>

    <script>
        function checkSelectionSell(element) {
            $('.error-span-' + element).html('');
        }
        function checkPropertyCategory(element){
            var elementName = element.name;
            $('.error-span-' + elementName).html('');
            var selectValue = element.value;
                showConfig(element);
            $.ajax({
                type: 'GET',
                url: "{{ route('featureAmenities') }}",
                data:{
                    typeValue: selectValue,
                },
                success: function(response) {
                    console.log(response);
                    $('#bedroom-div').html('');
                    $.each(response, function(index, data){
                        $('#bedroom-div').append(`
                        <div class="col-md-2">
                        <div class="property-listing-tab-content">
                            <div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" name="features[]" value="${data}" id="flexSwitchCheckDefault${index}" onchange="checkSelectionSell('features')">
  <label class="form-check-label" for="flexSwitchCheckDefault${index}">${data}</label>
</div>
                                </div>
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
        function showConfig(element){
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
                    console.log(response);
                    $('#config-div').html('');
                    $('#bedroom-div').html('');

                    $.each(response, function(index, data){
                        const name = data.name;
                        const myname = name.replace(/\s/, ""); // Removes all whitespace
                        console.log(myname);
                        $('#config-div').append(`
                        <div class="col-md-4">
                        <div class="property-listing-tab-content">
                            <label>${data.name}</label>
                            <div class="property-type-content">
                                <select class="form-select" aria-label="Default select example" name="configuration[${myname}]" onchange="checkSelectionSell('configuration_${data.name}')">
                                    <option value="" selected>Please Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                </select>
                                <div>
                                    <span class="error-span-configuration_${data.name} error"
                                    style="font-size:90%; color:#f7cadc"></span>
                                </div>
                                <figure class="property-arrow-down">
                                    <img src="{{ asset('images/arrow-down.png') }}" />
                                </figure>
                            </div>
                            </div>
                        </div>
                        `);
                    });
                }
            });
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var phoneInput = document.getElementById("sell_pro_location");
            var areainputs = document.getElementById("area_inpt");

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
            areainputs.addEventListener("keypress", function(e) {
                var length = this.value.length;

                if (length > 5) {
                    e.preventDefault();
                } else if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {
                    e.preventDefault();
                } else if (length === 0 && e.which === 48) {
                    e.preventDefault();
                }
            });
        });
    </script>
    <script>
        function showCategory(cat){
            $('#sellerValue').val(cat);
            $.ajax({
                type: 'GET',
                url: "{{ route('getCategory') }}",
                data:{
                    typeValue: cat,
                },
                success: function(response) {
                  $('#property_cat').html('');
                  $('#property_cat').html('<option value="" seleced>Choose Value</option>');
                  $.each(response, function(index, data){
                    $('#property_cat').append(`
                    <option value="${data.id}">
                     ${data.category_name}</option>
                    `);
                  })

                }
            });
        }
    </script>
    @endsection
    // var m =JSON.parse(data);

    // window.location.href = m.url;
    //var meetDate = $('#meetingDate').val();
	//var meetHour = $('#meetHour').val();
	//if(meetDate == ""){
	//$('#meetDateError').html('This field is required');
	//}
	//if(meetHour == ""){
	//$('#meetDateError').html('This field is required');
	//}



    <a href="{{ route('advertisingCompanyLogo.delete', ['id' => base64_encode($val->id)]) }}" onclick="return confirm('Are you sure you want to delete this item?')">
