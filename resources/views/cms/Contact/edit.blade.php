{{-- @extends('cms.dashboard')

@section('title', 'Contact')

@section('styles')
@endsection

@section('main-title', 'Edit Contact')
@section('sub-title', 'Edit Contact')


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
               
                <div class="col-md-12">
                 
                    <div class="card card-dark mt-2">
                        <div >
                    
                        </div>
                  
                        <form>
                            @csrf
                            
                            <div class="card-body bg-dark">
                                <div class="form-group">
                                    <label for="contact_image"> Slider Image </label>
                                    <input type="file" class="form-control" name="contact_image" id="contact_image"
                                        placeholder=" Enter  Slider Image" value="{{ $contacts->contact_image}}">
                                </div>
                                

                               
                                
                                
                                
                            </div>
                

                            <div class="card-footer bg-dark">

                                <button style="padding: 7px 30px ; font-size: 16px" type="button"class="btn btn-primary" onclick="performUpdate({{ $sliders->id }})">Update   </button>
                                <a href="{{ route('contacts.index') }}" type="button" class="btn btn-info">Go To
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
        function performUpdate(id) {
            let formData = new FormData();
            formData.append('contact_image',document.getElementById('contact_image').files[0]);
            

            storeRoute('/cms/admin/contacts_update/'+id , formData)
        }
    </script>
@endsection --}}
