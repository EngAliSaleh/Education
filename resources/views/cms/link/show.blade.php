@extends('cms.dashboard')

@section('title', 'Link')

@section('styles')
@endsection

@section('main-title', 'Show Link')
@section('sub-title', 'Show Linke')


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
                                    <label disabled for="icon"> Show Link </label>
                                    <select disabled  class="form-control" name="icon"
                                    id="icon"aria-lable=".form-select-sm example
                                    style="width: 100%;>
                                    <option disabled selected>{{ $links->icon }}</option>
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
    
@endsection
