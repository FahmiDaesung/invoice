<html>
<head>
	<title>Bengkel savana</title>



	<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "bengkel_savana";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}   
?>


	
                <div class="box-body">
                  <div class="form-panel">
                  <table width="100%">

                    
  
  <html lang="en">
<head>
	

	<title><?php echo $pagetitle ?></title>

	<link href="foto/logo.png" rel="icon" type="images/x-icon">


	
</head>

<body>
	<section id="header-kop">
		<div class="container-fluid">
			<table class="table border">
				<tbody>
					
						
						<tr>
						<left>
							
						</left>
						
						
								
						<center>
						
						<b> Data Barang Bengkel Savana</b> <br>
						Bumiayu<br>
						Telp: (021) 192819189<br>

					</center>
			
						
						</td>
					</tr>
				</tbody>
			</table>
			<hr class="line-top" />
		</div>
	</section>
	<section id="body-of-report">
		<div class="container-fluid">

      <?php
                   
                    $query1="select * from barang_jasa WHERE jenis='barang' ORDER BY nama ASC";
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>
		
             <table border style="width: 100%">
                  <thead>
                      <tr>
                         



                      <th><center>No </center></th>
                        <th><center>id_brg</center></th>
                        <th><center>Nama</center></th>
                        <th><center>Jenis</center></th>
                        <th><center>Stok</center></th>
                        <th><center>Harga</center></th>
                        <th><center>Keterangan</center></th>
                        <th><center>Satuan</center></th>
                        
                      </tr>
                  </thead>
                    <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; ?>
                    <tbody>
                    <tr>
                        
                   <td><center><?php echo $no; ?></center></td>
                   <td><center><?php echo $data['id_brg'];?></center></td>
                    <td><center><?php echo $data['nama'];?></center></td>
                    <td><center><?php echo $data['jenis'];?></center></td>
                    <td><center><?php echo $data['stok'];?></center></td>
                    <td><center><?php echo $data['harga'];?></center></td>
                    <td><center><?php echo $data['keterangan'];?></center></td>
                    <td><center><?php echo $data['satuan'];?></center></td>
                    
                    <tr>

                                  
                    
              

                                   
                                        
                                          
                                       
                      
    
  
    <?php   
                  } 
                  ?>
                   </tbody>
                   
                  
                   
                </table>
                           
                    </div>
                </div>
            </div>
        </div>
 
	<script>
		window.print();
	</script>
 
</body>
</html>