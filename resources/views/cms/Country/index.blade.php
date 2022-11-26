@extends('cms.dashboard')

@section('title','Countries ')

@section('styles')
@endsection

@section('main-title' , ' Countries')
@section('sub-title' , '  Countries')


@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-dark">
        

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
                        <input type="text" class="form-control" placeholder="Search By Code"
                           name='code' @if( request()->code) value={{request()->code}} @endif/>
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
                  <a href="{{route('countries.index')}}"  class="btn btn-danger">End search</a>
                  {{-- @can('Create-City') --}}
                      
                  <a href="{{route('countries.create')}}"><button type="button" class="btn btn-md btn-info"> Add New Country </button></a>
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
                <th>Country</th>
                <th>Code</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>setting</th>
              </tr>
            </thead>
            <tbody>  
                @foreach ($countries as $country )
                <tr>
                    <td>{{ $country->id }}</td>
                    <td> {{ $country->name }}</td>
                    <td>{{ $country->code }}</td>
                    <td>{{ $country->created_at }}</td>
                    <td>{{ $country->updated_at }}</td>                  
                    
                    <td class="btn-group">
                        
                    <a  href="{{ route('countries.edit',$country->id) }}" type="button" class="btn btn-info">Edite</a>
                    <a href="#"  onclick="performDestroy({{ $country->id }},this )" class="btn btn-danger">Delete</a>
                    <a href="{{ route('countries.show',$country->id) }}" type="button" class="btn btn-success">Show</a>
                    </td>
                  </tr>
                @endforeach            
              
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        {{$countries->links()}}
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection



@section('scripts')
<script>
    function performDestroy(id ,referance){
        let url = '/cms/admin/countries/' +id; //حطينا سلاش قبل بعد اسم الجدول عشان في بعديت باراميتر والي هوا ال اي دي 
        confirmDestroy(url , referance);
    }
</script>
@endsection
