<?php
session_start();  
$connect = mysqli_connect("localhost", "root", "", "national_diabetic_db"); 
if(isset($_SESSION['type']))
{
 header("location:view/dashboard");
} 
if(isset($_POST["login"]))  
 {  
      if(empty($_POST["username"]) || empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {  
           $username = mysqli_real_escape_string($connect, $_POST["username"]);  
           $password = mysqli_real_escape_string($connect, $_POST["password"]); 
           
           $query = "SELECT * FROM users WHERE username = '$username'";  
           $result = mysqli_query($connect, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_array($result))  
                {  
                     if(password_verify($password, $row["password"]) && $row["status"] != "Inactive")  
                     {  
                          //return true;  
                         $_SESSION["username"] = $row['username'];
                         $_SESSION["names"] = $row['names'];
                         $_SESSION["id"]=$row['id'];
                         $_SESSION["category"]=$row['category'];  
                         $_SESSION["email"]=$row['email'];
                         $_SESSION["location"]=$row['location'];
                         if ($_SESSION["category"] == 'Patient') {
                           header("location:view/dashboard-patient");
                         } else {
                          header("location:view/dashboard");  
                      }
                     }
                     elseif(password_verify($password, $row["password"]) && $row["status"] == "Inactive")  {
                        echo '<script>alert("Your account is locked contact an administrator for details!")</script>';
                     }  
                     else  
                     {  
                          //return false;  
                      echo '<script>alert("Wrong username or password!")</script>';  
                     }  
                }  
           } else {
            echo '<script>alert("Wrong username or password!")</script>';  
           } 
      }  
 }  
?>
<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>RWANDA DIABETIC ASSOCIATION</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="view/images/log.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="css/style.css" rel="stylesheet">
    
</head>

<body class="h-100">
    
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    



    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="#"> <h4>NATIONAL DIABETIC MONITORING SYSTEM</h4></a>
        
                                <form method="POST" class="mt-5 mb-5 login-input">
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                    <input type="submit" value="Sign In" name="login" class="btn login-form__btn submit w-100">
                                </form>
                                <p class="mt-5 login-form__footer">Dont have account? <a href="view/register" class="text-primary">Sign Up</a> now</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>
</html>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script> 





