@extends('cms.dashboard')

@section('title', 'Link')

@section('styles')
@endsection

@section('main-title', 'Edit Link')
@section('sub-title', 'Edit Linke')


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
                                    <label for="icon"> Edit Link </label>
                                    <select class="form-control" name="icon"
                                    id="icon"aria-lable=".form-select-sm example
                                    style="width: 100%;>
                                    <option selected>{{ $links->icon }}</option>
                                    <option value="facebook">fab fa-facebook-f</option>
                                    <option value="twitter">fab fa-twitter</option>
                                    <option value="instagram">fab fa-instagram</option>
                                    <option value="linkedin">fab fa-linkedin</option>
                                    <option value="discord">fab fa-discord</option>
                                    <option value="snapchat">fab fa-snapchat</option>
                                    <option value="github">fab fa-github</option>
                                </select>
                                </div>
                                

                                
                                
                                
                                
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer bg-dark">

                                <button style="padding: 7px 30px ; font-size: 16px" type="button" onclick="performUpdate({{ $links->id }})" class="btn btn-info">Update   </button>
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
        function performUpdate(id) {
            let formData = new FormData();
            
            formData.append('icon', document.getElementById('icon').value);
            

            storeRoute('/cms/admin/links_update/'+id, formData);
        }
    </script>
@endsection
