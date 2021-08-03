<?php require('atas.php') ?>
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
                                <label>Nama Barang yang Rusak</label>
                                <select name="idinventorirusak" class="form-control" onchange='ubah(this.value)' required>
                                    <option disabled selected>Pilih</option>
                                  <?php
                                    $rendi = mysqli_query($kon, "SELECT * FROM inventorirusak INNER JOIN inventori ON inventorirusak.idinventori = inventori.idinventori ORDER BY namainven ASC");
                                    $a    = "var maxStok = new Array();\n;";
                                    $b    = "var tglrusak = new Array();\n;";
                                      while($haikal = mysqli_fetch_array($rendi)) {
                                        echo "<option value='$haikal[idinventorirusak]'>$haikal[namainven] - $haikal[merk]</option>";
                                        $a .= "maxStok['" . $haikal['idinventorirusak'] . "'] = {maxStok:'" . addslashes($haikal['jumlah'])."'};\n";
                                        $b .= "tglrusak['" . $haikal['idinventorirusak'] . "'] = {tglrusak:'" . addslashes($haikal['tglrusak'])."'};\n";
                                      } 
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Rusak</label>
                                <input class="form-control" name="tglrusak" type="date" id="tglrusak" readonly>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Diperbaiki</label>
                                <input class="form-control" name="tgl" type="date" value="<?= date('Y-m-d')?>" required>
                            </div>
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input class="form-control" type="number" id="maxStok" name="repair" required>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea class="form-control" name="catatan" required></textarea>
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
    $tgl                 = $_REQUEST['tgl'];
    $idinventorirusak    = $_REQUEST['idinventorirusak'];
    $catatan             = $_REQUEST['catatan'];
    $repair              = $_REQUEST['repair'];

    $tambah = mysqli_query($kon,"INSERT INTO inventorirepair(tgl,idinventorirusak,catatan,repair) VALUES ('$tgl','$idinventorirusak','$catatan','$repair')");
    if($tambah){
      ?> <script>alert("Berhasil Disimpan");window.location='repair.php';</script> <?php
    }else{
      ?> <script>alert("Gagal Disimpan");window.location='repair_input.php';</script> <?php
    }
  }
?>

<script>   
  <?php echo $a; echo $b; ?>
  function ubah(id){  
      document.getElementById('maxStok').max = maxStok[id].maxStok; 
      document.getElementById('tglrusak').value = tglrusak[id].tglrusak; 
  };   
</script> 