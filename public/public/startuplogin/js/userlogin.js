$(document).on('click', '#submit_button', function(e){	
	/* handling form validation */
	$("#login-form").validate({
		rules: {
			password: {
				required: true,
			},
			username: {
				required: true,
				email: true
			},
		},
		messages: {
			password:{
			  required: "Please enter your password"
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
			
			url  : '/user/checklogin',
			data : data,
			dataType: "json",
			beforeSend: function(){	
				$("#error").fadeOut();
				$("#login_button").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
			},
			success : function(response){	
		
			
			if($.trim(response.status) === "2"){
			document.getElementById("status").value = "4";
			 document.getElementById("input_mobile").disabled = true;
				   
					document.getElementById("otp").style.display = "block";	
			}
				
				
				else if($.trim(response.status) === "3") {	
				    document.getElementById("status").value = "5";
				    document.getElementById("input_mobile").disabled = true;
					document.getElementById("otp").style.display = "block";					
				}
					else if($.trim(response.status) === "7") {	
				    document.getElementById("status").value = "8";
				    
					document.getElementById("otp").style.display = "none";					
					document.getElementById("name").style.display = "block";					
				}
				else if($.trim(response.status) === "5") {
					
				     window.location.href = "/user";
				 }
				 else if($.trim(response.status) === "6") {
					 alert(response.msg);
				 }
					else
				{
				   console.log(response);	
				}
			}
		});
		return false;
	}
			   