<!DOCTYPE html>
<html>
<head>
	<title>Last Mile - Administration Panel</title>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta content="" name="description" />
	<meta content="" name="author" />
    
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>


    

	<!-- NEED TO WORK ON -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

	<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="assets/plugins/jquery-slider/css/jquery.sidr.light.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
	<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>

	<!-- BEGIN CORE JS FRAMEWORK--> 
	<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script> 
	<script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script> 
	<script src="assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script> 
	<script src="assets/plugins/breakpoints.js" type="text/javascript"></script> 
	<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script> 
	<script src="assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script> 
    <script type="text/javascript" src="assets/js/notifications.js"></script>

	<!-- END CORE JS FRAMEWORK --> 
	<!-- BEGIN PAGE LEVEL JS --> 	
	<script src="assets/plugins/jquery-slider/jquery.sidr.min.js" type="text/javascript"></script> 	
	<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script> 
	<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>  
	<script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL PLUGINS --> 	
	
	<!-- BEGIN CORE TEMPLATE JS --> 

	<!-- END CORE TEMPLATE JS --> 

	<!-- END NEED TO WORK ON -->

</head>
<body class="">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse"> 
	<!-- BEGIN TOP NAVIGATION BAR -->
	<div class="navbar-inner">
		<!-- BEGIN NAVIGATION HEADER -->
		<div class="header-seperation"> 
			<!-- BEGIN MOBILE HEADER -->
			<ul class="nav pull-left notifcation-center" id="main-menu-toggle-wrapper" style="display:none">	
				<li class="dropdown">
					<a id="main-menu-toggle" href="#main-menu" class="">
						<div class="iconset top-menu-toggle-white"></div>
					</a>
				</li>		 
			</ul>
			<!-- END MOBILE HEADER -->
			<!-- BEGIN LOGO -->	
			<a href="#">
				<img src="assets/img/logo.png" class="logo" alt="" data-src="assets/img/logo.png" data-src-retina="assets/img/logo2x.png" width="106" height="21"/>
			</a>
			<!-- END LOGO --> 
			<!-- BEGIN LOGO NAV BUTTONS -->
			<ul class="nav pull-right notifcation-center">	
				<li class="dropdown" id="header_task_bar">
					<a href="#" class="dropdown-toggle active" data-toggle="">
						<div class="iconset top-home"></div>
					</a>
				</li>
				<li class="dropdown" id="header_inbox_bar">
					<a href="#" class="dropdown-toggle">
						<div class="iconset top-messages"></div>
						<span class="badge" id="msgs-badge">2</span>
						</a>
				</li>
				<!-- BEGIN MOBILE CHAT TOGGLER -->
				<li class="dropdown" id="portrait-chat-toggler" style="display:none">
					<a href="#sidr" class="chat-menu-toggle">
						<div class="iconset top-chat-white"></div>
					</a>
				</li>
				<!-- END MOBILE CHAT TOGGLER -->				        
			</ul>
			<!-- END LOGO NAV BUTTONS -->
		</div>
		<!-- END NAVIGATION HEADER -->
		<!-- BEGIN CONTENT HEADER -->
		<div class="header-quick-nav"> 
			<!-- BEGIN HEADER LEFT SIDE SECTION -->
			<div class="pull-left"> 
				<!-- BEGIN SLIM NAVIGATION TOGGLE -->
				<ul class="nav quick-section">
					<li class="quicklinks">
						<a href="#" class="" id="layout-condensed-toggle">
							<div class="iconset top-menu-toggle-dark"></div>
						</a>
					</li>
				</ul>
				<!-- END SLIM NAVIGATION TOGGLE -->				
				<!-- BEGIN HEADER QUICK LINKS -->
				
				<!-- BEGIN HEADER QUICK LINKS -->				
			</div>
			<!-- END HEADER LEFT SIDE SECTION -->
			<!-- BEGIN HEADER RIGHT SIDE SECTION -->
			<div class="pull-right"> 
				<div class="chat-toggler">	
					<!-- BEGIN NOTIFICATION CENTER -->
				
					<!-- END NOTIFICATION CENTER -->
					<!-- BEGIN PROFILE PICTURE -->
					
					<!-- END PROFILE PICTURE -->     			
				</div>
				<!-- BEGIN HEADER NAV BUTTONS -->

				<!-- END HEADER NAV BUTTONS -->
			</div>
			<!-- END HEADER RIGHT SIDE SECTION -->
		</div> 
		<!-- END CONTENT HEADER --> 
	</div>
	<!-- END TOP NAVIGATION BAR --> 
</div>
<!-- END HEADER -->
	
<!-- BEGIN CONTENT -->
<div class="page-container row-fluid">
	<!-- BEGIN SIDEBAR -->
	<!-- BEGIN MENU -->
	<div class="page-sidebar" id="main-menu"> 
		  <div class="page-sidebar-wrapper" id="main-menu-wrapper">
		<!-- BEGIN MINI-PROFILE -->
		<div class="user-info-wrapper">	
			
			
		</div>
		<!-- END MINI-PROFILE -->
		<!-- BEGIN SIDEBAR MENU -->	
		<p class="menu-title">BROWSE<span class="pull-right"><a href="javascript:;"><i class="fa fa-refresh"></i></a></span></p>
		<ul>	
			<!-- BEGIN SELECTED LINK -->
			<li class="start active">
				<a href="#">
					<i class="icon-custom-home"></i>
					<span class="title">Dashboard</span>
					<span class="selected"></span>
					<span class="badge badge-important pull-right">5</span>
				</a>
			</li>
			<!-- END SELECTED LINK -->
			<!-- BEGIN BADGE LINK -->
					<li class="">
				<a href="javascript:;">
					<i class="fa fa-users"></i>
					<span class="title">Users</span>
					<span class="arrow"></span>
				</a>
				<ul class="sub-menu">
					<li><a href="#">All Users</a></li>
                    <li><a href="#">In-Ride</a></li>
                    <li><a href="#">Pick Up</a></li>
                    
				</ul>
			</li>
			
			<!-- END BADGE LINK -->     
            		<!-- BEGIN BADGE LINK -->
					<li class="">
				<a href="javascript:;">

					<i class="fa fa-cab"></i>
					<span class="title">Drivers</span>
					<span class="arrow"></span>
				</a>
				<ul class="sub-menu">
					<li><a href="drivers.php?status=all">All Drivers</a></li>
                    <li><a href="drivers.php?status=busy">Busy Drivers</a></li>
                    <li><a href="drivers.php?status=idle">Idle Drivers</a></li>

                    
				</ul>
			</li>
			
			<!-- END BADGE LINK -->   
            		<!-- BEGIN BADGE LINK -->
					<li class="">
				<a href="javascript:;">
					<i class="icon-custom-ui"></i>
					<span class="title">Administration</span>
					<span class="arrow"></span>
				</a>
				<ul class="sub-menu">
					<li><a href="adddriver.php">Add Driver</a></li>
                    <li><a href="#">Today's Bookings</a></li>
                    <li><a href="#">Pick Up</a></li>
                    
				</ul>
			</li>
			
			<!-- END BADGE LINK -->   
			
			<!-- END TWO LEVEL MENU -->			
		</ul>
		<!-- END SIDEBAR MENU -->
		
	</div>
	</div>
	<!-- BEGIN SCROLL UP HOVER -->
	<!-- END SCROLL UP HOVER -->
	<!-- END MENU -->
	<!-- BEGIN SIDEBAR FOOTER WIDGET -->

	<!-- END SIDEBAR FOOTER WIDGET -->
	<!-- END SIDEBAR --> 