<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pawan Fiber</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ url('public/assets') }}/loginassets/images/icons/company.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ url('public/assets') }}/loginassets/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ url('public/assets') }}/loginassets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ url('public/assets') }}/loginassets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('public/assets') }}/loginassets/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ url('public/assets') }}/loginassets/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ url('public/assets') }}/loginassets/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('public/assets') }}/loginassets/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ url('public/assets') }}/loginassets/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('public/assets') }}/loginassets/css/util.css">
    <link rel="stylesheet" type="text/css" href="{{ url('public/assets') }}/loginassets/css/main.css">
    <!--===============================================================================================-->
</head>

<body style="background-color: #666666;">

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="{{ url('login') }}" method="POST">
                    @csrf
					<div class="login100-form-title p-b-43" style="height: 170px">
						<img src="{{url('public/assets')}}/loginassets/images/logo.png" style="height: 100%" alt="">
					</div>
					@if (session('error'))
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							{{session('error')}}
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					@endif
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="email" name="email" placeholder="Email">
					</div>
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
				<div class="login100-more" style="background-image: {{url('public/assets')}}/loginassets/images/gbr11.png">
				</div>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="{{url('public/assets')}}/loginassets/js/main.js"></script>

</body>
<<<<<<< Updated upstream

</html>


{{-- 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pawan Fiber</title>

    <!-- Font Icon -->
    <link rel="stylesheet"
        href="{{ url('public/assets') }}/csslogin/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ url('public/assets') }}/csslogin/css/style.css">
</head>

<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form action="{{ url('login') }}" method="POST">
                        @csrf
                        <h2>Pawan Fiber</h2>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" placeholder="Your Email" required />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" placeholder="Password" required />
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info form-submit"><i class="fa fa-save"></i>login</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{ url('public/assets') }}/csslogin/vendor/jquery/jquery.min.js"></script>
    <script src="{{ url('public/assets') }}/csslogin/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html> --}}
=======
</html>
>>>>>>> Stashed changes
