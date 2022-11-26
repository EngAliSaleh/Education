@extends('cms.dashboard')

@section('title', 'Course')

@section('styles')
@endsection

@section('main-title', 'Show Course')
@section('sub-title', 'Show Course')


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
                                    {{-- <input disabled type="file" class="form-control" name="course_image" id="course_image"
                                        placeholder=" Enter  Course Image" value="{{ $courses->course_image }}"> --}}
                                        <td> <img class="img-circle img-bordered-sm"
                                            src="{{ asset('storage/images/course/' . $courses->course_image) }}" width="80"
                                            height="80" alt="User Image"></td>
                                </div>
                                <br>
                                <div class="form-group col-md-12">
                                    <label for="country_id">Subject Name</label>
                                    <select disabled class="form-control" name="subject_id" style="width: 100%;" id="subject_id"
                                        aria-label=".form-select-sm example" >
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}" > {{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">Course Name</label>
                                    <input disabled type="text" class="form-control" name="course_name" id="course_name"
                                        placeholder="Enter Course Name" value="{{ $courses->course_name }}" >
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="exampleInputPassword1">Course Title</label>
                                    <input disabled type="text" class="form-control" name="course_title" id="course_title"
                                        placeholder=" Course Title " value="{{ $courses->course_title }}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="exampleInputPassword1">Course Description</label>
                                    <input disabled type="text" class="form-control" name="course_description" id="course_description"
                                        placeholder="Enter Course Description "value="{{ $courses->course_description }}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="exampleInputPassword1">Course Module</label>
                                    <input disabled type="text" class="form-control" name="course_module" id="course_module"
                                        placeholder=" Enter Course Module " value="{{ $courses->course_module }}" >
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="exampleInputPassword1">Course Hour</label>
                                    <input disabled type="text" class="form-control" name="course_hour" id="course_hour"
                                        placeholder=" Enter Course Hour " value="{{ $courses->course_hour}}">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer bg-dark">

                                <a href="{{ route('courses.index') }}" type="button" class="btn btn-info">Go To
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
    
@endsection
