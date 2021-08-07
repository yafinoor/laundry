<?php require('header.php') ?>
	</div>
  <div class="collection_text">PERMOHONAN ANTAR JEMPUT</div>
    <div class="layout_padding collection_section">
    	<div class="container">
           <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <button class="btn btn-success btn-lg"><a href="mohon_input.php" style="color: white; text-decoration: none">+ tambah</a></button>
                        <table class="table table-bordered table-hover " id="dataTables-example">
                            <thead class="success table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Waktu (WITA)</th>
                                    <th>No.Transaksi</th>
                                    <th>Layanan</th>
                                    <th>Catatan</th>
                                    <th>Konfirmasi</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="table-light">
                                    <?php $no=1; 
                                    $query = mysqli_query($kon, "SELECT * FROM transaksi INNER JOIN user ON transaksi.id = user.id WHERE username = '$memori[username]' AND layanan = 'Antar Jemput' OR layanan = 'Jemput' ORDER BY tgl DESC");
                                        while($data = mysqli_fetch_array($query)){ ?>
                                            <tr class="odd gradeX" style="color:black">
                                                    <td><?= $no++; ?></td>
                                                    <td><?= date('d/m/Y, H:i',strtotime($data['tgl'])) ?></td>
                                                    <td>
                                                        <a style="color:blue" href="transaksi_detail.php?notransaksi=<?= $data['notransaksi'] ?>"><?= $data['notransaksi'] ?></a>
                                                    </td>
                                                    <td><?= $data['layanan'] ?></td>
                                                    <td><?= $data['catatan'] ?></td>
                                                    <td><?= $data['konfirmasi'] ?></td>
                                                    <td>
                                                    <?php 
                                                        $ohh = $data['notransaksi'];
                                                        $gini = mysqli_query($kon, "SELECT * FROM proses WHERE notransaksi = '$ohh' ORDER BY waktu DESC");
                                                        $lah = mysqli_fetch_array($gini);
                                                        if($lah['ket']=='Selesai'){ ?>
                                                            <a href="proses.php?notransaksi=<?php echo $data['notransaksi']; ?>" class="btn btn-warning btn-sm">Selesai</a>
                                                        <?php }else if($data['konfirmasi']!='Diterima'){
                                                            echo 'Proses';
                                                        }else if($data['konfirmasi']=='Diterima'){ ?>
                                                            <a href="proses.php?notransaksi=<?php echo $data['notransaksi']; ?>" class="btn btn-warning btn-sm">Proses</a><?php
                                                        } ?></td>
                                                    <td>Rp. <?= number_format($data['total'],0,'.','.') ?></td>
                                                    <td><?php if($data['konfirmasi']!='Diterima'){ ?>
                                                        <a href="mohon_batal.php?notransaksi=<?php echo $data['notransaksi'] ?>" class="btn btn-outline btn-danger btn-sm">Hapus</a>
                                                    <?php } ?></td>
                                                </tr>
                                        <?php } ?> 
                                    <?php if(mysqli_num_rows($query)<=0){
                                        ?>
                                            <tr class="odd gradeX" style="color:black">
                                                <td colspan="11"><h1 class="text-center">Tidak Ada Permohonan Antar Jemput</h1></td>
                                            </tr>
                                        <?php
                                    } ?>
                                </tbody>
                        </table>
                        <br>
                        <br>
                        <br>
                    </div>
                                
                </div>
                <!-- /.panel-body -->
            </div>
    	</div>
    </div>

      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
         $(document).ready(function(){
         $(".fancybox").fancybox({
         openEffect: "none",
         closeEffect: "none"
         });
         
         
$('#myCarousel').carousel({
            interval: false
        });

        //scroll slides on swipe for touch enabled devices

        $("#myCarousel").on("touchstart", function(event){

            var yClick = event.originalEvent.touches[0].pageY;
            $(this).one("touchmove", function(event){

                var yMove = event.originalEvent.touches[0].pageY;
                if( Math.floor(yClick - yMove) > 1 ){
                    $(".carousel").carousel('next');
                }
                else if( Math.floor(yClick - yMove) < -1 ){
                    $(".carousel").carousel('prev');
                }
            });
            $(".carousel").on("touchend", function(){
                $(this).off("touchmove");
            });
        });
      </script> 
   </body>
</html>
