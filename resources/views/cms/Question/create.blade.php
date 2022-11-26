@extends('cms.dashboard')

@section('title', 'Questions')

@section('styles')
@endsection

@section('main-title', 'Create Question')
@section('sub-title', 'Create Question')


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-dark mt-2">
                        <div >
                            {{-- <h3 class="card-title">Create City</h3> --}}
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            @csrf
                            
                            <div class="card-body bg-dark">
                                <div class="form-group col-md-12">
                                    <label for="question">Question</label>
                                    <input type="text" class="form-control" name="question" id="question"
                                        placeholder=" Enter  Question">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="answer">Answer</label>
                                    <input type="text" class="form-control" name="answer" id="answer"
                                        placeholder=" Enter  Answer ">
                                </div>
                                

                                
                                
                                
                                
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer bg-dark">

                                <button style="padding: 7px 30px ; font-size: 16px" type="button" onclick="performStore()" class="btn btn-info">Save   </button>
                                <a href="{{ route('questions.index') }}" type="button" class="btn btn-success">Go To
                                    Index</a>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection



@section('scripts')
    <script>
        function performStore() {
            let formData = new FormData();
            
            formData.append('question', document.getElementById('question').value);
            formData.append('answer', document.getElementById('answer').value);
            

            store('/cms/admin/questions', formData);
        }
    </script>
@endsection
