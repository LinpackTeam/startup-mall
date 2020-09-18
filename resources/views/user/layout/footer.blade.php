<!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-newsletter" id="hide" data-aos="fade-up">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>For latest information on start-ups and promotional offers, subscribe to our newsletter</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top" id="gone">
      <div class="container">
        <div class="row">
		<div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="300">
		</div>

          <div class="col-lg-3 col-md-6 footer-contact" data-aos="fade-up" data-aos-delay="100">
            <h3>Start-up Mall</h3>
            <p>
             Gujarat<br><br>
              <strong>Phone:</strong> +91 97251 48432<br>
              <strong>Email:</strong> info@start-upmall.com<br>
            </p>
          </div>
          <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="200">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          
  

          <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="400">
            <h4>Get Us on Social Media</h4>
           <!-- <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>-->
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

  
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{url('public/css/css_for_admin/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{url('public/css/css_for_admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('public/css/css_for_admin/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{url('public/css/css_for_admin/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{url('public/css/css_for_admin/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{url('public/css/css_for_admin/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{url('public/css/css_for_admin/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{url('public/css/css_for_admin/vendor/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{url('public/css/css_for_admin/vendor/main.js')}}"></script>

</body>

</html>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
	<script type="text/javascript">
$(document).ready(function(){
    $('.search-box1 input[type="text"]').on("keyup input", function(){
	
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("/user/livesearch", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>