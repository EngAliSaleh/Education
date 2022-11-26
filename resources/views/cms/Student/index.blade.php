@extends('cms.dashboard')

@section('title', 'Students ')

@section('styles')
@endsection

@section('main-title', ' Students')
@section('sub-title', '  Students')


@section('content')
<div class="row ">
<div class="col-12">
<div class="card">
<div class="card-header  bg-dark">


<form action="" method="get" style="margin-bottom:2%;">
    <div class="row">
        
                <div class="input-icon col-md-2">
                    <input type="text" class="form-control" placeholder="Search By Email"
                       name='student_email' @if( request()->student_email) value={{request()->student_email}} @endif/>
                      <span>
                          <i class="flaticon2-search-1 text-muted"></i>
                      </span>
                    </div>
    <div class="col-md-4">
          <button class="btn btn-success btn-md" type="submit">Search filter</button>
          <a href="{{route('students.index')}}"  class="btn btn-danger">End search</a>    
          <a href="{{route('students.create')}}"><button type="button" class="btn btn-md btn-info"> Add New Student </button></a>
       
    </div>

         </div>
</form>
</div>
<!-- /.card-header -->
<div class="card-body table-responsive p-0 ">
<table class="table table-bordered table-dark">
    <thead>
        <tr>
            <th>ID</th> 
            <th>image </th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            {{-- <th>password</th> --}}
            <th>Country</th>
            <th>City</th>
            <th>Gender</th>
            <th>status</th>
            <th>Address</th>
            <th>setting</th>
    
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
    <tr>
        
        <td>{{ $student->id }}</td>
        @if ($student->user)
        <td>  <img class="img-circle img-bordered-sm" src="{{asset('storage/images/student/'.  $student->user->image)}}" width="60" height="60" alt="User Image"></td>

        @else
            <td> No image</td>
        @endif
        <td>{{ $student->user ? $student->user->first_name : 'Not Value' }}</td>
        <td>{{ $student->user ? $student->user->last_name : 'Not Value' }}</td>
        <td>{{ $student->student_email }}</td>
        {{-- <td>{{ $student->password}}</td> --}}
        <td>{{ $student->user ? $student->user->country->name : 'Not Value' }}</td>
        <td>{{ $student->user ? $student->user->city->name : 'Not Value' }}</td>
        <td>{{ $student->user ? $student->user->gender : 'Not Value' }}</td>
        <td>{{ $student->user ? $student->user->status : 'Not Value' }}</td>
        <td>{{ $student->user ? $student->user->address : 'Not Value' }}</td>
        

        <td class="btn-group-vertical">
            <a href="{{ route('students.edit', $student->id) }}" type="button"
                class="btn btn-info">Edite</a>
                
            <a href="#" onclick="performDestroy({{ $student->id }},this )"
                class="btn btn-danger">Delete</a>
            <a href="{{ route('students.show',$student->id) }}" type="button" class="btn btn-success">Show</a>
        </td>
    </tr>
@endforeach
        
    </tbody>
    </table>

</div>

{{ $students->links() }}
</div>

</div>
</div>
@endsection



@section('scripts')
<script>
function performDestroy(id, referance) {
let url = '/cms/admin/students/' + id; //حطينا سلاش قبل بعد اسم الجدول عشان في بعديت باراميتر والي هوا ال اي دي 
confirmDestroy(url, referance);
}
</script>
@endsection