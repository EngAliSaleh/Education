@extends('cms.dashboard')

@section('title', 'Subject')

@section('styles')
@endsection

@section('main-title', 'Edit Subject')
@section('sub-title', 'Edit Subject')


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
               
                <div class="col-md-12">
                  
                    <div class="card ">
                        
                        
                        <form>
                            @csrf
                            <div class="card-body bg-dark">
                                <div class="form-group">
                                    <label for="subject_image"> Subject Image </label>
                                    <input type="file" class="form-control" name="subject_image" id="subject_image"
                                        placeholder=" Enter SubjectI Image"  value="{{ $subjects->subject_image }}">
                                </div>
                                <div class="form-group">
                                    <label for="subject_name"> Subject Name</label>
                                    <input type="text" class="form-control" name="subject_name" id="subject_name"
                                        placeholder=" Enter Subject Name" value="{{ $subjects->subject_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="subject_module"> Subject Module</label>
                                    <input type="text" class="form-control" name="subject_module" id="subject_module"
                                        placeholder=" Enter Subject Name"  value="{{ $subjects->subject_module }}" >
                                </div>
                            </div>
                           

                            <div class="card-footer bg-dark">

                                <button style="padding: 7px 30px ; font-size: 16px" type="button " class="btn btn-info" onclick="performUpdate({{ $subjects->id }})">Update</button>
                                <a href="{{ route('subjects.index') }}" type="button" class="btn btn-success">Go To
                                    Index</a>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



@section('scripts')
    <script>
        function performUpdate(id){
            let formData = new FormData();
            formData.append('subject_image', document.getElementById('subject_image').files[0]);
            formData.append('subject_name' , document.getElementById('subject_name').value);
            formData.append('subject_module' , document.getElementById('subject_module').value);
           
            storeRoute('/cms/admin/subjects_update/' + id, formData);

        }
    </script>
@endsection
