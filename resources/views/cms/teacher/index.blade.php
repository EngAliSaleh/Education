@extends('cms.dashboard')

@section('title', 'Teachers ')

@section('styles')
@endsection

@section('main-title', ' Teachers')
@section('sub-title', '  Teachers')


@section('content')
<div class="row ">
<div class="col-12">
<div class="card">
<div class="card-header  bg-dark">


<form action="" method="get" style="margin-bottom:2%;">
    <div class="row">

                <div class="input-icon col-md-2">
                    <input type="text" class="form-control" placeholder="Search By Email"
                       name='email' @if( request()->email) value={{request()->email}} @endif/>
                      <span>
                          <i class="flaticon2-search-1 text-muted"></i>
                      </span>
                    </div>
    <div class="col-md-4">
          <button class="btn btn-success btn-md" type="submit">Search filter</button>
          <a href="{{route('teachers.index')}}"  class="btn btn-danger">End search</a>
          <a href="{{route('teachers.create')}}"><button type="button" class="btn btn-md btn-info"> Add New Teacher </button></a>

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
                <th>Country</th>
                <th>City</th>
                <th>Gender</th>
                <th>status</th>
                <th>Address</th>
                <th>Level</th>
                <th>setting</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $teacher)
            <tr>

        <td>{{ $teacher->id }}</td>
        {{-- <td>  <img class="img-circle img-bordered-sm" src="{{asset('storage/images/teacher/'.$teacher->user->image)}}" width="60" height="60" alt="User Image"></td> --}}
        <td>{{ $teacher->user ? $teacher->user->first_name : 'Not Value' }}</td>
        <td>{{ $teacher->user ? $teacher->user->last_name : 'Not Value' }}</td>
        <td>{{ $teacher->email }}</td>
        <td>{{ $teacher->user ? $teacher->user->country->name : 'Not Value' }}</td>
        <td>{{ $teacher->user ? $teacher->user->city->name : 'Not Value' }}</td>
        <td>{{ $teacher->user ? $teacher->user->gender : 'Not Value' }}</td>
        <td>{{ $teacher->user ? $teacher->user->status : 'Not Value' }}</td>
        <td>{{ $teacher->user ? $teacher->user->address : 'Not Value' }}</td>
        <td>{{ $teacher->user ? $teacher->level : 'Not Value' }}</td>
                <td>
                    <div class="btn-group-vertical">
                        <a href="{{ route('teachers.edit', $teacher->id) }}" type="button"class="btn btn-info">Edite</a>

                        <a href="#" onclick="performDestroy({{ $teacher->id }},this )"class="btn btn-danger">Delete</a>
                        <a href="{{ route('teachers.show',$teacher->id) }}" type="button" class="btn btn-success">Show</a>
                    </div>
                  </td>

            </tr>
        @endforeach

        </tbody>
      </table>

</div>
<!-- /.card-body -->
{{ $teachers->links() }}
</div>
<!-- /.card -->
</div>
</div>
@endsection



@section('scripts')
<script>
function performDestroy(id, referance) {
let url = '/cms/admin/teachers/' + id; //حطينا سلاش قبل بعد اسم الجدول عشان في بعديت باراميتر والي هوا ال اي دي
confirmDestroy(url, referance);
}
</script>
@endsection
