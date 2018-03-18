   # PHP AJAX LOGIN With Different User Level

This Application is the basic and simple PHP Ajax Login with different User Role or level  with active and inactive user account,
this example is included with the user level of Superuser Module / System admin Module / Hr Module / and The normal user which is 
the employee module. You will free to modify the code and add your own Security features like.

- Secure login
- CSRF protection 
- Bruteforce protection 
- login attemps
- Secure password reset 
- and etch


#### Folder Structures
 ```html 
       - assets/
            ├── custom.css 
       - database/
            ├── hris.sql - import this file
       - includes/
            ├── menu-for-hr.php
            ├── menu-for-superuser.php
            ├── menu-for-sysadmin.php
            ├── menu-for-user.php
       - library
            ├── db.php - db connection
            ├── functions.php - optional you can write your oop concept here or its up to you 
       - login
            ├── assets/
                    ├── bootstrap/
                    ├── js/
                        ├── login.js - your login js
            ├── index.php - login view 
            ├── logout.php - your session destroy
            ├── login.php - login script
       - template/
           ├── header.php - your html header
           ├── content.php - include the header and content
           ├── footer.php - your footer header
       - views /
           ├── hr/
               ├── index.php 
           ├── superuser/
               ├── index.php
           ├── sysadmin/
               ├── index.php
           ├── user/
               ├── index.php
        - index.php - this will be your route logic         
         
  ```
  
  
  
#### db.php 
Create database or import the database included from files then create a connection using PDO. 

```php
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
```


#### index.php
This will be your route logic but since this is not a full mvc concept but  we will called this a route :-)  

```php
<?php 
 if (!isset($_SESSION['user']['IsLoggeD']) && $_SESSION['user']['IsLoggeD'] != true) {header("Location:login");}
	 $pg = (isset($_GET['pg']) && !empty($_GET['pg']) ? $_GET['pg']:''); 
   $userLevel = $_SESSION['user']['userLevel']; 
       if($userLevel == 'SUPERUSER'){
           switch ($pg) {
            	case 'dashboard':
            	        $title   = 'dashboard';
            		      $content = 'views/superuser/index.php';
                      $active  = 'dashboard';
            		      $css     =  array(""); // you can include here your css style in your per module but depends on you
            		      $js      =  array(""); // your action.js every module 
            		      $flag    = 1; // if 1 has include files else no include files
            		break;

            	
            	default:
            		      $title   = 'dashboard';
                      $content = 'views/superuser/index.php';
                      $active  = 'dashboard';
                      $css     =  array(""); // you can include here your css style in your per module but depends on you
                      $js      =  array(""); // your action.js every module 
                      $flag    = 1; // if 1 has include files else no include files
            		break;
            } 
      }elseif ($userLevel == 'SYSADMIN') {
            switch ($pg) {
                case 'dashboard':
                      $title   = 'dashboard';
                      $content = 'views/sysadmin/index.php';
                      $active  = 'dashboard';
                      $css     =  array(""); // you can include here your css style in your per module but depends on you
                      $js      =  array(""); // your action.js every module 
                      $flag    = 1; // if 1 has include files else no include files
                break;
              
              default:
                      $title   = 'dashboard';
                      $content = 'views/sysadmin/index.php';
                      $active  = 'dashboard';
                      $css     =  array(""); // you can include here your css style in your per module but depends on you
                      $js      =  array(""); // your action.js every module 
                      $flag    = 1; // if 1 has include files else no include files
                break;
            } 
      }elseif ($userLevel == 'HR') {
             switch ($pg) {
              case 'dashboard':
                     $title   = 'dashboard';
                     $content = 'views/hr/index.php';
                     $active  = 'dashboard';
                     $css     =  array(""); // you can include here your css style in your per module but depends on you
                     $js      =  array(""); // your action.js every module 
                     $flag    = 1; // if 1 has include files else no include files
                break;
              
              default:
                     $title   = 'dashboard';
                     $content = 'views/hr/index.php';
                     $active  = 'dashboard';
                     $css     =  array(""); // you can include here your css style in your per module but depends on you
                     $js      =  array(""); // your action.js every module 
                     $flag    = 1; // if 1 has include files else no include files
                break;
            } 
      }elseif ($userLevel == 'USER') {
       	     switch ($pg) {
              case 'dashboarduser':
                     $title   = 'dashboard';
                     $content = 'views/user/index.php';
                     $active  = 'dashboard';
                     $css     =  array(""); // you can include here your css style in your per module but depends on you
                     $js      =  array(""); // your action.js every module 
                     $flag    = 1; // if 1 has include files else no include files
                break;
              
              default:
                     $title   = 'dashboard';
                     $content = 'views/user/index.php';
                     $active  = 'dashboard';
                     $css     =  array(""); // you can include here your css style in your per module but depends on you
                     $js      =  array(""); // your action.js every module 
                     $flag    = 1; // if 1 has include files else no include files
                break;
            } 
     								 
      } 

?>
 ```
 
 
