<?php 
	require_once("config.php");
	session_start();

	if(isset($_POST["st_login_btn"])){
		$st_username = $_POST["st_username"];
		$st_pass = $_POST["st_pass"];

		// $dbPassword=getData('student','password');
		// echo $dbPassword;

		// echo $st_username;
		// echo $st_pass;

		if(empty($st_username)){
			$error="Email or Mobile Number is Required!";
		}
		elseif(empty($st_pass)){
			$error="Password is requred!";
		}
		// elseif($dbPassword != SHA1('st_pass')){
		// 	$error="afsgggfgn";
		// }
		else{
			$st_pass = SHA1($st_pass);

			$data = $pdo->prepare("SELECT id, email, mobile, password FROM student WHERE (email=? OR mobile=?) AND password=?");
			$data->execute(array($st_username,$st_username,$st_pass));
			$count=$data->rowCount();

			echo $count;
			echo "<br>";
			if($count == true){
				$stdata = $data->fetchAll(PDO::FETCH_ASSOC);
				print_r($stdata);
				
				$_SESSION['logindata'] = $stdata;

				
				header('location:dashboard/index.php');
				
			}
			else{
				$error = "Username or Password is wrong!";
			}

		}
		
	};
	if(isset($_SESSION['logindata'])){
		header('location:dashboard/index.php');
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
					<h2 class="title-head">Login Your <span>Account</span></h2>
					<p>Dont't have an account, <a href="registration.php">Create one here!</a></p>
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
									<label>Email or Mobile Number</label>
									<input name="st_username" type="text" class="form-control">
								</div>
							</div>
						</div>
						
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group"> 
									<label>Password</label>
									<input name="st_pass" type="password" class="form-control" >
								</div>
							</div>
						</div>
						<div class="col-lg-12 m-b30">
							<button name="st_login_btn" type="submit" value="Submit" class="btn button-md">Login Now</button>
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