@extends('cms.dashboard')

@section('title','Country')

@section('styles')
@endsection

@section('main-title' , 'Edit Country')
@section('sub-title' , 'edit Country')


@section('content')
<section class="content">
<div class="container-fluid">
<div class="row">
<!-- left column -->
<div class="col-md-12">
<!-- general form elements -->
<div class="card card-primary">
  <div>
    {{-- <h3 class="card-title">Edite Country</h3> --}}
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form>
  @csrf
    <div class="card-body bg-dark">
      <div class="form-group">
        <label for="name">Country Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Country Name" value="{{ $countries->name }}">
      </div>
      <div class="form-group">
        <label for="code">Country Code</label>
        <input type="text" class="form-control" name="code" id="code" placeholder=" Enter code Name" value="{{ $countries->code }}">
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer bg-dark">
      <button type="button" style="padding: 7px 30px ; font-size: 16px;" onclick="performUpdate({{ $countries->id }})" class="btn btn-info">Update</button>
      <a href="{{ route('countries.index') }}" type="submit" class="btn btn-success">Go To Index</a>
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
            formData.append('code' , document.getElementById('code').value);
            storeRoute('/cms/admin/countries_update/'+id , formData);
        }


</script>
@endsection
