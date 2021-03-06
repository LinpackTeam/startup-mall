@extends('cityadmin.layout.app')

@section ('content')
<div class="row">
  
<div class="col-md-3"></div>
		 <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Cityadmin</h4>
                  <!-- <p class="card-description">
                    Basic form elements
                  </p> -->
                  <form class="forms-sample" action="{{route('update-cityadmin')}}" method="post" enctype="multipart/form-data">
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
                      <label for="exampleInputName1">Cityadmin Name</label>
                      <input type="text" class="form-control" name="name" value="{{$cityadmin->cityadmin_name}}" id="exampleInputName1" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Cityadmin Email</label>
                      <input type="text" class="form-control" name="email" value="{{$cityadmin->cityadmin_email}}" id="exampleInputName1">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Cityadmin Phone</label>
                      <input type="text" class="form-control" name="phone" value="{{$cityadmin->cityadmin_phone}}" id="exampleInputName1">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputName1">Cityadmin password</label>
                      <input type="password" class="form-control" name="pass" placeholder="enter new password if you want to change" id="exampleInputName1">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Retype password</label>
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