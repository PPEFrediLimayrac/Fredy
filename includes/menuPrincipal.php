<?php include_once "init.php"; ?>
<div class="menu_nav">
	<div class="clr"></div>
        <ul>
        	<?php if($_SESSION) 
        	{
        		echo' <li><a href="'. BASEURL . DS .'ApresConnexion.php">Connecté en tant que '.$_SESSION['pseudo_demandeur']. '</a></li>';
        		echo' <li class="active"><a href="'. BASEURL . DS .'deconnexion.php">Se déconnecter </a> </li>'; 
        	}
        	else
        	{
        		echo' <li class="active"><a href="'. BASEURL . DS .'connexion.php">Se connecter</a></li>'; 
        	}?>
            <li class="active"> <a href=<?php echo  '"'.BASEURL . DS .'index.php"';?> >Accueil</a></li>
		   
		  
		    <li class="active"> <a href=<?php echo  '"'.BASEURL . DS .'BesoinDAide.php"';?> >Besoin d'aide ?</a></li>
		 
		    <li class="active"> <a href=<?php echo '"'. BASEURL . DS .'Contact.php"';?> >Nous contacter</a></li>
	    </ul>
 	</div>
</div>
			