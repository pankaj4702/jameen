@extends('admin.main.main')

@section('content-admin')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Main Section</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">main section</li>
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
                                <h3 class="card-title">Add Main Section Content </h3>
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
                            <form id="quickForm" action="{{ route('storeMainSection') }}" method="POST" enctype="multipart/form-data"
                                onsubmit="return validateForm()">
                                @csrf
                                <input type="hidden" name="sectionId" value="{{ $section->id }}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Main Heading</label>
                                        <input class="form-control" name="main_heading" id="main_heading" value="{{ $section->main_heading }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Description</label>
                                        <textarea class="form-control description" name="description" id="description" rows="10" >{{ $section->description }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Images</label>
                                    <div id="featureContainer">
                                    </div>
                                    </div>

                                    <div id="imageInputs">
                                        @if(isset($sectionImages))
                                        @foreach($sectionImages as $image)
                                        <div>
                                            <input type="file" accept="image/*" name="image[]">
                                            <img style="width:120px; height:90px;" src="{{ asset('storage/' . $image) }}">
                                        </div>
                                        @endforeach
                                        @endif
                                        <!-- Placeholder for dynamic image input fields -->
                                    </div>
                                    <button class="btn btn-primary " type="button" id="addImageButton">Add Image</button>
                                    <button type="submit" class="btn btn-primary " id="submit">Save</button>
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
        // Function to create a new image input field with preview
function createImageInput() {
    // Create elements
    var container = document.createElement('div');
    var input = document.createElement('input');
    var preview = document.createElement('img');
    preview.style.width = '120px';
    preview.style.height = '90px';
    // Set attributes
    input.type = 'file';
    input.accept = 'image/*';
    input.name = 'image[]';

    // Event listener for image selection
    input.addEventListener('change', function() {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    // Append elements to container
    container.appendChild(input);
    container.appendChild(preview);

    // Append container to the main container
    document.getElementById('imageInputs').appendChild(container);
}

// Event listener for adding image input fields
document.getElementById('addImageButton').addEventListener('click', function() {
    createImageInput();
});

    </script>


@endsection
