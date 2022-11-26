@extends('cms.dashboard')

@section('title', 'Links')

@section('styles')
@endsection

@section('main-title', 'Create Link')
@section('sub-title', 'Create Link')


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
                                <div class="form-group">
                                    <label for="icon"> Link </label>
                                    <select class="form-control" name="icon"
                                    id="icon"aria-lable=".form-select-sm example
                                    style="width: 100%;>
                                    <option value="">All</option>
                                    <option value="fab fa-facebook-f">fab fa-facebook-f</option>
                                    <option value="fab fa-twitter">fab fa-twitter</option>
                                    <option value="fab fa-instagram">fab fa-instagram</option>
                                    <option value="fab fa-linkedin">fab fa-linkedin</option>
                                    <option value="fab fa-discord">fab fa-discord</option>
                                    <option value="fab fa-snapchat">fab fa-snapchat</option>
                                    <option value="fab fa-github">fab fa-github</option>
                                </select>
                                </div>
                                

                                
                                
                                
                                
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer bg-dark">

                                <button style="padding: 7px 30px ; font-size: 16px" type="button" onclick="performStore()" class="btn btn-info">Save   </button>
                                <a href="{{ route('links.index') }}" type="button" class="btn btn-success">Go To
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
            
            formData.append('icon', document.getElementById('icon').value);
            

            store('/cms/admin/links', formData);
        }
    </script>
@endsection
