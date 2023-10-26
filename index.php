<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
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
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- SweetAlert CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

</head>


<body>

  <form method="post" id="loginForm">

    <div class="limiter">



      <div class="container-login100" style="background-image: url('images/img-01.jpg');">
        <div class="wrap-login100 p-t-190 p-b-30">
          <form class="login100-form validate-form">
            <div class="login100-form-avatar">
              <img src="images/avatar5.png" alt="AVATAR">
            </div>

            <span class="login100-form-title p-t-20 p-b-45">
              Sistem Informasi Invoice
              <br>
              PT. MEKAR RAYA SENTOSA,Tbk
            </span>

            <div class="wrap-input100 validate-input m-b-10" data-validate="Username is required">


              <input type="text" id="username" name="username" class="input100" autocomplete="off" placeholder="Username" required="required">
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-user"></i>
              </span>
            </div>

            <div class="wrap-input100 validate-input m-b-10" data-validate="Password is required">
              <input type="password" id="password" name="password" class="input100" autocomplete="off" placeholder="Password" required="password">
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-lock"></i>
              </span>
            </div>

            <div class="container-login100-form-btn p-t-10">
              <button type="submit" class="login100-form-btn">Log In</button>


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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
      $(document).ready(function() {
        $('#loginForm').submit(function(event) {
          event.preventDefault(); // Mencegah pengiriman form biasa

          // Mengambil data form
          var username = $('#username').val();
          var password = $('#password').val();

          // Mengirim data menggunakan AJAX
          $.ajax({
            type: 'POST',
            url: 'proseslogin.php', // Ganti dengan nama file PHP yang benar
            data: {
              username: username,
              password: password
            },
            success: function(response) {
              var parts = response.split(":"); // Memecah respons menjadi dua bagian
              var status = parts[0]; // Bagian pertama adalah status (success atau error)
              var namaPengguna = parts[1]; // Bagian kedua adalah nama pengguna (hanya jika status success)

              if (status === 'success') {
                Swal.fire({
                  title: 'Login Berhasil',
                  text: 'Selamat Datang ' + namaPengguna, // Menampilkan pesan selamat datang dengan nama pengguna
                  icon: 'success',
                  confirmButtonText: 'OK'
                }).then((result) => {
                  if (result.value) {
                    window.location = 'admin/index.php'; // Redirect ke halaman beranda setelah login berhasil
                  }
                });
              } else {
                Swal.fire({
                  title: 'Login Gagal',
                  text: 'Username atau password salah',
                  icon: 'error',
                  confirmButtonText: 'OK'

                });
              }
            }
          });
        });
      });
    </script>

</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>
<script src="plugins/alert.js"></script>


</html>