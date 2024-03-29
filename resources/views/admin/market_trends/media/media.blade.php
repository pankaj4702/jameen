@extends('admin.main.main')

@section('content-admin')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Media</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">media</li>
                    </ol>
                </div>
            </div>
            <div style="text-align: end;">
                <a href="{{ route('addMedia') }}"><button class="btn btn-primary">Add Media</button></a>
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
                                    <th scope="col"> Image</th>
                                    <th scope="col"> Title</th>
                                    <th scope="col"> Date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($media as $data)
                                    @php
                                    $dateString = $data->date;
                                    $dateTime = new DateTime($dateString);
                                    $formatDate = $dateTime->format('F d, Y');
                                    @endphp
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>
                                        <img src="{{ asset('storage/' . $data->image) }}" style="width:75px; height:68px;" />
                                    </td>
                                    <td>{{ $data->title }}</td>
                                    <td>   {{ $formatDate }}</td>
                                    <td>
                                        <div style="display: flex;justify-content:space-between;">
                                        <div>
                                            <a href="{{route('deleteMedia',['id' => encrypt($data->id)])}}" id="deleteMedia{{ $data->id }}"></a>
                                            <a href="{{route('editMedia',['id'=>encrypt($data->id)])}}"><i class="fas fa-edit"></i></a>
                                            <span onclick="deleteMedia({{ $data->id }})"><i style="color:red;cursor:pointer;" class="fas fa-trash-alt"></i></span>
                                        </div>


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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function deleteMedia(id){
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
                    document.getElementById('deleteMedia'+id).click();
                        }
                    });


        }

    </script>


@endsection
