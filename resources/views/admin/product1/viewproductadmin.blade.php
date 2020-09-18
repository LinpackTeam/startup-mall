@extends('admin.layout.app')
@section ('content')
<div class="content-wrapper">
          <div class="row">
		  <div class="col-md-2">
		  </div>
            
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">View product</h4>
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
                  
				  
                   @foreach($product as $products)
                         
                         
                  <form class="forms-sample" enctype="multipart/form-data">
                     
                      
                    <div class="form-group">
                      <label for="exampleInputName1">Product Name</label> : {{$products->product_name}}
                      
                    </div>
                      <div class="form-group">
                      <label for="exampleInputName1">Brand Name</label> : {{$products->brand_name}}
                      
                    </div>
                     <div class="form-group"> 
                      <label>product image</label> : 
                       @foreach($image as $images)
                        @if($images->type =='p_img')
                    <embed src="{{url('public/').'/'.$images->path}}" style="width: 300px;">
                    @endif
                   @endforeach
                     
                      <div class="input-group col-xs-12">
                          
                        </div>
                      </div>
                      
					  <div class="form-group">
                      <label for="exampleInputName1" class="headd">Technical Specification</label><br>
					
					
						  @foreach($tech as $techs)
             {{$techs->category}} &nbsp;&nbsp;&nbsp;
            {{$techs->value}} <br>
			@endforeach
			
			
                </div>
					  
                  <div class="form-group">
                      <label for="exampleInputName1">MRP</label> : {{$products->mrp}}
                      
                    </div>  
                  
                    <div class="form-group">
                      <label for="exampleInputName1">Unit quantity</label> : {{$products->qty}}
                      
                    </div>
                     
                <div class="form-group">
                      <label for="exampleInputName1">Stock</label> : {{$products->stock}}
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Unit</label> : {{$products->unit}}
                      
                    </div>     
                     
                    <div class="form-group">
                      <label for="exampleInputName1">Product Description</label> : {{$products->description}}
                    </div>
                      
                  <div class="form-group">
                      <label>License (for manufacturing and selling)</label> : @foreach($image as $images)
                        @if($images->type =='license')
                    <embed src="{{url('public/').'/'.$images->path}}" style="width: 300px;">
                    @endif
                   @endforeach
                      <div class="input-group col-xs-12">
                        </div>
                      </div>
                    
                    <div class="form-group">
                      <label>Additional government permissions (if required)</label> : @foreach($image as $images)
                        @if($images->type =='gov')
                    <embed src="{{url('public/').'/'.$images->path}}"  style="width: 300px;">
                    @endif
                   @endforeach
                      <div class="input-group col-xs-12">
                          
                        </div>
                      </div>
                      
                      <div class="form-group">
                      <label>Pollution control board NOC (if required)</label> : @foreach($image as $images)
                        @if($images->type =='noc')
                    <embed src="{{url('public/').'/'.$images->path}}" style="width: 300px;">
                    @endif
                   @endforeach
                      <div class="input-group col-xs-12">
                          
                        </div>
                      </div>
                  </form>
                          <hr>
                          @endforeach
                     
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
