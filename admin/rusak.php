<?php require('atas.php') ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-sm" style="margin:0 auto">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Cetak</h4>
            </div>
            <div class="modal-body">
                <form action="../report/laporanRusak.php" target="_blank" method="post">
                <label>Bulan</label>
                <select name="bulan" class="form-control">
                  <option value="">Pilih</option>
                  <?php
                    $ahay = mysqli_query($kon, "SELECT DISTINCT MONTH(tglrusak) as bulan FROM inventorirusak ORDER BY bulan ASC");
                    while($baris = mysqli_fetch_array($ahay)) {
                    $bulan = $baris['bulan']; 
                      if($bulan == 1){ $namabulan = "Januari";
                        }else if($bulan == 2){ $namabulan = "Februari";
                        }else if($bulan == 3){ $namabulan = "Maret";
                        }else if($bulan == 4){ $namabulan = "April";
                        }else if($bulan == 5){ $namabulan = "Mei";
                        }else if($bulan == 6){ $namabulan = "Juni";
                        }else if($bulan == 7){ $namabulan = "Juli";
                        }else if($bulan == 8){ $namabulan = "Agustus";
                        }else if($bulan == 9){ $namabulan = "September";
                        }else if($bulan == 10){ $namabulan = "Oktober";
                        }else if($bulan == 11){ $namabulan = "November";
                        }else if($bulan == 12){ $namabulan = "Desember";
                        } ?><option value="<?= $baris['bulan'] ?>"><?= $namabulan; ?></option> 
                      }
                    <?php } ?>
                </select><br>
                <label>Tahun</label>
                <select name="tahun" class="form-control" required>
                  <?php
                    $ahay = mysqli_query($kon, "SELECT DISTINCT YEAR(tglrusak) as tahun FROM inventorirusak ORDER BY tahun ASC");
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
                <h1 class="page-header"><button class="btn btn-success btn-lg"><a href="rusak_input.php" style="color: white; text-decoration: none">+Data Inventori Rusak</a></button>
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"> Cetak </button></h1>
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
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Merk</th>
                                        <th>Pelapor</th>
                                        <th>Keterangan</th>
                                        <th>Jumlah</th>
                                        <th><i class="fa fa-toggle-on"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; $query = mysqli_query($kon, "SELECT * FROM inventorirusak INNER JOIN inventori ON inventorirusak.idinventori = inventori.idinventori INNER JOIN user ON inventorirusak.id = user.id ORDER BY namainven ASC");
                                        while($data = mysqli_fetch_array($query)){ ?>
                                            <tr class="odd gradeX">
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $data['tglrusak'] ?></td>
                                                    <td><?= $data['namainven'] ?></td>
                                                    <td><?= $data['merk'] ?></td>
                                                    <td><?= $data['nama'] ?></td>
                                                    <td><?= $data['ket'] ?></td>
                                                    <td><?= $data['jumlah'] ?></td>
                                                    <td>
                                                        <a href="rusak_edit.php?idinventorirusak=<?php echo $data['idinventorirusak']; ?>" class="btn btn-outline btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                                        <a href="delete.php?idinventorirusak=<?php echo $data['idinventorirusak'] ?>" class="btn btn-outline btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
