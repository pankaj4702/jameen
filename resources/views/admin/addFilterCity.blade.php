@extends('admin.main.main')

@section('content-admin')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add City</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Add City </li>
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
              <h3 class="card-title">Add City</h3>
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
            <form id="quickForm" action="{{route('storeCity')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">City Name</label>
                  <input type="text" name="city" autocomplete="off" class="form-control" id="city"  placeholder="Enter a City">
                </div>
                <input type="submit" class="btn btn-primary" value="Submit">
            </form>
          </div>
          </div>
      </div>
      @if($cities)
      <div class="col-md-6">
        <div class="card card-primary">
            <table class="table" id="mytable">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Sno.</th>
                        <th scope="col">City Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cities as $city)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{ $city->name }}</td>
                        <td><a href="{{route('deleteCity',['id' => encrypt($city->id)])}}"><button class="btn btn-primary">Delete</button></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
    </div>
  </section>
@endsection
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

<script>
     $(document).ready(function() {
        $('#configuration').hide();
      $('#type').keyup(function(){
        if($(this).val().length)
        $('#configuration').show();
    else
    $('#configuration').hide();
      });
   });
</script>
