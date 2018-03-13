 <!doctype html>

 <link rel="stylesheet" href="../css/styles.css">
<div id="tracker">
<?php 
	$pseudo = isset($_SESSION['pseudo']) ? $_SESSION['pseudo'] : '';
	if($pseudo){
	echo "<p class='verifLogin'>Connecté en tant que : ".$pseudo."</p>";
	}
	
?>
</div>
