@extends('admin.main.main')

@section('content-admin')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Features and Amenities</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">feature</li>
                    </ol>
                </div>
            </div>
            <div style="text-align: end;">
                <a href=""><button class="btn btn-primary">Show All</button></a>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Features and Amenities </h3>
                        </div>
                        @if (count($errors) > 0)
                            <div class = "alert admin-alert" >
                                <ul class="title_count1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert admin-alert">
                                <ul>
                                    <li> {{ session('success') }}</li>
                                </ul>
                            </div>
                        @endif
                        <form id="quickForm" action="{{ route('storeFeatureAmenities') }}" method="POST" enctype="multipart/form-data"
                            onsubmit="return validateForm()">
                            @csrf
                            <div class="form-group" style="padding:17px;">

                                <input type="radio" id="sell" name="category" value="1" onchange="showCate(1)">
                                <label for="sell">Sell</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" id="rent" name="category" value="2" onchange="showCate(2)">
                                <label for="rent">Rent</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" id="pg" name="category" value="3" onchange="showCate(3)">
                                <label for="pg">PG</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" id="commercial" name="category" value="4" onchange="showCate(4)">
                                <label for="commercial">Commercial</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Category Name</label>
                                    <select class="form-control" name="category_name" id="property_cat">

                                    </select>
                                  </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Features</label>
                                <div id="featureContainer">
                                </div>
                                </div>
                                <div style="display: flex; justify-content:space-between; width:17em;">
                                    <div>
                                        <button type="button" class="btn btn-primary" onclick="addFeature()">Add Feature</button>
                                    </div>
                                    <div id="submit">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
    {{-- <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script> --}}
    <script>
        function addFeature() {
            $('#submit').append(`
            <button type="submit" class="btn btn-primary " id="submit">Save Features</button>
            `);
            var container = document.getElementById('featureContainer');
            var featureCount = container.children.length / 2 + 1; // Counting existing pairs


            var featureNameInput = document.createElement('input');
            var featureImageInput = document.createElement('input');
            var lineBreak = document.createElement('br');
            var row = document.createElement('div');
            row.className = 'row'; // Create a Bootstrap row

         // Create two columns (div elements) inside the row
            var col1 = document.createElement('div');
            col1.className = 'col-md-6';

            var col2 = document.createElement('div');
            col2.className = 'col-md-6';

            featureNameInput.name = 'feature_name[]';
            featureNameInput.placeholder = 'Feature Name ';
            featureNameInput.className = 'form-control';

            featureImageInput.name = 'feature_image[]';
            featureImageInput.type = 'file';
            featureImageInput.placeholder = 'Feature name';
            featureImageInput.className = 'form-control';

            col1.appendChild(featureNameInput);
            col2.appendChild(featureImageInput);

            // Append columns to the row
            row.appendChild(col1);
            row.appendChild(col2);

            container.appendChild(row);
            container.appendChild(lineBreak);
        }
    </script>
    <script>
        function showCate(id){

            $.ajax({
                type: 'GET',
                url: "{{ route('getCategory') }}",
                data:{
                    typeValue: id,
                },
                success: function(response) {
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
