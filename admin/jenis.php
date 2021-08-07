<?php require('atas.php') ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><button class="btn btn-success btn-lg"><a href="jenis_input.php" style="color: white; text-decoration: none">+Data Jenis Laundry</a></button></h1>
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
                                        <th>Jenis</th>
                                        <th>Sub Jenis</th>
                                        <th>Harga (Rp)</th>
                                        <th>Waktu Pengerjaan</th>
                                        <th><i class="fa fa-toggle-on"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; $query = mysqli_query($kon, "SELECT * FROM jenis ORDER BY jenis ASC");
                                        while($data = mysqli_fetch_array($query)){ ?>
                                            <tr class="odd gradeX">
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $data['jenis'] ?></td>
                                                    <td><?= $data['subjenis'] ?></td>
                                                    <td><?= number_format($data['harga'],0,'.','.') ?></td>
                                                    <td><?= $data['ket'] ?></td>
                                                    <td>
                                                        <a href="jenis_edit.php?idjenis=<?php echo $data['idjenis']; ?>" class="btn btn-outline btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                                        <a href="delete.php?idjenis=<?php echo $data['idjenis'] ?>" class="btn btn-outline btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php require('bawah.php') ?>
