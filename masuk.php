<?php require('header.php') ?>
</div>
    <div class="layout_padding collection_section">
    	<div class="container">
    	    <h1 class="new_text"><strong>Aplikasi Pengelolaan Layanan Jasa Mencuci pada Rahima Laundry</strong></h1>
    	    <div class="collection_section_2">
    	    	<div class="row">
    	    		<div class="col-md-6">
                        <form action="cek.php" method="POST">
                        <div class="email_box">
    	    			<div class="input_main">
                           <div class="container">
                                <div class="form-group">
                                  <input type="text" class="email-bt" placeholder="username" name="username">
                                </div>
                                <div class="form-group">
                                  <input type="password" class="email-bt" placeholder="password" name="password">
                                </div>
                                 
                           </div> 
                           <div class="send_btn">
                            <button class="main_bt" name="masuk" type="submit">Masuk</button>
                           </div>                   
                        </div>
                        </div>
                        </form>
    	    		</div>
    	    	</div>
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
         
      </script> 
   </body>
</html>