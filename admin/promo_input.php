<?php require('atas.php') ?>
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
                                <input class="form-control" name="waktu1" type="datetime-local" value="<?= date('Y-m-d')?>" required>
                                <label>Waktu Berakhir</label>
                                <input class="form-control" name="waktu2" type="datetime-local" value="<?= date('Y-m-d')?>" required>
                            </div>
                            <div class="form-group">
                                <label>Jenis Laundry</label>
                                <select name="idjenis" class="form-control" onchange='ubah(this.value)' required>
                                    <option>Pilih</option>
                                  <?php
                                    $rendi = mysqli_query($kon, "SELECT * FROM jenis ORDER BY jenis ASC");
                                    $a    = "var harga = new Array();\n;";
                                    $b    = "var maxStok = new Array();\n;";
                                      while($haikal = mysqli_fetch_array($rendi)) {
                                        echo "<option value='$haikal[idjenis]'>$haikal[jenis] - $haikal[subjenis]</option>";
                                        $a .= "harga['" . $haikal['idjenis'] . "'] = {harga:'" . addslashes($haikal['harga'])."'};\n";
                                        $b .= "maxStok['" . $haikal['idjenis'] . "'] = {maxStok:'" . addslashes($haikal['harga'])."'};\n";
                                      } 
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Harga Awal</label>
                                <input type="number" name="hargaawal" id="harga" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label>Harga Promo</label>
                                <input class="form-control" id="maxStok" type="number" name="hargapromo" required>
                            </div>
                            <div class="form-group">
                                <label>Event</label>
                                <textarea class="form-control" name="event" required></textarea>
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
    $waktu1     = $_REQUEST['waktu1'];
    $waktu2     = $_REQUEST['waktu2'];
    $idjenis    = $_REQUEST['idjenis'];
    $hargaawal  = $_REQUEST['hargaawal'];
    $hargapromo = $_REQUEST['hargapromo'];
    $event      = $_REQUEST['event'];

    $tambah = mysqli_query($kon,"INSERT INTO promo(waktu1,waktu2,idjenis,hargaawal,hargapromo,event) VALUES ('$waktu1','$waktu2','$idjenis','$hargaawal','$hargapromo','$event')");
    if($tambah){
      ?> <script>alert("Berhasil Disimpan");window.location='promo.php';</script> <?php
    }else{
      ?> <script>alert("Gagal Disimpan");window.location='promo_input.php';</script> <?php
    }
  }
?>
<script>   
  <?php echo $a;echo $b; ?>
  function ubah(id){  
    document.getElementById('harga').value = harga[id].harga; 
    document.getElementById('maxStok').max = maxStok[id].maxStok;
  };   
</script> 