@extends('cms.dashboard')

@section('title', 'Roles')

@section('styles')
@endsection

@section('main-title', 'Create Role')
@section('sub-title', 'Create Role')


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
                                    <label for="guard_name">Guard Name</label>
                                    <select class="form-control" name="guard_name" id="guard_name" style="width: 100%;"
                                        aria-label=".form-select-sm example">
                                        <option value="admin">Admin</option>
                                        <option value="teacher">Teacher</option>


                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name"> Role Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder=" Enter Name Of Role ">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer bg-dark">

                                <button style="padding: 7px 30px ; font-size: 16px "type="button" onclick="performStore()"
                                    class="btn btn-info">Save</button>
                                <a href="{{ route('roles.index') }}" type="button" class="btn btn-success">Go To
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
            formData.append('guard_name', document.getElementById('guard_name').value);
            formData.append('name', document.getElementById('name').value);
            store('/cms/admin/roles', formData);
        }
    </script>
@endsection
