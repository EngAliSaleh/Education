@extends('cms.dashboard')

@section('title', 'Roles')

@section('styles')
@endsection

@section('main-title', 'Show Role')
@section('sub-title', 'Show Role')


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
                                    <select disabled class="form-control" name="guard_name" id="guard_name" style="width: 100%;"
                                        aria-label=".form-select-sm example">
                                        <option value="admin" @if ($roles->guard_name == 'admin') selected @endif>Admin
                                        </option>
                                        <option value="teacher" @if ($roles->guard_name == 'teacher') selected @endif>Teacher
                                        </option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name"> Role Name</label>
                                    <input disabled type="text" class="form-control" name="name" id="name"
                                        placeholder=" Enter Name Of Role " value="{{ $roles->name }}">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer bg-dark">

                                <button style="padding: 7px 30px ; font-size: 16px "type="button"
                                    onclick="performUpdate({{ $roles->id }})" class="btn btn-info">Update</button>
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
    
@endsection
