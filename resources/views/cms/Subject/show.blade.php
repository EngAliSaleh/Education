@extends('cms.dashboard')

@section('title', 'Subject')

@section('styles')
@endsection

@section('main-title', ' Subject')
@section('sub-title', 'Show Subject')


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
                                    <td> <img class="img-circle img-bordered-sm"
                                        src="{{ asset('storage/images/subject/' . $subjects->subject_image) }}" width="80"
                                        height="80" alt="User Image"></td>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Subject Name</label>
                                    <input disabled type="text" class="form-control" name="subject_name" id="subject_name"
                                        placeholder=" Enter Subject Name" value="{{ $subjects->subject_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Subject Module</label>
                                    <input disabled type="text" class="form-control" name="subject_module" id="subject_module"
                                        placeholder=" Enter Subject Name"  value="{{ $subjects->subject_module }}" >
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer bg-dark">

                                <a href="{{ route('subjects.index') }}" type="button" class="btn btn-info">Go To
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
