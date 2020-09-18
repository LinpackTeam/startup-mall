<!DOCTYPE html>
                   <html>
               <head>
  <title>Email-verification</title><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .container{
                padding-left:10%;
                padding-top:3%;
                padding-bottom:3%;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div >
              
                <div class="col-xs-6" style="border: 5px solid #070F64; padding: 50px;" >
                <h1 style="font-family:cursive; color: #070F64"> Hi Start-Up,</h1><br>
                <img src="https://start-upmall.com/public/email_images/otp.png" class="img-responsive thumbnail" height="250px" width="400px">
                <p style="font-family:cursive">The OTP for verification of your email is {{ $otp }}</p><br><br>
                <p style="font-family:cursive">Thanks and Regards,<br>
                Admin<br>
                (+91 9725148432)<br>
                (Ahmedabad)<br></p>
                  <img src="http://start-upmall.com/public/email_images/Logo.png" width="100">
            </div>
            
            </div>
        </div>
    </body>
</html>