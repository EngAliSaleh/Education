@extends('cms.dashboard')

@section('title', 'Subjects ')

@section('styles')
@endsection

@section('main-title', ' Subjects')
@section('sub-title', ' Subjects')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-dark">
                 

                    <form action="" method="get" style="margin-bottom:2%;">
                        <div class="row">
                            <div class="input-icon col-md-2">
                                <input type="text" class="form-control" placeholder="Search By Name"
                                   name='subject_name' @if( request()->subject_name) value={{request()->subject_name}} @endif/>
                                  <span>
                                      <i class="flaticon2-search-1 text-muted"></i>
                                  </span>
                                </div>
            
                                
            
                                <div class="input-icon col-md-2">
                                <input type="date" class="form-control" placeholder="Search By Date"
                                   name='created_at' @if( request()->created_at) value={{request()->created_at}} @endif/>
                                  <span>
                                      <i class="flaticon2-search-1 text-muted"></i>
                                  </span>
                                </div>
            
                        <div class="col-md-4">
                              <button class="btn btn-success btn-md" type="submit">Search filter</button>
                              <a href="{{route('subjects.index')}}"  class="btn btn-danger">End search</a>
                              {{-- @can('Create-City') --}}
                                  
                              <a href="{{route('subjects.create')}}"><button type="button" class="btn btn-md btn-info"> Add New Subject </button></a>
                              {{-- @endcan --}}
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
                                <th>Subject Image</th>
                                <th>Subject Name</th>
                                <th>subject Module</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>setting</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subjects as $subject)
                                <tr>
                                    <td>{{ $subject->id }}</td>
                                    <td> <img class="img-circle img-bordered-sm"
                                            src="{{ asset('storage/images/subject/' . $subject->subject_image) }}"
                                            width="60" height="60" alt="User Image"></td>

                                    <td>{{ $subject->subject_name }}</td>
                                    <td>{{ $subject->subject_module }}</td>
                                    <td>{{ $subject->created_at }}</td>
                                    <td>{{ $subject->updated_at }}</td>
                                  


                                    <td class="btn-group-vertical">
                                        <a href="{{ route('subjects.edit', $subject->id) }}" type="button"
                                            class="btn btn-info">Edite</a>
                                        <a href="#" onclick="performDestroy({{ $subject->id }},this )"
                                            class="btn btn-danger">Delete</a>
                                        <a href="{{ route('subjects.show', $subject->id) }}" type="button"
                                            class="btn btn-success">Show</a>
                                    </td>


                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            

            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        function performDestroy(id, referance) {
            let url = '/cms/admin/subjects/' + id; //حطينا سلاش قبل بعد اسم الجدول عشان في بعديت باراميتر والي هوا ال اي دي 
            confirmDestroy(url, referance);
        }
    </script>
@endsection
