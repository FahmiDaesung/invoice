<?php 
include "session.php";
?>
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
            Data transaksi 
            <small>sistem bengkel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="active">Data Transaksi</li>

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
                  <h3 class="box-title">Data Transaksi</h3>
                  <div class="box-tools pull-right">
                  <form action='barang.php' method="POST">
    	             <div class="input-group" style="width: 230px;">

                    
                      <input type="text" name="qcari" class="form-control input-sm pull-right" placeholder="Cari Usename Atau Nama">
                      <div class="input-group-btn">
                        

                        <button type="submit" class="btn btn-sm btn-default tooltips" data-placement="bottom" data-toggle="tooltip" title="Cari Data"><i class="fa fa-search"></i></button>
                      
                       
                        <a href="barang.php" class="btn btn-sm btn-success tooltips" data-placement="bottom" data-toggle="tooltip" title="Refresh"><i class="fa fa-refresh"></i></a>
                        

                      </div>
                    </div>

                    </form>
                  </div> 
                </div><!-- /.box-header -->
                
                <div class="box-body">
                <!-- <form action='admin.php' method="POST">
          
	       <input type='text' class="form-control" style="margin-bottom: 4px;" name='qcari' placeholder='Cari berdasarkan User ID dan Username' required /> 
           <input type='submit' value='Cari Data' class="btn btn-sm btn-primary" /> <a href='admin.php' class="btn btn-sm btn-success" >Refresh</i></a>
          	</div>
            </form>-->
            <?php
             if(isset($_GET['aksi']) == 'hapus'){
				$id = $_GET['id'];
				$cek = mysqli_query($koneksi, "SELECT * FROM barang_jasa WHERE id_brg='$id'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
				}else{
					$delete = mysqli_query($koneksi, "DELETE FROM barang_jasa WHERE id_brg='$id'");
					if($delete){
						
              echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil dihapus.</div>'; 



					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
					}
				}
			}
			?>
<a href="input_barang.php" class="btn btn-sm btn-warning"><i class="fa fa-file"></i> Tambah data</a> <br /><br />
                   <table id="lookup" class="table table-bordered table-hover">  
                  <?php
                   
                  

                  $query1="select * FROM trx INNER JOIN  konsumen ON trx.id_kon = konsumen.id_kon
                           INNER JOIN  kasir ON trx.id_kasir = kasir.id_kasir";



                 


                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>
                  <table id="example" class="table table-responsive table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>Id Transaksi</center></th>
                        <th><center>Nama Konsumen</center></th>
                        <th><center>Tanggal Transaksi</center></th>
                        <th><center>Total</center></th>
                        <th><center>Kasir</center></th>
                       
                        <th><center>Aksi</center></th>
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; ?>
                    <tbody>
                    <tr>
                    <td><center><?php echo $no; ?></center></td>
                   <td><center><?php echo $data['id_trx'];?></center></td>
                    <td><center><?php echo $data['nama_kon'];?></center></td>
                    <td><center><?php echo $data['tgl_trx'];?></center></td>
                    <td><center><?php echo $data['total'];?></center></td>
                    <td><center><?php echo $data['nama_kasir'];?></center></td>
                    


                    


                    <td><center><div id="thanks">

                      <a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Cetak Data " href="edit_barang.php?aksi=edit&id_brg=<?php echo $data['id_brg'];?>"><span class="glyphicon glyphicon-print"></span></a>  



                    <!-- Button untuk modal -->
               <a class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-search"></span></a> 
 
                
                    


                   <a onclick="return confirm ('Yakin hapus <?php echo $data['nama'];?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus Data Barang" href="barang.php?aksi=hapus&id=<?php echo $data['id_brg'];?>"><span class="glyphicon glyphicon-trash"></a></center>


                      
  

                        </td></tr></div>
                  <?php   
                  } 
                  ?>
                   </tbody>
                </table>
              <div class="form-group">
                  
              </div>
              

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



 <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:800px">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Data Transaksi</h4>

                    </div>

 
                    <div class="modal-body">

                    
<table id="lookup" class="table table-bordered table-hover table-striped">
        <tbody>
          <tr>
            <td class="text-left" width="20%">
              <img src="gambar_admin/5.jpg" alt="logo-dkm" width="70" />
            </td>
            <td class="text-center" width="60%">
            <b>Bengkel Savana </b> <br>
            Bumiayu<br>
            Telp: (021) 192819189<br>
            <td class="text-right" width="20%">
            </td>
            </tr>
        </tbody>
      </table>
      <hr class="line-top" />
    </div>
  </section>




<section id="body-of-report">
    <div class="container-fluid">


      

      <h4 class="text-center">Detail Transaksi</h4>
      <br />

<table width="100%">
  
  

    <td width="20%"><b>ID. Transaksi</b></td>
    <td width="2%"><b>:</b></td>
    <td width="78%"><?php echo $data['id_trx'];?></td>
  </tr>
  <tr>
  
    <td width="20%"><b>Tanggal</b></td>
    <td width="2%"><b>:</b></td>
    <td width="78%"><?php echo $data['tgl_trx'];?></td>
    
  </tr>
  <tr>
    <td width="20%"><b>Konsumen :</b></td>
    <td width="2%"><b>:</b></td>
   
  </tr>
  <tr>
    <td width="20%"><b>Kasir</b></td>
    <td width="2%"><b>:</b></td>
    <td width="78%"><?php echo $data['id_kasir'];?></td>
   
  </tr>
</table>
</br>




                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>


                                    <th width="10%">Id transaksi</th>
                                    
                                    <th width="10%">Nama Barang/Jasa</th>
                                    <th width="5%">Jumlah</th>
                                    <th width="10%">Harga Satuan</th>
                                    <th width="10%">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                               
                                //Data mentah yang ditampilkan ke tabel
                                mysql_connect('localhost', 'root', '');
                                mysql_select_db('bengkel_savana');



                                
                           $sql = mysql_query('SELECT * FROM tmp_trx');
                          
                            

                           
                             

                                while ($r = mysql_fetch_array($sql)) {
                                    ?>
                                    <tr class="pilih" data-kodeobat="<?php echo $r['id_trx']; ?>">


                                        <td><?php echo $r['id_trx']; ?></td>
              
                                        <td><?php echo $r['id_brg']; ?></td>
                                        <td><?php echo $r['jml']; ?></td>
                                        
                                        <td><?php echo $r['id_kasir']; ?></td>
                                          <td><?php echo $r['status']; ?></td>
                                       
                                    </tr>

                                    <?php
                                }
                                ?>
        <br>
        <div class="modal-footer">
    <a href="trx_cetak.php?id=<?php echo $kode;?>" target="_blank" class="btn btn-warning">Cetak</a>
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
</div>
</br>
  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <script src="js/jquery-1.11.2.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
        <script type="text/javascript">
//            jika dipilih, kode obat akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("id_trx").value = $(this).attr('data-kodeobat');
                $('#myModal').modal('hide');
            });
//            tabel lookup obat
            $(function () {
                $("#lookup").dataTable();
            });
            function dummy() {
                var kode_obat = document.getElementById("id_trx").value;
                alert('kode obat ' + kode_obat + ' berhasil tersimpan');
            }
        </script>

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
  </body>
</html>