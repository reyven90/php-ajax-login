<?php require'../library/db.php' ?>
<?php extract($_POST) ?>

<?php
     $sql = $db->query("SELECT * FROM tbl_users WHERE userName = '".$username."' AND userPass = '".$password."' ");
     $row = $sql->fetch(PDO::FETCH_ASSOC);

     if($sql->rowCount() > 0){
         if($row['userStatus'] == 1){
             $_SESSION['user'] = array(
          	                       'userLevel' => $row['userType'],
                                   'fullname' => $row['userName'],
                                   'IsLoggeD' => true 
          	                       );
  
             $response = array("response" => "Success",
                              "User" => $row['userType']);

         }else{
         	$response = array("response" => "Lock","Message" => "Your Account is Temporarily Locked");
         }
     
     }else{

     	    $response = array("response" => "Invalid",
     	    	               "message" => "Invalid Password");
     }

     echo json_encode($response);
?>