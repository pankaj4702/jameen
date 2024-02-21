@extends('admin.main.main')
@section('content-admin')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Properties</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Properties</li>
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
                            <h3 class="card-title">Properties </h3>
                        </div>
                    </div>

                    <table class="table" id="mytable">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Sno.</th>
                                <th scope="col"> Property Category</th>
                                <th scope="col"> Property Name</th>
                                <th scope="col">Property Status</th>
                                <th scope="col">Property Source</th>
                                <th scope="col">Category status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($properties as $property)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{ $property->type }}</td>
                                <td>{{ $property->property_name }}</td>
                                <td>{{ $property->status }}</td>
                                <td>{{ $property->source }}</td>
                                @if($property->category_status == 1)
                                <td>Buy</td>
                                @elseif($property->category_status == 2)
                                <td>Rent</td>
                                @elseif($property->category_status == 3)
                                <td>PG</td>
                                @elseif($property->category_status == 4)
                                <td>Commercial</td>
                                @endif

                                <td>
                                    @php
                                    $encryptedId = encrypt($property->id);
                                    @endphp
                                    <div class="d-flex justify-content-around">
                                    <div>
                                    <a href="{{route('property_detail',['id' => $encryptedId])}}"><button class="btn btn-primary">detail</button></a>
                                     </div>
                                    {{-- <a href="{{route('property_delete',['id' => $encryptedId])}}"><button class="btn btn-primary">delete</button></a> --}}
                                    <div>
                                        <a href="{{route('property_delete',['id' => encrypt($property->id)])}}" id="propertyDelete{{ $property->id}}"></a>
                                        <button class="btn btn-primary" onclick="propertyDelete({{ $property->id }})">Delete</button>
                                    </div>
                                </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function propertyDelete(id){
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
                    document.getElementById('propertyDelete'+id).click();
                        }
                    });
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#mytable').DataTable()
        });
    </script>
@endsection

<
