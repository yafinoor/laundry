<?php require('atas.php'); $notransaksi = $_GET['notransaksi'];
  $query = mysqli_query($kon, "SELECT * FROM transaksi WHERE notransaksi = '$notransaksi'");
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
                                <label>Dicuci</label>
                                <select class="form-control" name="dicuci" required>
                                    <option value="<?= $data['dicuci'] ?>"><?= $data['dicuci'] ?></option>
                                    <option value="Belum">Belum</option>
                                    <option value="Sudah">Sudah</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Antar Jemput</label>
                                <select class="form-control" name="antarjemput" required>
                                    <option value="<?= $data['antarjemput'] ?>"><?= $data['antarjemput'] ?></option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Catatan</label>
                                <input class="form-control" name="catatan" value="<?= $data['catatan'] ?>" required>
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
    $dicuci       = $_REQUEST['dicuci'];
    $antarjemput            = $_REQUEST['antarjemput'];
    $catatan         = $_REQUEST['catatan'];

    $ubah = mysqli_query($kon,"UPDATE transaksi SET antarjemput = '$antarjemput', dicuci = '$dicuci', catatan = '$catatan' WHERE notransaksi = '$notransaksi'");
    ?> <script>alert("Berhasil Diubah");window.location='transaksi.php';</script> <?php
  }
?>