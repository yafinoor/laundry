<?php require('atas.php'); error_reporting(0); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data Pendapatan Harian (Rp)</h1>
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
                                        <th>Hari</th>
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
                      $query = mysqli_query($kon, "SELECT tgl, DATE(tgl) as hari FROM transaksi GROUP BY hari ORDER BY hari ASC");
                      while($data = mysqli_fetch_array($query)){
                        $hari = $data['hari'];
                        $laundry = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM transaksi WHERE DATE(tgl) = '$hari'"));
                        $pengeluaran = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM biaya WHERE DATE(tgl) = '$hari'"));
                        $inventorimasuk = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM inventorimasuk WHERE DATE(tgl) = '$hari'"));
                        $gaji = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM gaji WHERE DATE(tgl) = '$hari'"));
                        ?>
                          <tr>
                          <td><?= $no++ ?></td> 
                          <td><?= tgl_indo($hari) ?></td>
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
