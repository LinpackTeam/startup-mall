<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>


  <title>Startup mall</title>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

 
    
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
  font-size:13px;
}

h1 {
  text-align: center;  
}


/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
     /* css for Search bar */
    .search form {
  margin-top: 10px;
  background: #fff;
  padding: 6px 10px;
  position: relative;
  border-radius: 4px;
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
  text-align: left;
}
 .search form input[type="text"] {
  border: 0;
  padding: 4px 4px;
  width: calc(100% - 100px);
font-size:13px;
}
 .search form input[type="submit"] {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  border: 0;
  background: none;
  font-size: 16px;
  padding: 0 20px;
  background: #eb5d1e;
  color: #fff;
  transition: 0.3s;
  border-radius: 4px;
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
}

.search form input[type="submit"]:hover {
  background: #c54811;
}
    .form-control2{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
    }
    label{
        font-size: 15px;
        
        font-family: cursive; 
    }
    .parallax {
  /* The image used    */
  background-image:url("{{ asset('public/startuplogin/img/back.jpg') }}");

  /* Set a specific height */
  min-height: 400px; 

  /* Create the parallax scrolling effect */
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>
<body class="parallax fixed-top">
   <div style="padding:20px"></div>
    <form id="regForm" action="{{route('fill-startup')}}" class="php-email-form " method="POST" enctype="multipart/form-data" style="background: rgba(255, 255, 255, 0.9);border-radius: 25px;" >
	{{csrf_field()}}
  <h1>Register:</h1> <br>
        
        <hr><br>
  <!-- One "tab" for each step in the form: -->
  <div class="tab" >
  
       <h1>Part A</h1>
<input type="hidden" name="iddd" >
<input type="hidden" name="emaill" >
      <br>
	  @foreach($form_data as $form_dat)
    <div class="form-row" >
      <div class=" col-sm-6 col-md-6 col-lg-6">
      <label>Name of the start-up :</label> <input type="text" class="form-control2 req" value="{{$form_dat->name_startup}}"  name="startup_name" required>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-6">
       <label>Name of the founder :</label> <input type="text" class="form-control2 req" value="{{$form_dat->name_founder}}" name="founder_name" required>
      </div>
      <div class="clearfix"></div>
      <div class="col-sm-6 col-md-6 col-lg-6">
      <label>Email address of the firm :</label> <input type="email" class="form-control2 req" value="{{$email}}" disabled name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required><br>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-6">
       <label>Contact number of the firm :</label> <input type="number" value="{{$form_dat->contact}}" class="form-control2 req" name="contact" 
	    pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required><br>
      </div>
      <div class="clearfix"></div>
      <div class="col-sm-12 col-md-12 col-lg-12">
        <label>Registered Address of the firm:</label> <input type="text" class="form-control2 req" value="{{$form_dat->address}}"  name="address" required><br>
      </div>
    <div class="clearfix"></div>      
      </div>         
					</div>
  <div class="tab">
  <h1>part B</h1>        
      <br>
      <label>Date of Incorporation (Attach:legal doc:incorporation certificate,ROF proof etc) :</label> 
	    <div class="form-row" >
      <div class=" col-sm-6 col-md-6 col-lg-6"><input type="date" class="form-control2 req" value="{{$form_dat->date_incorporation}}" name="date_inc" required>
	  </div>
	   <div class=" col-sm-6 col-md-6 col-lg-6">
	   <input type="file" class="form-control2 req" name="INC_proof" >
	   </div>
	   </div>
	   
	  <br><label>Category :</label>   <select name="category[]" class="form-control2 " id="soft_skill_list" multiple="multiple" required>
	  @foreach($categories as $category)
	  <option value="{{$category->type}}">{{$category->type}}</option> 
	  @endforeach
	
       </select><br>                    
	   
	   <label>Brief about the start-up :</label> <input type="text" class="form-control2 req" placeholder="Problem your firm is addressing in 200 words"  value="{{$form_dat->brief}}" name="brief" required><br>
                    <input type="text" class="form-control2 req" placeholder="Solution to the above mentioned problem in 200 words" value="{{$form_dat->solution}}" name="solution" required><br>
                    <label>Team Details and their roles (in 200 words) :</label> <input type="text"  class="form-control2 req" name="team_details" value="{{$form_dat->team_details}}" placeholder="Breif about the and thier roles " required><br>
                    <label>DIPP number (if available):</label>
					
					
					 <div class="form-row" >
      <div class=" col-sm-6 col-md-6 col-lg-6"><input type="int" class="form-control2" value="{{$form_dat->dipp_number}}" name="dipp_number"></div>
	  
	   <div class=" col-sm-6 col-md-6 col-lg-6"> <input type="file" class="form-control2" name="DIPP"
	   placeholder="Please Insert Image here">	</div></div><br>
                    <label>Address of other facility (if available) :</label> <input type="text" value="{{$form_dat->fac_address}}"  class="form-control2" name="fac_address" ><br>
                    <label>Address proof of any of the above mentioned address(Rent Agreement/Electricity/Tax/Telephone bill etc) :</label> 
					 <div class="form-row" >
      <div class=" col-sm-6 col-md-6 col-lg-6"><select name="othr_addr_type" class="form-control2 req"><option value="Electricity">Electricity bill</option><option value="Tax">Tax bill</option><option value="Telephone">Telephone bill</option><option value="Rentagreement">Rent agreement</option><option value="ltr_under">Letter of Understanding with the owner</option><option value="
	  Proof_ownership">Proof of ownership</option></select>
	  </div>
	   <div class=" col-sm-6 col-md-6 col-lg-6">
	  <input type="file" class="form-control2 req" name="address_proof" placeholder="Please Insert Image here">
	   </div>
	   </div>
					<br>
                    <label>Office/Factory photographs (max 4 images) :</label>
							<div class="form-row" >
								  <div class=" col-sm-6 col-md-6 col-lg-6">
								   <input type="file" class="form-control2 req" name="fac_img1" >
							</div>
							<div class=" col-sm-6 col-md-6 col-lg-6">
							 <input type="file" class="form-control2 req" name="fac_img2" >
							</div>
							</div>
							<div class="form-row" >
								  <div class=" col-sm-6 col-md-6 col-lg-6">
								   <input type="file" class="form-control2 req" name="fac_img3" >
							</div>
							<div class=" col-sm-6 col-md-6 col-lg-6">
							 <input type="file" class="form-control2 req" name="fac_img4" >
							</div>
							</div>
							
	
                    
                    <label>Website (if any) :</label> <input type="url" class="form-control2" value="{{$form_dat->website}}"  name="website" ><br>
                    
                    <label> GSTIN (If Available):</label> 
					 <div class="form-row" >
      <div class=" col-sm-6 col-md-6 col-lg-6"> <input type="text" class="form-control2" value="{{$form_dat->gst}}" name="GSTinnumber" >
	  </div>
	   <div class=" col-sm-6 col-md-6 col-lg-6">
	   <input type="file" class="form-control2" name="GSTIN" >
	   </div>
	   </div><br>
	    <label> MSME (If Available):</label> 
					 <div class="form-row" >
      <div class=" col-sm-6 col-md-6 col-lg-6">
	  <input type="text" class="form-control2" value="{{$form_dat->udhyog_aadhar}}" name="MSMEnum" >
	  </div>
	   <div class=" col-sm-6 col-md-6 col-lg-6">
	   <input type="file" class="form-control2" name="MSME" >
	   
	   </div>
	   </div><br>         <label>Social media links (FB /Instagram / YouTube / Twitter) :</label> <input type="url" class="form-control2" value="{{$form_dat->socialmedia}}" name="social_website" ><br>
  </div>

                  
  <div class="tab">
  <h1>part C</h1>
     <label>PAN :</label> <input type="text" class="form-control2 req" value="{{$form_dat->PAN}}" name="PAN" required><br>
     Attach PAN here : <input type="file" name="PAN_img" required class="form-control2 req"><br>
                    <label>Bank Name :</label> <input type="text" class="form-control2 req" value="{{$form_dat->bank_name}}" name="bank_name" required><br>
                    <label>Branch :</label> <input type="text" class="form-control2 req" value="{{$form_dat->branch}}" name="branch" required><br>
                    <label>Account Holder Name :</label> <input type="text"  class="form-control2 req" value="{{$form_dat->acc_holder_name}}" name="acc_name" required><br>
                    <label>Account Number :</label> <input type="number" class="form-control2 req" name="acc_no" value="{{$form_dat->acc_num}}" required><br>
                    <label>IFSC Code :</label> <input type="text" class="form-control2 req" name="ifsc_code" value="{{$form_dat->ifsc_code}}" required><br>
  </div>
 
@endforeach

  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button  type="button"  id="submitButton" >Save</button>
      
	  
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
 
  </div>
        
</form>

<script>

jQuery('#soft_skill_list').multiselect({
        enableFiltering: true,
        maxHeight:400,
		buttonWidth:'400px',
        enableCaseInsensitiveFiltering:true, 
        nonSelectedText: 'Choose Startup Category (Max 5)', 
        numberDisplayed: 5, 
        selectAll: false, 
        onChange: function(option, checked) {
                // Get selected options.
                var selectedOptions = jQuery('#soft_skill_list option:selected');
 
                if (selectedOptions.length >= 5) {
                    // Disable all other checkboxes.
                    var nonSelectedOptions = jQuery('#soft_skill_list option').filter(function() {
                        return !jQuery(this).is(':selected');
                    });
 
                    nonSelectedOptions.each(function() {
                        var input = jQuery('input[value="' + jQuery(this).val() + '"]');
                        input.prop('disabled', true);
                        input.parent('li').addClass('disabled');
                    });
                }
                else {
                    // Enable all checkboxes.
                    jQuery('#soft_skill_list option').each(function() {
                        var input = jQuery('input[value="' + jQuery(this).val() + '"]');
                        input.prop('disabled', false);
                        input.parent('li').addClass('disabled');
                    });
                }
            }});
            
            
     /*Add This to Block SHIFT Key*/       
var shiftClick = jQuery.Event("click");
shiftClick.shiftKey = true;

    $(".multiselect-container li *").click(function(event) {
        if (event.shiftKey) {
           //alert("Shift key is pressed");
            event.preventDefault();
            return false;
        }
        else {
            //alert('No shift hey');
        }
    });

</script>

</script>
    <script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
   y = x[currentTab].getElementsByClassName("req");
   
   //here we are getting value by class name req.   and it will be an array
  // A loop that checks every input field in the current tab:
  
  for (i = 0; i < y.length; i++) {
    // If a field is empty... 
    if (y[i].value == "") {
      // add an "invalid" class to the field: if empty we are making it as invalid okay
      y[i].className += " invalid";
          y[i].style.backgroundColor = "#ffdddd";
      // and set the current valid status to false
      valid = false;
    
    }
      
  }
    
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>
<script>
$(document).ready(function() {
    $("#submitButton").click(function() {
 
        // using serialize function of jQuery to get all values of form
        var serializedData = $("#regForm").serialize();
 
        // Variable to hold request
        var request;
        // Fire off the request to process_registration_form.php
        request = $.ajax({
            url: "/startup/registration/saveajax",
            type: "post",
            data: serializedData
        });
 
        // Callback handler that will be called on success
        request.done(function(jqXHR, textStatus, response) {
            // you will get response from your php page (what you echo or print)
             // show successfully for submit message
            alert('Form have been saved successfully');
        });
 
        // Callback handler that will be called on failure
        request.fail(function(jqXHR, textStatus, errorThrown) {
            // Log the error to the console
            // show error
            $("#result").html('There is some error while submit');
            console.error(
                "The following error occurred: " +
                textStatus, errorThrown
            );
        });
 
        return false;
 
   });
});
</script>
 




</body>
</html>

