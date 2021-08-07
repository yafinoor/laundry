<?php require('header.php') ?>
	</div>
    <div class="container">
        <br><br><br><br><br><br><div class="row">
            <div class="col-lg-12">
                <h2>Tambah Permohonan Antar Jemput</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="alert alert-primary">
                    Pilih Jenis Laundry yang dibutuhkan, kemudian klik tombol <button class="btn btn-outline btn-primary">Tambah</button> untuk memasukkan ke keranjang.
                    <br><br>Jika sudah selesai, klik tombol <button class="btn btn-outline btn-primary">Simpan</button>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                         <form role="form" action="" method="POST">
                                <label>Jenis Laundry</label>
                                <select name="idjenis" onchange='ubah(this.value)' class="email-bt" required>
                                    <option>Pilih</option>
                                  <?php
                                    $rendi = mysqli_query($kon, "SELECT * FROM jenis ORDER BY jenis ASC");
                                    $a    = "var harga = new Array();\n;";
                                    $b    = "var idjenis = new Array();\n;";
                                      while($haikal = mysqli_fetch_array($rendi)) {
                                        echo "<option value='$haikal[idjenis]'>$haikal[jenis] - $haikal[subjenis]</option>";
                                        $a .= "harga['" . $haikal['idjenis'] . "'] = {harga:'" . addslashes($haikal['harga'])."'};\n";
                                        $b .= "idjenis['" . $haikal['idjenis'] . "'] = {idjenis:'" . addslashes($haikal['idjenis'])."'};\n";
                                      } 
                                    ?>
                                </select>
                                <label>Harga</label>
                                <input type="number" class="email-bt form-control" name="harga" id="harga" readonly>
                            <div class="form-group">
                                <label>Jumlah/Berat Cucian</label>
                                <input type="number" name="jumlahku" class="email-bt form-control" required>
                            </div>
                            <button type="submit" name="tambah" class="btn btn-outline btn-primary">Tambah</button>
                            <button type="button" class="btn btn-outline btn-default"><a href="mohon_bersih.php" style="color: black; text-decoration: none">Bersihkan Daftar Belanja</a></button>
                        </form>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <div class="col-lg-8">
                <div class="panel panel-default" style="color: black;">
                    <div class="panel-body">
                         <form role="form" action="" method="POST">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTables-example">
                                    <thead class="success table-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Laundry</th>
                                            <th>Sub Jenis Laundry</th>
                                            <th>Harga</th>
                                            <th>Jumlah/Berat Cucian</th>
                                            <th>Sub Harga</th>
                                            <th><i class="fa fa-toggle-on"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; $totalbelanja = 0; foreach ($_SESSION['keranjang'] as $idjenis => $jumlah) :
                                            $jenis = mysqli_query($kon, "SELECT * FROM jenis WHERE idjenis = '$idjenis'"); 
                                            $data = mysqli_fetch_assoc($jenis); 
                                            $subharga = $data['harga']*$jumlah;?>
                                            <tr class="odd gradeX">
                                                <td><?= $no++; ?></td>
                                                <td><?= $data['jenis'] ?></td>
                                                <td><?= $data['subjenis'] ?></td>
                                                <td><?= $data['harga'] ?></td>
                                                <td><?= $jumlah ?></td>
                                                <td>Rp. <?= $subharga ?></td>
                                                <td> <a href="mohon_hapus.php?idjenis=<?php echo $data['idjenis'] ?>" class="btn btn-outline btn-danger btn-sm">hapus</a> </td>
                                            </tr>
                                        <?php $totalbelanja+=$subharga; ?>
                                        <?php endforeach ?>  
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="5">Total yang harus dibayarkan : </th>
                                        <th colspan="2">
                                        <span>Rp. <?= number_format($totalbelanja,0,',','.') ?></span>
                                        </th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="form-group">
                                <label>Layanan</label>
                                <select name="layanan" id="layanan" class="email-bt">
                                    <option value="Antar Jemput">Antar Jemput</option>
                                    <option value="Jemput">Jemput</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <?php $qr = mysqli_query($kon, "SELECT * FROM user WHERE id = '$memori[id]'");
                                $rt = mysqli_fetch_array($qr); ?>
                                <input type="text" class="email-bt form-control" value="<?= $rt['alamat'] ?>" readonly/>
                            </div>
                            <div class="form-group">
                                <label>Catatan</label>
                                <textarea class="email-bt" name="catatan" required style="height: 105px;"></textarea>
                            </div>
                            
                            <button type="submit" name="simpan" class="btn btn-outline btn-primary">Simpan</button>
                        </form>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /.container-fluid -->

      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <script>   
        <?php echo $a;echo $b; ?>
            function ubah(id){  
            document.getElementById('harga').value = harga[id].harga; 
        }; 
        var hiding = document.querySelectorAll('.nice-select');
        hiding.forEach(function(e){ e.style.display = 'none'; });  
    </script> 
   </body>
</html>
<?php
    date_default_timezone_set('Asia/Kuala_Lumpur');
    if (isset($_POST['tambah'])) {
        $idjenis  = $_REQUEST['idjenis'];
        $jumlahku = $_REQUEST['jumlahku'];
        $harga    = $_REQUEST['harga'];
        if (isset($_SESSION['keranjang'][$idjenis])) {
          $_SESSION['keranjang'][$idjenis] += $jumlahku;
        }else{
          $_SESSION['keranjang'][$idjenis] = $jumlahku;
        }

        echo "<script>window.location = 'mohon_input.php';</script>";
    }

    if (isset($_POST['simpan'])) {
        $id          = $_REQUEST['id'];
        $tgl         = date('Y-m-d\TH:i');
        $layanan     = $_REQUEST['layanan'];
        $catatan     = $_REQUEST['catatan'];
        $notransaksi = date('Ymds');

        $hasil = mysqli_query($kon,"INSERT INTO transaksi (notransaksi,id,total,tgl,layanan,catatan,konfirmasi,bayar) VALUES ('$notransaksi','$memori[id]','$totalbelanja','$tgl','$layanan','$catatan','Menunggu','Belum')");

        foreach ($_SESSION['keranjang'] as $idjenis => $jumlah) {
            $query      = mysqli_query($kon, "SELECT * FROM jenis WHERE idjenis = '$idjenis'");
            $ambil      = mysqli_fetch_array($query);
            $jenis      = $ambil['jenis'];
            $hargany    = $ambil['harga'];
            $subjenisny = $ambil['subjenis'];
            $kimiwiw    = $jumlah * $hargany;

            $detail = mysqli_query($kon,"INSERT INTO detail (notransaksi, jenisny, subjenisny, jumlah, hargany, subharga) VALUES ('$notransaksi','$jenis','$subjenisny','$jumlah','$hargany','$kimiwiw')");
        }

        if($hasil){
            ?> <script>alert('Permohonan berhasil dikirim, tunggu konfirmasi Admin.'); window.location = 'mohon.php';</script><?php
            unset($_SESSION['keranjang']);
        }else{
            ?> <script>alert('Gagal, cek kembali!.'); window.location = 'mohon_input.php';</script><?php
        }
    }
 ?>