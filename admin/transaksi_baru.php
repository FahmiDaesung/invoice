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
            <small>sistem invoice seomedia</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="active">Data Transaksi</li>
             <form   action='transaksi_baru.php' method="POST"   >
          </ol>
        </section>

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

$bulan = date('n');
$romawi = getRomawi($bulan);
?>




           <?php
            




            ?>




<?php


// Menghubungkan ke database
$conn = mysqli_connect('localhost', 'root', '', 'seomedia');

// Cek Koneksi
if (!$conn) {
    echo "Gagal terhubung ke database!";
    die;
}
// Mencari data (kode) yang paling besar (terakhir) dari database
$query = mysqli_query($conn, "SELECT max(id_trx) as max_kode FROM trx");
$data = mysqli_fetch_array($query);
// Sudah dapat nih gan
$id_trx = $data['max_kode'];

// Oke sekarang kita ambil bagian angkanya saja dan membuang string yang ada diawal
$no = substr($id_trx, 2, 5);
// Contoh kodenya 'B0001'
// Setelah dibuang string 'B', hasilnya menjadi '0001'
// maksud substr diatas adalah mengambil 4 katakter dimulai dari index ke 1 (karakter ke-2)

// Selanjutnya kita convert ke tipe data Integer agar bisa di Increment (ditambah)
$no = (int) $no;
// Ditambah 1
$no += 1;

/**
 * Atau bisa gunakan cara ini 
 * $no++;
 * $no = $no + 1;
 * bebas ya, silahkan pilih sesuai selera :v
 */

//  Oke next kita bakal generate kode otomatisnya
$str = 'JS';

// perintah sprintf("%04s", $no); digunakan untuk memformat string sebanyak 4 karakter
// misal sprintf("%04s", 2); maka akan dihasilkan '0002'
// atau misal sprintf("%04s", 1); maka akan dihasilkan string '0001'
$eva = $str . sprintf("%04s", $no);





 ?>



<?php
if(isset($_POST['simpantrx'])){

                 

   
    $id_trx = $_POST['id_trx'];

  $id_trx2 = $_POST['id_trx2'];

     $nama_client = $_POST['nama_client'];
      
      $nama_website = $_POST['nama_website'];
      $email = $_POST['email'];

      $alamat = $_POST['alamat'];

      $no_hp = $_POST['no_hp'];

    $tgl_trx = $_POST['tgl_trx'];
    $total = $_POST['total'];
      $id_user = $_POST['id_user'];

       $payments = $_POST['payments'];




if(empty($nama_client)) {

    "<script>
      alert('Data Gagal dimasukan!'); </script>"; 
} {

 if(empty($nama_website)) {
    "<script>
      alert('Data Gagal dimasukan!'); </script>"; 

} {

 if(empty($email)) {
    "<script>
      alert('Data Gagal dimasukan!'); </script>"; 

} {

 if(empty($alamat)) {
   "<script>
      alert('Data Gagal dimasukan!'); </script>"; 

} {

 if(empty($no_hp)) {
    "<script>
      alert('Data Gagal dimasukan!'); </script>"; 
} {




if($total < 1) {
    "<script>
      alert('Data Gagal dimasukan!'); </script>"; 


      } else {



$query2 = mysqli_query($koneksi, "INSERT INTO trx (id_trx, nama_client,nama_website,email,alamat,no_hp, tgl_trx, total,id_user,payments,id_trx2) VALUES ( '$id_trx', '$nama_client' , '$nama_website' , '$email' , '$alamat', '$no_hp', '$tgl_trx', '$total', '$id_user', '$payments', '$id_trx2')");

if ($query2){

  echo "<script>alert('Data Berhasil di simpan!'); window.location = 'transaksi_baru.php'</script>"; 


} else {
  echo "<script>alert('Data Gagal dimasukan!'); window.location = 'index.php'</script>"; 
} 
}
} 
}
} 
}

}
}
                ?>





 




        <?php
