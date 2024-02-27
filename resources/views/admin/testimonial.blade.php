@extends('admin.main.main')

@section('content-admin')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Testimonial</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">tesimonial</li>
                    </ol>
                </div>
            </div>
            <div style="text-align: end;">
                <a href="{{ route('Testimonials') }}"><button class="btn btn-primary">Show All</button></a>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Testimonial </h3>
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
                        <form id="quickForm" action="{{ route('storeTestimonial') }}" method="POST" enctype="multipart/form-data"
                            onsubmit="return validateForm()">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">User Name</label>
                                    <input type="" name="title" autocomplete="off" class="form-control"
                                        id="title" placeholder="Enter Name">
                                    <span id="error-title" style="color:rgb(218, 129, 129);"></span>
                                </div>

                                <div class="mb-3">
                                    <label for="formFile" class="form-label">User Image</label>
                                    <input class="form-control" type="file" id="image" name="image">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Message</label>
                                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="10"></textarea>
                                </div>

                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function validateForm() {
            var titleInput = document.getElementById('title');
            var titleValue = titleInput.value;

            // Check if the input contains any numeric characters
            if (/\d/.test(titleValue)) {
                var error = 'Please do not enter numeric values in the title field.';
                $('#error-title').html(error);
                return false; // Prevent form submission
            }

            return true; // Allow form submission
        }
    </script>
@endsection
