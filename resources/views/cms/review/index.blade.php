@extends('cms.dashboard')

@section('title', 'Reviewrs ')

@section('styles')
@endsection

@section('main-title', ' Reviewrs')
@section('sub-title', ' Reviewrs')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-dark">
                    <a href="{{ route('reviews.create') }}" class="btn btn-success" type="submit">Add New Reviewr</a>

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
                                <th>Reviewr_Image</th>
                                <th>Reviewr Name</th>
                                <th>Reviewr Description</th>
                                <th>Reviewr Rating</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>setting</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reviews as $review)
                                <tr>
                                    <td>{{ $review->id }}</td>
                                    <td>  <img class="img-circle img-bordered-sm" src="{{asset('storage/images/review/'.$review->reviewr_image)}}" width="60" height="60" alt="ReviewerImage"></td>
                                    <td>{{ $review->reviewr_name }}</td>
                                    <td>{{ $review->reviewr_description }}</td>
                                    <td>{{ $review->reviewr_rating }}</td>
                                    <td>{{ $review->created_at }}</td>
                                    <td>{{ $review->updated_at }}</td>
                                    

                                    <td class="btn-group-vertical">                        
                                        <a  href="{{ route('reviews.edit',$review->id) }}" type="button" class="btn btn-info">Edite</a>
                                        <a href="#"  onclick="performDestroy({{ $review->id }},this )" class="  btn btn-danger">Delete</a>
                                        <a href="{{ route('reviews.show',$review->id) }}" type="button" class=" btn btn-success">Show</a>
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
            let url = '/cms/admin/reviews/' +id; //حطينا سلاش قبل بعد اسم الجدول عشان في بعديت باراميتر والي هوا ال اي دي 
            confirmDestroy(url, referance);
        }
    </script>
@endsection
