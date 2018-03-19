<?php session_start() ?>
<?php 
	
	$ServerName = "localhost";
	$Username	= "root";
	$Password	= "";
	$DbName		= "hris";
	$db = null;

	try {
		$db = new PDO("mysql:host=$ServerName;dbname=$DbName",$Username,$Password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	} catch (PDOException $e) {
		echo "Connection Failed:" . $e->getMessage();
		die();
	}

 ?>
 <?php require 'functions.php' ?>