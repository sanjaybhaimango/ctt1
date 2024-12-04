<?php
   include("conn.php");
   session_start();
   $error="";
   if($_SERVER["REQUEST_METHOD"] == "POST") 
   {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['user']);
      $mypassword = mysqli_real_escape_string($db,$_POST['pass']); 
      
      $sql = "SELECT * FROM user WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) 
      {
         $_SESSION['login_user'] = $myusername;
         if($row['role']=="1" || $row['role']=="4")
         {
            header("location: dashboard.php");
         }
         else
         {
            header("location:user_dashboard.php");
         }
      }
      else 
      {
         $error = "Your Login Name or Password is invalid";
      }
   }
   else
   {

      include('header.php')
   
?>


<section class="vh-auto gradient-custom">
  <div class="container py-5 h-auto">
    <div class="row d-flex justify-content-center align-items-center h-auto">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card text-white" style="border-radius: 1rem; background-color: rgb(0 0 0 / 40%);">
          <div class="card-body p-5 text-center">

            <div class="">
               <form class="sign-up-form form" action="" method="Post" name="f1" onsubmit = "return validation()">
               <h2 class="fw-bold mb-2 text-uppercase">Welcome</h2>
                <p class="text-white-50 mb-5">Please enter your login and password!</p>

                <div class="form-outline form-white mb-4">
                  <input class="form-input" type="text" placeholder="Enter your Username" required name="user" id="user">
                  </div>

                  <div class="form-outline form-white mb-4">
                  <input class="form-input" type="password" placeholder="Enter your password" required name="pass" id="pass">
                  </div>

               <input class="form-btn primary-default-btn transparent-btn" type = "submit" value = " Sign in "/><br />
    </form>
    </div>

</div>
</div>
</div>
</div>
</div>
</section>
<!-- Chart library -->
<script src="./plugins/chart.min.js"></script>
<!-- Icons library -->
<script src="plugins/feather.min.js"></script>
<!-- Custom scripts -->
<script src="js/script.js"></script>
<script>  
            function validation()  
            {  
                var id=document.f1.user.value;  
                var ps=document.f1.pass.value;  
                if(id.length=="" && ps.length=="") {  
                    alert("User Name and Password fields are empty");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("User Name is empty");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                    }  
                }                             
            }  
        </script> 



<?php
   }
?>