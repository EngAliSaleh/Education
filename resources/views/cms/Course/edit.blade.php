@extends('cms.dashboard')

@section('title', 'Course')

@section('styles')
@endsection

@section('main-title', 'Edit Course')
@section('sub-title', 'Edit Course')


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
                                <div class="form-group">
                                    <label for="course_image"> Course Image </label>
                                    <input type="file" class="form-control" name="course_image" id="course_image"
                                        placeholder=" Enter  Course Image" value="{{ $courses->course_image }}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="subject_id">Subject Name</label>
                                    <select class="form-control" name="subject_id" style="width: 100%;" id="subject_id"
                                        aria-label=".form-select-sm example" >
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}" > {{ $subject->subject_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">Course Name</label>
                                    <input type="text" class="form-control" name="course_name" id="course_name"
                                        placeholder="Enter Course Name" value="{{ $courses->course_name }}" >
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="exampleInputPassword1">Course Title</label>
                                    <input type="text" class="form-control" name="course_title" id="course_title"
                                        placeholder=" Course Title " value="{{ $courses->course_title }}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="exampleInputPassword1">Course Description</label>
                                    <input type="text" class="form-control" name="course_description" id="course_description"
                                        placeholder="Enter Course Description "value="{{ $courses->course_description }}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="exampleInputPassword1">Course Module</label>
                                    <input type="text" class="form-control" name="course_module" id="course_module"
                                        placeholder=" Enter Course Module " value="{{ $courses->course_module }}" >
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="exampleInputPassword1">Course Hour</label>
                                    <input type="text" class="form-control" name="course_hour" id="course_hour"
                                        placeholder=" Enter Course Hour " value="{{ $courses->course_hour}}">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer bg-dark">

                                <button style="padding: 7px 30px ; font-size: 16px" type="button"class="btn btn-info" onclick="performUpdate({{ $courses->id }})">Update   </button>
                                <a href="{{ route('courses.index') }}" type="button" class="btn btn-success">Go To
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
        function performUpdate(id) {
            let formData = new FormData();
            formData.append('course_image',document.getElementById('course_image').files[0]);
            formData.append('course_name', document.getElementById('course_name').value);
            formData.append('course_title', document.getElementById('course_title').value);
            formData.append('course_description', document.getElementById('course_description').value);
            formData.append('course_module', document.getElementById('course_module').value);
            formData.append('course_hour', document.getElementById('course_hour').value);
            storeRoute('/cms/admin/courses_update/'+id , formData)
        }
    </script>
@endsection
