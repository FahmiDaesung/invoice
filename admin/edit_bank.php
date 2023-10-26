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
            Admin
            <small>Human Resource Mangement System</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Admin</li>
          </ol>
        </section>


<?php
            $id_bank = $_GET['id_bank'];


      $sql = mysqli_query($koneksi, "SELECT * FROM bank WHERE id_bank='$id_bank'");
      if(mysqli_num_rows($sql) == 0){
        header("Location: bank.php");
      }else{
        $row = mysqli_fetch_assoc($sql);
      }
      if(isset($_POST['update'])){


                    $nomer_rk = $_POST['nomer_rk'];
$jenis = $_POST['jenis'];

$nama_pemilik = $_POST['nama_pemilik'];

   $nama_agency = $_POST['nama_agency'];


        
                        
                $update = mysqli_query($koneksi, "UPDATE bank SET nomer_rk='$nomer_rk', nama_pemilik='$nama_pemilik' , nama_agency='$nama_agency' WHERE id_bank='$id_bank'") or die(mysqli_error());



                if($update){
                    echo "<script>alert('Data Berhasil di ubah gan!'); window.location = 'bank.php'</script>"; 
             

                }else{
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
                }
            }
            
            //if(isset($_GET['pesan']) == 'sukses'){
            //  echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
            //}
            ?>


           


        <!-- Main content -->
         <section class="content">
          <!-- Main row -->
         <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Edit Data Bank</a></li>
              <li><a href="#tab_2" data-toggle="tab">Ubah Foto</a></li>
              
                
              </li>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">


                <form class="form-horizontal style-form" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nomer Rekening</label>
                              <div class="col-sm-4">
                            <input name="nomer_rk" type="text" id="nomer_rk" class="form-control" value="<?php echo $row['nomer_rk']; ?>" placeholder="nomer_rk" autocomplete="off" required />
                              
                            </div>
                          </div>


                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jenis Bank</label>
                              <div class="col-sm-4">

                             <select name='jenis' id='jenis' class='form-control' required>
                                    
                                      <option value="BRI">BRI </option>
                                      <option value="BCA">BCA</option>
                                      <option value="MANDIRI">MANDIRI </option>
                                      <option value="BNI">BNI</option>
                                      <option value="DANAMOM">DANAMOM </option>
                                      
                                  </select>
                              
                            </div>
                          </div>

                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Pemilik</label>
                              <div class="col-sm-4">
                            <input name="nama_pemilik" type="text" id="alamat" class="form-control" value="<?php echo $row['nama_pemilik']; ?>" placeholder="nama_pemilik" autocomplete="off" required />
                              
                            </div>
                          </div>

                        


                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Agency</label>
                              <div class="col-sm-4">
                            <select name="nama_agency" id="nama_agency"  class="form-control show-tick ms select2" data-placeholder="Select">
                              <option value="Agency">Please select</option>

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
                                  <input type="submit" name="update" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                                <a href="agency.php" class="btn btn-sm btn-danger">Batal </a>
                              </div> 
                          </div>
                          </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">

                <form class="" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                      
                <div class="card-body">
                   <label for="exampleInputPassword1">Kalau Tidak DI Ubah Lewatin aja</label>

                  <div class="form-group">
                   
                    <img src="<?php echo $row['gambar']; ?>">
                  </div>
                  <div class="form-group">

                   


                                                   <input type="file" id="gambar" name="gambar"  class="form-control-file" onchange="PreviewImage();">
                                               </div> 
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
                <!-- /.card-body -->




                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="update2" id="update2" value="update2">Submit</button>
                </div>
              </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                like Aldus PageMaker including versions of Lorem Ipsum.
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php include "footer.php"; ?>

      <?php include "sidecontrol.php"; ?>
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

   
   <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>

    <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>

    <script src="../plugins/select2/select2.full.min.js"></script>

    <script>
  //options method for call datepicker
  $(".input-group.date").datepicker({ autoclose: true, todayHighlight: true });
  
    </script>

  <script>
     $(function () {
    $(".select2").select2();
    });
    </script>
  </body>
</html>
