@extends('cms.dashboard')

@section('title', 'permissions ')

@section('styles')
@endsection

@section('main-title', ' permissions')
@section('sub-title', ' permissions')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-dark">

                    Permission</a>

                    <form action="" method="get" style="margin-bottom:2%;">
                        <div class="row">
                            <div class="input-icon col-md-2">
                                <input type="text" class="form-control" placeholder="Search By Guard"
                                   name='guard_name' @if( request()->guard_name) value={{request()->guard_name}} @endif/>
                                  <span>
                                      <i class="flaticon2-search-1 text-muted"></i>
                                  </span>
                                </div>
            
                                
            
                                <div class="input-icon col-md-2">
                                <input type="text" class="form-control" placeholder="Search By Name"
                                   name='name' @if( request()->name) value={{request()->name}} @endif/>
                                  <span>
                                      <i class="flaticon2-search-1 text-muted"></i>
                                  </span>
                                </div>
            
                        <div class="col-md-4">
                              <button class="btn btn-success btn-md" type="submit">Search filter</button>
                              <a href="{{route('roles.index')}}"  class="btn btn-danger">End search</a>
                      
                                  
                              <a href="{{route('roles.create')}}"><button type="button" class="btn btn-md btn-info"> Add New Roles </button></a>
                             
                        </div>
            
                             </div>
                    </form>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered table-dark">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Guard Name</th>
                                <th> Permission Name</th>
                                <th>setting</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->id }}</td>
                                    <td> {{ $permission->guard_name }}</td>
                                    <td>{{ $permission->name }}</td>


                                    <td class="btn-group">

                                        <a href="{{ route('permissions.edit', $permission->id) }}" type="button"
                                            class="btn btn-info">Edite</a>
                                        <a href="#" onclick="performDestroy({{ $permission->id }},this )"
                                            class="btn btn-danger">Delete</a>
                                        <a href="{{ route('permissions.show', $permission->id) }}" type="button"
                                            class="btn btn-success">Show</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                {{ $permissions->links() }}

            </div>

            <!-- /.card -->
        </div>
    </div>
@endsection



@section('scripts')
    <script>
        function performDestroy(id, referance) {
            let url = '/cms/admin/permissions/' +
                id; //حطينا سلاش قبل بعد اسم الجدول عشان في بعديت باراميتر والي هوا ال اي دي 
            confirmDestroy(url, referance);
        }
    </script>
@endsection
