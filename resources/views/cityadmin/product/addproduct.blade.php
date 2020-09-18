@extends('cityadmin.layout.app')

<style>


sup {
    color:red;
    position: initial;
    font-size: 111%;
}
 
  .input{
  border-top-style: hidden;
  border-right-style: hidden;
  border-left-style: hidden;
  border-bottom-style: groove;

}
.no-outline:focus {
  outline: none;
}
		/* example of setting the width for multiselect */
		#testSelect1_multiSelect {
			width: 200px;
		}
		.multiselect-wrapper {
	width: 180px;
	display: inline-block;
	white-space: nowrap;
	font-size: 12px;
	font-family: "Segoe UI", Verdana, Helvetica, Sans-Serif;
}

.multiselect-wrapper .multiselect-input {
	width: 100%;
	padding-right: 50px;
}

.multiselect-wrapper label {
	display: block;
	font-size: 12px;
	font-weight : 600;
}

.multiselect-wrapper .multiselect-list {
	z-index: 1;
	position: absolute;
	display: none;
	background-color: white;
	border: 1px solid grey;
	border-bottom-left-radius: 2px;
	border-bottom-right-radius: 2px;
	margin-top: -2px;
}

	.multiselect-wrapper .multiselect-list.active {
		display: block;
	}

	.multiselect-wrapper .multiselect-list > span {
		font-weight: bold;
	}

	.multiselect-wrapper .multiselect-list .multiselect-checkbox {
		margin-right: 2px;
	}

	.multiselect-wrapper .multiselect-list > span,
	.multiselect-wrapper .multiselect-list li {
		cursor: default;
	}

.multiselect-wrapper .multiselect-list {
	padding: 5px;
	min-width: 200px;
}

.multiselect-wrapper ul {
	list-style: none;
	display: block;
	position: relative;
	padding: 0px;
	margin: 0px;
	max-height: 200px;
	overflow-y: auto;
	overflow-x: hidden;
}

	.multiselect-wrapper ul li {
		padding-right: 20px;
		display: block;
	}

		.multiselect-wrapper ul li.active {
			background-color: rgb(0, 102, 255);
			color: white;
		}

		.multiselect-wrapper ul li:hover {
			background-color: rgb(0, 102, 255);
			color: white;
		}

.multiselect-input-div {
	height: 34px;
}

	.multiselect-input-div input{
		border: 1px solid #ababab;
		background : #fff;
		margin: 5px 0 6px 0;
		padding: 5px;
		vertical-align:middle;
	}

.multiselect-count {
	position: relative;
	text-align: center;
	border-radius: 2px;
	background-color: lightblue;
	display: inline-block !important;
	padding: 2px 7px;
	left: -45px;
}

.multiselect-wrapper.disabled .multiselect-dropdown-arrow {
	border-top: 5px solid lightgray;
}

.multiselect-wrapper.disabled .multiselect-count {
	background-color: lightgray;
}

.multiselect-dropdown-arrow {
	width: 0;
	height: 0;
	border-left: 5px solid transparent;
	border-right: 5px solid transparent;
	border-top: 5px solid black;
	position: absolute;
	line-height: 20px;
	text-align: center;
	display: inline-block !important;
	margin-top: 17px;
	margin-left: -42px;
}



  </style>

@section ('content')
<div class="content-wrapper" onload="hidee()">
          <div class="row">
		  <div class="col-md-2">
		  </div>
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add product</h4>
				  <p id="show" onclick="showform()">+</p>
