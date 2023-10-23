<?php
//memasukkan koneksi database
require_once("koneksi.php");

//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if($_POST['id_trx']){
  //membuat variabel id berisi post['id']
  $id = $_POST['id_trx'];
  //query standart select where id
  $view = $koneksi->query("SELECT * FROM trx WHERE id_trx='$id_trx'");
  //jika ada datanya
  if($view->num_rows){
    //fetch data ke dalam veriabel $row_view
    $row_view = $view->fetch_assoc();
    //menampilkan data dengan table
    echo '
    <p>Berikut ini adalah detail dari data siswa <b>'.$row_view['id_trx'].'</b></p>
    <table class="table table-bordered">
      <tr>
        <th>NAMA LENGKAP</th>
        <td>'.$row_view['id_kon'].'</td>
      </tr>
      <tr>
        <th>KELAS</th>
        <td>'.$row_view['tgl_trx'].'</td>
      </tr>
      <tr>
        <th>JURUSAN</th>
        <td>'.$row_view['total'].'</td>
      </tr>
    </table>
    ';
  }
}
?>