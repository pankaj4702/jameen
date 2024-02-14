
@extends('admin.main.main')
@section('content-admin')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Property Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('property') }}">properties</a></li>
              <li class="breadcrumb-item active">property detail</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none"></h3>
              <div class="col-12"  >
                <img src="{{ asset('storage/' . $images[0]) }}" class="product-image m-auto d-block"  style="width:70%;border-radius:10px;" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs" >
                @foreach($images as $image)

                <div class="product-image-thumb" style="max-width: 4rem;"><img src="{{ asset('storage/' . $image) }}" alt="Product Image"></div>
                @endforeach

              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">{{ $property->porperty_name }}</h3>
              <p>{{ $property->message }}</p>

              <hr>
              <h4>Area</h4>
                <div>
                {{ $property->area }} sq/ft.
                </div>

              <h4 class="mt-3">Location </h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                {{ $property->property_location }}

              </div>

              <h4 class="mt-3">Category </h4>
              @if($property->category_status == 1)
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
               For Sell
              </div>
              @elseif($property->category_status == 2)
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                For Rent
               </div>
               @elseif($property->category_status == 3)
               <div class="btn-group btn-group-toggle" data-toggle="buttons">
                 PG
                </div>
                @elseif($property->category_status == 4)
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                 Commercial
                 </div>
               @endif
              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                    ₹{{ $property->price }}/-
                </h2>
                <h4 class="mt-0">
                  <small>Ex Tax: </small>
                </h4>
              </div>


              {{-- <div class="mt-4 product-share">
                <h4 class="mt-3">Additional Detail </h4>
                @if(isset($property->bedroom))
                <a href="#" class="text-white">
               {{ $property->bedroom }} Bedroom
                </a>
                @endif
                @if(isset($property->bathroom))
                <a href="#" class="text-white">
               {{ $property->bathroom }} Bathroom
                </a>
                @endif

              </div> --}}

            </div>
          </div>
          <div class="row mt-4">
                <div>
                    <h3>Description</h3>
                    <p>{{ $property->description }}</p>
                </div>

            </div>
        </div>
      </div>

    </section>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>
@endsection

