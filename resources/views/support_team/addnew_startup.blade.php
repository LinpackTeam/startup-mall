@extends('support_team.layout.app')
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
                  <h4 class="card-title">Add Start-Up</h4>
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
                  <form class="forms-sample" id="p" action="{{route('AddNewstartup_supportteam')}}" method="POST">
				  <div id="data">
                      {{csrf_field()}}
                     
                    <div class="form-group">
                      <label for="exampleInputName1">Start-up Name<sup>*</sup></label>
                      <input type="text" class="form-control req" id="exampleInputName1" name="startup_name" placeholder="Enter Start-up name" required>
                    </div>
                      
                      <div class="form-group">
                      <label for="exampleInputName1">Founder Name</label><sup>*</sup>
                      <input type="text" class="form-control req" id="exampleInputName1" name="founder_name" placeholder="Enter Founder name" required>
                    </div>
                      <div class="form-group">
                      <label for="exampleInputName1">Email ID</label><sup>*</sup>
                      <input type="text" class="form-control" id="exampleInputName1" name="email" placeholder="Enter Email ID" required>
                    </div>
                      
                      <div class="form-group">
                      <label for="exampleInputName1">Contact</label><sup>*</sup>
                      <input type="text" class="form-control" id="exampleInputName1" required name="contact" placeholder="Enter Mobile Number">
                    </div>
                   
					  </div>
					   
					  <div>
					  <div>
					
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                   
                     <a href="{{route('view-startup-support')}}" class="btn btn-light">Cancel</a>
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