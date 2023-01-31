<?php 
    session_start();
    require_once '../web-config/config.php';
    require_once '../web-config/database.php';
    require_once '../controller/actions.php';
    if(!isset($_SESSION["category"]))
    {
     header("location:../index");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>RWANDA DIABETIC ASSOCIATION</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/log.png">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="./plugins/jquery-steps/css/jquery.steps.css" rel="stylesheet">

</head>

<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
        </svg>
    </div>
</div>
<!--*******************
    Preloader end
********************-->


<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">

<!--**********************************
    Nav header start
***********************************-->
<div class="nav-header">
    <div class="brand-logo">
        <a href="dashboard">
            <b class="logo-abbr"><img src="images/logo.png" alt=""> </b>
             <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span>
            <span class="brand-title">
                <!-- <img src="images/logo-text.png" alt=""> -->
                <h3 style="color: white;">RDA MONITOR</h3>
            </span>
        </a>
    </div>
</div>
<!--**********************************
    Nav header end
***********************************-->

<!--**********************************
    Header start
***********************************-->
<div class="header">    
    <div class="header-content clearfix">
        
        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
        <div class="header-left">
            <div class="input-group icons">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                </div>
                <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                <div class="drop-down   d-md-none">
                    <form action="#">
                        <input type="text" class="form-control" placeholder="Search">
                    </form>
                </div>
            </div>
        </div>
        <div class="header-right">
            <ul class="clearfix">
                <li class="icons dropdown d-none d-md-flex">
                    <a href="javascript:void(0)" class="log-user"  data-toggle="dropdown">
                        <span><?php echo $_SESSION["names"]; ?></span>
                    </a>
                </li>
                <!-- <li><?php echo $_SESSION["names"]; ?></li> -->
                <li class="icons dropdown">
                    <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                        <span class="activity active"></span>
                        <img src="images/profile.png" height="40" width="40" alt="">
                    </div>
                    <div class="drop-down dropdown-profile   dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <!-- <li>
                                    <a href="#"><i class="icon-user"></i> <span>Profile</span></a>
                                </li>
                                
                                <hr class="my-2">
                                <li>
                                    <a href="#"><i class="icon-lock"></i> <span>Lock Screen</span></a>
                                </li> -->
                                <li><a href="logout"><i class="icon-key"></i> <span>Logout</span></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--**********************************
    Header end ti-comment-alt
***********************************-->

<!--**********************************
    Sidebar start
***********************************-->
<div class="nk-sidebar">           
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">SYSTEM MENU</li>
            <li>
                <a href="drug" aria-expanded="false">
                    <i class="fa fa-stethoscope"></i><span class="nav-text">Medicine</span>
                </a>
            </li>
            <li>
                <a href="ordered" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">orders</span>
                </a>
            </li>
            <li>
                <a href="payment" aria-expanded="false">
                    <i class="fa fa-credit-card"></i><span class="nav-text">Payments</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!--**********************************
    Sidebar end
***********************************-->
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid" align="center">
        <div class="row">
            <h2>Welcome to Rwanda Diabetes Association</h2>
        </div>
    </div>
    <!-- #/ container -->
</div>
<!--**********************************
    Content body end
***********************************-->
 <?php include('footer.php'); ?>