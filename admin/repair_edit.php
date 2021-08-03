<?php require('atas.php'); $idinventorirepair = $_GET['idinventorirepair'];
  $query = mysqli_query($kon, "SELECT * FROM inventorirepair INNER JOIN inventorirusak ON inventorirepair.idinventorirusak = inventorirusak.idinventorirusak INNER JOIN inventori ON inventorirusak.idinventori = inventori.idinventori WHERE idinventorirepair = '$idinventorirepair'");
  $data = mysqli_fetch_array($query);
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><button class="btn btn-danger btn-lg"><a href="repair.php" style="color: white; text-decoration: none"> <i class="fa fa-angle-left"></i> Kembali</a></button></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                         <form role="form" action="" method="POST">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input class="form-control" type="text" name="idinventori" value="<?= $data['namainven'].' - '.$data['merk'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Rusak</label>
                                <input class="form-control" type="date" value="<?= $data['tglrusak'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Rusak</label>
                                <input class="form-control" type="number" name="jumlah" value="<?= $data['jumlah'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Diperbaiki</label>
                                <input class="form-control" type="date" name="tgl" value="<?= $data['tgl'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input class="form-control" name="catatan" value="<?= $data['catatan'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input class="form-control" type="number" name="repair" value="<?= $data['repair'] ?>" required>
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
    $tgl       = $_REQUEST['tgl'];
    $catatan   = $_REQUEST['catatan'];
    $repair     = $_REQUEST['repair'];
    $jumlah     = $_REQUEST['jumlah'];

    if($repair > $jumlah){
        ?> <script>alert("Gagal Diubah, Jumlah Melebihi Barang yang Rusak");window.location='repair.php';</script> <?php
    }else{
        $ubah = mysqli_query($kon,"UPDATE inventorirepair SET catatan = '$catatan', tgl = '$tgl', repair = '$repair' WHERE idinventorirepair = '$idinventorirepair'");
        ?> <script>alert("Berhasil Diubah");window.location='repair.php';</script> <?php
    }
  }
?>