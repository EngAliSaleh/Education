{{-- @extends('cms.dashboard')

@section('title', 'Contact')

@section('styles')
@endsection

@section('main-title', 'Create Contact')
@section('sub-title', 'Create Contact')


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
                                    <label for="contact_image"> Contact Image </label>
                                    <input type="file" class="form-control" name="contact_image" id="contact_image"
                                        placeholder=" Enter  Contact Image">
                                </div>
                                

                               
                                
                                
                                
                            </div>
                           

                            <div class="card-footer bg-dark">

                                <button style="padding: 7px 30px ; font-size: 16px" type="button" onclick="performStore()" class="btn btn-primary">Save   </button>
                                <a href="{{ route('contacts.index') }}" type="button" class="btn btn-info">Go To
                                    Index</a>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection



@section('scripts')
    <script>
        function performStore() {
            let formData = new FormData();
            formData.append('contact_image',document.getElementById('contact_image').files[0]);
            
            

            store('/cms/admin/contacts', formData);
        }
    </script>
@endsection --}}
