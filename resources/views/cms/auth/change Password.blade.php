@extends('cms.dashboard')

@section('title', 'change Password')

@section('styles')
@endsection

@section('main-title', 'change Password')

@section('sub-title', 'change Password')



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
                               
                                <div class="form-group col-md-12">
                                    <label for="password">Enter your current password </label>
                                    <input type="password" class="form-control"  id="password"
                                        placeholder="Enter current password">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="new_password">Enter the new password</label>
                                    <input type="password" class="form-control"  id="new_password"
                                        placeholder=" Enter new password ">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="new_password_confirmation">Confirm the new password</label>
                                    <input type="password" class="form-control"   id="new_password_confirmation"
                                        placeholder=" Enter new password Confirm ">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer bg-dark">

                                <button style="padding: 7px 30px ; font-size: 16px" type="button" onclick="performStore()" class="btn btn-info">Update</button>
                               
                                 

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
            formData.append('password', document.getElementById('password').value);
            formData.append('new_password', document.getElementById('new_password').value);
            formData.append('new_password_confirmation', document.getElementById('new_password_confirmation').value);
            store('/cms/admin/update/password', formData);
        }
    </script>
@endsection
