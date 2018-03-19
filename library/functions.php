<?php 
	
	Class Jayvee {

		function __construct($Conn = null){

			$this->Newconn = $Conn;
		}

	}

	$New = new Jayvee($db);
 ?>