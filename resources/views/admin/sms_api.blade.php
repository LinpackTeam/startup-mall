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
            	<form action="{{route('update_sms_api')}}" method="post">   
    			{{csrf_field()}}
    			 <div class="form-group">
                  <label for="exampleInputName1">Sender ID<sup>*</sup></label>
                  <input type="text" class="form-control" id="exampleInputName1" name="sender_id" maxlength="6" value="{{$sender_id}}">
    			</div>
                <div class="form-group">
                  <label for="exampleInputName1">Set SMS api<sup>*</sup></label>
                  <input type="text" class="form-control" id="exampleInputName1" name="sms_api_key" value="{{$api_key}}">
    			</div>
    			<div class="modal-footer">
    			    <button type="submit" class="btn btn-success mr-2">Set SMS API Key</button>
    			</div>
    			</form>
                                			
                                			
@endsection                                			
                   