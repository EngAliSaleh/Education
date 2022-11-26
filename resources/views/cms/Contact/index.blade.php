@extends('cms.dashboard')

@section('title', 'Contacts ')

@section('styles')
@endsection

@section('main-title', ' Contacts')
@section('sub-title', ' Contacts')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-dark">

                    <form action="" method="get" style="margin-bottom:2%;">
                        <div class="row">
                            
                                    <div class="input-icon col-md-2">
                                        <input type="text" class="form-control" placeholder="Search By Email"
                                           name='contact_email' @if( request()->contact_email) value={{request()->contact_email}} @endif/>
                                          <span>
                                              <i class="flaticon2-search-1 text-muted"></i>
                                          </span>
                                        </div>
                                        <div class="input-icon col-md-2">
                                            <input type="text" class="form-control" placeholder="Search By Phone"
                                               name='contact_phone' @if( request()->contact_phone) value={{request()->contact_phone}} @endif/>
                                              <span>
                                                  <i class="flaticon2-search-1 text-muted"></i>
                                              </span>
                                            </div>
                        <div class="col-md-4">
                              <button class="btn btn-success btn-md" type="submit">Search filter</button>
                              <a href="{{route('contacts.index')}}"  class="btn btn-danger">End search</a>    
                             
                           
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
                                {{-- <th>Contact image</th> --}}
                                <th>Contact Name</th>
                                <th>Contact Email</th>
                                <th>Contact Phone</th>
                                <th>Contact Message </th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>setting</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->id }}</td>
                                    {{-- <td>  <img class="img-circle img-bordered-sm" src="{{asset('storage/images/contact/'.$contact->contact_image)}}" width="60" height="60" alt="Contact Image"></td> --}}
                                    <td> {{ $contact->contact_name }}</td>
                                    <td>{{ $contact->contact_email }}</td>
                                    <td>{{ $contact->contact_phone }}</td>
                                    <td>{{ $contact->contact_message }}</td>
                                    <td>{{ $contact->created_at }}</td>
                                    <td>{{ $contact->updated_at }}</td>
                                    

                                    <td class="btn-group-vertical">

                                        
                                        <a href="#" onclick="performDestroy({{ $contact->id }},this )"
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
            let url = '/cms/admin/contacts/' +id; //حطينا سلاش قبل بعد اسم الجدول عشان في بعديت باراميتر والي هوا ال اي دي 
            confirmDestroy(url, referance);
        }
    </script>
@endsection
