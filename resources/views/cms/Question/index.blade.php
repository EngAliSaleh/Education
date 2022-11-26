@extends('cms.dashboard')

@section('title', 'Questions ')

@section('styles')
@endsection

@section('main-title', ' Questions')
@section('sub-title', ' Questions')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-dark">
                    <a href="{{ route('questions.create') }}" class="btn btn-success " type="submit">Add New Question</a>

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
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>setting</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($questions as $question)
                                <tr>
                                    <td>{{ $question->id }}</td>
                                    <td> {{ $question->question }}</td>
                                    <td>{{ $question->answer }}</td>
                                    <td>{{ $question->created_at }}</td>
                                    <td>{{ $question->updated_at }}</td>
                                    

                                    <td class="btn-group-vertical">

                                        
                                        <a href="#" onclick="performDestroy({{ $question->id }},this )"
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
            let url = '/cms/admin/questions/' +id; //حطينا سلاش قبل بعد اسم الجدول عشان في بعديت باراميتر والي هوا ال اي دي 
            confirmDestroy(url, referance);
        }
    </script>
@endsection
