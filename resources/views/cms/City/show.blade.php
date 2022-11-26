@extends('cms.dashboard')

@section('title','City')

@section('styles')
@endsection

@section('main-title' , 'Show City')
@section('sub-title' , 'Show')


@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-dark">
          <div >
            {{-- <h3 class="card-title">Edite City</h3> --}}
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form>
            <div class="card-body bg-dark">
              <div class="form-group">
                <label for="name">City Name</label>
                <input disabled type="text" class="form-control" name="name" id="name" placeholder="Enter City Name" value="{{ $cities->name }}">
              </div>
              <div class="form-group">
                <label for="street">Street</label>
                <input disabled type="text" class="form-control" name="street" id="street" placeholder=" Enter Street Name" value="{{ $cities->street }}">
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer bg-dark">
      <a href="{{ route('cities.index') }}" type="submit" class="btn btn-info">Go To Index</a>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
@endsection



@section('scripts')
<script>

  function performUpdate(id){
              let formData = new FormData();
              formData.append('name' , document.getElementById('name').value);
              formData.append('street' , document.getElementById('street').value);
              storeRoute('/cms/admin/cities_update/'+id , formData);
          }
  
  
  </script>
@endsection
