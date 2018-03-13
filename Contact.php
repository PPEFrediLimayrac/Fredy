<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Fredi</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link href="style.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="js/cufon-yui.js"></script>
  <script type="text/javascript" src="js/arial.js"></script>
  <script type="text/javascript" src="js/cuf_run.js"></script>
</head>
<body>
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="logo">
        <h1><a href="index.php">Fredi</a></h1>

      </div>
        <?php
          include('includes/menuprincipal.php');
        ?>
        <div class="clr"></div>
      </div>  
        <div class="hbg" style="height: 400px;">
		    <div class="hbg_resize"> 
		    	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5779.330739973543!2d1.4661545026967626!3d43.592685980458256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12aebcf6ed50f58d%3A0xdf2c013d17db5a57!2s50+Rue+de+Limayrac%2C+31500+Toulouse!5e0!3m2!1sfr!2sfr!4v1510673006683" width="500" height="380" frameborder="0" style="border:0" allowfullscreen>

		      <h2> Où nous trouver ? </h2>
		      
		          </iframe>
		      
		    </div>
	  	</div>       
      
    </div>
  </div>
  

  <?php 
    include('includes/footer.php');
  ?>
  
</div>

</body>
</html>