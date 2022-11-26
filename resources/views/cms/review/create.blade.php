@extends('cms.dashboard')

@section('title', 'Reviews')

@section('styles')
@endsection

@section('main-title', 'Create Reviews')
@section('sub-title', 'Create Reviews')


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
                                    <label for="reviewr_image"> Reviews Image </label>
                                    <input type="file" class="form-control" name="reviewr_image" id="reviewr_image"
                                        placeholder=" Enter  Slider Image">
                                </div>
                                <div class="form-group">
                                    <label for="reviewr_name"> Reviews Name </label>
                                    <input type="text" class="form-control" name="reviewr_name" id="reviewr_name"
                                        placeholder=" Enter  Reviewr  Name">
                                </div>
                                

                                <div class="form-group col-md-12">
                                    <label for="reviewr_description">Reviews Description</label>
                                    <input type="text" class="form-control" name="reviewr_description" id="reviewr_description"
                                        placeholder="Enter  Slider Title">
                                </div>
                                
                                <div class="form-group">
                                    <label for="reviewr_rating"> Reviews Rating </label>
                                    <select class="form-control" name="reviewr_rating"
                                    id="reviewr_rating"aria-lable=".form-select-sm example
                                    style="width: 100%;>
                                    <option value="">All</option>
                                    <option value="fas fa-star">fas fa-star</option>
                                    
                                   
                                    
                                    
                                </select>
                                </div>
                                
                                
                                
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer bg-dark">

                                <button style="padding: 7px 30px ; font-size: 16px" type="button" onclick="performStore()" class="btn btn-info">Save</button>
                                <a href="{{ route('reviews.index') }}" type="button" class="btn btn-success">Go To
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
            formData.append('reviewr_image',document.getElementById('reviewr_image').files[0]);
            formData.append('reviewr_name', document.getElementById('reviewr_name').value);
            formData.append('reviewr_description', document.getElementById('reviewr_description').value);
            formData.append('reviewr_rating', document.getElementById('reviewr_rating').value);
            

            store('/cms/admin/reviews', formData);
        }
    </script>
@endsection
