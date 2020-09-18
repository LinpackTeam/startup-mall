@extends('admin.layout.app')

@section ('content')



        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            @if (count($errors) > 0)
                      @if($errors->any())
                        <div class="alert alert-primary" role="alert">
                          {{$errors->first()}}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                      @endif
                  @endif
            	<form action="{{route('update_fcm')}}" method="post">   
    			{{csrf_field()}}
    			 <div class="form-group">
                  <label for="exampleInputName1">Usere FCM Server Key<sup>*</sup></label>
                  <input type="text" class="form-control" id="exampleInputName1" name="user_key" maxlength="6" value="{{$user_api_key}}" required>
    			</div>
                <div class="form-group">
                  <label for="exampleInputName1">Delivery Boy FCM Server Key<sup>*</sup></label>
                  <input type="text" class="form-control" id="exampleInputName1" name="dboy_key" value="{{$dboy_api_key}}" required>
    			</div>
    			<div class="modal-footer">
    			    <button type="submit" class="btn btn-success mr-2">Set FCM Server Key</button>
    			</div>
    			</form>
                                			
                                			
@endsection                                			
                   