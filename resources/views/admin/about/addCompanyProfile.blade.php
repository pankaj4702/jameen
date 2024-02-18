@extends('admin.main.main')

@section('content-admin')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Company Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"> Company Profile</li>
                    </ol>
                </div>
            </div>
            <div style="text-align: end;">
                <a href="{{ route('allProfile') }}"><button class="btn btn-primary">Show all</button></a>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Profile </h3>
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
                        <form id="quickForm" action="{{ route('storeCompanyProfile') }}" method="POST" enctype="multipart/form-data"
                            onsubmit="return validateForm()">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="" name="title" autocomplete="off" class="form-control"
                                        id="title" placeholder="Enter Title"  value="{{ old('title') }}">
                                    <span id="error-title" style="color:rgb(218, 129, 129);"></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Category</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name='category'>
                                    <option value="1"> Profile</option>
                                    <option value="2"> Feature</option>
                                    </select>
                                  </div>

                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Image</label>
                                    <input class="form-control" type="file" id="image" name="image">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Description</label>
                                    <textarea class="form-control" id="description" name="description" id="exampleFormControlTextarea1" rows="7"></textarea>
                                </div>

                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <table class="table" id="mytable">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Sno.</th>
                                    <th scope="col"> Title</th>
                                    <th scope="col"> Description</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($assets as $asset)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{ $asset->title }}</td>
                                <td>{{ $asset->description }}</td>
                                <td><a href="{{route('removeService',['id' => encrypt($asset->id)])}}"><button class="btn btn-primary">Delete</button></a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div> --}}
    </section>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

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
    <script>
        $(document).ready(function() {
            $('#mytable').DataTable()
        });
    </script>
@endsection
