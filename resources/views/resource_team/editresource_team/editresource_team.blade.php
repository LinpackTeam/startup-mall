@extends('resource_team.layout.app')

@section ('content')
<div class="row">
  
<div class="col-md-3"></div>
		 <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Resource Team</h4>
                  <!-- <p class="card-description">
                    Basic form elements
                  </p> -->
                  <form class="forms-sample" action="{{route('update-resource_team',[$admin->id])}}" method="post" enctype="multipart/form-data">
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
                      <label for="exampleInputName1"> Name</label>
                      <input type="text" class="form-control" name="name" value="{{$admin->name}}" id="exampleInputName1" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1"> Email</label>
                      <input type="text" class="form-control" name="email" value="{{$admin->login_id}}" id="exampleInputName1">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1"> Phone</label>
                      <input type="text" class="form-control" name="phone" value="{{$admin->contact}}" id="exampleInputName1">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1"> Alternate Phone</label>
                      <input type="text" class="form-control" name="phone2" value="{{$admin->phone2}}" id="exampleInputName1">
                    </div>
               
                    <div class="form-group">
                      <label for="exampleInputName1"> password</label>
                      <input type="password" class="form-control" name="pass" placeholder="enter new password if you want to change" id="exampleInputName1">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Re-type password</label>
                      <input type="password" class="form-control" name="password2"  placeholder="retype password" id="exampleInputName1">
                    </div>
                    
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                  
                  </form>
                </div>
              </div>
            </div>
  <div class="col-md-3"></div>

</div>
</div>
@endsection