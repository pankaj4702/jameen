@extends('admin.main.main')

@section('content-admin')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Insight</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">insights</li>
                    </ol>
                </div>
            </div>
            <div style="text-align: end;">
                <a href="{{ route('addInsight') }}"><button class="btn btn-primary">Add Insight</button></a>
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
                                @foreach($insights as $insight)
                                    @php
                                    $dateString = $insight->date;
                                    $dateTime = new DateTime($dateString);
                                    $formatDate = $dateTime->format('F d, Y');
                                    @endphp
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>
                                        <img src="{{ asset('storage/' . $insight->image) }}" style="width:75px; height:68px;" />
                                    </td>
                                    <td>{{ $insight->title }}</td>
                                    <td>   {{ $formatDate }}</td>
                                    <td>
                                        <div style="display: flex;justify-content:space-between;">
                                        <div><a href="{{route('deleteBlog',['id' => encrypt($insight->id)])}}"><button class="btn btn-primary">Delete</button></a></div>

                                        {{-- <div><a href=""><button class="btn btn-primary">Approve</button></a></div> --}}

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
