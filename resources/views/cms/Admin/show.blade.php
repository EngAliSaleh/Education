@extends('cms.dashboard')

@section('title', 'Admin')

@section('styles')
@endsection

@section('main-title', 'Show Admin')
@section('sub-title', 'Show Admin')


@section('content')
    <section class="content bg-dark">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-dark mt-2">
                        <div >
                            {{-- <h3 class="card-title">Show Admin</h3> --}}
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            @csrf



                            <div class="card-body bg-dark">
                                <td> <img class="img-circle img-bordered-sm"
                                        src="{{ asset('storage/images/admin/' . $admins->user->image) }}" width="80"
                                        height="80" alt="User Image"></td>
                                <div>
                                    <br> 
                                    <div class="form-group">
                                        <label for="country_id">Country Name</label>
                                        <select disabled class="form-control" name="country_id" id="country_id"
                                            aria-lable=".form-select-sm example" style="width: 100%;">
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="city_id">City Name</label>
                                        <select disabled class="form-control" name="city_id" id="city_id"
                                            aria-lable=".form-select-sm example" style="width: 100%;">
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                            </div>

                            

                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input disabled type="text" class="form-control" name="first_name" id="first_name"
                                    placeholder=" Enter First Name"value="{{ $admins->user->first_name }}">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input disabled type="text" class="form-control" name="last_name" id="last_name"
                                    placeholder=" Enter Last Name" value="{{ $admins->user->last_name }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input disabled type="email" class="form-control" name="email" id="email"
                                    placeholder=" Enter Your Email" value="{{ $admins->email }}">
                            </div>
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input disabled type="password" class="form-control" name="password" id="password"
                                    placeholder=" Enter Your Password" value="{{ $admins->password }}">
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input disabled type="password" class="form-control" name="confirm_password" id="confirm_password"
                                    placeholder=" Enter Your Password" value="{{ $admins->confirm_password }}">
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select disabled class="form-control" name="gender"
                                    id="gender"aria-lable=".form-select-sm example
                                        style="width:
                                    100%;>
                                    <option selected>{{ $admins->user->gender }}</option>

                                    <option value="male">Male
                                    </option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select disabled class="form-control" name="status"
                                    id="status"aria-lable=".form-select-sm example
                                        style="width:
                                    100%;>
                                    <option selected>{{ $admins->user->status }}</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">InActive</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile</label>
                                <input disabled type="text" class="form-control" name="mobile" id="mobile"
                                    placeholder=" Enter Mobile" value="{{ $admins->user->mobile }}">
                            </div>
                            <div class="form-group">
                                <label class="date" for="date">Date Of Birth</label>
                                <input disabled type="date" class="form-control" name="date" id="date"
                                    placeholder="  Enter Date Of Birth" value="{{ $admins->user->date }}">
                            </div>
                            <div class="form-group">
                                <label class="form-check-address" for="address">Address</label>
                                <input disabled type="text" class="form-control" name="address" id="address"
                                    placeholder=" Enter Address" value="{{ $admins->user->address }}">
                            </div>
                    </div>
                    <!-- /.card-body -->


                    </form>
                    <!-- /.card-body -->

                    <div class="card-footer bg-dark">

                        <a href="{{ route('admins.index') }}" type="button" class="btn btn-info">Go To
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
