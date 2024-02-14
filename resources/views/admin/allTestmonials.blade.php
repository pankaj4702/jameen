@extends('admin.main.main')

@section('content-admin')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Testimonials</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">tesimonial</li>
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
                        <table class="table" id="mytable">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Sno.</th>
                                    <th scope="col"> Name</th>
                                    <th scope="col"> Image</th>
                                    <th scope="col"> Description</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($testimonials as $testimonial)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{ $testimonial->name }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $testimonial->image) }}" style="width:75px; height:68px;" />
                                    </td>
                                    <td>{{ $testimonial->message }}</td>
                                    <td>
                                        <div style="display: flex;justify-content:space-between;">
                                        <div><a href="{{route('deleteTestimonial',['id' => encrypt($testimonial->id)])}}"><button class="btn btn-primary">Delete</button></a></div>
                                        @if($testimonial->status == 0)
                                        <div><a href="{{route('approveTestimonial',['id' => encrypt($testimonial->id)])}}"><button class="btn btn-primary">Approve</button></a></div>
                                        @elseif($testimonial->status == 1)
                                        <div><a href="{{route('approveTestimonial',['id' => encrypt($testimonial->id)])}}"><button class="btn btn-info">Approved</button></a></div>
                                        @endif
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


@endsection
