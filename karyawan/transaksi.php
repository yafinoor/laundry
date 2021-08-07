<?php require('atas.php'); error_reporting(0); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><button class="btn btn-success btn-lg"><a href="transaksi_input.php" style="color: white; text-decoration: none">+Data Transaksi</a></button>
                </h1>
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
                                        <th>Waktu (WITA)</th>
                                        <th>No.Transaksi <br>& Nama Pelanggan</th>
                                        <th>Yang Bertugas</th>
                                        <th>Layanan</th>
                                        <th>Bayar</th>
                                        <th>Catatan</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th><i class="fa fa-toggle-on"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; $query = mysqli_query($kon, "SELECT * FROM transaksi INNER JOIN user ON transaksi.id = user.id WHERE konfirmasi != 'Menunggu' ORDER BY tgl DESC");
                                        while($data = mysqli_fetch_array($query)){ ?>
                                            <tr class="odd gradeX">
                                                    <td><?= $no++; ?></td>
                                                    <td><?= date('d/m/Y,H:i',strtotime($data['tgl'])) ?></td>
                                                    <td>
                                                        <a href="transaksi_detail.php?notransaksi=<?= $data['notransaksi'] ?>"><?= $data['notransaksi'] ?></a>
                                                        <?= $data['nama'] ?>
                                                    </td>
                                                    <td><?= $data['diterima'] ?></td>
                                                    <td><?= $data['layanan'] ?></td>
                                                    <td><?= $data['bayar'] ?></td>
                                                    <td><?= $data['catatan'] ?></td>
                                                    <td>
                                                    <?php 
                                                        $ohh = $data['notransaksi'];
                                                        $gini = mysqli_query($kon, "SELECT * FROM proses WHERE notransaksi = '$ohh' ORDER BY waktu DESC");
                                                        $lah = mysqli_fetch_array($gini);
                                                        if($lah['ket']=='Selesai'){ ?>
                                                            <a target="_blank" class="btn btn-info btn-sm" href="https://wa.me/?phone=<?= $data['telp'] ?>&text=Halo, <?= $data['nama'] ?>.%20Kami%20dari%20RahimaLaundry%20memberitahukan%20bahwa%0A%0ALaundry%20Anda%20dengan%20_No.Transaksi%20:%20<?= $data['notransaksi'] ?>_%20telah%20*SELESAI*.">Selesai</a>
                                                        <?php }else{ ?>
                                                            <a href="proses_input.php?notransaksi=<?php echo $data['notransaksi']; ?>" class="btn btn-warning btn-sm">Proses</a><?php
                                                        } ?></td>
                                                    <td><?= number_format($data['total'],0,'.','.') ?></td>
                                                    <td>
                                                    <a href="transaksi_edit.php?notransaksi=<?php echo $data['notransaksi']; ?>" class="btn btn-outline btn-primary btn-sm"><i class="fa fa-pencil"></i></a><a href="delete.php?notransaksi=<?php echo $data['notransaksi'] ?>" class="btn btn-outline btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                    </td>
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
</div>
<!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php require('bawah.php') ?>
