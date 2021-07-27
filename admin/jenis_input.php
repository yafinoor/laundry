<?php require('atas.php') ?>
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
                                <label>Jenis Laundry</label>
                                <select class="form-control" name="jenis" required>
                                    <option selected disabled>Pilih</option>
                                    <option value="Cuci Kiloan">Cuci Kiloan</option>
                                    <option value="Cuci Satuan">Cuci Satuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sub Jenis</label>
                                <select class="form-control" name="subjenis" required>
                                    <option selected disabled>Pilih</option>
                                    <option value="Cuci Basah">Cuci Basah</option>
                                    <option value="Cuci Kering">Cuci Kering</option>
                                    <option value="Paket 1 (Cuci Kering 5kg)">Paket 1 (Cuci Kering 5kg)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input class="form-control" type="number" name="harga" required>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input class="form-control" type="text" name="ket" required>
                            </div>
                            <button type="submit" name="simpan" class="btn btn-outline btn-primary"><i class="fa fa-check-square"></i> Simpan</button>
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
    $jenis       = $_REQUEST['jenis'];
    $subjenis  = $_REQUEST['subjenis'];
    $ket  = $_REQUEST['ket'];
    $harga  = $_REQUEST['harga'];

    $tambah = mysqli_query($kon,"INSERT INTO jenis(jenis,subjenis,ket,harga) VALUES ('$jenis','$subjenis','$ket','$harga')");
    if($tambah){
      ?> <script>alert("Berhasil Disimpan");window.location='jenis.php';</script> <?php
    }else{
      ?> <script>alert("Gagal Disimpan");window.location='jenis_input.php';</script> <?php
    }
  }
?>