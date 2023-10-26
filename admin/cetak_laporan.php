<!DOCTYPE html>
<html>
<head>

  

<?php include "waktu.php"; ?>

<?php include "session.php"; ?>


<?php
             
                $no=0;
                $mulai   = $_GET['awal'];
                $selesai = $_GET['akhir'];
              

                    $sql="select * FROM trx
                           INNER JOIN  admin ON trx.id_user = admin.id_user  AND 
                     trx.tgl_trx BETWEEN '$mulai' AND '$selesai' ORDER BY trx.id_trx DESC";

                $ress = mysqli_query($koneksi, $sql);
              ?>


  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $mulai;?> s/d <?php echo $selesai;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
   <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <td class="text-center"  width="60%">
            <b ><center> <u> Laporan Transaksi Invoice </center> </u>  </b>
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

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "seomedia";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()){
  echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}   
?>


<?php
             
                $no=0;
                $mulai   = $_GET['awal'];
                $selesai = $_GET['akhir'];
              

                    $sql="select * FROM trx
                           INNER JOIN  admin ON trx.id_user = admin.id_user  AND 
                     trx.tgl_trx BETWEEN '$mulai' AND '$selesai' ORDER BY trx.id_trx DESC";

                $ress = mysqli_query($koneksi, $sql);
              ?>

          <address>
            <strong>PT.MEKAR RAYA SENTOSA, Tbk</strong><br>
            Ruko Mega Grosir Cempaka Mas Blok I No.10
            Jl.Letjend Suprapto RT.009 RW.007 Sumur Batu Kemayoran
            Jakarta Pusat DKI Jakarta
          </address>


           <address>
            <strong></strong><br>
            
           
            
          </address>





        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
         
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Tanggal Cetak  :  <?php
 $tgl=date('d-m-Y');
 echo $tgl;
 ?></b><br> 
          <br>
           <br>

          <table width="100%">

                    
 
  


   


   
  <tr>
    <tr>
    <td width="40%"><b>Dari Tgl</b></td>
    <td width="2%"><b> : </b></td>
    <td width="85%"> <?php echo $mulai;?></td>
   
</tr>


 <tr>
    <tr>
    <td width="40%"><b>Sampai Tgl</b></td>
    <td width="2%"><b> : </b></td>
    <td width="85%"> <?php echo $selesai;?></td>
   

   

</tr>



  </td>
   
  </tr>
 
</table>

<br>
 
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
 
<form action='detail.php' method="GET">

                                  
                          

                             

      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
                  <th width="1%">No</th>
                      <th width="10%">ID Trx</th>
                      <th width="10%">Tgl Trx</th>
                       <th width="10%">client</th>
                       <th width="10%">nama website</th>
                       <th width="10%">email</th>
                      <th width="10%">Total</th>
            </tr>
            </thead>

          <?php 

                      $i = 1;
                      $subtotal=0;
                       $dolar=0;
                     while($data=mysqli_fetch_array($ress)) { 

                      $total = $data['total'] * 1;
                      
                      $subtotal = $subtotal + $total;
                       $dolar = $subtotal / 14500;
                      ?>

            <tbody>
            <tr>
             <td><center><?php echo $i; ?></center></td>     
                    <td><left><?php echo $data['id_trx'];?></center></td>
                    <td><left><?php echo $data['tgl_trx'];?></left></td>
                    <td><left><?php echo $data['nama_client'];?></center></td>
                     <td><left><?php echo $data['nama_website'];?></center></td>
                    <td><left><?php echo $data['email'];?></center></td>
                     
                        <td>Rp.<?php $total = $data['total']; echo number_format($total,0,".","."); ?></td>
                    <tr>
                   <?php   
                  $i++;
                  } 
                 
                  ?>
                   </tbody>
                   <th colspan="6" class=""><center>Total</center> </th>
                   

                   <td>Rp.<?php echo  number_format($subtotal,0,".","."); ?></td>
          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    


        



        <!-- /.col -->

        
        <div class="col-xs-6">
          
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:23%">total Rp</th>
                <td width="2%"><b>:</b></td>
                <td>Rp.<?php echo  number_format($subtotal,0,".","."); ?></td>
              </tr>
              <tr>
                <th>total $</th>
                <td width="2%"><b>:</b></td>
                <td>$.<?php echo  number_format($dolar,0,".","."); ?></td>
              </tr>
              
            </table>
          </div>
        </div>


         


        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->



      
      </div>
    </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
