<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from codeminifier.com/new-glovia/glovia/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 03 Mar 2020 15:52:26 GMT -->
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>ecomply</title>

		<!-- Bootstrap core CSS -->
		<link href="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom fonts for this template -->
		<link href="<?php echo base_url(); ?>assets/admin/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Custom fonts for this template -->
		<link href="<?php echo base_url(); ?>assets/admin/assets/plugins/themify/css/themify.css" rel="stylesheet" type="text/css">

		<!-- Angular Tooltip Css -->
		<link href="<?php echo base_url(); ?>assets/admin/assets/plugins/angular-tooltip/angular-tooltips.css" rel="stylesheet">
		
		<!-- Morris Charts CSS -->
		<link href="<?php echo base_url(); ?>assets/admin/assets/plugins/morris.js/morris.css" rel="stylesheet">
		
		<!-- Page level plugin CSS -->
		<link href="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/dataTables.bootstrap4.css" rel="stylesheet">

		<!-- Page level plugin CSS -->
		<link href="<?php echo base_url(); ?>assets/admin/assets/dist/css/animate.css" rel="stylesheet">
		
		<!-- Sweet Alert CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/plugins/sweetalert/css/sweetalert.css">

		<!-- Custom styles for this template -->
		<link href="<?php echo base_url(); ?>assets/admin/assets/dist/css/glovia.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/admin/assets/dist/css/glovia-responsive.css" rel="stylesheet">

		<!-- Custom styles for Color -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/dist/css/skins/default.css">
		
		<!-- Custom Style -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/style.css">
		
		<!-- jQuery -->
		<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/jquery/jquery.min.js"></script>
	</head>

	<body class="fixed-nav sticky-footer green-skin" id="page-top">
	
		<!-- ===============================
			Navigation Start
		====================================-->
		<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
			
			<!-- Start Header -->
			<header class="header-logo">
				<a class="nav-link text-center mr-lg-3 hidden-xs" id="sidenavToggler"><i class="ti-align-left"></i></a>
				<a class="navbar-brand" href="<?php echo base_url()."index.php/Admin" ?>"><img src="<?php echo base_url().'assets/images/eComply-Logo.png'; ?>" ></a>
			</header>
			<!-- End Header -->
			
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="ti-align-left"></span>
			</button>
			
			<div class="collapse navbar-collapse" id="navbarResponsive">
				 
				<!-- =============== Start Side Menu ============== -->
				<div class="navbar-side">
				  <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
				  
				    <!-- Start Dashboard-->
					<li class="nav-item active">
					  <a class="nav-link" href="<?php echo base_url()."index.php/Admin"; ?>">
						<i class="ti ti-dashboard"></i>
						<span class="nav-link-text">Dashboard</span>
					  </a>
					</li>
					<!-- End Dashboard -->
					
					<!-- Start Course -->
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="course_menu">
					  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#course_menu" data-parent="#exampleAccordion">
						<i class="ti i-cl-5 ti ti-desktop"></i>
						<span class="nav-link-text">Courses</span>
					  </a>
					  <ul class="sidenav-second-level collapse" id="course_menu">
						
						<li>
						  <a href="<?php echo base_url()."index.php/Admin/addcourse" ?>">Add Course</a>
						</li>
						
						<li>
						  <a href="<?php echo base_url()."index.php/Admin/viewcourse" ?>">View Course</a>
						</li>
						
					  </ul>
					  
					</li>
					<!-- End Course -->
					
					<!-- Start Module -->
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="module_menu">
					  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#module_menu" data-parent="#exampleAccordion">
						<i class="ti i-cl-5 ti ti-desktop"></i>
						<span class="nav-link-text">Module</span>
					  </a>
					  <ul class="sidenav-second-level collapse" id="module_menu">
						
						<li>
						  <a href="<?php echo base_url()."index.php/Admin/addmodule" ?>">Add Module</a>
						</li>
						
						<li>
						  <a href="<?php echo base_url()."index.php/Admin/viewmodule" ?>">View Module</a>
						</li>
						
					  </ul>
					  
					</li>
					<!-- End Module -->
					
					<!-- Start Section -->
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="section_menu">
					  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#section_menu" data-parent="#exampleAccordion">
						<i class="ti i-cl-5 ti ti-desktop"></i>
						<span class="nav-link-text">Section</span>
					  </a>
					  <ul class="sidenav-second-level collapse" id="section_menu">
						
						<li>
						  <a href="<?php echo base_url()."index.php/Admin/addsection" ?>">Add Section</a>
						</li>
						
						<li>
						  <a href="<?php echo base_url()."index.php/Admin/viewsection" ?>">View Section</a>
						</li>
						
					  </ul>
					  
					</li>
					<!-- End Section -->
					
					<!-- Start Question -->
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="question_menu">
					  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#question_menu" data-parent="#exampleAccordion">
						<i class="ti i-cl-5 ti ti-desktop"></i>
						<span class="nav-link-text">Question</span>
					  </a>
					  <ul class="sidenav-second-level collapse" id="question_menu">
						
						<li>
						  <a href="<?php echo base_url()."index.php/Admin/addquestion" ?>">Add Question</a>
						</li>
						
						<li>
						  <a href="<?php echo base_url()."index.php/Admin/viewquestion" ?>">View Question</a>
						</li>
						
					  </ul>
					  
					</li>
					<!-- End Question -->
					
					<!-- Start User -->
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="user_menu">
					  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#user_menu" data-parent="#exampleAccordion">
						<i class="ti i-cl-5 ti ti-desktop"></i>
						<span class="nav-link-text">User</span>
					  </a>
					  <ul class="sidenav-second-level collapse" id="user_menu">
						
						<li>
						  <a href="<?php echo base_url()."index.php/Admin/user" ?>">View User</a>
						</li>
						
						<li>
						  <a href="<?php echo base_url()."index.php/Admin/removeduser" ?>">View Deleted User</a>
						</li>
						
					  </ul>
					  
					</li>
					<!-- End User -->
					
					<!-- Start Payment -->
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="payment_menu">
					  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#payment_menu" data-parent="#exampleAccordion">
						<i class="ti i-cl-5 ti ti-desktop"></i>
						<span class="nav-link-text">Payment</span>
					  </a>
					  <ul class="sidenav-second-level collapse" id="payment_menu">
						
						<li>
						  <a href="<?php echo base_url()."index.php/Admin/payment" ?>">View Payment</a>
						</li>
						
					  </ul>
					  
					</li>
					<!-- End Payment -->
					
					<!-- Start Setting -->
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="setting_menu">
					  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#setting_menu" data-parent="#exampleAccordion">
						<i class="ti i-cl-5 ti ti-desktop"></i>
						<span class="nav-link-text">Setting</span>
					  </a>
					  <ul class="sidenav-second-level collapse" id="setting_menu">
						
						<li>
						  <a href="<?php echo base_url()."index.php/Admin/setting" ?>">Setting</a>
						</li>
						
					  </ul>
					  
					</li>
					<!-- End Setting -->
					
					<!-- Start Exam -->
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="exam_menu">
					  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#exam_menu" data-parent="#exampleAccordion">
						<i class="ti i-cl-5 ti ti-desktop"></i>
						<span class="nav-link-text">Exam</span>
					  </a>
					  <ul class="sidenav-second-level collapse" id="exam_menu">
						
						<li>
						  <a href="<?php echo base_url()."index.php/Admin/userexamresult" ?>">User Exam</a>
						</li>
						
					  </ul>
					  
					</li>
					<!-- End Setting -->
					
				  </ul>
			  </div>
			  
			  <!-- =============== Search Bar ============== -->
			  <ul class="navbar-nav ml-left">
				<li class="nav-item">
				  <form class="form-inline my-2 my-lg-0 mr-lg-2">
					<div class="input-group">
						<span class="input-group-btn">
							<button class="btn btn-primary" type="button">
							  <i class="ti-search"></i>
							</button>
						</span>
					  <input class="form-control" type="text" placeholder="Type In TO Search">
					</div>
				  </form>
				</li>
			  </ul>
			  <!-- =============== End Search Bar ============== -->
			  
			  <!-- =============== Header Rightside Menu ============== -->
			  <ul class="navbar-nav ml-auto">
			  
				<!-- Messages -->
				<li class="nav-item dropdown">
					 <a class="nav-link dropdown-toggle mr-lg-3 a-topbar__nav a-nav" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="ti-email"></i>
						<span class="a-nav__link-badge a-badge a-badge--pink">3</span>
						<span class="hidden-lg hidden-md mrg-l-10">New Notification</span>
					 </a>
					 <div class="dropdown-menu animated flipInX" aria-labelledby="messagesDropdown">
						<div class="dropdown-header text-center pink-bg">
							<span class="a-dropdown__header-title">3 New</span>
							<span class="a-dropdown__header-subtitle">User Messages</span>
						</div>
						<div class="ground-list ground-list-hove" id="message-box">
							<div class="ground ground-single-list">
								<a href="#">
									<img class="ground-avatar" src="<?php echo base_url(); ?>assets/admin/assets/dist/img/user-1.jpg" alt="...">
									<span class="profile-status bg-online pull-right"></span>
								</a>

								<div class="ground-content">
									<h6><a href="#">Maryam Amiri</a></h6>
									<small class="text-fade">Co-Founder</small>
								</div>

								<div class="ground-right">
									<span class="small">Online</span>
								</div>
							</div>
							
							<div class="ground ground-single-list">
								<a href="#">
									<img class="ground-avatar" src="<?php echo base_url(); ?>assets/admin/assets/dist/img/user-2.jpg" alt="...">
									<span class="profile-status bg-offline pull-right"></span>
								</a>

								<div class="ground-content">
									<h6><a href="#">Maryam Amiri</a></h6>
									<small class="text-fade">Co-Founder</small>
								</div>

								<div class="ground-right">
									<span class="small">10 Min Ago</span>
								</div>
							</div>
							
							<div class="ground ground-single-list">
								<a href="#">
									<img class="ground-avatar" src="<?php echo base_url(); ?>assets/admin/assets/dist/img/user-3.jpg" alt="...">
									<span class="profile-status bg-working pull-right"></span>
								</a>

								<div class="ground-content">
									<h6><a href="#">Maryam Amiri</a></h6>
									<small class="text-fade">Co-Founder</small>
								</div>

								<div class="ground-right">
									<span class="small">20 Min Ago</span>
								</div>
							</div>
							
							<div class="ground ground-single-list">
								<a href="#">
									<img class="ground-avatar" src="<?php echo base_url(); ?>assets/admin/assets/dist/img/user-4.jpg" alt="...">
									<span class="profile-status bg-busy pull-right"></span>
								</a>

								<div class="ground-content">
									<h6><a href="#">Maryam Amiri</a></h6>
									<small class="text-fade">Co-Founder</small>
								</div>

								<div class="ground-right">
									<span class="small">18 Min Ago</span>
								</div>
							</div>
							
							<div class="ground ground-single-list">
								<a href="#">
									<img class="ground-avatar" src="<?php echo base_url(); ?>assets/admin/assets/dist/img/user-5.jpg" alt="...">
									<span class="profile-status bg-online pull-right"></span>
								</a>

								<div class="ground-content">
									<h6><a href="#">Maryam Amiri</a></h6>
									<small class="text-fade">Co-Founder</small>
								</div>

								<div class="ground-right">
									<span class="small">Online</span>
								</div>
							</div>
						</div>
						 <a class="dropdown-item view-all" href="#">View all Messages</a>
					</div>
				</li>
				<!-- End Messages -->
				
				<!-- Notification -->
				<li class="nav-item dropdown">
				
					<a class="nav-link dropdown-toggle mr-lg-3 a-topbar__nav a-nav" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="ti-bell"></i>
						<span class="a-nav__link-badge a-badge a-badge--accent a-animate-blink">6</span>
						<span class="hidden-lg hidden-md mrg-l-10">New Notification</span>
					</a>
					  
					<div class="dropdown-menu animated flipInX" aria-labelledby="alertsDropdown">
						<div class="dropdown-header text-center accent-bg">
							<span class="a-dropdown__header-title">6 New</span>
							<span class="a-dropdown__header-subtitle">User Notifications</span>
						</div>
						
						<div class="ground-list ground-list-hove" id="notification-box">
							<div class="ground ground-single-list">
								<a href="#">
									<div class="btn-circle-40 btn-success"><i class="ti-calendar"></i></div>
								</a>

								<div class="ground-content">
									<h6><a href="#">Maryam Amiri</a></h6>
									<small class="text-fade">Check New Admin Dashboard..</small>
									<span class="small">Just Now</span>
								</div>
							</div>
								
							<div class="ground ground-single-list">
								<a href="#">
									<div class="btn-circle-40 btn-danger"><i class="ti-calendar"></i></div>
								</a>

								<div class="ground-content">
									<h6><a href="#">Maryam Amiri</a></h6>
									<small class="text-fade">You can Customize..</small>
									<span class="small">02 Min Ago</span>
								</div>
							</div>
								
							<div class="ground ground-single-list">
								<a href="#">
									<div class="btn-circle-40 btn-info"><i class="ti-calendar"></i></div>
								</a>

								<div class="ground-content">
									<h6><a href="#">Maryam Amiri</a></h6>
									<small class="text-fade">Need Responsive Business Tem...</small>
									<span class="small">10 Min Ago</span>
								</div>
							</div>
								
							<div class="ground ground-single-list">
								<a href="#">
									<div class="btn-circle-40 btn-warning"><i class="ti-calendar"></i></div>
								</a>

								<div class="ground-content">
									<h6><a href="#">Maryam Amiri</a></h6>
									<small class="text-fade">Next Meeting on Tuesday..</small>
									<span class="small">15 Min Ago</span>
								</div>
							</div>
								
							<div class="ground ground-single-list">
								<a href="#">
									<div class="btn-circle-40 btn-purple"><i class="ti-calendar"></i></div>
								</a>

								<div class="ground-content">
									<h6><a href="#">Maryam Amiri</a></h6>
									<small class="text-fade">You can Change Your Pass..</small>
									<span class="small">18 Min Ago</span>
								</div>
							</div>
						</div>
						<a class="dropdown-item view-all" href="#">View all Notifications</a>
					</div>
				</li>
				<!-- End Notification -->
				
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle mr-lg-0 user-img a-topbar__nav a-nav" id="userDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<img src="<?php echo base_url(); ?>assets/admin/assets/dist/img/user-10.jpg" alt="user-img" width="36" class="img-circle">
					</a>
				  
					<ul class="dropdown-menu dropdown-user animated flipInX" aria-labelledby="userDropdown">
						<li class="dropdown-header green-bg">
							<div class="header-user-pic">
								<img src="<?php echo base_url(); ?>assets/admin/assets/dist/img/user-10.jpg" alt="user-img" width="36" class="img-circle">
							</div>
							<div class="header-user-det">
								<span class="a-dropdown__header-title">Daniel Dilver</span>
								<span class="a-dropdown__header-subtitle">UI / UX Expert</span>
							</div>
						</li>
						<li><a class="dropdown-item" href="#"><i class="ti-user"></i> My Profile</a></li>
						<li><a class="dropdown-item" href="#"><i class="ti-wallet"></i> My Balance</a></li>
						<li><a class="dropdown-item" href="#"><i class="ti-email"></i> Inbox</a></li>
						<li><a class="dropdown-item" href="#"><i class="ti-settings"></i> Account Setting</a></li>
						<li><a class="dropdown-item" href="<?php echo base_url()."index.php/Admin/logout" ?>"><i class="fa fa-power-off"></i> Logout</a></li>
					</ul>
				</li>
			  </ul>
			  <!-- =============== End Header Rightside Menu ============== -->
			</div>
		</nav>
		<!-- =====================================================
		                    End Navigations
		======================================================= -->
		
		<div class="content-wrapper">