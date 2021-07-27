<?php require('header.php') ?>
	</div>
<style>
    body{
        background-image: url(images/ya.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-position-y: -100px;
    };
</style>
<?php if($memori['nama']){ ?>
  <div class="collection_text">Selamat Datang <?= $memori['nama'] ?></div>
    <div class="layout_padding collection_section">
    	<div class="container">
    	   <h1 class="new_text"><strong>Transaksi Anda</strong></h1>
           <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover " id="dataTables-example">
                            <thead class="success table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Waktu (WITA)</th>
                                    <th>No.Transaksi</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Total (Rp)</th>
                                    <th>Dicuci</th>
                                    <th>Antar Jemput</th>
                                    <th>Catatan</th>
                                </tr>
                            </thead>
                            <tbody class="table-light">
                                    <?php $no=1; $query = mysqli_query($kon, "SELECT * FROM transaksi INNER JOIN user ON transaksi.id = user.id WHERE username = '$memori[username]' ORDER BY tgl DESC");
                                        while($data = mysqli_fetch_array($query)){ ?>
                                            <tr class="odd gradeX" style="color:black">
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $data['tgl'] ?></td>
                                                    <td>
                                                        <a href="transaksi_detail.php?notransaksi=<?= $data['notransaksi'] ?>"><?= $data['notransaksi'] ?></a>
                                                    </td>
                                                    <td><?= $data['nama'] ?></td>
                                                    <td><?= $data['total'] ?></td>
                                                    <td><?= $data['dicuci'] ?></td>
                                                    <td><?= $data['antarjemput'] ?></td>
                                                    <td><?= $data['catatan'] ?></td>
                                                </tr>
                                        <?php } ?>
                                          
                                </tbody>
                        </table>
                    </div>
                                
                </div>
                <!-- /.panel-body -->
            </div>
    	</div>
    </div>
<?php } ?>



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
