<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>SMP N 1 GANDRUNGMANGU - PORTAL</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>themes/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url() ?>themes/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>themes/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>themes/css/style_icon.css">    
    
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>themes/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>themes/css/style-responsive.css" rel="stylesheet">
  
  </head>

  <body>

  <section id="container">
      <div id="preloader" style="position: absolute;
                  z-index: 99999;
                  left: 50%;
                  top: 40%;
                  display:none;">
        <img src="<?php echo base_url() ?>themes/image/preloader.gif" alt="">
      </div>
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>BETA</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="<?php echo site_url('login/logout') ?>">Logout</a></li>
            	</ul>
            </div>
        </header>

      <!--header end-->