<?php require('atas.php'); error_reporting(0); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data Pendapatan Tahunan (Rp)</h1>
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
                                        <th>Tahun</th>
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
                      $query = mysqli_query($kon, "SELECT tgl, YEAR(tgl) as tahun FROM `transaksi` GROUP BY tahun ORDER BY tgl ASC");
                      while($data = mysqli_fetch_array($query)){
                        $tahun = $data['tahun'];
                        $laundry = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM transaksi WHERE YEAR(tgl) = '$tahun'"));
                        $pengeluaran = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM biaya WHERE YEAR(tgl) = '$tahun'"));
                        $inventorimasuk = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM inventorimasuk WHERE YEAR(tgl) = '$tahun'"));
                        $gaji = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM gaji WHERE YEAR(tgl) = '$tahun'"));
                        ?>
                          <tr>
                          <td><?= $no++ ?></td> 
                          <td><?= $tahun ?></td>
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
