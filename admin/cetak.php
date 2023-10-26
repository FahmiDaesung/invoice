<!DOCTYPE html>
<html>
<head>

  

<?php include "waktu.php"; ?>

<?php include "session.php"; ?>

<?php
            $query = mysqli_query($koneksi, "SELECT * FROM trx INNER JOIN  admin ON trx.id_user = admin.id_user WHERE id_trx='$_GET[id_trx]'");
            $data  = mysqli_fetch_array($query);

           
            $tgl_trx2 =$data["tgl_trx"];


$bln = date('m');
$romawi = getRomawi($bln);


            ?>


  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $data['id_trx'];?> - <?php echo $data['id_trx2'];?></title>
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
            <b ><center> <u> JASA SEO </center> </u>  </b>
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
function getRomawi($bln){
                switch ($bln){
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

           
            $tgl_trx2 =$data["tgl_trx"];


$bln = date('m');
$romawi = getRomawi($bln);


            ?>
          <address>
            <strong>JASA SEO</strong><br>
            085602237829
            
          </address>


           <address>
            <strong>Ditujukan Kepada</strong><br>
            
           <table width="100%">

                    
 
  



   
  <tr>
    <tr>
    <td width="40%"><b>Nama Client </b></td>
    <td width="2%"><b> : </b></td>
    <td width="85%"> <?php echo $data['nama_client'];?></td>
   
  </tr>
     <tr>
    <td width="20%"><b>Alamat</b></td>
    <td width="2%"><b>:</b></td>
    <td width="78%"><?php echo $data['alamat'];?></td>
   
  </tr>
  <tr>
    <td width="20%"><b>Nama Website </b></td>
    <td width="2%"><b>:</b></td>
    <td width="78%"><?php echo $data['nama_website'];?></td>
   
  </tr>
 
</table>
            
          </address>





        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
         
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice #<?php echo $data['id_trx'];?></b><br>
          <br>
           <br>

          <table width="100%">

                    
 
  


</tr>
     <tr>
    <td width="20%"><b>No</b></td>
    <td width="2%"><b>:</b></td>
    <td width="78%"><?php echo $data['id_trx2'];?>  </td>
   
  </tr>
   
  <tr>
    <tr>
    <td width="40%"><b>Tanggal Cetak </b></td>
    <td width="2%"><b> : </b></td>
    <td width="85%"> <?php
 $tgl=date('d-m-Y');
 echo $tgl;
 ?></td>
   
  </tr>
     <tr>
    <td width="20%"><b>Quo No</b></td>
    <td width="2%"><b>:</b></td>
    <td width="78%"><?php echo $data['id_trx'];?></td>
   
  </tr>
  <tr>
    <td width="20%"><b>Tanggal Order </b></td>
    <td width="2%"><b>:</b></td>
    <td width="78%"><?php echo date("d-F-Y", strtotime($tgl_trx2));?>  





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

      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
              <th><center>No </center></th>
                        <th>Nama Keyword</th>
                        
                        <th>Harga</th>
            </tr>
            </thead>

            <?php 


                     $no=0;
                      $subtotal=0;
                      $dolar=0;
                     while($data=mysqli_fetch_array($tampil)) { 

                     
                      $total = $data['harga'] ;
                      
                      $subtotal = $subtotal + $total;


                     $dolar = $subtotal / 14500;
                      $no++; 
                      

                      ?>


            <tbody>
            <tr>
             <td><center><?php echo $no; ?></center></td>
                   
                    <td><left><?php echo $data['nama_keyword'];?></center></td>
                  

                    <td>Rp.<?php $harga = $data['harga']; echo number_format($harga,0,".","."); ?></td>
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
           <?php echo $datas['payments'];?>
          </p>



          <div class="col-xs-7">
        


        </div>


<?php
            $querysu= mysqli_query($koneksi, "SELECT * FROM setting ");
            $datasu  = mysqli_fetch_array($querysu);
            ?>
         <div class="col-xs-7">
        
            <strong> <center>Tanda Tangan</center>  </strong>
            
          
          
          
          <p class="w" style="margin-top: 10px;">
          <center> <img src="<?php echo $datasu['gambar']; ?>">  </center>
          

            <strong> <center>Seomedia</center>  </strong>
          </p>

        </div>


        </div>



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
