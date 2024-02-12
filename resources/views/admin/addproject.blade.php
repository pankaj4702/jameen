@extends('admin.main.main')

@section('content-admin')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Product</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Add Projects</li>
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
              <h3 class="card-title">Add Projects </h3>
            </div>
            @if (count($errors) > 0)
       <div class = "alert alert-danger">
          <ul class="title_count1">
             @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
             @endforeach
          </ul>
       </div>
    @endif
    @if (session('success'))
  <div class="alert alert-danger">
          <ul>
              <li> {{ session('success') }}</li>
          </ul>
  </div>
    @endif
            <form id="quickForm" action="{{route('saveProject')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Project Name</label>
                  <input type="text" name="project_name" class="form-control" id="exampleInputEmail1" placeholder="Enter product">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Project Price ($)</label>
                  <input type="text" id="price" name="project_price" class="form-control" id="exampleInputPassword1" placeholder="Enter Price">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Address</label>
                  <input type="text" id="address" name="address" class="form-control"  placeholder="Enter address">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Project Image</label><br>
                  <input type="file" name="image">
                </div>
                <div class="form-group col-sm-6">
                    <label for="beds">Beds</label>
                    <input type="text" id="beds" name="beds" class="form-control"  placeholder="Enter Beds">
                  </div>
                  <div class="form-group col-sm-6">
                    <label for="bath">Bath</label>
                    <input type="text" id="bath" name="bath" class="form-control" placeholder="Enter bath">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Category</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="category">
                      <option value="">Choose a category</option>
                      <option value="1">Buy</option>
                      <option value="2">Rent</option>
                    </select>
                  </div>
                <div class="form-group mb-0">
                </div>
              </div>
                <input type="submit" class="btn btn-primary" value="Submit">
            </form>
          </div>
          </div>
        <div class="col-md-6">
        </div>
      </div>
    </div>
  </section>
@endsection
