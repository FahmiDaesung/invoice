<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>


<body>




   <form onSubmit="validasi()" action="proseslogin.php" id="login" name="login" method="post"  >
  
  <div class="limiter">



    <div class="container-login100" style="background-image: url('images/img-01.jpg');">
      <div class="wrap-login100 p-t-190 p-b-30">
        <form class="login100-form validate-form">
          <div class="login100-form-avatar">
            <img src="images/avatar5.png" alt="AVATAR">


          </div>

          
                   <?php if (isset($_GET['error'])) {
             

                  echo "<script>alert('Username dan password tidak sesuai!'); window.location = 'index.php'</script>"; 

              }
                  

                          ?>


          <span class="login100-form-title p-t-20 p-b-45">
            Sistem Informasi Invoice 
            <br>
            PT. MEKAR RAYA SENTOSA,Tbk
          </span>

          <div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
            
          
            <input type="text" id="username" name="username" class="input100" autocomplete="off" placeholder="Username" required="required">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-user"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
           <input type="password" id="password" name="password" class="input100" autocomplete="off" placeholder="Password" required="password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock"></i>
            </span>
          </div>

          <div class="container-login100-form-btn p-t-10">
           <button type="submit" onclick="validasi()" class="login100-form-btn">Log In</button>
              
            
          </div>

          <div class="text-center w-full p-t-25 p-b-230">
         
            
          </div>

          <div class="text-center w-full">
            <a class="txt1" href="#">
             
              <i class="fa fa-long-arrow-right"></i>            
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  

        <!-- JS -->
   <script type="text/javascript">
    function validasi() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        
        if (username != "" && password!="") {
            return false;
            
        }else{
            alert('Anda harus mengisi data dengan lengkap !');

        }
    }
</script>
<!--===============================================================================================-->  
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>

</body>
</html>