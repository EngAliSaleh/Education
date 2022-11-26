@extends('cms.dashboard')

@section('title', 'Subscribes ')

@section('styles')
@endsection

@section('main-title', ' Subscribe')
@section('sub-title', ' Subscribe')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-dark">

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
                              <a href="{{route('subscribes.index')}}"  class="btn btn-danger">End search</a>    
                             
                           
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
                                <th>Subscriber Email</th>
                                <th>setting</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subscribes as $subscribe)
                                <tr>
                                    <td>{{ $subscribe->id }}</td>
                                    <td> {{ $subscribe->email }}</td>
                                    
                                    

                                    <td class="btn-group-vertical">

                                        
                                        <a href="#" onclick="performDestroy({{ $subscribe->id }},this )"
                                            class="btn btn-danger">Delete</a>
                                        
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
            let url = '/cms/admin/subscribes/' +id; //حطينا سلاش قبل بعد اسم الجدول عشان في بعديت باراميتر والي هوا ال اي دي 
            confirmDestroy(url, referance);
        }
    </script>
@endsection
