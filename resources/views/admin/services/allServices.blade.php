@extends('admin.main.main')

@section('content-admin')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Services</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">services</li>
                    </ol>
                </div>
            </div>
            <div style="text-align: end;">
                <a href="{{ route('getService') }}"><button class="btn btn-primary">Add Service</button></a>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <table class="table" id="mytable">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Sno.</th>
                                    <th scope="col"> Title</th>
                                    <th scope="col"> Description</th>
                                    <th scope="col"> catgory</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $service)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{ $service->title }}</td>
                                <td>{{ $service->description }}</td>
                                <td>{{ $service->category }}</td>
                                <td><a href="{{route('removeService',['id' => encrypt($service->id)])}}"><button class="btn btn-primary">Delete</button></a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>


    <script>
        $(document).ready(function() {
            $('#mytable').DataTable()
        });
    </script>
@endsection
