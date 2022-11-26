@extends('cms.dashboard')

@section('title','Cities ')

@section('styles')
@endsection

@section('main-title' , 'Cities')
@section('sub-title' , '  Cities')


@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header  bg-dark">
          

          <form action="" method="get" style="margin-bottom:2%;">
            <div class="row">
                <div class="input-icon col-md-2">
                    <input type="text" class="form-control" placeholder="Search By Name"
                       name='name' @if( request()->name) value={{request()->name}} @endif/>
                      <span>
                          <i class="flaticon2-search-1 text-muted"></i>
                      </span>
                    </div>

                    <div class="input-icon col-md-2">
                        <input type="text" class="form-control" placeholder="Search By Street"
                           name='street' @if( request()->street) value={{request()->street}} @endif/>
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
                  <a href="{{route('cities.index')}}"  class="btn btn-danger">End search</a>
                  {{-- @can('Create-City') --}}
                      
                  <a href="{{route('cities.create')}}"><button type="button" class="btn btn-md btn-info"> Add New city </button></a>
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
                <th>Country </th> 
                <th>City</th>
                <th>Street Name</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>setting</th>
              </tr>
            </thead>
            <tbody>  
                @foreach ($cities as $city )
                <tr>
                    <td>{{ $city->id }}</td>
                    <td><span class="bg-warning" >{{ $city->country ? $city->country->name:"Not Value" }}</span></td>
                    <td> {{ $city->name }}</td>
                    <td> {{ $city->street }}</td>
                    <td>{{ $city->created_at }}</td>
                    <td>{{ $city->updated_at }}</td>   
                    
                    
                    <td>                        
                    <a  href="{{ route('cities.edit',$city->id) }}" type="button" class="btn btn-info">Edite</a>
                    <a href="#"  onclick="performDestroy({{ $city->id }},this )" class="btn btn-danger">Delete</a>
                    <a href="{{ route('cities.show',$city->id) }}" type="button" class="btn btn-success">Show</a>
                    </td>
                  </tr>
                @endforeach            
              
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        {{$cities->links()}}
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection

{{-- {{ $cities->links() }} --}}

@section('scripts')
<script>
    function performDestroy(id ,referance){
        let url = '/cms/admin/cities/' +id; //حطينا سلاش قبل بعد اسم الجدول عشان في بعديت باراميتر والي هوا ال اي دي 
        confirmDestroy(url , referance);
    }
</script>
@endsection
