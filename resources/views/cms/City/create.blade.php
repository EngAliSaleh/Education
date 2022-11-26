@extends('cms.dashboard')

@section('title', 'City')

@section('styles')
@endsection

@section('main-title', 'Create City')
@section('sub-title', 'Create City')


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-dark mt-2">
                        <div >
                            {{-- <h3 class="card-title">Create City</h3> --}}
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            @csrf
                            
                            <div class="card-body bg-dark">
                                <div class="form-group col-md-12">
                                    <label for="country_id">Country Name</label>
                                    <select class="form-control" name="country_id" style="width: 100%;" id="country_id"
                                        aria-label=".form-select-sm example" >
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}" > {{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="name">City Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Enter City Name">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="street">street</label>
                                    <input type="text" class="form-control" name="street" id="street"
                                        placeholder=" Enter City street ">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer bg-dark">

                                <button style="padding: 7px 30px ; font-size: 16px" type="button" onclick="performStore()" class="btn btn-info">Save   </button>
                                <a href="{{ route('cities.index') }}" type="button" class="btn btn-success">Go To
                                    Index</a>

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
        function performStore() {
            let formData = new FormData();
            formData.append('name', document.getElementById('name').value);
            formData.append('street', document.getElementById('street').value);
            formData.append('country_id', document.getElementById('country_id').value);
            store('/cms/admin/cities', formData);
        }
    </script>
@endsection
