<?php require('atas.php'); $idjenis = $_GET['idjenis'];
  $query = mysqli_query($kon, "SELECT * FROM jenis WHERE idjenis = '$idjenis'");
  $data = mysqli_fetch_array($query);
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><button class="btn btn-danger btn-lg"><a href="jenis.php" style="color: white; text-decoration: none"> <i class="fa fa-angle-left"></i> Kembali</a></button></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                         <form role="form" action="" method="POST">
                            <div class="form-group">
                                <label>Jenis</label>
                                <select class="form-control" name="jenis" required>
                                    <option value="<?= $data['jenis'] ?>"><?= $data['jenis'] ?></option>
                                    <option value="Cuci Kiloan">Cuci Kiloan</option>
                                    <option value="Cuci Satuan">Cuci Satuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sub Jenis</label>
                                <select class="form-control" name="subjenis" required>
                                    <option value="<?= $data['subjenis'] ?>"><?= $data['subjenis'] ?></option>
                                    <option value="Cuci Saja">Cuci Saja</option>
                                    <option value="Cuci Basah">Cuci Basah</option>
                                    <option value="Cuci Kering">Cuci Kering</option>
                                    <option value="Cuci Setrika">Cuci Setrika</option>
                                    <option value="Setrika Saja">Setrika Saja</option>
                                    <option value="Selimut Tipis">Selimut Tipis</option>
                                    <option value="Selimut Tebal">Selimut Tebal</option>
                                    <option value="Bad Cover Kecil">Bad Cover Kecil</option>
                                    <option value="Bad Cover Besar">Bad Cover Besar</option>
                                    <option value="Paket 1 (Cuci Kering 5kg)">Paket 1 (Cuci Kering 5kg)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input class="form-control" type="number" name="harga" value="<?= $data['harga'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Waktu Pengerjaan</label>
                                <input class="form-control" type="text" value="<?= $data['ket'] ?>" name="ket" required>
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
    $jenis  = $_REQUEST['jenis'];
    $subjenis       = $_REQUEST['subjenis'];
    $harga       = $_REQUEST['harga'];
    $ket       = $_REQUEST['ket'];

    $ubah = mysqli_query($kon,"UPDATE jenis SET subjenis = '$subjenis', jenis = '$jenis', harga = '$harga', ket = '$ket' WHERE idjenis = '$idjenis'");
    if($ubah){
      ?> <script>alert("Berhasil Diubah");window.location='jenis.php';</script> <?php
    }else{
      ?> <script>alert("Gagal Diubah");window.location='jenis.php';</script> <?php
    }
  }
?>