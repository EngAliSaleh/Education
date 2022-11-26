@extends('cms.dashboard')

@section('title', 'Sliders')

@section('styles')
@endsection

@section('main-title', 'Show slider')
@section('sub-title', 'Show slider')


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
                                <td>  <img class="img-circle img-bordered-sm" src="{{asset('storage/images/slider/'.$sliders->slider_image)}}" width="60" height="60" alt="User Image"></td>

                                

                                <div class="form-group col-md-12">
                                    <label for="slider_title">Slider Title</label>
                                    <input disabled type="text" class="form-control" name="slider_title" id="slider_title"
                                        placeholder="Enter  Slider Title" value="{{ $sliders->slider_title}}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="slider_description"> Slider Description</label>
                                    <input disabled type="text" class="form-control" name="slider_description" id="slider_description"
                                        placeholder="  Slider Descriotion "value="{{ $sliders->slider_description}}">
                                </div>
                                
                                
                                
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer bg-dark">

                                <a href="{{ route('sliders.index') }}" type="button" class="btn btn-info">Go To
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
