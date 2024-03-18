@extends('admin.main.main')

@section('content-admin')
    {{-- @dd($data) --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Insight</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('getInsight') }}">Insight</a></li>
                        <li class="breadcrumb-item active">Edit Insight</li>
                    </ol>
                </div>
            </div>
            <div style="text-align: end;">
                <a href="{{ route('getInsight') }}"><button class="btn btn-primary">Show Insight</button></a>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Insight </h3>
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
                        <form id="quickForm" action="{{ route('updateInsight') }}" method="POST" enctype="multipart/form-data"
                            onsubmit="return validateForm()">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" name="dataId" value="{{$data->id}}">
                                    <label for="exampleInputEmail1">Title <span style="font-size: 11px;"><i>(title of the news)*</i></span></label>
                                    <input type="" name="title" autocomplete="off" class="form-control"
                                        id="title" placeholder="Enter Title" value="{{$data->title}}">
                                    <span id="error-title" style="color:rgb(218, 129, 129);"></span>
                                </div>

                                <div class="mb-3">
                                    <img src="{{ asset('storage/' . $data->image) }}" style="width:140px; height:80px;" id="imagePreview" /><br>
                                    <label for="formFile" class="form-label">Image  <span style="font-size: 11px;"><i>(image of this news)*</i></span></label>
                                    <input class="form-control" type="file" id="imageInput" name="image">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Description <span style="font-size: 11px;"><i></i></span></label>
                                    <textarea class="form-control description" name="description" id="description" rows="10" value="{{ old('description') }}">{{$data->description}}</textarea>
                                </div>

                                <input type="submit" class="btn btn-primary" value="Update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    </section>
    <script>
        const imageInput = document.getElementById('imageInput');
        const imagePreview = document.getElementById('imagePreview');

        imageInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>

@endsection
