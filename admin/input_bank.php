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
            Data Bank
            <small>Sistem invoice </small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="active">Data Bank</li>
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
                  <h3 class="box-title">Input Data Bank</h3>
                </div><!-- /.box-header -->
            <?php

//proses
   if(isset($_POST['simpan'])){

    
$nomer_rk = $_POST['nomer_rk'];
$jenis = $_POST['jenis'];

$nama_pemilik = $_POST['nama_pemilik'];

   $nama_agency = $_POST['nama_agency'];
//script validasi data
 
    $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM bank WHERE nomer_rk='$nomer_rk'"));

    if ($cek > 0){
    echo "<script>window.alert('nomer rekening  sudah ada brader cek ulang')
    window.location='input_bank.php'</script>";
    }else {
    mysqli_query($koneksi, "INSERT INTO bank (nomer_rk, jenis, nama_pemilik, nama_agency) VALUES ('$nomer_rk', '$jenis', '$nama_pemilik', '$nama_agency')");
    echo "<script>window.alert('DATA SUDAH DISIMPAN')
    window.location='bank.php'</script>";
    }
    }
    ?>
                <div class="box-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="input_bank.php" method="post" enctype="multipart/form-data" name="form1" id_user="form1">
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nomor Rekening </label>
                              <div class="col-sm-4">
                                  <input name="nomer_rk" type="text" id="nomer_rk" class="form-control"autocomplete="off" required />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jenis Bank  </label>
                              <div class="col-sm-4">
                                  <select name='jenis' id='jenis' class='form-control' required>
                                    
                                      <option value="BRI">BRI </option>
                                      <option value="BCA">BCA</option>
                                      <option value="MANDIRI">MANDIRI </option>
                                      <option value="BNI">BNI</option>
                                      <option value="DANAMOM">DANAMOM </option>
                                      
                                  </select>
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Pemilik</label>
                              <div class="col-sm-4">
                                  <input name="nama_pemilik" type="text" id="nama_pemilik" class="form-control"autocomplete="off" required />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>

                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Agency</label>
                              <div class="col-sm-4">
                            <select name="nama_agency" id="nama_agency"  class="form-control show-tick ms select2" data-placeholder="Select">
                              <option value="0">Please select</option>

                              <?php 
                    $query2="select * from agency order by id_agency";
                    $tampil=mysqli_query($koneksi, $query2) or die(mysqli_error());
                    while($data1=mysqli_fetch_array($tampil))
                    {
                    ?>
                              
                                  
              
              <option value="<?php echo $data1['nama_agency'];?>"><?php echo $data1['nama_agency'];?> </option>
                <?php } ?>
                              
                              </select> 
                              
                            </div>
                          </div>

                         

                        


                         

                           

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                                <a href="bank.php" class="btn btn-sm btn-danger">Batal </a>
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
