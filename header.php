<?php session_start(); ?>
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
	<title>Primary School Managenent System - Website</title>
	
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
	
	<!-- REVOLUTION SLIDER CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/vendors/revolution/css/layers.css">
	<link rel="stylesheet" type="text/css" href="assets/vendors/revolution/css/settings.css">
	<link rel="stylesheet" type="text/css" href="assets/vendors/revolution/css/navigation.css">
	<!-- REVOLUTION SLIDER END -->	
</head>
<body id="bg">
<div class="page-wraper">
<!-- <div id="loading-icon-bx"></div> -->
	<!-- Header Top ==== -->
    <header class="header rs-nav">
		<div class="top-bar">
			<div class="container">
				<div class="row d-flex justify-content-between">
					<div class="topbar-left">
						<ul>
							<li><a href="faq-1.html"><i class="fa fa-question-circle"></i>Ask a Question</a></li>
							<li><a href="javascript:;"><i class="fa fa-envelope-o"></i>Support@website.com</a></li>
						</ul>
					</div>
					<div class="topbar-right">
						<ul>
							<li>
								<select class="header-lang-bx">
									<option data-icon="flag flag-uk">English UK</option>
									<option data-icon="flag flag-us">English US</option>
								</select>
							</li>
							<?php if(isset($_SESSION['logindata'])) : ?>
								<li><a href="dashboard/index.php">Student Dashboard</a></li>
							<?php else : ?>
								<li><a href="login.php">Login</a></li>
								<li><a href="registration.php">Register</a></li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="sticky-header navbar-expand-lg">
            <div class="menu-bar clearfix">
                <div class="container clearfix">
					<!-- Header Logo ==== -->
					<div class="menu-logo">
						<a href="index.php"><img src="assets/images/logo.png" alt=""></a>
					</div>
					<!-- Mobile Nav Button ==== -->
                    <button class="navbar-toggler collapsed menuicon justify-content-end" type="button" data-toggle="collapse" data-target="#menuDropdown" aria-controls="menuDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
					<!-- Author Nav ==== -->
                    <div class="secondary-menu">
                        <div class="secondary-inner">
                            <ul>
								<li><a href="javascript:;" class="btn-link"><i class="fa fa-facebook"></i></a></li>
								<li><a href="javascript:;" class="btn-link"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="javascript:;" class="btn-link"><i class="fa fa-linkedin"></i></a></li>
								<!-- Search Button ==== -->
								<li class="search-btn"><button id="quik-search-btn" type="button" class="btn-link"><i class="fa fa-search"></i></button></li>
							</ul>
						</div>
                    </div>
					<!-- Search Box ==== -->
                    <div class="nav-search-bar">
                        <form action="#">
                            <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                            <span><i class="ti-search"></i></span>
                        </form>
						<span id="search-remove"><i class="ti-close"></i></span>
                    </div>
					<!-- Navigation Menu ==== -->
                    <div class="menu-links navbar-collapse collapse justify-content-start" id="menuDropdown">
						<div class="menu-logo">
							<a href="index.php"><img src="assets/images/logo1.png" alt=""></a>
						</div>
                        <ul class="nav navbar-nav">	
							<li class="active"><a href="javascript:;">Home <i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="index.html">Home 1</a></li>
									<li><a href="index-2.html">Home 2</a></li>
								</ul>
							</li>
							<li><a href="javascript:;">Pages <i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="javascript:;">About<i class="fa fa-angle-right"></i></a>
										<ul class="sub-menu">
											<li><a href="about-1.html">About 1</a></li>
											<li><a href="about-2.html">About 2</a></li>
										</ul>
									</li>
									<li><a href="javascript:;">Event<i class="fa fa-angle-right"></i></a>
										<ul class="sub-menu">
											<li><a href="event.html">Event</a></li>
											<li><a href="events-details.html">Events Details</a></li>
										</ul>
									</li>
									<li><a href="javascript:;">FAQ's<i class="fa fa-angle-right"></i></a>
										<ul class="sub-menu">
											<li><a href="faq-1.html">FAQ's 1</a></li>
											<li><a href="faq-2.html">FAQ's 2</a></li>
										</ul>
									</li>
									<li><a href="javascript:;">Contact Us<i class="fa fa-angle-right"></i></a>
										<ul class="sub-menu">
											<li><a href="contact-1.html">Contact Us 1</a></li>
											<li><a href="contact-2.html">Contact Us 2</a></li>
										</ul>
									</li>
									<li><a href="portfolio.html">Portfolio</a></li>
									<li><a href="profile.html">Profile</a></li>
									<li><a href="membership.html">Membership</a></li>
									<li><a href="error-404.html">404 Page</a></li>
								</ul>
							</li>
							<li class="add-mega-menu"><a href="javascript:;">Our Courses <i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu add-menu">
									<li class="add-menu-left">
										<h5 class="menu-adv-title">Our Courses</h5>
										<ul>
											<li><a href="courses.html">Courses </a></li>
											<li><a href="courses-details.html">Courses Details</a></li>
											<li><a href="profile.html">Instructor Profile</a></li>
											<li><a href="event.html">Upcoming Event</a></li>
											<li><a href="membership.html">Membership</a></li>
										</ul>
									</li>
									<li class="add-menu-right">
										<img src="assets/images/adv/adv.jpg" alt=""/>
									</li>
								</ul>
							</li>
							<li><a href="javascript:;">Blog <i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="blog-classic-grid.html">Blog Classic</a></li>
									<li><a href="blog-classic-sidebar.html">Blog Classic Sidebar</a></li>
									<li><a href="blog-list-sidebar.html">Blog List Sidebar</a></li>
									<li><a href="blog-standard-sidebar.html">Blog Standard Sidebar</a></li>
									<li><a href="blog-details.html">Blog Details</a></li>
								</ul>
							</li>
							<li class="nav-dashboard"><a href="dashboard/index.php">Student Dashboard <i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="admin/index.html">Dashboard</a></li>
									<li><a href="admin/add-listing.html">Add Listing</a></li>
									<li><a href="admin/bookmark.html">Bookmark</a></li>
									<li><a href="admin/courses.html">Courses</a></li>
									<li><a href="admin/review.html">Review</a></li>
									<li><a href="admin/teacher-profile.html">Teacher Profile</a></li>
									<li><a href="admin/user-profile.html">User Profile</a></li>
									<li><a href="javascript:;">Calendar<i class="fa fa-angle-right"></i></a>
										<ul class="sub-menu">
											<li><a href="admin/basic-calendar.html">Basic Calendar</a></li>
											<li><a href="admin/list-view-calendar.html">List View Calendar</a></li>
										</ul>
									</li>
									<li><a href="javascript:;">Mailbox<i class="fa fa-angle-right"></i></a>
										<ul class="sub-menu">
											<li><a href="admin/mailbox.html">Mailbox</a></li>
											<li><a href="admin/mailbox-compose.html">Compose</a></li>
											<li><a href="admin/mailbox-read.html">Mail Read</a></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
						<div class="nav-social-link">
							<a href="javascript:;"><i class="fa fa-facebook"></i></a>
							<a href="javascript:;"><i class="fa fa-google-plus"></i></a>
							<a href="javascript:;"><i class="fa fa-linkedin"></i></a>
						</div>
                    </div>
					<!-- Navigation Menu END ==== -->
                </div>
            </div>
        </div>
    </header>
    <!-- Header Top END ==== -->