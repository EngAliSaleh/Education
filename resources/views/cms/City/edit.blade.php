@extends('cms.dashboard')

@section('title','City')

@section('styles')
@endsection

@section('main-title' , 'Edit City')
@section('sub-title' , 'Edit City')


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
            <div class="card-body bg-dark" >
              <label for="country_id">Country Name</label>
              <select class="form-control" name="country_id" style="width: 100%;" id="country_id"
                  aria-label=".form-select-sm example" >
                  {{-- <option selected  value="{{ $cities->$countries->id }}" > {{$cities->$countries->name }}</option> --}}
                  @foreach ($countries as $country)
                  <option value="{{ $country->id }}" > {{ $country->name }}</option>

                  @endforeach
              </select>
          </div>
            <div class="card-body bg-dark">
              <div class="form-group">
                <label for="name">City Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter City Name" value="{{ $cities->name }}">
              </div>
              <div class="form-group">
                <label for="street">Street</label>
                <input type="text" class="form-control" name="street" id="street" placeholder=" Enter Street Name" value="{{ $cities->street }}">
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer bg-dark">
              <button type="button" style="padding: 7px 20px ; font-size: 15.5px;" onclick="performUpdate({{ $cities->id }})" class="btn btn-info">Update</button>
      <a href="{{ route('cities.index') }}" type="submit" class="btn btn-success">Go To Index</a>
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
