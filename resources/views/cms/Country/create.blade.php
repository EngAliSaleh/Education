@extends('cms.dashboard')

@section('title', 'Country')

@section('styles')
@endsection

@section('main-title', 'Create Country')
@section('sub-title', 'Create Country')


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card ">
                        <div>
                            {{-- <h3 class="card-title bg-dark">Create Country</h3> --}}
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            @csrf
                            <div class="card-body bg-dark">
                                <div class="form-group">
                                    <label for="name">Country Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Enter Country Name">
                                </div>
                                <div class="form-group">
                                    <label for="code"> Country Code</label>
                                    <input type="text" class="form-control" name="code" id="code"
                                        placeholder=" Enter Country code ">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer bg-dark">

                                <button style="padding: 7px 30px ; font-size: 16px "type="button" onclick="performStore()" class="btn btn-info">Save</button>
                                <a href="{{ route('countries.index') }}" type="button" class="btn btn-success">Go To
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
        function performStore(){
            let formData = new FormData();
            formData.append('name' , document.getElementById('name').value);
            formData.append('code' , document.getElementById('code').value);
            store('/cms/admin/countries' , formData);
        }
    </script>
@endsection
