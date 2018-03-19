<!DOCTYPE html>
<html>
<head>
	<title>SIMPLE LOGIN</title>
	<link rel="stylesheet" type="text/css" href="assets/custom.css">
</head>
<body>
       <h1>YOUR HEADER</h1>
       <div class="left-menu">
	       <?php 
		        if($userLevel == 'SUPERUSER'){ 
		               include 'includes/menu-for-superuser.php';               	     
		        }elseif ($userLevel == 'SYSADMIN') {
		        	   include 'includes/menu-for-sysadmin.php';
		        }elseif ($userLevel == 'HR') {
		        	   include 'includes/menu-for-hr.php';
		        }elseif ($userLevel == 'USER') {
		        	   include 'includes/menu-for-user.php';
		        } 
	        ?>
       </div>
       <div class="right-menu">
       	     <li><a href="login/logout.php">Logout</a></li>
       	     <li><a href="#">Welcome!&nbsp;<?php echo $_SESSION['user']['fullname']?></a></li> 
       </div>
            <div class="divider"></div>
 


