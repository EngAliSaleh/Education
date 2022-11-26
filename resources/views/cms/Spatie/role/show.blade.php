@extends('cms.dashboard')

@section('title','Country')

@section('styles')
@endsection

@section('main-title' , 'Show country')
@section('sub-title' , 'Show')


@section('content')
<section class="content">
<div class="container-fluid">
<div class="row">
<!-- left column -->
<div class="col-md-12">
<!-- general form elements -->
<div >
  <div>
    {{-- <h3 class="card-title">Edite Country</h3> --}}
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form>
  @csrf
    <div class="card-body bg-dark">
      <div class="form-group">
        <label for="exampleInputEmail1">Country Name</label>
        <input disabled type="text" class="form-control" name="name" id="name" placeholder="Enter Country Name" value="{{ $countries->name }}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Country Code</label>
        <input disabled type="text" class="form-control" name="code" id="code" placeholder=" Enter code Name" value="{{ $countries->code }}">
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer bg-dark">
      <a href="{{ route('countries.index') }}" type="submit" class="btn btn-info">Go To Index</a>
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
 
@endsection
