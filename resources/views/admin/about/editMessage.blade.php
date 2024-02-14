@extends('admin.main.main')

@section('content-admin')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Company Message</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"> Company Message</li>
                    </ol>
                </div>
            </div>
            <div style="text-align: end;">
                @if( $profile->status == 1)
                <a href="{{ route('getCompanyMessageCeo') }}"><button class="btn btn-primary">Show</button></a>
                @elseif($profile->status == 2)
                <a href="{{ route('getCompanyMessageChairman') }}"><button class="btn btn-primary">Show</button></a>
                @endif
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Message </h3>
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
                        {{-- @dd($profile) --}}
                        <form id="quickForm" action="{{ route('updateCompanyMessage') }}" method="POST" enctype="multipart/form-data"
                            onsubmit="return validateForm()">
                            @csrf
                            <input type="hidden" name="status" value="{{ $profile->status }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="" name="name" autocomplete="off" class="form-control"
                                        id="title" placeholder="Enter Title"  value="{{ $profile->name }}">
                                    <span id="error-title" style="color:rgb(218, 129, 129);"></span>
                                </div>


                                <div class="mb-3" style="display: flex">
                                    <div>
                                        <label for="formFile" class="form-label">Image</label>
                                        <input class="form-control" type="file" id="image" name="image">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Description</label>
                                    <textarea class="form-control" id="description" name="message" id="exampleFormControlTextarea1" rows="7">{{ $profile->message }}</textarea>
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
