@extends('admin.main.main')

@section('content-admin')
<style>
    .fas:hover{
        font-size: 19px;
    }
</style>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Checkout Section</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">checkout section</li>
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
                                <h3 class="card-title">Add Checkout Section Content </h3>
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
                            <form id="quickForm" action="{{ route('updateCheckoutSection') }}" method="POST" enctype="multipart/form-data"
                                onsubmit="return validateForm()">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Main Heading</label>
                                        <input class="form-control" name="main_heading" id="main_heading" value="{{ $section->main_heading }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Description</label>
                                        <textarea class="form-control description" name="description" id="description" rows="10" >{{ $section->description  }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Images</label>
                                    <div id="featureContainer">
                                    </div>
                                    </div>
                                    {{-- @dd($abc[4]) --}}
                                        <div>
                                            <input type="file" accept="image/*" name="image[]" onchange="updatePreview(this)">
                                            <img style="width:120px; height:90px;" src="{{ asset('storage/' . $sectionImages[0]) }}">
                                            <select  name="city[]" style="width:150px; margin-left:100px;">
                                                <option value="{{ $abc[0] }}">{{ $abc[0] }}</option>
                                                @foreach($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                @endforeach
                                              </select>
                                        </div><br>
                                        <div>
                                            <input type="file" accept="image/*" name="image[]" onchange="updatePreview(this)">
                                            <img style="width:120px; height:90px;" src="{{ asset('storage/' . $sectionImages[1]) }}">
                                            <select  name="city[]" style="width:150px; margin-left:100px;">
                                                <option value="{{ $abc[1] }}">{{ $abc[1] }}</option>
                                                @foreach($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                @endforeach
                                              </select>
                                        </div><br>
                                        <div>
                                            <input type="file" accept="image/*" name="image[]" onchange="updatePreview(this)">
                                            <img style="width:120px; height:90px;" src="{{ asset('storage/' . $sectionImages[2]) }}">
                                            <select  name="city[]" style="width:150px; margin-left:100px;">
                                                <option value="{{ $abc[2] }}">{{ $abc[2] }}</option>
                                                @foreach($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                @endforeach
                                              </select>
                                        </div><br>
                                        <div>
                                            <input type="file" accept="image/*" name="image[]" onchange="updatePreview(this)">
                                            <img style="width:120px; height:90px;" src="{{ asset('storage/' . $sectionImages[3]) }}">
                                            <select  name="city[]" style="width:150px; margin-left:100px;">
                                                <option value="{{ $abc[3] }}">{{ $abc[3] }}</option>
                                                @foreach($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                @endforeach
                                              </select>
                                        </div><br>
                                        <div>
                                            <input type="file" accept="image/*" name="image[]" onchange="updatePreview(this)">
                                            <img style="width:120px; height:90px;" src="{{ asset('storage/' . $sectionImages[4]) }}">
                                            <select name="city[]" style="width:150px; margin-left:100px;">
                                                <option value="{{ $abc[4] }}">{{ $abc[4] }}</option>
                                                @foreach($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                @endforeach
                                              </select>
                                        </div>

                                    <button type="submit" class="btn btn-primary " id="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
function updatePreview(input) {
    var preview = input.nextElementSibling; // Get the next sibling (the img element)
    var file = input.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}

    </script>


@endsection