if(isset($_POST['simpan'])){

                    $id_trx = $_POST['id_trx'];
                    $nama_keyword  = $_POST['nama_keyword'];
                    $harga    = $_POST['harga'];
                    $id_user = $_POST['id_user'];



if(empty($nama_keyword)) {

      "<script>
      alert('Data Gagal dimasukan!'); </script>"; 

      
} {

 if(empty($harga)) {
      "<script>alert('Data Gagal dimasukan!'); </script>"; 





      } else {



$query = mysqli_query($koneksi, "INSERT INTO tmp_trx (id_trx, nama_keyword, harga, id_user) VALUES ( '$id_trx', '$nama_keyword', '$harga', '$id_user')");

if ($query){
  
} else {
  echo "<script>alert('Data Gagal dimasukan!'); window.location = 'transaksi_baru.php'</script>"; 
} 
}

}
}


                ?>
                
 

        <!-- Main content -->
        <section class="content">
          <!-- Main row -->
          <div class="row">


            <div class="col-lg-6">
              <div class="box box-widget">
                <div class="box-body">
                  <table width="100%">
                    <tr>


                     
                        <td>
                          
                             
                        </td>
                      </tr>
                      <tr>

                
              


                         <td style="vertical-align: right: width:30%">
                            <label for="text">Nama Keyword</label>
                        </td>
                        <td>

                          <div clas="form-group">
                          
                            
                           
                       <input name="nama_keyword" type="text" id="nama_keyword" class="form-control " value=""  placeholder="" autocomplete="off"    />

                           
                           <br>
                          </div>
                        </td>
                      </tr>
                        
                      <tr>

                        <td style="vertical-align: top">
                            <label for="text">Harga Keyword</label>
                        </td>
                        <td>

                          <div clas="form-group">







                            <input name="harga" type="number" id="harga" class="form-control " value=""  placeholder="" autocomplete="off"   />



                              <br>
                          </div>
                        </td>
                      </tr>
                      <tr>


                          <td style="vertical-align: top: width:30%">
                            
                        </td>
                        <td>

                          <div clas="form-group">


                             <input  type="submit" name="simpan" value="Simpan"  class="btn btn-sm btn-primary"   />&nbsp;
                            
                          
                          </div>
                        </td>
                      </tr>
                      

                        
                 </table>
              </div>
            </div>
          </div>
            <div class="col-lg-4">
              <div class="box box-widget">
                <div class="box-body">
                  <table width="100%">
                    <tr>
                       <td style="vertical-align: top">
                            <label for="date">Tanggal Beli</label>
                        </td>
                        <td>
                          <div clas="form-group">
                           <input type='text' class="form-control" type="text" value="<?php echo date("d-m-Y"); ?>" name="tgl_trx" ReadOnly required='required' />

                          


                            <br>
                          </div>
                        </td>
                      </tr>
                      <tr>

                        <td style="vertical-align: top: width:30%">
                            <label for="text">Admin</label>
                        </td>
                        <td>
                          <div clas="form-group">
                          
                            
                           <input type='text' class="form-control" type="text" name="id_user" id="id_user"  value="<?PHP ECHO $_SESSION['id_user']; ?>" readOnly />


                        

                              <br>
                          </div>
                        </td>
                      </tr>
                      <tr>




                      </tr>
                      <tr>
                          


                        
                      


                 </table>
              </div>
            </div>
          </div>
        

                 

         
            
       




          <div class="col-lg-2">
              <div class="box box-widget">
                <div class="box-body">
                  <div align="Left">
                
                   
                    
                             

                   
                  <input type="text" class="form-control" name="contoh" id="contoh" placeholder="contoh" value="JS - <?php   echo $romawi;?> - <?php echo date("y");?> " autocomplete="off" readonly >
                      <br>
                   
                   
                      </tr>

                   
                
                       
                  </div>

                   <div align="Left">
                
                   
                    <input name="id_trx" type="text" id="id_trx" class="form-control" placeholder="Tidak perlu di isi" value="<?php echo $eva; ?>" autofocus="on" readonly="readonly" />
                             

                   
                   
                      
                      <br>
                   
                   
                      </tr>

                   
                
                       
                  </div>
                </div>
              </div>
            </div>
        </div>


      




        <?php
                               
                                //Data mentah yang ditampilkan ke tabel
                                // mysqli_connect('localhost', 'root', '');
                                // mysqli_select_db('bengkel_savana');
 

                               


                                 $query1= "SELECT * FROM tmp_trx WHERE
                                   id_trx='$eva' ";

                                    
                                 
                                    


                                  if(isset($_GET['id_trx'])){
                                   $id_trx=$_GET['id_trx'];

                                 
                                    }
                                    $query_trx_list="SELECT * FROM tmp_trx where id_trx = '$eva'";
                                    $tampil_trx =mysqli_query($koneksi, $query_trx_list) or die(mysqli_error());

                    ?>




        

     <?php
             if(isset($_GET['aksi']) == 'delete'){
        $id = $_GET['id'];
        $cek = mysqli_query($koneksi, "SELECT * FROM tmp_trx WHERE id_trx='$id_trx'");
        if(mysqli_num_rows($cek) == 0){
        
        }else{
          $delete = mysqli_query($koneksi, "DELETE FROM tmp_trx WHERE id_trx='$id_trx'");
          if($delete){
            echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
          }else{
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
          }
        }
      }
      ?>
        
 <?php
             if(isset($_GET['aksi']) == 'hapus'){
        $id = $_GET['id'];
        $cek = mysqli_query($koneksi, "SELECT * FROM tmp_trx WHERE id_tmp='$id'");
        if(mysqli_num_rows($cek) == 0){
          echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
        }else{
          $delete = mysqli_query($koneksi, "DELETE FROM tmp_trx WHERE id_tmp='$id'");
          if($delete){
            
          


              echo "<script>alert('Data Berhasil di hapus!'); window.location = 'transaksi_baru.php'</script>"; 

          }else{
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
          }
        }
      }
      ?>


