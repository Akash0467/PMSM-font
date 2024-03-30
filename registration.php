<?php 
	require_once("config.php");
	if(isset($_POST["st_registar_btn"])){
		$st_name = $_POST["st_name"];
		$st_email = $_POST["st_email"];
		$st_mobile = $_POST["st_mobile"];
		$fname = $_POST["fname"];
		$fmobile = $_POST["fmobile"];
		$mname = $_POST["mname"];
		$gen = $_POST["gen"];
		$dateof = $_POST["dateof"];
		$address = $_POST["address"];
		$pass = $_POST["pass"];
		$rdate = $_POST["rdate"];
		// echo $st_name . "<br>";
		// echo $st_email . "<br>"; 
		// echo $st_mobile . "<br>"; 

		// Count Mobile And Email
		$countMobile = dataRowCount('student','mobile', $st_mobile);
		$countEmail = dataRowCount('student','email', $st_email);
		echo $countMobile;

		if(empty($st_name)){
			$error="Name Is Required!";
		}
		elseif(empty($st_email)){
			$error="Email Is Required!";
		}
		elseif(!filter_var($st_email, FILTER_VALIDATE_EMAIL)){
			$error="Email Not Valid!";
		}
		elseif($countEmail !=0 ){
			$error="Email already used, try another!";
		}
		elseif(empty($st_mobile)){
			$error="Email Is Required!";
		}
		elseif($countMobile != 0 ){
			$error="Mobile Number already used, try another!";
		}
		elseif(strlen($st_mobile) != 11){
			$error="Number Must be 11 Digit";
		}
		elseif(!is_numeric($st_mobile)){
			$error="Mobile Number must be Number.";
		}
		elseif(empty($fname)){
			$error="Father Name Is Required!";
		}
		elseif(empty($fmobile)){
			$error="FatherMobile Number Is Required!";
		}
		elseif(!is_numeric($fmobile)){
			$error="Father Mobile Number must be Number.";
		}
		elseif(strlen($fmobile) != 11){
			$error="FatherMobile Number must be 11 digit.";
		}
		elseif(empty($mname)){
			$error="Father Name Is Required!";
		}
		elseif(empty($address)){
			$error="Address Is Required!";
		}
		elseif(empty($pass)){
			$error="Father Name Is Required!";
		}
		elseif(strlen($pass) < 6){
			$error="Password Must be 6 Digit!";
		}
		else{
			$rdate = date('Y-m-d h:i:s');
			$pass = SHA1($pass);

			$insert = $pdo->prepare('INSERT INTO student(
				name,
				email,
				mobile,
				f_name,
				f_mobile,
				m_name,
				gender,
				date_of_birth,
				address,
				password,
				registration_date) VALUES(?,?,?,?,?,?,?,?,?,?,?)');
			$insertStatus = $insert->execute(array(
				$st_name,
				$st_email,
				$st_mobile,
				$fname,
				$fmobile,
				$mname,
				$gen,
				$dateof,
				$address,
				$pass,
				$rdate,
			));

			if($insertStatus == true){
				$success = "YOur Registration Successful.";
			}
			else{
				$error = "Registration Failed, Try again!";
			}

		}
		
	}


	
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<!-- META ============================================= -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	
	<!-- DESCRIPTION -->
	<meta name="description" content="Primary School Managenent System - Website" />
	
	<!-- OG -->
	<meta property="og:title" content="Primary School Managenent System - Website" />
	<meta property="og:description" content="Primary School Managenent System - Website" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- FAVICONS ICON ============================================= -->
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />
	
	<!-- PAGE TITLE HERE ============================================= -->
	<title>Primary School Managenent System - Website </title>
	
	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.min.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
	
	<!-- All PLUGINS CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/assets.css">
	
	<!-- TYPOGRAPHY ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/typography.css">
	
	<!-- SHORTCODES ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/shortcodes/shortcodes.css">
	
	<!-- STYLESHEETS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link class="skin" rel="stylesheet" type="text/css" href="assets/css/color/color-1.css">
	
</head>
<body id="bg">
<div class="page-wraper">
	<!-- <div id="loading-icon-bx"></div> -->
	<div class="account-form">
		<div class="account-head" style="background-image:url(assets/images/background/bg2.jpg);">
			<a href="index.html"><img src="assets/images/logo-white-3.png" alt=""></a>
		</div>
		<div class="account-form-inner">
			<div class="account-container">
				<div class="heading-bx left">
					<h2 class="title-head">Sign Up <span>Now</span></h2>
					<p>Login Your Account <a href="login.php">Click here</a></p>
				</div>	
				<?php if(isset($error)) : ?>
						<div class="alert alert-danger">
							<?php echo $error; ?>
						</div>
					<?php endif; ?>
					<?php if(isset($success)) : ?>
						<div class="alert alert-success">
							<?php echo $success; ?>
						</div>
					<?php endif; ?>
				<form class="contact-bx" method="POST" action="">
					
					<div class="row placeani">
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<label>Student Name</label>
									<input name="st_name" type="text" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<label>Email</label>
									<input name="st_email" type="email" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<label>Mobile Number</label>
									<input name="st_mobile" type="text" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<label>Father's Name</label>
									<input name="fname" type="text"  class="form-control">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<label>Father's Mobile</label>
									<input name="fmobile" type="text" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<label>Mother's Name</label>
									<input name="mname" type="text" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group1">
								<label for="">Gender</label>
								<div class="input-group1">
									<label for="contactChoice1">Male</label>
									<input type="radio" id="contactChoice1" checked name="gen" value="male" /><br>
									<label for="contactChoice2">Female</label>
									<input type="radio" id="contactChoice2" name="gen" value="female" />							
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group"> 
									<label>Date  Of Birth</label><br>
									<input name="dateof" type="date" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group"> 
									<label>Address</label>
									<input name="address" type="text" class="form-control" >
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group"> 
									<label>Password</label>
									<input name="pass" type="password" class="form-control" >
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group"> 
									<label>Register Date</label><br>
									<input name="rdate" type="date" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-lg-12 m-b30">
							<button name="st_registar_btn" type="submit" value="Submit" class="btn button-md">Register Now</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- External JavaScripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/vendors/bootstrap/js/popper.min.js"></script>
<script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="assets/vendors/magnific-popup/magnific-popup.js"></script>
<script src="assets/vendors/counter/waypoints-min.js"></script>
<script src="assets/vendors/counter/counterup.min.js"></script>
<script src="assets/vendors/imagesloaded/imagesloaded.js"></script>
<script src="assets/vendors/masonry/masonry.js"></script>
<script src="assets/vendors/masonry/filter.js"></script>
<script src="assets/vendors/owl-carousel/owl.carousel.js"></script>
<script src="assets/js/function.js"></script>
<script src="assets/js/contact.js"></script>
<script src='assets/vendors/switcher/switcher.js'></script>
</body>

</html>
