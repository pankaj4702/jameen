@extends('admin.main.main')

@section('content-admin')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>FAQs</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Faq</li>
                    </ol>
                </div>
            </div>
            <div style="text-align: end;">
                <a href="{{ route('addFaq') }}"><button class="btn btn-primary">Add Faq</button></a>
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
                                @foreach($faqs as $faq)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{ $faq->title }}</td>
                                <td>{{ $faq->description }}</td>
                                <td>{{ $faq->category }}</td>
                                <td>
                                    <div>
                                        <a href="{{route('removeFaq',['id' => encrypt($faq->id)])}}" id="removeFaq{{ $faq->id}}"></a>
                                        <button class="btn btn-primary" onclick="removeFaq({{ $faq->id }})">Delete</button>
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
    function removeFaq(id){
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
                document.getElementById('removeFaq'+id).click();
                    }
                });
    }
</script>
@endsection
