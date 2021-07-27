<?php require('atas.php'); error_reporting(0); $notransaksi = $_GET['notransaksi'];
  $detail = mysqli_query($kon, "SELECT * FROM detail WHERE notransaksi = '$notransaksi' ORDER BY jenisny ASC"); ?>
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Detail/No. Transaksi : <?= $notransaksi ?></h3>
            <button class="btn btn-danger"><a style="color:white; text-decoration: none;" href="transaksi.php">Kembali</a></button>
            <button class="btn btn-primary"><a style="color:white; text-decoration: none;" href="cetaknota.php">Cetak Nota</a></button>
        </div>
    </div><br>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTables-example">
                            <thead class="success">
                                <tr>
                                    <th>No</th>
                                    <th>Jenis</th>
                                    <th>Sub Jenis</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Sub Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1;;
                                    while($data = mysqli_fetch_array($detail)){ ?>
                                        <tr class="odd gradeX">
                                                <td><?= $no++; ?></td>
                                                <td><?= $data['jenisny'] ?></td>
                                                <td><?= $data['subjenisny'] ?></td>
                                                <td><?= $data['jumlah'] ?></td>
                                                <td><?= $data['hargany'] ?></td>
                                                <td><?= $data['subharga'] ?></td>
                                            </tr>
                                    <?php } ?>   
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
<!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php require('bawah.php') ?>
