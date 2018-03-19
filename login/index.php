<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login-Form</title>
    <!-- Bootstrap -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <!--/ MAIN CSS -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/bootstrap/css/font-awesome.css">
    <style>
	    body{
	 	  /* background: #e9ebee;*/
	 	    background: url(paf.png) no-repeat center center fixed; 
	         -webkit-background-size: cover;
	        -moz-background-size: cover;
	        -o-background-size: cover;
	        background-size: cover;
	    }
     </style>
     <script>
    function renderTime() {
        var currentTime = new Date();
        var diem = "AM";
        var h = currentTime.getHours();
        var m = currentTime.getMinutes();
        var s = currentTime.getSeconds();
        setTimeout('renderTime()',1000);
        if (h == 0) {
            h = 12;
        } else if (h > 12) { 
            h = h - 12;
            diem="PM";
        }
        if (h < 10) {
            h = "0" + h;
        }
        if (m < 10) {
            m = "0" + m;
        }
        if (s < 10) {
            s = "0" + s;
        }
        var myClock = document.getElementById('clockDisplay');
        myClock.textContent = h + ":" + m + ":" + s + " " + diem;
        myClock.innerText = h + ":" + m + ":" + s + " " + diem;
    }
    renderTime();
</script>
  </head>
<body>    
<div class="col-md-12" >
               <div class="col-md-8">
                   <h1 style="color:#FFF;">LOGIN</h1>
               </div>
               <div class="col-md-4">
                  <div id="clockDisplay" style="font-size: 50px; color:#fff;font-family: 'Times New Roman', Times, serif;"></div>
                      <p style="color:#fff;font-size:35px;" ><?php echo date("D, M d ")?></p>
               </div>
                    
           </div>
      <div class="container">
             <br/>   
           
         <div class="col-md-3 col-sm-offset-2" >
              <div class="panel panel-default" style="border-radius:0px;box-shadow:none;">
                   <div class="panel-body" style="padding:7px;">
                       <img src="akomismo.jpg" class="img-responsive"  style="font-size: 50px; color:#fff;font-family: 'Times New Roman', Times, serif;">
                   </div>
              </div>
         </div>

         <div class="col-md-4 col-md-offset-0">
                      <div id="msg" style="color:#fff;"></div>
                      <div id="loginUser"></div>  
             <form id="loginForm">   
                  <div class="form-group">
                    <p style="color:#fff;" id="uname">Username:</p> 
                       <input type="text" class="form-control" name="username" id="username" style="background:none;color:#fff;border-radius:0px;box-shadow:none;font-size:17px;" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <p style="color:#fff;" id="upass">Password:</p> 
                       <input type="password" class="form-control" name="password" id="password" style="background:none;color:#fff;border-radius:0px;box-shadow:none;font-size:20px;">
                  </div>
                  <div class="form-group">
                        <button type="submit" class="btn btn-md btn-primary" id="login_button" style="border-radius:0px;box-shadow:none;">
                               <i class="fa fa-lock"></i> Login Account
                        </button>
                        <br/><br/>
                        <p style="color:#fff;" id="question">Do you have an account Please Login ?</p>
                  </div>
             </form>
         </div>
        
           
      </div>
    <script src="assets/js/jquery.js"></script>
	<script src="assets/js/login.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
