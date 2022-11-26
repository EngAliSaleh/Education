@extends('cms.dashboard')

@section('title', 'Reviews')

@section('styles')
@endsection

@section('main-title', 'Show Reviews')
@section('sub-title', 'Show Reviews')


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-dark mt-2">
                        <div>
                            {{-- <h3 class="card-title">Create City</h3> --}}
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            @csrf

                            <div class="card-body bg-dark">
                                <td>  <img class="img-circle img-bordered-sm" src="{{asset('storage/images/review/'.$reviews->reviewr_image)}}" width="60" height="60" alt="ReviewerImage"></td>

                                
                                <div class="form-group">
                                    <label for="reviewr_name"> Reviews Name </label>
                                    <input disabled type="text" class="form-control" name="reviewr_name" id="reviewr_name"
                                        placeholder=" Enter  Reviewr  Name" value="{{ $reviews->reviewr_name}}">
                                </div>


                                <div class="form-group col-md-12">
                                    <label for="reviewr_description">Reviews Describtion</label>
                                    <input disabled type="text" class="form-control" name="reviewr_description"
                                        id="reviewr_description" placeholder="Enter  Slider Title" value="{{ $reviews->reviewr_description}}">
                                </div>
                                <div class="form-group">
                                    <label for="reviewr_rating"> Reviews Rating </label>
                                    <select disabled class="form-control" name="reviewr_rating"
                                    id="reviewr_rating"aria-lable=".form-select-sm example
                                    style="width: 100%; >
                                    <option value="">All</option>
                                    <option selected>{{ $reviews->reviewr_rating }}</option>
                                    <option value="fas fa-starfasfa-star-half-alt">fas fa-star fas fa-star-half-alt</option>
                                    <option value="fas fa-starfas fa-star">fas fa-star fas fa-star</option>
                                    <option value="fas fa-starfas fa-starfas fa-star-half-alt">fas fa-star fas fas fa-star fas fa-star-half-alt</option>
                                    <option value="fas fa-starfas fa-starfas fa-star">fas fa-starfas fa-starfas fa-star</option>
                                    <option value="fas fa-starfas fa-starfas fa-starfas fa-star-half-alt">fas fa-star fas fa-star fas fa-star fas fa-star-half-alt</option>
                                    <option value="fas fa-starfas fa-starfas fa-starfas fa-star">fas fa-star fas fa-star fas fa-star fas fa-star fas fa-star-half-alt </option>
                                    <option value="fas fa-starfas fa-starfas fa-starfas fa-starfas fa-star ">fas fa-star fas fa-star fas fa-star fas fa-star fas fa-star</option>
                                    <option value="fas fa-starfas fa-starfas fa-starfas fa-starfas fa-starfas fa-star-half-alt">fas fa-star fas fa-star fas fa-star fas fa-star fas fa-star fas fa-star-half-alt</option>
                                    
                                </select>
                                </div>



                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer bg-dark">

                                <button style="padding: 7px 30px ; font-size: 16px" onclick="performUpdate({{ $reviews->id }})"
                                    class="btn btn-info">Update</button>
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
       
        function performUpdate(id) {
            let formData = new FormData();
            formData.append('reviewr_image',document.getElementById('reviewr_image').files[0]);
            formData.append('reviewr_name', document.getElementById('reviewr_name').value);
            formData.append('reviewr_description', document.getElementById('reviewr_description').value);
            formData.append('reviewr_rating', document.getElementById('reviewr_rating').value);

            storeRoute('/cms/admin/reviews_update/'+id , formData)
        }
    </script>
@endsection
