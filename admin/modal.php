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
  <tr>
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



                                    <th width="1%">No</th>
                                    <th width="10%">Nama Barang/Jasa</th>
                                    <th width="5%">Jumlah</th>
                                    <th width="10%">Harga Satuan</th>
                                    <th width="10%">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                $grand=0;
                                //Data mentah yang ditampilkan ke tabel
                                mysql_connect('localhost', 'root', '');
                                mysql_select_db('bengkel_savana');



                                
                           $sql = mysql_query('SELECT * FROM tmp_trx INNER JOIN barang_jasa ON tmp_trx.id_trx = barang_jasa.id_brg');

                          
                            

                           
                             

                                while ($r = mysql_fetch_array($sql)) {
                                    ?>
                                    <tr class="pilih" data-kodeobat="<?php echo $r['id_trx']; ?>">


              
                                        
                                        <td><?php echo $r['id_trx']; ?></td>
                                        <td><?php echo $r['nama']; ?></td>
                                        
                                        <td><?php echo $r['jml']; ?></td>
                                          <td><?php echo $r['harga']; ?></td>
                                          <td><?php echo $r['total']; ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
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
                document.getElementById("kode_obat").value = $(this).attr('data-kodeobat');
                $('#myModal').modal('hide');
            });
//            tabel lookup obat
            $(function () {
                $("#lookup").dataTable();
            });
            function dummy() {
                var kode_obat = document.getElementById("kode_obat").value;
                alert('kode obat ' + kode_obat + ' berhasil tersimpan');
            }
        </script>