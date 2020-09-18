@extends('resource_team.layout.app')
@section ('content')
<div class="content-wrapper">
          <div class="row">
		  <div class="col-md-2">
		  </div>
            
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Start-Up</h4>
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
                      <label for="exampleInputName1">Start-up ID</label> : {{$products->startup_id}}
                      
                    </div>
                      
                    <div class="form-group">
                      <label for="exampleInputName1">Start-up Name</label> : {{$products->name_startup}}
                      
                    </div>
                      <div class="form-group">
                      <label for="exampleInputName1">Founder Name</label> : {{$products->name_founder}}
                      
                    </div>
                     
                  <div class="form-group">
                      <label for="exampleInputName1">Email</label> : {{$products->email}}
                      
                    </div>  
                  
                    <div class="form-group">
                      <label for="exampleInputName1">Conatct</label> : {{$products->contact}}
                      
                    </div>
                     
                <div class="form-group">
                      <label for="exampleInputName1">Address</label> : {{$products->address}}
                      
				<div class="form-group"> 
                      <label>Address Proof</label> : 
					  {
                       @foreach($image as $images)
                        @if($images->type =='address_proof')
                   <embed src="{{url('public/startupdocs/success/').'/'.$images->path}}"  style="width: 300px;">
                    @endif
                   @endforeach
                     
                      <div class="input-group col-xs-12">
                          
                        </div>
                      </div>
					  
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Date Of Incorporation</label> : {{$products->date_incorporation}}
                      
                    </div>     
                     
                    <div class="form-group">
                      <label for="exampleInputName1">Category</label> : {{$products->category}}
                    </div>
                      
                  <div class="form-group">
				  <div class="form-group">
                      <label for="exampleInputName1">Brief</label> : {{$products->brief}}
                    </div>
                      
                  <div class="form-group">
				  <div class="form-group">
                      <label for="exampleInputName1">Team Details</label> : {{$products->team_details}}
                    </div>
                      
                  <div class="form-group">
				  <div class="form-group">
                      <label for="exampleInputName1">DIPP number</label> : {{$products->dipp_number}}
                    </div>
                      
				<div class="form-group"> 
                      <label>DIPP</label> : 
                       @foreach($image as $images)
                        @if($images->type =='DIPP')
                    <embed src="{{url('public/startupdocs/success/').'/'.$images->path}}"   style="width: 300px;">
                    @endif
                   @endforeach
                     
                      <div class="input-group col-xs-12">
                          
                        </div>
                      </div>
					  
                  <div class="form-group">
				  <div class="form-group">
                      <label for="exampleInputName1">Factory Address</label> : {{$products->fac_address}}
                    </div>
                     
                 <div class="form-group"> 
                      <label>Factory Image</label> : 
					 
                       @foreach($image as $images)
                        @if($images->type =='fac_img')
                    <embed src="{{url('public/startupdocs/success/').'/'.$images->path}}" style="width: 300px;">
                    @endif
                   @endforeach
                     
                      <div class="input-group col-xs-12">
                          
                        </div>
                      </div> 
					 
                  <div class="form-group">
				  <div class="form-group">
                      <label for="exampleInputName1">Website</label> : {{$products->website}}
                    </div>
                      
                  <div class="form-group">
				  <div class="form-group">
                      <label for="exampleInputName1">Social Media</label> : {{$products->socialmedia}}
                    </div>
                      
                  <div class="form-group">
				  <div class="form-group">
                      <label for="exampleInputName1">Udhyog Adhar</label> : {{$products->udhyog_aadhar}}
                    </div>
                      
                  <div class="form-group">
				  <div class="form-group">
                      <label for="exampleInputName1">PAN</label> : {{$products->PAN}}
                    </div>
                     
                    <div class="form-group"> 
                      <label>PAN Image</label> : 
                       @foreach($image as $images)
                        @if($images->type =='PAN_img')
                    <embed src="{{url('public/startupdocs/success/').'/'.$images->path}}"  style="width: 300px;">
                    @endif
                   @endforeach
                     
                      <div class="input-group col-xs-12">
                          
                        </div>
                      </div>
					 
                  <div class="form-group">
				  <div class="form-group">
                      <label for="exampleInputName1">Bank Name</label> : {{$products->bank_name}}
                    </div>
                      
                  <div class="form-group">
				  <div class="form-group">
                      <label for="exampleInputName1">Branch</label> : {{$products->branch}}
                    </div>
 
                  <div class="form-group">
				  <div class="form-group">
                      <label for="exampleInputName1">Account No.</label> : {{$products->acc_num}}
                    </div>
                       <div class="form-group">
				  <div class="form-group">
                      <label for="exampleInputName1">Account Holder Name</label> : {{$products->acc_holder_name}}
                    </div>
					  
                  <div class="form-group">
				  <div class="form-group">
				  <div class="form-group">
                      <label for="exampleInputName1">IFSC Code</label> : {{$products->ifsc_code}}
                    </div>
                      
                  <div class="form-group">
				  <div class="form-group">
				  <div class="form-group">
                      <label for="exampleInputName1">GST</label> : {{$products->gst}}
                    </div>
                      
                  <div class="form-group">
				  <div class="form-group">
				  <div class="form-group">
                      <label for="exampleInputName1">Solution</label> : {{$products->solution}}
                    </div>
                      
                  <div class="form-group">
				  <div class="form-group">
				  <div class="form-group">
                      <label for="exampleInputName1">Other Address Type</label> : {{$products->othr_addr_type}}
                    </div>
                      
                  <div class="form-group">
				  
				  
				  
				  
				  
                  <!--    <label>License (for manufacturing and selling)</label> : @foreach($image as $images)
                        @if($images->type =='license')
                    <img src="{{url($images->path)}}" style="width: 300px;">
                    @endif
                   @endforeach
                      <div class="input-group col-xs-12">
                         
                        </div>
                      </div>
                    
                    <div class="form-group">
                      <label>Additional government permissions (if required)</label> : @foreach($image as $images)
                        @if($images->type =='gov')
                    <img src="{{url($images->path)}}"  style="width: 300px;">
                    @endif
                   @endforeach
                      <div class="input-group col-xs-12">
                          
                        </div>
                      </div>
                      
                      <div class="form-group">
                      <label>Pollution control board NOC (if required)</label> : @foreach($image as $images)
                        @if($images->type =='noc')
                    <img src="{{url($images->path)}}" style="width: 300px;">
                    @endif
                   @endforeach
                      <div class="input-group col-xs-12">
                          
                        </div>
                      </div> -->
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
