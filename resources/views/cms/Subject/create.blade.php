@extends('cms.dashboard')

@section('title', 'Subject')

@section('styles')
@endsection

@section('main-title', 'Create Subject')
@section('sub-title', 'Create Subject')


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
                                    <label for="subject_image"> Subject Image </label>
                                    <input type="file" class="form-control" name="subject_image" id="subject_image"
                                        placeholder=" Enter Subject Image">
                                </div>
                                <div class="form-group">
                                    <label for="subject_name"> Subject Name</label>
                                    <input type="text" class="form-control" name="subject_name" id="subject_name"
                                        placeholder=" Enter Subject Name">
                                </div>
                                <div class="form-group">
                                    <label for="subject_module"> Subject Module</label>
                                    <input type="text" class="form-control" name="subject_module" id="subject_module"
                                        placeholder=" Enter Subject Name">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer bg-dark">

                                <button style="padding: 7px 30px ; font-size: 16px "type="button" onclick="performStore()" class="btn btn-info">Save</button>
                                <a href="{{ route('subjects.index') }}" type="button" class="btn btn-success">Go To
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
            formData.append('subject_image',document.getElementById('subject_image').files[0]);
            formData.append('subject_name' , document.getElementById('subject_name').value);
            formData.append('subject_module' , document.getElementById('subject_module').value);
            store('/cms/admin/subjects' , formData);
        }
    </script>
@endsection
