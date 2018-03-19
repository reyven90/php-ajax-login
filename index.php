<?php require'library/db.php' ?>
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

<?php include'template/content.php' ?>
