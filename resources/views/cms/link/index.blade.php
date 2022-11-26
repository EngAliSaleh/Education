@extends('cms.dashboard')

@section('title', 'Links ')

@section('styles')
@endsection

@section('main-title', 'Links')
@section('sub-title', ' Links')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header  bg-dark">
                    <a href="{{ route('links.create') }}" class="btn btn-success " type="submit">Add New Link</a>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered table-dark">
                        <thead>
                            <tr>
                                <th>ID</th>
                                {{-- <th>Country </th>  --}}
                                <th>WebSite-Link</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($links as $link)
                                <tr>
                                    <td>{{ $link->id }}</td>
                                    {{-- <td><span >{{ $city->country ? $city->country->name:"Not Value" }}</span></td> --}}
                                    <td> {{ $link->icon }}</td>
                                    


                                    <td>
                                        <a href="{{ route('links.edit', $link->id) }}" type="button"
                                            class="btn btn-info">Edite</a>
                                        <a href="#" onclick="performDestroy({{ $link->id }},this )"
                                            class="btn btn-danger">Delete</a>
                                        <a href="{{ route('links.show', $link->id) }}" type="button"
                                            class="btn btn-success">Show</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
             
                <!-- /.card-body -->
                {{ $links->links() }}
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection



@section('scripts')
    <script>
        function performDestroy(id, referance) {
            let url = '/cms/admin/links/' + id; //حطينا سلاش قبل بعد اسم الجدول عشان في بعديت باراميتر والي هوا ال اي دي 
            confirmDestroy(url, referance);
        }
    </script>
@endsection
