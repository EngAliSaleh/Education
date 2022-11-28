@extends('cms.dashboard')

@section('title', 'Teacher')

@section('styles')
@endsection

@section('main-title', 'Edit Teacher')
@section('sub-title', 'Edit Teacher')


@section('content')
    <section class="content bg-darkv">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-dark mt-2">
                        <div>
                            {{-- <h3 class="card-title">Edite Admin</h3> --}}
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            @csrf



                            <div class="card-body bg-dark">
                                <div>
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" class="form-control" name="image" id="image"
                                            placeholder=" Enter First Name" value="{{ $teachers->user->image }}">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="country_id">Country Name</label>
                                        <select class="form-control" name="country_id" id="country_id"
                                            aria-lable=".form-select-sm example" style="width: 100%;">
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="city_id">City Name</label>
                                        <select class="form-control" name="city_id" id="city_id"
                                            aria-lable=".form-select-sm example" style="width: 100%;">
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" name="first_name" id="first_name"
                                        placeholder=" Enter First Name"value="{{ $teachers->user->first_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" id="last_name"
                                        placeholder=" Enter Last Name" value="{{ $teachers->user->last_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder=" Enter Your Email" value="{{ $teachers->email }}">
                                </div>
                              
                         
                                <div class="form-group">
                                    <label for="level">Level</label>
                                    <input type="text" class="form-control" name="level" id="level"
                                        placeholder=" Enter Your level" value="{{ $teachers->level }}">
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select class="form-control" name="gender"
                                        id="gender"aria-lable=".form-select-sm example
                                        style="width:
                                        100%;>
                                        <option selected>{{ $teachers->user->gender }}</option>

                                        <option value="male">Male
                                        </option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Status</label>
                                    <select class="form-control" name="status"
                                        id="status"aria-lable=".form-select-sm example
                                        style="width:
                                        100%;>
                                        <option selected>{{ $teachers->user->status }}</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">InActive</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" class="form-control" name="mobile" id="mobile"
                                        placeholder=" Enter Mobile" value="{{ $teachers->user->mobile }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-check-label" for="date">Date Of Birth</label>
                                    <input type="date" class="form-control" name="date" id="date"
                                        placeholder="  Enter Date Of Birth" value="{{ $teachers->user->date }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-check-address" for="address">Address</label>
                                    <input type="text" class="form-control" name="address" id="address"
                                        placeholder=" Enter Address" value="{{ $teachers->user->address }}">
                                </div>
                            </div>
                            <!-- /.card-body -->


                        </form>
                        <!-- /.card-body -->

                        <div class="card-footer bg-dark">

                            <button type="button" style="padding: 7px 20px ; font-size: 15.5px;" onclick="performUpdate({{ $teachers->id }})"
                                class="btn btn-info">Update</button>
                            <a href="{{ route('teachers.index') }}" type="button" class="btn btn-success">Go To
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
            formData.append('image', document.getElementById('image').files[0]);
            formData.append('first_name', document.getElementById('first_name').value);
            formData.append('last_name', document.getElementById('last_name').value);
            formData.append('email', document.getElementById('email').value);
            // formData.append('password', document.getElementById('password').value);
            // formData.append('confirm_password', document.getElementById('confirm_password').value);
            formData.append('level', document.getElementById('level').value);
            formData.append('gender', document.getElementById('gender').value);
            formData.append('status', document.getElementById('status').value);
            formData.append('image', document.getElementById('image').files[0]);
            formData.append('mobile', document.getElementById('mobile').value);
            formData.append('date', document.getElementById('date').value);
            formData.append('address', document.getElementById('address').value);
            formData.append('city_id', document.getElementById('city_id').value);
            formData.append('country_id', document.getElementById('country_id').value);


            storeRoute('/cms/admin/teachers_update/' + id, formData);
        }
    </script>
@endsection
