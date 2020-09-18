@extends('admin.layout.app')

@section ('content')
<div class="row">
  
<div class="col-md-3"></div>
		 <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Logo</h4>
                  <!-- <p class="card-description">
                    Basic form elements
                  </p> -->
                  <form class="forms-sample" action="{{route('update-logo')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                     @if (count($errors) > 0)
                    @if($errors->any())
                   <div class="alert alert-primary" role="alert">
                  <strong>SUCCESS : </strong>{{$errors->first()}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
                  </div>
                  @endif
                 @endif
                    <div class="form-group">
                      <label for="exampleInputName1">Logo Name</label>
                      <input type="text" class="form-control" name="logo_name" value="{{$logo->logo_name}}" id="exampleInputName1" placeholder="Logo Name">
                    </div>
                   <div class="form-group">
                      <label>Current logo Image</label><br>
                      <img src="{{url($logo->logo_image)}}" style="width:100px"><hr>
                      
                      <label>Change logo Image</label>
                      <input type="hidden" name="old_logo_image" value="{{$logo->logo_image}}">
                      <div class="input-group col-xs-12">
                      <input type="file" name="logo_image" class="file-upload-default">
                      </div>
                    </div><br><br>
                    
                    
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                   <!--  <button class="btn btn-light">Cancel</button> -->
                  </form>
                </div>
              </div>
            </div>
  <div class="col-md-3"></div>

</div>
</div>
@endsection