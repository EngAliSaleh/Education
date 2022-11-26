@extends('cms.dashboard')

@section('title', 'Sliders')

@section('styles')
@endsection

@section('main-title', 'Edit slider')
@section('sub-title', 'Edit slider')


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
                                    <label for="slider_image"> Slider Image </label>
                                    <input type="file" class="form-control" name="slider_image" id="slider_image"
                                        placeholder=" Enter  Slider Image" value="{{ $sliders->slider_image}}">
                                </div>
                                

                                <div class="form-group col-md-12">
                                    <label for="slider_title">Slider Title</label>
                                    <input type="text" class="form-control" name="slider_title" id="slider_title"
                                        placeholder="Enter  Slider Title" value="{{ $sliders->slider_title}}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="slider_description"> Slider Description</label>
                                    <input type="text" class="form-control" name="slider_description" id="slider_description"
                                        placeholder="  Slider Descriotion "value="{{ $sliders->slider_description}}">
                                </div>
                                
                                
                                
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer bg-dark">

                                <button style="padding: 7px 30px ; font-size: 16px" type="button"class="btn btn-info" onclick="performUpdate({{ $sliders->id }})">Update   </button>
                                <a href="{{ route('sliders.index') }}" type="button" class="btn btn-success">Go To
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
            formData.append('slider_image',document.getElementById('slider_image').files[0]);
            formData.append('slider_title', document.getElementById('slider_title').value);
            formData.append('slider_description', document.getElementById('slider_description').value);

            storeRoute('/cms/admin/sliders_update/'+id , formData)
        }
    </script>
@endsection