<?php
            $querysu= mysqli_query($koneksi, "SELECT * FROM setting ");
            $datasu  = mysqli_fetch_array($querysu);
            ?>

        <div class="row">
            <div class="col-lg-12">
              <div class="box box-widget">
                <div class="box-body table-responsive">

                   <table id="example" class="table table-responsive table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th>Nama Keyword</th>
                        
                        <th>Harga</th>
                        
                        <th><center>Aksi </center></th>
                    
                      </tr>
                   </thead>
                     <?php 


                     $no=0;
                      $subtotal=0;
                      $dolar=0;
                     while($data=mysqli_fetch_array($tampil_trx)) { 

                     
                      $total = $data['harga'] ;
                      
                      $subtotal = $subtotal + $total;


                     $dolar = $subtotal / $datasu['dollar'] ;


                      $no++; 
                      

                      ?>

                    <tbody>
                    <tr>
                        
                    <td><center><?php echo $no; ?></center></td>
                   
                    <td><left><?php echo $data['nama_keyword'];?></center></td>
                  

                    <td>Rp.<?php $harga = $data['harga']; echo number_format($harga,0,".","."); ?></td>
                    
                   
                     
                      

                    




                    <td><center>

                     
 
                
                    


                    <a onclick="return confirm ('Yakin hapus <?php echo $data['nama_keyword'];?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus Data Barang" href="transaksi_baru.php?aksi=hapus&id=<?php echo $data['id_tmp'];?>"><span class="glyphicon glyphicon-trash"></a></center>


                      
  

                        </td>
                      </tr>

                   

                                  
                    
              

                                   
                                        
                                          
                                       
                      
    
  
    <?php   
                  } 
                  ?>
                   </tbody>

                  


                   <th colspan="2" class="text-center">Grand Total </th>
                   
                   <td>Rp.<?php echo  number_format($subtotal,0,".","."); ?></td>


                  <th> <center colspan="1" class="text-center"></center> </th>

                </table>
                           
                    </div>
                </div>
            </div>
        </div>





           <div class="row">
            <div class="col-lg-5">
              <div class="box box-widget">
                <div class="box-body">
                  <table width="100%">
                    <tr>
                       <td style="vertical-align:top: width:40%">
                            <label for="sub_total">Sub Total Rp</label>
                        </td>
                        <td>
                          <div clas="form-group">

                           

                             <input name="rupiahcontoh" type="text" id="rupiahcontoh" class="form-control" placeholder="Tidak perlu di isi" value="Rp.<?php echo  number_format($subtotal,0,".","."); ?> " onkeyup="sum();" autofocus="on" readonly="readonly" />


                           <br>
                          </div>
                        </td>
                      </tr>
                      <tr>

                         <td style="vertical-align:top: width:40%">
                            <label for="bayar">Sub Total $ </label>
                        </td>
                        <td>

                          <div clas="form-group">

                           


                             <input name="dolarcontoh" type="text" id="dolarcontoh" class="form-control" placeholder="Tidak perlu di isi" value=" $.<?php echo  number_format($dolar,0,".","."); ?> " onkeyup="sum();" autofocus="on" readonly="readonly" />

                           <br> 
                          </div>
                        </td>
                      </tr>
                      
                      <tr>

                 

                 </table>
              </div>
            </div>
          </div>

   
            <div class="col-lg-4">
              <div class="box box-widget">
                <div class="box-body">
                  <table width="100%">
                    <tr>
                       <td style="vertical-align:top: width:10%">
                            <label for="sub_total">Payments</label>
                        </td>
                        <td>
                          <div clas="form-group">
                        <div>

                         <select name="payments" id="payments" class="form-control select2" required>
                            
                              
                             <?php 
                    $query2="select * from bank order by id_bank";
                    $tampil=mysqli_query($koneksi, $query2) or die(mysqli_error());
                    while($data1=mysqli_fetch_array($tampil))
                    {
                    ?>
                              
                                  
              
                                  <option value="<?php echo $data1['jenis'];?>- <?php echo $data1['nomer_rk'];?>- <?php echo $data1['nama_pemilik'];?>"><?php echo $data1['jenis'];?> - <?php echo $data1['nomer_rk'];?>- <?php echo $data1['nama_pemilik'];?></option>

                                <?php } ?>
               

                              </select> 

                      <br>
                      
                      
                          
                        </div>
                      </td>
                    </tr>
                  </table>
                
              
              </div>
            </div>
          </div>





                  
                  <div class="col-lg-3">  
                    
                    <div>  
                      <form action="function_input.php" method="post">
                     
                         <?php






 ?>




                        <button type="button"  data-toggle="modal" data-target="#tambahuser " class="btn btn-flat btn-lg btn-success">

                        <i class="fa fa-paper-plane-o"></i> Simpan Pembayaran </button><br>

                 <br>
 <button id="cancel" class="btn btn-flat btn-warning">
                        <i class="fa fa-refresh"></i> Batalkan </button><br><br>
                        


                    </div>
                  </div>



                   <!-- modal insert -->
        <div class="example-modal">
          <div id="tambahuser" class="modal fade" role="dialog" style="display:none;">
            <div class="modal-dialog"> 
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title">Simpan Pembayaran</h3>
                </div>
                <div class="modal-body">


                  
                   
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">nama client <span class="text-red">:</span></label>         
                      <div class="col-sm-8">

                        

                        <input type="text" class="form-control" name="nama_client" id="nama_client"  placeholder="nama_client" value="" autocomplete="off"   ></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Nama website <span class="text-red">:</span></label>
                      <div class="col-sm-8"><input type="text" class="form-control" name="nama_website" id="nama_website" placeholder="nama_website" value="" autocomplete="off"  ></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">email <span class="text-red">:</span></label>
                      <div class="col-sm-8"><input type="text" class="form-control" name="email" id="email" placeholder="email" value="" autocomplete="on"  ></div>
                      </div>
                    </div>
                     <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">alamat <span class="text-red">:</span></label>
                      <div class="col-sm-8"><input type="text" class="form-control" name="alamat" id="alamat" placeholder="alamat" value="" autocomplete="off"  ></div>
                      </div>
                    </div>

                     <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">no_hp <span class="text-red">:</span></label>
                      <div class="col-sm-8"><input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="no_hp" value="" autocomplete="off"   ></div>
                      </div>
                    </div>


                    <?php
