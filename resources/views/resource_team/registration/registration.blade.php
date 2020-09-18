<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Resource Team Login</title>

  <link href="{{url('public/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{url('public/css/sb-admin-2.min.css')}}" rel="stylesheet">
<style>
sup {
    color:red;
    position: initial;
    font-size: 111%;
}
</style>
</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">RESOURCE-TEAM PANEL</h1>
                    @if (count($errors) > 0)
                      @if($errors->any())
                        <div class="alert alert-secondary" role="alert">
                          <strong>ERROR : </strong>{{$errors->first()}}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                      @endif
                    @endif
                  </div>
                  <form class="user" method="post" action="{{route('fillregistration')}}">

                      {{csrf_field()}}
                      <div class="form-group">
                    <label for="exampleFormControlSelect3">Name<sup>*</sup></label>
                    <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Email<sup>*</sup></label>
                      <input type="email" class="form-control" id="exampleInputName1" name="email" placeholder="Enter Email">
                    </div>
                      <div class="form-group">
                      <label for="exampleInputName1">Password<sup>*</sup></label>
                      <input type="password" class="form-control" id="exampleInputName1" name="password" placeholder="Enter Password">
                    </div>
                      <div class="form-group">
                      <label for="exampleInputName1">Mobile Number</label><sup>*</sup>
                      <input type="int" class="form-control" id="exampleInputName1" name="contact" placeholder="Enter Mobile No.">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Address</label><sup>*</sup>
                      <input type="text" class="form-control" id="exampleInputName1" name="address" placeholder="Enter Address..">
                    </div>
                      <div class="form-group">
                      <label for="exampleInputName1">City</label><sup>*</sup>
                      <input type="text" class="form-control" id="exampleInputName1" name="city" placeholder="Enter City..">
                    </div>
                      
                    <button type="submit" class="btn btn-success mr-2">Register</button>
					<a href="{{route('resourceteamlogin')}}">Login</a>
                  </form>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
 <!-- Bootstrap core JavaScript-->
  <script src="{{url('public/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{url('public/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{url('public/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{url('public/js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{url('public/vendor/chart.js/Chart.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{url('public/js/demo/chart-area-demo.js')}}"></script>
  <script src="{{url('public/js/demo/chart-pie-demo.js')}}"></script>

</body>

</html>
