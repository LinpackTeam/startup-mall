$(document).on('click', '#submit_button', function(e){	
	/* handling form validation */
	$("#login-form").validate({
		rules: {
			email: {
				required: true,
			},
			username: {
				required: true,
				email: true
			},
		},
		messages: {
			email:{
			  required: "Please enter email"
			 },
			username: "Please enter your email address",
		},
		submitHandler: submitForm	
	});	
	});	

/* Handling login functionality */
	function submitForm() {	
		var data = $("#login-form").serialize();
		$.ajax({				
			type : 'POST',
			
			url  : '/startup/checklogin',
			data : data,
			dataType: "json",
			beforeSend: function(){	
				$("#error").fadeOut();
				$("#login_button").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
			},
			success : function(response){	
			   
			// var objJSON = JSON.parse(response);
		
			 
				if($.trim(response.status) === "3"){
					
				document.getElementById("status").value = "11";
					
					 document.getElementById("pwd").style.display = "block";
				
				} else if($.trim(response.status) === "2") {	
				    document.getElementById("status").value = "4";
				    document.getElementById("otp2").value = response.var;
					document.getElementById("otp").style.display = "block";					
				}
				else if($.trim(response.status) === "5") {
				     document.getElementById("pwd").style.display = "block";
				      document.getElementById("name").style.display = "block";
				       document.getElementById("mob").style.display = "block";
				       document.getElementById("otp").style.display = "none";
				       document.getElementById("email").style.display = "none";
				   
				       document.getElementById("otp2").value = '';
				 }
				 else if($.trim(response.status) === "6") {
					 alert(response.msg);
				 }
				 else if($.trim(response.status) === "10") {
					  window.location.href = "/startup/index";
					 
				 }
				  else if($.trim(response.status) === "12") {
					  window.location.href = "/startup/registration"; 
					 
				 }
				
				else
				{
				   console.log(response);	
				}
			}
		});
		return false;
	}

	/* Handling login functionality */
	function logout() {
		
		$.ajax({				
			type : 'POST',
			url  : 'response.php?action=logout',
			data : data,
			success : function(response){
				window.location.href = "/index.php";
			}
		});
		return false;
	}   
	$(document).on('click', '#button_mob_otp', function(e){
		var mobile =  $("#input_mobile").val();
  if(mobile.length==10)
{
		$.ajax({
			url:"/startup/mobileotpsend",
			method:"POST",
			data:$('#login-form').serialize(),
			success:function(data)
			{

                          document.getElementById("mob").style.display = "none";
document.getElementById("mob_otp").style.display = "block";

			}
		})
}
else
alert('Enter A valid Mobile Number');

});
	$(document).on('click', '#button_match_otp', function(e){
		var otpp =  $("#input_mobile_otp").val();

  if(otpp.length==6)
{
		$.ajax({
			url:"/startup/mobileotp_check",
			method:"POST",
			data:$('#login-form').serialize(),
			dataType: "json",
			success:function(response)
			{
                         if($.trim(response.status) === "8")
                              {
document.getElementById("status").value = "8";
                          document.getElementById("mob").style.display = "block";

document.getElementById("mob_otp").style.display = "none";
document.getElementById("button_mob_otp").style.display = "none";


                              }
else
{
document.getElementById("status").value = "20";

alert('invalid OTP');
}
			}
		})
}
else
alert('Enter A valid 6 digit Otp');

});

