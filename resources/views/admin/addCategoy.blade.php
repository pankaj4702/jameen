@extends('admin.main.main')

@section('content-admin')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Property Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">category</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Category </h3>
                        </div>
                        @if (count($errors) > 0)
                            <div class = "alert admin-alert">
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
                        <form id="quickForm" action="{{ route('storeCategory') }}" method="POST"
                            enctype="multipart/form-data" onsubmit="return validateForm()">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category Name</label>
                                    <input type="" name="title" autocomplete="off" class="form-control"
                                        id="title" placeholder="Enter Name" value="{{ old('title') }}">
                                    <span id="error-title" style="color:rgb(218, 129, 129);"></span>
                                </div>
                            </div>
                            <div class="form-group">

                                <input type="radio" id="sell" name="category" value="1">
                                <label for="sell">Sell</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" id="rent" name="category" value="2">
                                <label for="rent">Rent</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" id="pg" name="category" value="3">
                                <label for="pg">PG</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" id="commercial" name="category" value="4">
                                <label for="commercial">Commercial</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>
                            <div class="form-group" id="configuration">
                                &nbsp;&nbsp;&nbsp;<label>Configuration</label><br>
                                <div class="check-flex-container">
                                    @foreach ($configurations as $key => $configuration)
                                        <div
                                            style="border:0.5px solid gray;margin:4px; border-radius:5px;padding:5px;width:16em;">
                                            <div class="form-check check-flex-item" style="width:100%;">
                                                <input class="form-check-input" name="config[]" type="checkbox"
                                                    value="{{ $configuration->id }}" id="{{ $configuration->name }}"  onchange="showAlert('{{ $configuration->name }}')">
                                                <label class="form-check-label" for="{{ $configuration->name }}">
                                                    {{ $configuration->name }}
                                                </label>
                                            </div>

                                        </div>
                                    @endforeach
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">Save Category</button>
                                </div>
                            </div>
                        </form>
                        <div class="my-form-ds">
                            <form id="quickForm2" action="{{ route('store_configuration') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Configuration</label>
                                        <input type="text" name="type" autocomplete="off" class="form-control"
                                            id="type" placeholder="">
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Add">
                            </form>
                        </div>
                    </div>
                </div>

{{-- table --}}
@if($cat_data)
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <table class="table" id="mytable">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Sno.</th>
                                        <th scope="col"> Title</th>
                                        <th scope="col"> Main Category</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cat_data as $data)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{ $data->category_name }}</td>
                                    <td>{{ $data->title }}</td>
                                    <td><a href="{{route('deleteCategory',['id' => encrypt($data->id)])}}"><button class="btn btn-primary">Delete</button></a></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
@endif
            </div>

        </div>
    </section>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <script>
        // Function to be called when the checkbox is checked
        function showAlert(id) {
            var checkbox = document.getElementById(id);
            var myid = id+"-box";
            var boxInput= document.getElementById(myid);
            console.log(boxInput);
            if (checkbox.checked) {
                boxInput.setAttribute('name', 'quantity[]');
            }
        }
    </script>

@endsection
