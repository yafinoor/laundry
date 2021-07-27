<?php require('atas.php'); 
    $inventori= mysqli_num_rows(mysqli_query($kon, "SELECT * FROM inventorimasuk"));
    $rusak= mysqli_num_rows(mysqli_query($kon, "SELECT * FROM inventorirusak"));
    $gaji= mysqli_num_rows(mysqli_query($kon, "SELECT * FROM gaji"));
    $transaksi= mysqli_num_rows(mysqli_query($kon, "SELECT * FROM transaksi"));
    $promo= mysqli_num_rows(mysqli_query($kon, "SELECT * FROM promo"));
?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Halaman Utama</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="hero-widget well well-sm">
                    <div class="icon">
                        <i class="fa fa-money"></i>
                    </div>
                    <div class="text">
                        <span class="value"><?= $gaji ?></span>
                        <label class="text-muted">Data Gaji Karyawan</label>
                    </div>
                    <div class="options">
                        <a href="gaji.php" class="btn btn-primary btn-lg">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="hero-widget well well-sm">
                    <div class="icon">
                        <i class="fa fa-th"></i>
                    </div>
                    <div class="text">
                        <span class="value"><?= $inventori ?></span>
                        <label class="text-muted">Data Inventori Masuk</label>
                    </div>
                    <div class="options">
                        <a href="inventori.php" class="btn btn-primary btn-lg">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="hero-widget well well-sm">
                    <div class="icon">
                        <i class="fa fa-th-list"></i>
                    </div>
                    <div class="text">
                        <span class="value"><?= $rusak ?></span>
                        <label class="text-muted">Data Inventori Rusak</label>
                    </div>
                    <div class="options">
                        <a href="rusak.php" class="btn btn-primary btn-lg">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="hero-widget well well-sm">
                    <div class="icon">
                        <i class="fa fa-get-pocket"></i>
                    </div>
                    <div class="text">
                        <span class="value"><?= $transaksi ?></span>
                        <label class="text-muted">Data Transaksi</label>
                    </div>
                    <div class="options">
                        <a href="transaksi.php" class="btn btn-primary btn-lg">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="hero-widget well well-sm">
                    <div class="icon">
                        <i class="fa fa-archive"></i>
                    </div>
                    <div class="text">
                        <label class="text-muted">Data Pendapatan</label>
                    </div>
                    <div class="options">
                        <a href="pendapatan.php" class="btn btn-primary btn-lg">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i> Grafik Pendapatan 2021
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <canvas id="statistik" height="225"></canvas>
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>
            <div class="col-lg-9 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i> Grafik Transaksi Paling Ramai 2021
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <canvas id="mostly" height="225"></canvas>
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="hero-widget well well-sm">
                    <div class="icon">
                        <i class="fa fa-heart"></i>
                    </div>
                    <div class="text">
                        <span class="value"><?= $promo ?></span>
                        <label class="text-muted">Data Promo</label>
                    </div>
                    <div class="options">
                        <a href="promo.php" class="btn btn-primary btn-lg">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php require('data.php') ?>