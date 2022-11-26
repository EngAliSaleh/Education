@extends('cms.dashboard')

@section('title','Sliders ')

@section('styles')
@endsection

@section('main-title' , 'sliders')
@section('sub-title' , '  Sliders')


@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header  bg-dark">
          <a href="{{ route('sliders.create') }}"  class="btn btn-success" type="submit">Add New Slider</a>

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
                <th>Slider Image </th> 
                <th>Subject Title</th>
                <th>Slider Description</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>setting</th>
              </tr>
            </thead>
            <tbody>  
                @foreach ($sliders as $slider )
                <tr>
                    <td>{{ $slider->id }}</td>
                    <td>  <img class="img-circle img-bordered-sm" src="{{asset('storage/images/slider/'.$slider->slider_image)}}" width="60" height="60" alt="User Image"></td>
                    <td> {{ $slider->slider_title }}</td>
                    <td> {{ $slider->slider_description }}</td>
                    <td> {{ $slider->created_at }}</td>
                    <td> {{ $slider->updated_at }}</td>
                    
                  
                    {{-- <td>{{ $Slider->created_at }}</td>
                    <td>{{ $Slider->updated_at }}</td> --}}
                    
                    
                    <td class="btn-group-vertical">                        
                    <a  href="{{ route('sliders.edit',$slider->id) }}" type="button" class="btn btn-info">Edite</a>
                    <a href="#"  onclick="performDestroy({{ $slider->id }},this )" class="  btn btn-danger">Delete</a>
                    <a href="{{ route('sliders.show',$slider->id) }}" type="button" class=" btn btn-success">Show</a>
                    </td>
                  </tr>
                @endforeach            
              
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        {{ $sliders->links() }}
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection



@section('scripts')
<script>
    function performDestroy(id ,referance){
        let url = '/cms/admin/sliders/' +id; //حطينا سلاش قبل بعد اسم الجدول عشان في بعديت باراميتر والي هوا ال اي دي 
        confirmDestroy(url , referance);
    }
</script>
@endsection
