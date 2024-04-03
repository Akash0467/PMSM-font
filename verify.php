<?php 
	require_once("config.php");
	session_start();
    if(!isset($_SESSION['logindata'])){
        header('location:login.php');
    }

	if(isset($_POST['st_email_verify_btn'])){
		$user_id = $_SESSION['logindata'][0]['id'];
		$user_email = Student('email',$user_id);
echo $user_email;
		$code = rand(9999,999999);

		$subject = "PSMS - Email Verification";
		
		$message = "
		<html>
		<head>
		<title>Email Verification</title>
		</head>
		<body>
		<b><p>Email Verification</p></b>
		<table>
		<tr>
		<th>Code</th>
		<th>".$code."</th>
		</tr>
		</table>
		<p>Email Verification</p>
		</body>
		</html>
		";


		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers
		$headers .= 'From: <'.$user_email.'>' . "\r\n";

		$send_mail = mail($user_email,$subject,$message,$headers);


		echo $send_mail;
		
		if($send_mail == true){
			$stm = $pdo->prepare("UPDATE student SET email_code=? WHERE id=?");
			$stm->execute(array($code,$user_id));

			$success = "Code sent Success, please Check your Register Email";
		}
		else{
			echo 'Email Send Failed!';
		}


	}

	if(isset($_POST["st_login_btn"])){
		$st_username = $_POST["st_username"];
		$st_pass = $_POST["st_pass"];

		if(empty($st_username)){
			$error="Email or Mobile Number is Required!";
		}
		elseif(empty($st_pass)){
			$error="Password is requred!";
		}
		else{
			$st_pass = SHA1($st_pass);
			// Find Login User
			$data = $pdo->prepare("SELECT id, email, mobile, password FROM student WHERE (email=? OR mobile=?) AND password=?");
			$data->execute(array($st_username,$st_username,$st_pass));
			$count=$data->rowCount();
			if($count == true){
				$stdata = $data->fetchAll(PDO::FETCH_ASSOC);
				// print_r($stdata);
				$_SESSION['logindata'] = $stdata;

				$is_email_verified = Student('is_email_verified', $_SESSION['logindata'][0]['id']);
				$is_mobile_verified = Student('is_mobile_verified', $_SESSION['logindata'][0]['id']);

					if($is_email_verified ==1 AND $is_mobile_verified == 1){
						header('location:dashboard/index.php');
					}
					else{
						header("location:verify.php");
					}
				
			}
			else{
				$error = "Username or Password is wrong!";
			}

		}
		
	};
	// if(isset($_SESSION['logindata'])){
	// 	header('location:dashboard/index.php');
	// }


	
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
	<meta name="description" content="Student Verification" />
	
	<!-- OG -->
	<meta property="og:title" content="Student Verification" />
	<meta property="og:description" content="Student Verification" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- FAVICONS ICON ============================================= -->
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />
	
	<!-- PAGE TITLE HERE ============================================= -->
	<title>Student Verification</title>
	
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
					<h2 class="title-head">Student <span>Verification</span></h2>
					
					<p> <mark><?php echo(Student('name', $_SESSION['logindata'][0]['id'])); ?></mark>  Plese Verify Your Account</p>
				</div>	
					<?php if(isset($error)) :?>
						<div class="alert alert-danger">
							<?php echo $error;?>
						</div>
					<?php endif;?>
					<?php if(isset($success)) : ?>
						<div class="alert alert-success">
							<?php echo $success; ?>
						</div>
					<?php endif; ?>
					
					<?php 
						$email_status = Student('is_email_verified',$_SESSION['logindata'][0]['id']);
						$nobile_status = Student('is_mobile_verified',$_SESSION['logindata'][0]['id']);
					?>
					<p>Email : <?php 
						if($email_status == 1){
							echo '<span class="badge badge-success">Verified<span>';
						}else{
							echo '<span class="badge badge-danger">Not Verified<span>';
						}
					?> </p>
					<p>Mobile : <?php 
						if($nobile_status == 1){
							echo '<span class="badge badge-success">Verified<span>';
						}
						else{
							echo '<span class="badge badge-danger">Not Verified<span>';
						}
					?></p>

				
				<form class="contact-bx" method="POST" action="">
					<div class="row placeani">
						<div class="col-lg-12 m-b30">
							<button name="st_email_verify_btn" type="submit" value="Submit" class="btn button-md">Cleck to Verify Email</button>
						</div>
					</div>
				</form>





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
							<button name="st_login_btn" type="submit" value="Submit" class="btn button-md">Verify Now</button>
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