@extends('cms.dashboard')
@section('title', 'Roles/Permissions')
@section('styles')
@endsection
@section('main-title', 'Roles/Permissions')
@section('sub-title', 'Roles/Permissions')



@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header bg-dark">
                            <h3 class="card-title"></h3>
                            {{-- <a href="{{ route('roles.index') }}" type="button"  class="btn btn-success">الأدوار</a> --}}

                            <div class="card-tools">
                                <div class="mx-auto pull-right">
                                    <div class="">
                                        <form action="{{ 'roles.permissions.index' }}" method="GET" role="search">
                                            <div class="input-group input-group-sm" style="width: 200px;">

                                                <input type="text" class="form-control mr-2" name="name"
                                                    placeholder="Search Role Permissions" id="name">

                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-default">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered table-striped table-dark">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th> Guard Name</th>
                                        <th> Permission</th>
                                        <th> Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            {{-- <span class="tag tag-success">Approved</span>s --}}
                                            <td>{{ $permission->id }}</td>
                                            <td>{{ $permission->guard_name }}</td>
                                            <td>{{ $permission->name }}</td>
                                           
                                            <td>
                                                <div class="icheck-info d-inline">
                                                    <input type="checkbox" id="permission_{{ $permission->id }}"
                                                        onchange="storeRolePermission({{ $roleId }},{{ $permission->id }})"
                                                        @if ($permission->active) checked @endif>
                                                    <label for="permission_{{ $permission->id }}">
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="card-footer bg-dark">
                        <a href="{{ route('roles.index') }}" type="button" class="btn btn-info">Back</a>
                        <a href="{{ route('permissions.index') }}" type="button" class="btn btn-info">Go To Permission</a>

                    </div>
                </div>
            </div>
        </div>
       
       
    </section>
@endsection

@section('scripts')

    <script>
        function storeRolePermission(roleId, permissionId) {
            let data = {
                permission_id: permissionId,
            };
            store('/cms/admin/roles/' + roleId + '/permissions', data);
        }
    </script>
@endsection
