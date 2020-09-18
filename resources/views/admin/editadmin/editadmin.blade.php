@extends('admin.layout.app')

@section ('content')
<div class="row">
  
<div class="col-md-3"></div>
		 <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update admin</h4>
                  <!-- <p class="card-description">
                    Basic form elements
                  </p> -->
                  <form class="forms-sample" action="{{route('update-admin',[$admin->id])}}" method="post" enctype="multipart/form-data">
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
                      <label for="exampleInputName1">Admin Name</label>
                      <input type="text" class="form-control" name="admin_name" value="{{$admin->admin_name}}" id="exampleInputName1" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Admin Email</label>
                      <input type="text" class="form-control" name="admin_email" value="{{$admin->admin_email}}" id="exampleInputName1">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Admin Phone</label>
                      <input type="text" class="form-control" name="admin_phone" value="{{$admin->admin_phone}}" id="exampleInputName1">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Admin Alternate Phone</label>
                      <input type="text" class="form-control" name="admin_phone2" value="{{$admin->admin_phone2}}" id="exampleInputName1">
                    </div>
                   <div class="form-group">
                      <label>admin Image</label>
                      <input type="hidden" name="old_admin_image" value="{{$admin->admin_image}}">
                      <div class="input-group col-xs-12">
                      <input type="file" name="admin_image" class="file-upload-default">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Admin password</label>
                      <input type="password" class="form-control" name="admin_pass" placeholder="enter new password if you want to change" id="exampleInputName1">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">retype password</label>
                      <input type="password" class="form-control" name="password2"  placeholder="retype password" id="exampleInputName1">
                    </div>
                    <!-- <div class="form-group">
                      <label for="exampleTextarea1">Textarea</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="2"></textarea>
                    </div> -->
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