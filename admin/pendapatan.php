<?php require('atas.php'); error_reporting(0); ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-sm" style="margin:0 auto">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Cetak</h4>
            </div>
            <div class="modal-body">
                <form action="../report/laporanPendapatan.php" target="_blank" method="post">
                <label>Tahun</label>
                <select name="tahun" class="form-control" required>
                  <?php
                    $ahay = mysqli_query($kon, "SELECT DISTINCT YEAR(tgl) as tahun FROM transaksi ORDER BY tahun ASC");
                    while($baris = mysqli_fetch_array($ahay)) {
                        ?><option value="<?= $baris['tahun'] ?>"><?= $baris['tahun']; ?></option> 
                    <?php } ?>
                </select>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i></button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"> Data Pendapatan (Rp) </button></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTables-example">
                                <thead class="success">
                                    <tr>
                                        <th>No</th>
                                        <th>Periode</th>
                                        <th>Transaksi Laundry</th>
                                        <th>Biaya Pengeluaran</th>
                                        <th>Inventori Masuk</th>
                                        <th>Gaji Karyawan</th>
                                        <th>Laba Bersih</th>
                                    </tr>
                                </thead>
                                <tbody>
                    <?php 
                      $no = 1;
                      $query = mysqli_query($kon, "SELECT tgl, MONTH(tgl) as bulan, YEAR(tgl) as tahun FROM `transaksi` GROUP BY bulan ORDER BY tgl ASC");
                      while($data = mysqli_fetch_array($query)){
                        $bulan = $data['bulan'];
                        $tahun = $data['tahun'];
                        $laundry = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM transaksi WHERE MONTH(tgl) = '$bulan' AND YEAR(tgl) = '$tahun'"));
                        $pengeluaran = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM biaya WHERE MONTH(tgl) = '$bulan' AND YEAR(tgl) = '$tahun'"));
                        $inventorimasuk = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM inventorimasuk WHERE MONTH(tgl) = '$bulan' AND YEAR(tgl) = '$tahun'"));
                        $gaji = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM gaji WHERE MONTH(tgl) = '$bulan' AND YEAR(tgl) = '$tahun'"));
                        ?>
                          <tr>
                          <td><?= $no++ ?></td> 
                          <td><?php 
                            if($data['bulan'] == 6){echo 'Juni'.' - '. $data['tahun']; }
                            else if($data['bulan'] == 7){echo 'Juli'.' - '. $data['tahun']; }
                            else if($data['bulan'] == 8){echo 'Agustus'.' - '. $data['tahun']; }
                            else if($data['bulan'] == 9){echo 'September'.' - '. $data['tahun']; }
                            else if($data['bulan'] == 10){echo 'Oktober'.' - '. $data['tahun']; }
                            else if($data['bulan'] == 11){echo 'November'.' - '. $data['tahun']; }
                            else if($data['bulan'] == 12){echo 'Desember'.' - '. $data['tahun']; }
                            else if($data['bulan'] == 1){echo 'Januari'.' - '. $data['tahun']; }
                            else if($data['bulan'] == 2){echo 'Februari'.' - '. $data['tahun']; }
                            else if($data['bulan'] == 3){echo 'Maret'.' - '. $data['tahun']; }
                            else if($data['bulan'] == 4){echo 'April'.' - '. $data['tahun']; }
                            else if($data['bulan'] == 5){echo 'Mei'.' - '. $data['tahun']; }
                          ?></td>
                          <td>Rp. <?= number_format($laundry['total'],0,'.','.') ?></td>
                          <td>Rp. <?= number_format($pengeluaran['total'],0,'.','.') ?></td>
                          <td>Rp. <?= number_format($inventorimasuk['total'],0,'.','.') ?></td>
                          <td>Rp. <?= number_format($gaji['total'],0,'.','.') ?></td>
                          <td>Rp. <?= number_format($laundry['total']-($pengeluaran['total']+$inventorimasuk['total']+$gaji['total']),0,'.','.') ?></td>
                        <?php 
                      }
                    ?>
                  </tbody>
                            </table>
                        </div>
                                    
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
</div>
<!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php require('bawah.php') ?>
