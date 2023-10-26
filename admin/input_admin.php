<?php include "session.php"; ?>
<!DOCTYPE html>
<html>
  <?php include "head.php"; ?>
  <body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper">

      <?php include "header.php"; ?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php include "menu.php"; ?>

<?php include "waktu.php"; ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Pengguna Sistem
            <small>Sistem Bengkel </small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="active">Data Admin</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">

              <!-- TO DO List -->
               <div class="box box-primary">
               <div class="box-header">
                  <i class="ion ion-clipboard"></i>
                  <h3 class="box-title">Input Data Admin</h3>
                </div><!-- /.box-header -->
             <?php

                if(isset($_POST['simpan'])){
                  $namafolder="gambar_admin/"; //tempat menyimpan file
                      
                      if (!empty($_FILES["nama_file"]["tmp_name"]))
                      {
                      $jenis_gambar   =$_FILES['nama_file']['type'];       
                      $id_user        = $_POST['id_user'];
                      $nama           = $_POST['nama'];
                      $alamat         = $_POST['alamat'];
                      $username       = $_POST['username'];
                      $password      = $_POST['password'];
                     
                      $level          = $_POST['level'];
                      $jenis_kelamin       = $_POST['jenis_kelamin'];
                      $usia      = $_POST['usia'];



if(!preg_match("/^[a-z A-Z]*$/", $nama)){
                echo "<script>window.alert('input nama harus menggunakan huruf tidak boleh angka ')
    window.location='input_admin.php'</script>";
            } else {


 if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")
        {           
          $gambar = $namafolder . basename($_FILES['nama_file']['name']);       
          if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {


             //script validasi data
 
    $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM admin WHERE nama='$nama' or username='$username'"));

    if ($cek > 0){
    echo "<script>window.alert('nama admin username  sudah ada')
    window.location='input_admin.php'</script>";
    }else {
    mysqli_query($koneksi, "INSERT INTO admin (id_user, nama, alamat, username, password, level, gambar ,jenis_kelamin,usia) VALUES
                  ('$id_user', '$nama', '$alamat', '$username', '$password', '$level', '$gambar', '$jenis_kelamin', '$usia')");
    echo "<script>window.alert('DATA SUDAH DISIMPAN')
    window.location='adminku.php'</script>";
    }
    }




           }
     }
    }
    }
            ?>
                <div class="box-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="input_admin.php" method="post" enctype="multipart/form-data" name="form1" id_user="form1">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Id user</label>
                              <div class="col-sm-4">
                                  <input name="id_user" type="text" id="id_user" class="form-control" placeholder="Tidak perlu di isi" value="<?php $a="D"; $b=rand(1000,10000); $c=$a.$b; echo $c; ?>" autofocus="on" readonly="readonly" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Admin </label>
                              <div class="col-sm-4">
                                  <input name="nama" type="text" id="nama" class="form-control"autocomplete="off" required />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Alamat  </label>
                              <div class="col-sm-4">
                                  <input name="alamat" type="text" id="alamat" class="form-control" autocomplete="off" required />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Username</label>
                              <div class="col-sm-4">
                                  <input name="username" type="text" id="username" class="form-control"autocomplete="off" required />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>

                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">password</label>
                              <div class="col-sm-4">
                            <input name="password" type="text" id="password" class="form-control" autocomplete="off" required />
                              
                            </div>
                          </div>

                         

                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jenis Kelamin  </label>
                              <div class="col-sm-4">
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required="required">
                         
                           <option value="Laki-Laki">Laki-Laki</option>

                            <option value="Perempuan">Perempuan</option>
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->

                                </select>
                              </div>
                          </div>




                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Usia  </label>
                              <div class="col-sm-4">
                                  <input name="usia" type="number" id="usia" class="form-control"autocomplete="off" required />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>



                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Level</label>
                              <div class="col-sm-4">
                           <select name="level" id="level" class="form-control" required="required">
                           <option value="Admin">Admin</option>
                          
                           </select>
                            </div>
                        </div>

                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Gambar</label>
                              <div class="col-sm-4">
                            <input name="nama_file" type="file" id="nama_file" class="form-control" placeholder="Password" autocomplete="off" required />
                              
                            </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                                <a href="adminku.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>
                      </form>
                  </div>
                </div><!-- /.box-body -->
                <!-- <div class="box-footer clearfix no-border">
                  <a href="#" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Tambah Admin</a>
                </div> -->
              </div><!-- /.box -->

            </section><!-- /.Left col -->
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php include "footer.php"; ?>

      <?php include "sidecontrol.php"; ?>
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="../plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>

     <script>
  //options method for call datepicker
  $(".input-group.date").datepicker({ autoclose: true, todayHighlight: true });
  
    </script>

  </body>
</html>