#### login folder 
in login folder you will see the login index, login.php and logout since is not a mvc concept we have separated folder called login in login folder we have index.php
logout.php and login.php this are your login sript you can modify or make oop class to make it one file only. 


#### login.php 
 ```php
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
 ```
 
 #### logout.php 
  ```php
 <?php require '../library/db.php' ?>

<?php 
	
	session_destroy();
	unset($_SESSION);
	header("Location:index.php");
 ?>
  ```
  
  ### login.js
  in assets/js we will find the login.js this is our jquery ajax script with json response 
  
   ```javascript
   $(document).ready(function(){
    $("#username").on("keyup",function(){
        $("#msg").hide();
    });
    
    $("#password").on("keyup",function(){
        $("#msg").hide();
    });
    
    function loader(){
        $("#msg").html('<br/><br/><br/><br/><img src="ajax-loader.gif" width="40px" height="40px;"/> &nbsp;<font size="6">Welcome...</font><br/><br/>'); 
    }

    function hideField(){
         $("#username").hide();
         $("#password").hide();  
         $("#uname").hide();
         $("#upass").hide(); 
         $("#login_button").hide(); 
         $("#question").hide();
         $("#msg").hide();
    }


   $("#loginForm").on("submit",function(){
    var loginData = $(this).serialize();
      $.ajax({
            type:'POST',
            url:'login.php',
            dataType:'json',
            data: loginData,
            beforeSend:function(data){
         
            },  
            success:function(data){
               if(data.response == "Success"){        
                                if(data.User == "SUPERUSER")
                                {
                                     alert("SUPERUSER");
                                     hideField();
                                       $("#msg").fadeIn(function(){loader()});
                                       setTimeout(' window.location.href = "../?pg=superuser"; ',5000);
                                }  

                                else if(data.User =="SYSADMIN")
                                {
                                      alert("SYSADMIN");
                                      hideField();
                                      $("#msg").fadeIn(function(){loader()});
                                       setTimeout(' window.location.href = "../?pg=sysadmin"; ',5000);
                                 } 
                                 
                                 else if(data.User =="HR")
                                 {
                                                 alert("HR");
                                                 hideField();
                                                 $("#msg").fadeIn(function(){loader()});
                                                 setTimeout(' window.location.href = "../?pg=hr"; ',5000);
                                 } 

                                 else if(data.User =="USER")
                                 {
                                               alert("USER");
                                               hideField();
                                               $("#msg").fadeIn(function(){loader()});
                                               setTimeout(' window.location.href = "../?pg=user"; ',5000);
                                 }           
                 
                } else if (data.response == "Lock") {
                            $("#msg").fadeIn(1000, function(){                 
                               $("#msg").html('<div class="alert alert-danger"> <span class="fa fa-warning"></span> &nbsp; Your account is Temporarily Lock please contact &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbspAdministrator for this Assistant !</div>');
                            });
                } else{
                           $("#msg").fadeIn(1000, function(){                 
                               $("#msg").html('<div class="alert alert-danger"> <span class="fa fa-warning"></span> &nbsp; Usrname or Password is Invalid !</div>');
                            });
                      }
           },

            error:function(xhr,status){
                 alert(status.error);
            }
      });
      return false;
   });


});
```

 
### just download to checkout the full details https://github.com/reyven90/php-ajax-login

### more question just pm me on facebook https://www.facebook.com/jay.romantiko

### thank you for following Goodbless :-)
 
