@extends('admin.main.main')

@section('content-admin')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> NEWS</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"> News</li>
                    </ol>
                </div>
            </div>
            <div style="text-align: end;">
                <a href="{{ route('getNews') }}"><button class="btn btn-primary">Show News</button></a>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add News </h3>
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
                        <form id="quickForm" action="{{ route('storeNews') }}" method="POST" enctype="multipart/form-data"
                            onsubmit="return validateForm()">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title <span style="font-size: 11px;"><i>(title of the news)*</i></span></label>
                                    <input type="" name="title" autocomplete="off" class="form-control"
                                        id="title" placeholder="Enter Title">
                                    <span id="error-title" style="color:rgb(218, 129, 129);"></span>
                                </div>

                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Image  <span style="font-size: 11px;"><i>(image of this news)*</i></span></label>
                                    <input class="form-control" type="file" id="image" name="image">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Description <span style="font-size: 11px;"><i></i></span></label>
                                    <textarea class="form-control description" name="description" id="description" rows="10" value="{{ old('description') }}"></textarea>
                                </div>

                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    </section>


@endsection