<p id="hide">-</p>
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
				  <p style="color:red"> Please add atleast one subcategory before adding product.</p>
                  <form class="forms-sample" id="p" action="{{route('AddNewproduct')}}" method="post" enctype="multipart/form-data">
				  <div id="data">
                      {{csrf_field()}}
                      <div class="form-group">
                    <label for="exampleFormControlSelect3">Choose a Category<sup>*</sup></label>
                    <select class="form-control form-control-sm req" id="exampleFormControlSelect3 " name="subcat_name" required>
                      @foreach($subcat as $subcat)
		          	<option value="{{$subcat->subcat_id}}"><span style="font-weight:bold">{{$subcat->category_name}}-></span>&nbsp;{{$subcat->subcat_name}}</option>
		              @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Product Name<sup>*</sup></label>
                      <input type="text" class="form-control req" id="exampleInputName1" name="product_name" placeholder="Enter Product name" required>
                    </div>
                      
                      <div class="form-group">
                      <label for="exampleInputName1">Brand Name</label><sup>*</sup>
                      <input type="text" class="form-control req" id="exampleInputName1" name="brand_name" placeholder="Enter Brand name" required>
                    </div>
                      
                      <div class="form-group">
                         <label>Main Product Image<sup>*</sup></label>(Should be of size 800*600 )
                      <div class="input-group col-xs-12">
                          <input type="file" name="main_image"  class="file-upload-default req" required>
                        </div>
                      </div>
                      
                     <div class="form-group">
                         <label>Product Image<sup>*</sup></label>(Should be of size c*d )
                      <div class="input-group col-xs-12">
                          <input type="file" name="img_1"  class="file-upload-default req" required>
                          <input type="file" name="img_2"  class="file-upload-default req" required>
                          <input type="file" name="img_3"  class="file-upload-default req" required>
                          <input type="file" name="img_4"  class="file-upload-default">
                          <input type="file" name="img_5"  class="file-upload-default">
                        </div>
                      </div>
                     
					 <div class="form-group">
                         <label>Product Video </label> ( Youtube/Website link of product )
                      <div class="input-group col-xs-12">
                         <input type="text" class="form-control" id="exampleInputName1" name="vedio" placeholder="Specify if any..">
                        </div>
                      </div>
					 
					<div class="form-group">
                      <label for="exampleInputName1">Technical Specifications<sup>*</sup></label><br>
            Category : <input type="text" class="no-outline input req" name="category[]" required>
            Category-Input : <input type="text" class="no-outline input req" name="value[]" required><br>
			<div id="dynamic_field">
			</div>
            <button type="button" name="add" id="add" class="btn btn-success">Add More</button><br><br>
                </div>
                      <div class="form-group">
                      <label for="exampleInputName1">Warranty / Guarantee (write exact details)</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="gaurantee" placeholder="Specify if any..">
                    </div>
                      
                      <div class="form-group">
                      <label for="exampleInputName1">Innovation</label><sup>*</sup>
                      <input type="text" class="form-control" id="exampleInputName1" required name="innovation" placeholder="Specify if any">
                    </div>
                      
                <div class="form-group">
                      <label for="exampleInputName1">MRP (INR)</label><sup>*</sup>
                      <input type="number" class="form-control req" id="exampleInputName1" name="mrp" placeholder="Enter MRP in INR" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Weight</label><sup>*</sup>
                      <input type="text" class="form-control req" id="exampleInputName1" name="weight" placeholder="Enter Weight of product" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Quantity</label><sup>*</sup>
                      <input type="number" class="form-control" id="exampleInputName1" name="qty" placeholder="Quantity for above the price" required>
                    </div>
                  
                   <div class="form-group">
                      <label for="exampleInputName1">Stock</label><sup>*</sup>
                      <input type="text" class="form-control req" id="exampleInputName1" name="stock" placeholder="Enter total  available stock " required>
                    </div>
					 <div class="form-group">
                      <label for="exampleInputName1">Discount</label><sup>*</sup>
                      <input type="number" class="form-control req" id="exampleInputName1" name="discount" placeholder="Enter Discount % (0%)" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Unit</label><sup>*</sup>
                      <input type="text" class="form-control req" id="exampleInputName1" name="unit"  placeholder="kg/ltrs/gm/pkts" required>
                    </div>  
                    <div class="form-group">
                      <label for="exampleInputName1">Product Description</label><sup>*</sup>
                      <input type="text" class="form-control req" id="exampleInputName1" name="product_description" placeholder="Enter Product Description" required>
                    </div>
                      
                      <div class="form-group">
                      <label>License (for manufacturing and selling)</label>  
                      <div class="input-group col-xs-12">	
                          <input type="file" name="license"  class="file-upload-default">
                        </div>
                      </div>
                    
                    <div class="form-group" style="display:none;">
                      <label>Innovation in product</label>  
                      <div class="input-group col-xs-12">
                          <input type="file" name="gov" class="file-upload-default">
                        </div>
                      </div>
                      
                      <div class="form-group">
                      <label>Pollution control board NOC (if required)</label>  
                      <div class="input-group col-xs-12">
                          <input type="file" name="noc"  class="file-upload-default">
                        </div>
                      </div>
					  </div>
					    <div class="form-group">
                    <label for="selectstate">Choose a state<sup>*</sup></label>
                   <select class="selectpicker req" multiple data-live-search="true"  id="testSelect1" name="cat[]" required>
				 <p> Please click on select cities after selecting states where you can deliver<p>*  
                      @foreach($states as $state)
		          	<option value="{{$state->state}}"><span style="font-weight:bold">{{$state->state}}</span></option>
		              @endforeach
                    </select>
                    </div>
<!--<p onclick="getvalues()">select cities</p>-->
                      
					  <div>
					  <div>
					
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
	   
	  <script src="{{url('public/js/multiselect/multiselect.min.js')}}"></script>
<script>

	document.multiselect('#testSelect1');
function getvalues(){
	
	 $("#data").hide(1000);
	 $("#show").show();
	 $("#hide").hide();
	 
	 var table='';
				 var select1 = document.getElementById("testSelect1");
			    var selected1 = [];
    for (var i = 0; i < select1.length; i++) {
        if (select1.options[i].selected) 
		{
			selected1.push(select1.options[i].value);
			 table +='<th>'+select1.options[i].value+'</th>';
		}
    }
	$('#cities').html(table);
    console.log(selected1);
}
function hidee() {
	alert();

    $("#show").hide();
 }
function showform(){
	 $("#data").show(1000);
	 $("#show").hide(); $("#hide").show();
	
}

</script>
</html>
@endsection