<?php require('atas.php'); $notransaksi = $_GET['notransaksi'];
  $query = mysqli_query($kon, "SELECT * FROM transaksi INNER JOIN user ON transaksi.id = user.id WHERE notransaksi = '$notransaksi'");
  $data = mysqli_fetch_array($query);
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><button class="btn btn-danger btn-lg"><a href="transaksi.php" style="color: white; text-decoration: none"> <i class="fa fa-angle-left"></i> Kembali</a></button></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                         <form role="form" action="" method="POST">
                            <div class="form-group">
                                <label>No. Transaksi - Pelanggan</label>
                                <input class="form-control" type="text" value="<?= $data['notransaksi'].' - '.$data['nama'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Layanan</label>
                                <select class="form-control" name="layanan" required>
                                    <option value="<?= $data['layanan'] ?>"><?= $data['layanan'] ?></option>
                                    <option value="Tidak">Tidak</option>
                                    <option value="Antar">Antar</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Total Belanja</label>
                                <input class="form-control" type="number" value="<?= $data['total']-$data['ongkir'] ?>" readonly>
                                <input type="hidden" name="ongkirLama" value="<?= $data['ongkir'] ?>">
                                <input type="hidden" name="total" value="<?= $data['total'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Ongkir</label>
                                <input class="form-control" type="number" name="ongkir" value="<?= $data['ongkir'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Bayar</label>
                                <select class="form-control" name="bayar" required>
                                    <option value="<?= $data['bayar'] ?>"><?= $data['bayar'] ?></option>
                                    <option value="Sudah">Sudah</option>
                                    <option value="Belum">Belum</option>
                                </select>
                            </div>
                            <button type="submit" name="simpan" class="btn btn-outline btn-primary"><i class="fa fa-check-square"></i> Ubah</button>
                            <button type="reset" class="btn btn-outline btn-default"><i class="fa fa-refresh"></i> Ulangi</button>
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
</div>
<!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php require('bawah.php') ?>
<?php
  if (isset($_POST['simpan'])) {
    $total       = $_REQUEST['total']-$_REQUEST['ongkirLama']+$_REQUEST['ongkir'];
    $layanan     = $_REQUEST['layanan'];
    $ongkir      = $_REQUEST['ongkir'];
    $bayar       = $_REQUEST['bayar'];

    $ubah = mysqli_query($kon,"UPDATE transaksi SET total = '$total', layanan = '$layanan', ongkir = '$ongkir', bayar = '$bayar' WHERE notransaksi = '$notransaksi'");
    ?> <script>alert("Berhasil Diubah");window.location='transaksi.php';</script> <?php
  }
?>