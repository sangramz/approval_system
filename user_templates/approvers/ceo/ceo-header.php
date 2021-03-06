<?php
session_start();
if ($_SESSION['access']!== 1) {
header('Location: index.html');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin :: Home</title>

        <!-- ========== COMMON STYLES ========== -->
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


        <!-- ========== PAGE STYLES ========== -->
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" href="css/icheck/skins/line/blue.css" >
        <link rel="stylesheet" href="css/icheck/skins/line/red.css" >
        <link rel="stylesheet" href="css/icheck/skins/line/green.css" >

        <!-- ========== THEME CSS ========== -->
        <link rel="stylesheet" href="css/main.css" media="screen" >

        <!-- ========== MODERNIZR ========== -->
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
            <nav class="navbar top-navbar bg-black box-shadow">
            	<div class="container-fluid">
                    <div class="row">
                        <div class="navbar-header no-padding">
                			<a class="navbar-brand" href="index.html">
                			    <img src="logo2.png" class="logo">
                			</a>
                            <span class="small-nav-handle hidden-sm hidden-xs"><i class="fa fa-outdent"></i></span>
                			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                				<span class="sr-only">Toggle navigation</span>
                				<i class="fa fa-ellipsis-v"></i>
                			</button>
                            <button type="button" class="navbar-toggle mobile-nav-toggle" >
                				<i class="fa fa-bars"></i>
                			</button>

                		</div>
                        <!-- /.navbar-header -->

                		<div class="collapse navbar-collapse" id="navbar-collapse-1">
                			<ul class="nav navbar-nav" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                        <li class=""><a href="#" class="color-danger"><i class="fa fa-user"></i> <?php echo $_SESSION['user']; ?></a></li>
                			</ul>
                            <!-- /.nav navbar-nav -->

                			<ul class="nav navbar-nav navbar-right" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                        <li>
                				<a href="u/logout.php?logout=1" class="dropdown-toggle bg-primary" role="button"><i class="fa fa-sign-out"></i> Logout</a>
                				</li>
                                <!-- /.dropdown -->


                                <!-- /.dropdown -->

                			</ul>
                            <!-- /.nav navbar-nav navbar-right -->
                		</div>
                		<!-- /.navbar-collapse -->
                    </div>
                    <!-- /.row -->
            	</div>
            	<!-- /.container-fluid -->
            </nav>

            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

                    <!-- ========== LEFT SIDEBAR ========== -->
                    <div class="left-sidebar fixed-sidebar bg-black-300 box-shadow">
                        <div class="sidebar-content">

                            <!-- /.user-info -->

                            <div class="sidebar-nav">
                                <ul class="side-nav color-gray">
                                  <li><a href="home.php"><i class="fa fa-dashboard"></i> <span>Overview</span></a></li>

                                  <li class="has-children">
                                      <a href="#"><i class="fa fa-money"></i> <span>Accounts</span> <i class="fa fa-angle-right arrow"></i></a>
                                      <ul class="child-nav" style="display: none;">
                                        <li class="active"><a href="acc-home.html"><i class="fa fa-dashboard"></i> <span>Overview</span></a></li>
                                        <li><a href="acc-moneyrequisition.html"><i class="fa fa-credit-card"></i> <span>Money Requisition</span></a></li>
                                        <li><a href="acc-vendorpay.html"><i class="fa fa-inr"></i> <span>Vendor Payment</span></a></li>
                                        <li><a href="acc-billsnproc.html"><i class="fa fa-money"></i> <span>Bills & Processing</span></a></li>
                                      </ul>
                                  </li>
                                  <li class="has-children">
                                      <a href="#"><i class="fa fa-money"></i> <span>Sales</span> <i class="fa fa-angle-right arrow"></i></a>
                                      <ul class="child-nav" style="display: none;">
                                        <li><a href="sales-home.html"><i class="fa fa-dashboard"></i> <span>Overview</span></a></li>
                                        <li><a href="sales-report.html"><i class="fa fa-shopping-bag"></i> <span>Sales Report</span></a></li>
                                        <li><a href="sales-transport.html"><i class="fa fa-truck"></i> <span>Transport</span></a></li>
                                        <li><a href="sales-site.html"><i class="fa fa-list-ul"></i> <span>field-report</span></a></li>
                                      </ul>
                                  </li>
                                  <li class="has-children">
                                      <a href="#"><i class="fa fa-money"></i> <span>HR</span> <i class="fa fa-angle-right arrow"></i></a>
                                      <ul class="child-nav" style="display: none;">
                                        <li><a href="hr-home.html"><i class="fa fa-dashboard"></i> <span>Overview</span></a></li>
                                        <li><a href="hr-recruitment.html"><i class="fa fa-user"></i> <span>Recruitment</span></a></li>
                                        <li><a href="hr-leave.html"><i class="fa fa-plane"></i> <span>Leave</span></a></li>
                                      </ul>
                                  </li>
                                  <li class="has-children">
                                      <a href="#"><i class="fa fa-money"></i> <span>Commerce</span> <i class="fa fa-angle-right arrow"></i></a>
                                      <ul class="child-nav" style="display: none;">
                                        <li><a href="comm-overview.html"><i class="fa fa-dashboard"></i> <span>Overview</span></a></li>
                                        <li><a href="comm-vendor.html"><i class="fa fa-sign-in"></i> <span>Vendor Registration</span></a></li>
                                        <li><a href="comm-poa.html"><i class="fa fa-bullhorn"></i> <span>P.O.</span></a></li>
                                        <li><a href="comm-logistics.html"><i class="fa fa-truck"></i> <span>Logistics</span></a></li>
                                      </ul>
                                  </li>
                                  <li><a href="sales-billsnproc.html"><i class="fa fa-money"></i> <span>Details</span></a></li>
                                  <li><a href="hod.html"><i class="fa fa-user"></i> <span>HOD</span></a></li>
                                  <li><a href="dir.html"><i class="fa fa-user"></i> <span>Director</span></a></li>


                                </ul>

                            </div>
                            <!-- /.sidebar-nav -->
                        </div>
                        <!-- /.sidebar-content -->
                    </div>
                    <!-- /.left-sidebar -->
