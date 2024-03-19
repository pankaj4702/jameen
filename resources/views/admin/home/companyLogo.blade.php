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
                    <h1>Company Logo Section</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">company logo section</li>
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
                                <h3 class="card-title">Add Company Logo</h3>
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
                            <form id="quickForm" action="{{ route('updateCompanyLoog') }}" method="POST" enctype="multipart/form-data"
                                onsubmit="return validateForm()">
                                @csrf
                                <input type="hidden" name="sectionId" value="{{ $section->id }}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Title</label>
                                        <input class="form-control" name="title" id="title" value="{{ $section->title }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Images</label>
                                    <div id="featureContainer">
                                    </div>
                                    </div>

                                    <div id="imageInputs">
                                        @if($sectionImages[0] !== "")
                                        @foreach($sectionImages as $key => $image)
                                        <div>
                                            <input type="file" accept="image/*" name="image[{{ $key }}]" onchange="updatePreview(this)">
                                            <img style="width:120px; height:90px;" src="{{ asset('storage/' . $image) }}">
                                            <a href="{{ route('deleteCompanyLogo',['id'=>$key]) }}"><i class="fas fa-trash" style="margin-left:40px;color:white;"></i></a>
                                        </div>
                                        @endforeach
                                        @endif
                                        <!-- Placeholder for dynamic image input fields -->
                                    </div>
                                    <button class="btn btn-primary " type="button" id="addImageButton"><i class="fas fa-plus"></i></button>
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
