@extends('cms.dashboard')

@section('title','Courses ')

@section('styles')
@endsection

@section('main-title' , 'Courses')
@section('sub-title' , '  Courses')


@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header  bg-dark">


          <form action="" method="get" style="margin-bottom:2%;">
            <div class="row">
                <div class="input-icon col-md-2">
                    <input type="text" class="form-control" placeholder="Search By Course Name"
                       name='course_name' @if( request()->course_name) value={{request()->course_name}} @endif/>
                      <span>
                          <i class="flaticon2-search-1 text-muted"></i>
                      </span>
                    </div>
                    <div class="input-icon col-md-2">
                      <input type="text" class="form-control" placeholder="Search By Course Title"
                         name='course_title' @if( request()->course_title) value={{request()->course_title}} @endif/>
                        <span>
                            <i class="flaticon2-search-1 text-muted"></i>
                        </span>
                      </div>

                    

                    <div class="input-icon col-md-2">
                    <input type="date" class="form-control" placeholder="Search By created_at"
                       name='created_at' @if( request()->created_at) value={{request()->created_at}} @endif/>
                      <span>
                          <i class="flaticon2-search-1 text-muted"></i>
                      </span>
                    </div>

            <div class="col-md-4">
                  <button class="btn btn-success btn-md" type="submit">Search filter</button>
                  <a href="{{route('courses.index')}}"  class="btn btn-danger">End search</a>
                  {{-- @can('Create-City') --}}
                      
                  <a href="{{route('courses.create')}}"><button type="button" class="btn btn-md btn-info"> Add New Course </button></a>
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
                <th>Course Image </th> 
                <th>Subject Name</th>
                <th>Course Name</th>
                <th>Course Title</th>
                <th>Course Description</th>
                <th>Course Module</th>
                <th>Course Hour</th>
                {{-- <th>Created At</th>
                <th>Updated At</th> --}}
                <th>setting</th>
              </tr>
            </thead>
            <tbody>  
                @foreach ($courses as $course )
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>  <img class="img-circle img-bordered-sm" src="{{asset('storage/images/course/'.$course->course_image)}}" width="60" height="60" alt="User Image"></td>

                    <td><span class="bg-warning" >{{ $course->subject ? $course->subject->subject_name:"Not Value" }}</span></td>
                    <td> {{ $course->course_name }}</td>
                    <td> {{ $course->course_title }}</td>
                    <td> {{ $course->course_description }}</td>
                    <td> {{ $course->course_module }}</td>
                    <td> {{ $course->course_hour }}</td>
                    {{-- <td>{{ $course->created_at }}</td>
                    <td>{{ $course->updated_at }}</td> --}}
                    
                    
                    <td class="btn-group-vertical">                        
                    <a  href="{{ route('courses.edit',$course->id) }}" type="button" class="btn btn-info">Edite</a>
                    <a href="#"  onclick="performDestroy({{ $course->id }},this )" class="btn btn-danger">Delete</a>
                    <a href="{{ route('courses.show',$course->id) }}" type="button" class="btn btn-success">Show</a>
                    </td>
                  </tr>
                @endforeach            
              
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        {{ $courses->links() }}
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection



@section('scripts')
<script>
    function performDestroy(id ,referance){
        let url = '/cms/admin/courses/' +id; //حطينا سلاش قبل بعد اسم الجدول عشان في بعديت باراميتر والي هوا ال اي دي 
        confirmDestroy(url , referance);
    }
</script>
@endsection
