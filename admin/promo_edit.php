<?php require('atas.php'); $idpromo = $_GET['idpromo'];
  $query = mysqli_query($kon, "SELECT * FROM promo INNER JOIN jenis ON promo.idjenis = jenis.idjenis WHERE idpromo = '$idpromo'");
  $data = mysqli_fetch_array($query);
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><button class="btn btn-danger btn-lg"><a href="promo.php" style="color: white; text-decoration: none"> <i class="fa fa-angle-left"></i> Kembali</a></button></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                         <form role="form" action="" method="POST">
                            <div class="form-group">
                                <label>Waktu Mulai</label>
                                <input class="form-control" type="datetime-local" name="waktu1" value="<?php echo date('Y-m-d\TH:i',strtotime($data['waktu1'])) ?>" required>
                                <label>Waktu Selesai</label>
                                <input class="form-control" type="datetime-local" name="waktu2" value="<?php echo date('Y-m-d\TH:i',strtotime($data['waktu2'])) ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Jenis Laundry</label>
                                <input class="form-control" type="text" name="idjenis" value="<?= $data['jenis'].' - '.$data['subjenis'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Harga Awal</label>
                                <input class="form-control" type="number" name="hargaawal" value="<?= $data['hargaawal'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Harga Promo</label>
                                <input class="form-control" type="number" name="hargapromo" value="<?= $data['hargapromo'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Event</label>
                                <textarea name="event"  class="form-control" required><?= $data['event'] ?></textarea>
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
    $waktu1 = $_REQUEST['waktu1'];
    $waktu2 = $_REQUEST['waktu2'];
    $event  = $_REQUEST['event'];
    $hargapromo = $_REQUEST['hargapromo'];
    $hargaawal   = $_REQUEST['hargaawal'];

    $ubah = mysqli_query($kon,"UPDATE promo SET event = '$event', waktu1 = '$waktu1', waktu2 = '$waktu2', hargapromo = '$hargapromo', hargaawal = '$hargaawal' WHERE idpromo = '$idpromo'");
    ?> <script>alert("Berhasil Diubah");window.location='promo.php';</script> <?php

  }
?>