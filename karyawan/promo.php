<?php require('atas.php') ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><button class="btn btn-success btn-lg"><a href="promo_input.php" style="color: white; text-decoration: none">+Data Promo</a></button></h1>
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
                                        <th>Waktu</th>
                                        <th>Jenis Laundry</th>
                                        <th>Sub Jenis</th>
                                        <th>Event</th>
                                        <th>Harga Awal</th>
                                        <th>Harga Promo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; $query = mysqli_query($kon, "SELECT * FROM promo INNER JOIN jenis ON promo.idjenis = jenis.idjenis ORDER BY waktu1 ASC");
                                        while($data = mysqli_fetch_array($query)){ ?>
                                            <tr class="odd gradeX">
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $data['waktu1'].' <br>'.$data['waktu2'] ?></td>
                                                    <td><?= $data['jenis'] ?></td>
                                                    <td><?= $data['subjenis'] ?></td>
                                                    <td><?= $data['event'] ?></td>
                                                    <td><?= $data['hargaawal'] ?></td>
                                                    <td><?= $data['hargapromo'] ?></td>
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
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php require('bawah.php') ?>
