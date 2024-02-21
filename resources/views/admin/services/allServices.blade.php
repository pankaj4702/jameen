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
                                    <th scope="col"> category</th>
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
                                <td>
                                    <div>
                                        <a href="{{route('removeService',['id' => encrypt($service->id)])}}" id="removeService{{ $service->id}}"></a>
                                        <button class="btn btn-primary" onclick="removeService({{ $service->id }})">Delete</button>
                                    </div>
                                </td>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $(document).ready(function() {
            $('#mytable').DataTable()
        });
    function removeService(id){
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            showConfirmButton: true,
            cancelButtonColor: '#e76363',
            confirmButtonText: 'Yes, proceed!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('removeService'+id).click();
                    }
                });
    }
</script>
@endsection
