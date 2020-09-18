@extends('cityadmin.layout.app')
<style>
    sup{
        color:red;
        position:initial;
        font-size:111%;
    }
    </style>
@section ('content')

<div class="content-wrapper">
          <div class="row">
		  <div class="col-md-2">
		  </div>
            
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update product</h4>
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
                  <form class="forms-sample" action="{{route('update-product',$product->product_id)}}" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <div class="form-group">
                    <label for="exampleFormControlSelect3">Choose a Category</label>
                    <select class="form-control form-control-sm" id="exampleFormControlSelect3 " name="subcat_name">
                      @foreach($subcat as $subcat)
		          	    <option value="{{$subcat->subcat_id}}" @if($subcat->subcat_id == $product->subcat_id) selected @endif>
		          	        <span style="font-weight:bold">{{$subcat->category_name}}-></span>&nbsp;
		          	        {{$subcat->subcat_name}}
		          	    </option>
		              @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Product Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" value="{{$product->product_name}}" name="product_name" placeholder="Enter product Name">
                    </div>
                     <div class="form-group">
                      <label>Product image</label>
                      <div class="input-group col-xs-12">
                          <input type="file" name="img_1"  class="file-upload-default">
                          <input type="file" name="img_2"  class="file-upload-default">
                          <input type="file" name="img_3"  class="file-upload-default">
                          <input type="file" name="img_4"  class="file-upload-default">
                          <input type="file" name="img_5"  class="file-upload-default">
                        </div>
                      </div>
					  
					  					  <div class="form-group">
                      <label for="exampleInputName1" class="headd">Technical Specification</label><br>
					
						  @foreach($tech as $techs)
            Category : <input type="text" class="no-outline input" name="category" value="{{$techs->category}}" >
			 Category-Input : <input type="text" class="no-outline input" name="value" value="{{$techs->value}}">
            <a href="{{route('deletetechspech', $techs->id)}}" type="button" name="remove" id="{{$techs->id}}" class="btn btn-danger btn_remove">X</a><br>
			@endforeach
			<div id="dynamic_field">
			</div>
            <button type="button" name="add" id="add" class="btn btn-success">Add More</button><br><br>
			
                </div>

                  <div class="form-group">
                      <label for="exampleInputName1">MRP (INR)</label><sup>*</sup>
                      <input type="text" class="form-control" id="exampleInputName1" name="mrp" placeholder="Enter MRP" value="{{$product->mrp}}">
                    </div>  
                  <div class="form-group">
                      <label for="exampleInputName1">DISCOUNT (%)</label><sup>*</sup>
                      <input type="text" class="form-control" id="exampleInputName1" name="discount" placeholder="Enter discount %" value="{{$product->discount_price}}">
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputName1">Unit quantity</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="qty" value="{{$product->qty}}">
                    </div>
                     
                <div class="form-group">
                      <label for="exampleInputName1">Stock</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="stock" value="{{$product->stock}}" placeholder="Enter stock quantity in numbers">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Unit</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="unit" value="{{$product->unit}}">
                    </div>     
                     
                    <div class="form-group">
                      <label for="exampleInputName1">Product Description</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="product_description" value="{{$product->description}}" placeholder="Enter description">
                    </div>
                      
                  <div class="form-group">
                      <label>License (for manufacturing and selling)</label>  
                      <div class="input-group col-xs-12">
                          <input type="file" name="license"  class="file-upload-default">
                        </div>
                      </div>
                    
                    <div class="form-group">
                      <label>Additional government permissions (if required)</label>  
                      <div class="input-group col-xs-12">
                          <input type="file" name="gov"  class="file-upload-default">
                        </div>
                      </div>
                      
                      <div class="form-group">
                      <label>Pollution control board NOC (if required)</label>  
                      <div class="input-group col-xs-12">
                          <input type="file" name="noc"  class="file-upload-default">
                        </div>
                      </div>
                  
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    
                     <a href="{{route('product-cityadmin')}}" class="btn btn-light">Cancel</a>
                  </form>
                </div>
              </div>
            </div>
             <div class="col-md-2">
		  </div>
     
          </div>
        </div>
       </div> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
        	$(document).ready(function(){
        	
                $(".des_price").hide();
                
        		$(".img").on('change', function(){
        	        $(".des_price").show();
        			
        	});
        	});
</script>
@endsection