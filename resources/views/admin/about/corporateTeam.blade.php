@extends('admin.main.main')

@section('content-admin')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Corporate Team</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Corporate Team</li>
                    </ol>
                </div>
            </div>
            <div class="row" style="display: flex;">
            <div style="text-align: end;">
                <a href="{{ route('addCompanyProfile') }}"><button class="btn btn-primary">Add Team</button></a>
            </div>
            <div style="text-align: end;">
                <a href="{{ route('corporateTeamHeading') }}"><button class="btn btn-primary">Team Heading</button></a>
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
                                    <th scope="col"> Post</th>
                                    <th scope="col"> Profile</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($teams)
                                @foreach($teams as $team)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{ $team->name }}</td>
                                <td>{{$team->role }}</td>
                                <td> <img src="{{ asset('storage/' . $team->image) }}" style="width:75px; height:68px;" /></td>

                                <td><a href="{{route('removeTeam',['id' => encrypt($team->id)])}}"><button class="btn btn-primary">Delete</button></a></td>
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


    <script>
        $(document).ready(function() {
            $('#mytable').DataTable()
        });
    </script>
@endsection
