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