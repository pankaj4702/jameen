
@extends('admin.main.main')
@section('content-admin')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">

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
                <img src="{{ asset('storage/' . $message->image) }}" />
              </div>
              <div class="col-12 product-image-thumbs" >

              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h2 class="my-3">{{ $message->name }}</h2>
              @if($message->status == 1)
              <p>Chief Executive Officer</p>
              @elseif($message->status == 2)
              <p>Chairman & Founder</p>
              @endif
              <hr>
              <div>
                <h3>Message</h3>
                <p>{!! $message->message !!}</p>
                <a href="{{ route('editCompanyMessage',['id'=>encrypt($message->status)]) }}"><button class="btn btn-primary">Update</button></a>
            </div>


              </div>

            </div>
          </div>
          <div class="row mt-4">

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

