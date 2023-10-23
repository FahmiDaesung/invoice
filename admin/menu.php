<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo $_SESSION['gambar']; ?>" height="200" width="200" style="border: 2px solid white;" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['nama']; ?></p>
              <a href="index.php"><i class="fa fa-circle text-success"></i> <?php echo $_SESSION['level']; ?></a>
            </div>
          </div><br />
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Sistem Informasi Invoice</li>
            <li class="active treeview">
              <a href="index.php">
                <i class="fa fa-home"></i> <span>Dashboard</span>
              </a>
            </li>

            </li>


            <?php


// Menghubungkan ke database
$conn = mysqli_connect('localhost', 'root', '', 'seomedia');

// Cek Koneksi
if (!$conn) {
    echo "Gagal terhubung ke database!";
    die;
}
// Mencari data (kode) yang paling besar (terakhir) dari database
$query = mysqli_query($conn, "SELECT max(id_trx) as max_kode FROM tmp_trx");
$data = mysqli_fetch_array($query);
// Sudah dapat nih gan
$id_trx = $data['max_kode'];

// Oke sekarang kita ambil bagian angkanya saja dan membuang string yang ada diawal
$no = substr($id_trx, 1, 8);
// Contoh kodenya 'B0001'
// Setelah dibuang string 'B', hasilnya menjadi '0001'
// maksud substr diatas adalah mengambil 4 katakter dimulai dari index ke 1 (karakter ke-2)

// Selanjutnya kita convert ke tipe data Integer agar bisa di Increment (ditambah)
$no = (int) $no;
// Ditambah 1
$no += 0;

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
$arun = $str . sprintf("%03s", $no);





 ?>
    
            
              <li><a href="agency.php"><i class="fa fa-cubes"></i> Data Agency</a></li>

            <li>
            
            </li>
            
              <li><a href="bank.php"><i class="fa fa-bank"></i> Data Bank</a></li>

            <li>

             
          

            <li class="treeview">
              <a href="#">
                <i class="fa fa-refresh"></i> <span>Transaksi</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">

                  <li><a href="transaksi_baru.php" value="<?php echo $arun; ?>" > <i class="fa fa-circle-o"></i>Create Invoice</a></li>
               
                <li><a href="data_transaksi.php"><i class="fa fa-circle-o"></i> Data Invoice</a></li>

                
              </ul>
            </li>
            
          
            <li class="treeview">
              <a href="bayes.php">
                <i class="fa fa-user"></i> <span>Data Pengguna Sistem</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="adminku.php"><i class="fa fa-circle-o"></i> Data admin</a></li>
               
              </ul>
            </li>
            
            <li>
              <a href="#">
                <i class="fa fa-file"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="laporan.php"><i class="fa fa-circle-o"></i> Laporan Transaksi </a></li>
                
               
              </ul>
            </li>

              <?php
                    $no = 1;
                    $queryview = mysqli_query($koneksi, "SELECT * FROM  setting where id = '1'");
                    while ($data = mysqli_fetch_assoc($queryview)) {
                  ?>


            <li>
              <a href="#">
                <i class="fa fa-refresh"></i> <span>Setting</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">

                <li><a href="setting.php?aksi=edit&id=<?php echo $data['id'];?>"><i class="fa fa-circle-o"></i> Tanda Tangan & Dollars </a></li>
                
               
              </ul>
            </li>
                  
<?php
                    }
                  ?>


        </section>
        <!-- /.sidebar -->
      </aside>