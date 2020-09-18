@extends('admin.layout.app')

@section ('content')
<div class="row">
  
<div class="col-md-3"></div>
		 <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"> Add City</h4>
                  <!-- <p class="card-description">
                    Basic form elements
                  </p> -->
                  <form class="forms-sample" action="{{route('insert-city')}}" method="post">
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
                         <label for="exampleInputName1">State </label>
                         <input type="text" class="form-control" name="state_name"  id="exampleInputName1" placeholder="State Name">
                      <label for="exampleInputName1">City Name</label>
                      <input type="text" class="form-control" name="city_name"  id="exampleInputName1" placeholder="City Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">City Pin Code</label>
                      <input type="text" class="form-control" name="city_pincode"  id="exampleInputName1" placeholder="City Pin Code">
                    </div>
                 <div class="form-group">
                      
                    </div>
                    
                    <!-- <div class="form-group">
                      <label for="exampleTextarea1">Textarea</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="2"></textarea>
                    </div> -->
                    <button type="submit" class="btn btn-success mr-2">Add</button>
                   <!--  <button class="btn btn-light">Cancel</button> -->
                  </form>
                </div>
              </div>
            </div>
  <div class="col-md-3"></div>

</div>
</div>
@endsection