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
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Invoice
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Examples</a></li>
          <li class="active">Invoice</li>
        </ol>
      </section>


      <!-- Main content -->
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
              <td class="text-center" width="60%">
                <b>
                  <center> <u> KWITANSI </center> </u>
                </b>
              <td class="text-right" width="60%">
              </td>
            </h2>
          </div>
          <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">


            <?php
            function getRomawi($bln)
            {
              switch ($bln) {
                case 1:
                  return "I";
                  break;
                case 2:
                  return "II";
                  break;
                case 3:
                  return "III";
                  break;
                case 4:
                  return "IV";
                  break;
                case 5:
                  return "V";
                  break;
                case 6:
                  return "VI";
                  break;
                case 7:
                  return "VII";
                  break;
                case 8:
                  return "VIII";
                  break;
                case 9:
                  return "IX";
                  break;
                case 10:
                  return "X";
                  break;
                case 11:
                  return "XI";
                  break;
                case 12:
                  return "XII";
                  break;
              }
            }
            ?>


            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM trx INNER JOIN  admin ON trx.id_user = admin.id_user WHERE id_trx='$_GET[id_trx]'");
            $data  = mysqli_fetch_array($query);


            $tgl_trx2 = $data["tgl_trx"];


            $bln = date('m');
            $romawi = getRomawi($bln);


            ?>
            <address>
              <strong>Contact Person</strong><br>
              085602237829

            </address>


            <address>
              <strong>Ditujukan Kepada</strong><br>

              <table width="100%">








                <tr>
                  <td width="40%"><b>Nama Client</b></td>
                  <td width="2%"><b>:</b></td>
                  <td width="58%"><?php echo $data['nama_client']; ?></td>
                </tr>
                <tr>
                  <td width="20%"><b>Alamat</b></td>
                  <td width="2%"><b>:</b></td>
                  <td width="78%"><?php echo $data['alamat']; ?></td>
                </tr>
                <tr>
                  <td width="20%"><b>Nama Website</b></td>
                  <td width="2%"><b>:</b></td>
                  <td width="78%"><?php echo $data['nama_website']; ?></td>
                </tr>


              </table>

            </address>





          </div>
          <!-- /.col -->
          <div class="col-sm-4 invoice-col">

          </div>
          <!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <b>Invoice #<?php echo $data['id_trx']; ?></b><br>
            <br>
            <br>

            <table width="100%">






              </tr>
              <tr>
                <td width="20%"><b>No</b></td>
                <td width="2%"><b>:</b></td>
                <td width="78%"><?php echo $data['id_trx2']; ?> </td>

              </tr>

              <tr>
              <tr>
                <td width="40%"><b>Tanggal Cetak </b></td>
                <td width="2%"><b> : </b></td>
                <td width="85%"> <?php
                                  $tgl = date('d-m-Y');
                                  echo $tgl;
                                  ?></td>

              </tr>
              <tr>
                <td width="20%"><b>Quo No</b></td>
                <td width="2%"><b>:</b></td>
                <td width="78%"><?php echo $data['id_trx']; ?></td>

              </tr>
              <tr>
                <td width="20%"><b>Tanggal Order </b></td>
                <td width="2%"><b>:</b></td>
                <td width="78%"><?php echo date("d-F-Y", strtotime($tgl_trx2)); ?>





                </td>

              </tr>

            </table>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <form action='detail.php' method="GET">




          <?php

    // //Data mentah yang ditampilkan ke tabel
    // mysql_connect('localhost', 'root', '');
    // mysql_select_db('bengkel_savana');



    $query1 = "SELECT * FROM tmp_trx";

    if (isset($_GET['id_trx'])) {
      $id_trx = $_GET['id_trx'];
      $query1 = "SELECT * FROM tmp_trx  
             WHERE id_trx LIKE '%$id_trx%'
             OR id_trx LIKE '%$id_trx%'";
    }

    $tampil = mysqli_query($koneksi, $query1) or die(mysqli_error($koneksi));
?>
          <!-- Table row -->
          <?php
          $querysu = mysqli_query($koneksi, "SELECT * FROM setting ");
          $datasu  = mysqli_fetch_array($querysu);
          ?>
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-bordered table-hover table-striped">
                <thead>
                  <tr>
                    <th>
                      <center>No </center>
                    </th>
                    <th>Nama Keyword</th>

                    <th>Harga</th>
                  </tr>
                </thead>

                <?php


                $no = 0;
                $subtotal = 0;
                $dolar = 0;
                while ($data = mysqli_fetch_array($tampil)) {


                  $total = $data['harga'];

                  $subtotal = $subtotal + $total;


                  $dolar = $subtotal / $datasu['dollar'];
                  $no++;


                ?>


                  <tbody>
                    <tr>
                      <td>
                        <center><?php echo $no; ?></center>
                      </td>

                      <td>
                        <left><?php echo $data['nama_keyword']; ?></center>
                      </td>


                      <td>Rp.<?php $harga = $data['harga'];
                              echo number_format($harga, 0, ".", "."); ?></td>
                    </tr>

                  <?php
                }
                  ?>
                  </tbody>
              </table>

            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->

            <?php
            $querys = mysqli_query($koneksi, "SELECT * FROM trx INNER JOIN  admin ON trx.id_user = admin.id_user WHERE id_trx='$_GET[id_trx]'");
            $datas  = mysqli_fetch_array($querys);
            ?>


            <div class="col-xs-6">
              <p class="lead">Payment Methods:</p>
              <img src="../dist/img/credit/visa2.png" alt="Visa">
              <img src="../dist/img/credit/bca.png" alt="Mastercard">
              <img src="../dist/img/credit/mandiri.png" alt="American Express">
              <img src="../dist/img/credit/paypal2.png" alt="Paypal">

              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                Untuk Pembayaran bisa melewati Transfer Ke rekening di bawah ini
                <br> <br>
                <?php echo $datas['payments']; ?>
              </p>



              <div class="col-xs-7">



              </div>






            </div>



            <!-- /.col -->
            <div class="col-xs-6">

              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th style="width:23%">Subtotal Rp</th>
                    <td width="2%"><b>:</b></td>
                    <td>Rp.<?php echo  number_format($subtotal, 0, ".", "."); ?></td>
                  </tr>
                  <tr>
                    <th>Subtotal $</th>
                    <td width="2%"><b>:</b></td>
                    <td>$.<?php echo  number_format($dolar, 0, ".", "."); ?></td>
                  </tr>

                </table>
              </div>
            </div>





            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- this row will not appear when printing -->



          <div class="row no-print">
            <div class="col-xs-12">


              <a href="data_transaksi.php" type="button" class="btn btn-success pull-right"><i class="fa 
                    fa-arrow-circle-right"></i> Kembali
              </a>
              <a type="button" href="cetak.php?id_trx=<?php echo $id_trx; ?>" target="_blank" class="btn btn-primary pull-right" style="margin-right: 5px;">
                <i class="glyphicon glyphicon-print"></i> Print
              </a>
            </div>
          </div>


      </section>
      <!-- /.content -->
      <div class="clearfix"></div>
    </div>
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
    $(".input-group.date").datepicker({
      autoclose: true,
      todayHighlight: true
    });
  </script>

  <script>
    $(function() {
      $(".select2").select2();
    });
  </script>
</body>

</html>