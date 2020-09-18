
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
                 
                          
                         
				  
				<form class="forms-sample form-inline" action="{{route('selecttwodates')}}" method="post">
                      {{csrf_field()}}
					 
					   Allocated Dates by Resource Team
					   
					   @foreach($dates as $date12)
					   
					  <input type="text" class="form-control" style="margin-right:6px" id="exampleInputName1" disabled name="a_date1" value="{{$date12->date}}">
					   <input type="text" class="form-control" style="margin-right:6px" id="exampleInputName1" disabled name="a_date2" value="{{$date12->date_alt}}"><br>
					 <input type="date" class="form-control" style="margin-right:6px" id="exampleInputName1" name="date_s" placeholder="Select a date from the above mentioned dates "><br>
					  <input type="text" class="form-control" style="margin-right:6px" id="exampleInputName1" name="query" placeholder="Write Query if you are not available on the any of the dates given above"><br>
					  <button class="btn btn-success" >Success</button>
					  @endforeach
				</form>
			 
                </div>
              </div>
            </div>
             <div class="col-md-2">
		  </div>
     
          </div>
        </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
function myFunction() {
  var x = document.getElementById("myDIV");
   var y = document.getElementById("reject");
      var z = document.getElementById("submit");
       var date = document.getElementById("dateall");
      
  
    x.style.display = "block";
    date.style.display = "none";
 
    y.style.display = "none";
     z.style.display = "block";
  
}
</script>
<script type="text/javascript">
        	$(document).ready(function(){
        	
                $(".des_price").hide();
                
        		$(".img").on('change', function(){
        	        $(".des_price").show();
        			
        	});
        	});
</script>
