@extends('admin.main.main')

@section('content-admin')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Company Profile Section</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Company Profile</li>
                    </ol>
                </div>
            </div>
            <div style="text-align: end;">
                <a href="{{ route('getCompanyProfile') }}"><button class="btn btn-primary">Add</button></a>
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
                                @if($c_profiles)
                                @foreach($c_profiles as $profile)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{ $profile->title }}</td>
                                <td>{!! $profile->description !!}</td>
                                @if($profile->status == 1)
                                <td>Profile</td>
                                @elseif($profile->status == 2)
                                <td>Feature</td>
                                @endif
                                <td>
                                    <div>
                                        <a href="{{route('removeProfile',['id' => encrypt($profile->id)])}}" id="removeProfile{{ $profile->id}}"></a>
                                        <button class="btn btn-primary" onclick="removeProfile({{ $profile->id }})">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif
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
    function removeProfile(id){
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
                document.getElementById('removeProfile'+id).click();
                    }
                });
    }
</script>
@endsection
