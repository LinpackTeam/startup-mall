
@extends('cityadmin.layout.app')
@section ('content')
<style>
.headd{
	font-size: 1.2em;
}
</style>
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
                  @if(count($product)>0)
                   @foreach($product as $products)
                         
                         
                  <form class="forms-sample" enctype="multipart/form-data">
                      {{csrf_field()}}
                      
                    <div class="form-group">
                      <label for="exampleInputName1" class="headd">Product Name</label> : {{$products->product_name}}
                      
                    </div>
                      <div class="form-group">
                      <label for="exampleInputName1" class="headd">Brand Name</label> : {{$products->brand_name}}
                      
                    </div>
                     <div class="form-group"> 
                      <label>product image</label> : 
                       @foreach($image as $images)
                        @if($images->type =='p_img')
                    <img src="{{url('public/').'/'.$images->path}}" style="width: 300px;">
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
                      <label for="exampleInputName1" class="headd">MRP</label> : {{$products->mrp}}
                      
                    </div>  
                  
                    <div class="form-group">
                      <label for="exampleInputName1" class="headd">Unit quantity</label> : {{$products->qty}}
                      
                    </div>
                     
                <div class="form-group">
                      <label for="exampleInputName1" class="headd">Stock</label> : {{$products->stock}}
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1" class="headd">Unit</label> : {{$products->unit}}
                      
                    </div>     
                     
                    <div class="form-group">
                      <label for="exampleInputName1" class="headd">Product Description</label> : {{$products->description}}
                    </div>
                      
                  <div class="form-group">
                      <label>License (for manufacturing and selling)</label> : @foreach($image as $images)
                        @if($images->type =='license')
                    <img src="{{url('public/').'/'.$images->path}}" style="width: 300px;">
                    @endif
                   @endforeach
                      <div class="input-group col-xs-12">
                         
                        </div>
                      </div>
                    
                    <div class="form-group">
                      <label>Additional government permissions (if required)</label> : @foreach($image as $images)
                        @if($images->type =='gov')
                    <img src="{{url('public/').'/'.$images->path}}"  style="width: 300px;">
                    @endif
                   @endforeach
                      <div class="input-group col-xs-12">
                          
                        </div>
                      </div>
                      
                      <div class="form-group">
                      <label>Pollution control board NOC (if required)</label> : @foreach($image as $images)
                        @if($images->type =='noc')
                    <img src="{{url('public/').'/'.$images->path}}" style="width: 300px;">
                    @endif
                   @endforeach
                      <div class="input-group col-xs-12">
                          
                        </div>
                      </div>
                  </form>
                          <hr>
                          @endforeach
                      @endif
                   
                      
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