$array_bln = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XII","XII");
$bln = $array_bln[date('n')];

?>

                   <input type="hidden" class="form-control" name="id_trx2" id="id_trx2" placeholder="id_trx2" value="JS - <?php   echo $romawi;?> - <?php echo date("y");?> " autocomplete="off" >
                 



                   

                        <input type="hidden" class="form-control" name="id_trx" placeholder="id_trx" value="<?php echo $eva; ?>">

                     

                   <input type="hidden" class="form-control" name="tgl_trx" placeholder="tgl_trx" value="<?php echo date("Y-m-d"); ?>">

                    <input type="hidden" class="form-control" name="total" placeholder="total" value="<?php echo $subtotal; ?>">
                    

                    <div class="modal-footer">
                      <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                      <input  type="submit" name="simpantrx" value="simpantrx" class="btn btn-primary" >
                    </div>
                    <!--<div class="box-footer">
                      <a href="../user/data_user.php" class="btn btn-danger"><i class="fa fa-close"></i> Batal</a>
                      <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                    </div> /.box-footer -->
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div><!-- modal insert close -->




 

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
     <!--<script type="text/javascript"> 

            $(function () {
                $("#lookup").dataTable({"lengthMenu":[25,50,75,100],"pageLength":25});
            });
  
   
        </script>-->
 <script>
        $(document).ready(function() {

            var dataTable = $('#lookup').DataTable( {
               "processing": true,
               "serverSide": true,
               "ajax":{
                  url :"ajax-grid-data.php", // json datasource
                  type: "post",  // method  , by default get
                  error: function(){  // error handling
                     $(".lookup-error").html("");
                     $("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                     $("#lookup_processing").css("display","none");
                     
                  }
               }
            } );

            
            $('#lookup').on('click', '#btn-select-barang', function(e){
                e.preventDefault();
                let data_id   = $(this).attr('data-id');
                let data_name = $(this).attr('data-name');

                $('#id_brg').val(data_id);
                $('#nama').val(data_name);
                $('#tambahuser').modal('hide');
            });

         } );
        </script>


        <script>
function sum() {
      var txtFirstNumberValue = document.getElementById('total').value;
      var txtSecondNumberValue = document.getElementById('bayar').value;
      var result = parseInt(txtSecondNumberValue) - parseInt(txtFirstNumberValue);
      if (!isNaN(result)) {
         document.getElementById('txt3').value = result;
      }
}
</script>



<script type="text/javascript">
  function validasi() {
    var nama_keyword = document.getElementById("nama_keyword").value;
    var harga = document.getElementById("harga").value;
    
    if (nama_keyword != "" && harga!="" ) {
      return true;
    }else{
      alert('Anda harus mengisi data dengan lengkap !');
    }
  }
</script>
   
  </body>
</html>
           