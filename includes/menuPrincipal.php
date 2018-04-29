<?php include_once "init.php"; ?>
<div class="menu_nav">
	<div class="clr"></div>
        <ul>
        	<?php if($_SESSION) 
        	{
        		echo' <li><a href="'. DS . APPLINAME . DS .'ApresConnexion.php">Connecté en tant que '.$_SESSION['pseudo_demandeur']. '</a></li>';
        		echo' <li class="active"><a href="'. DS . APPLINAME . DS .'deconnexion.php">Se déconnecter </a> </li>'; 
        	}
        	else
        	{
        		echo' <li class="active"><a href="'. DS . APPLINAME . DS .'connexion.php">Se connecter</a></li>'; 
        	}?>
            <li class="active"> <a href=<?php echo  '"'. DS . APPLINAME . DS .'index.php"';?> >Accueil</a></li>
		   
		  
		    <li class="active"> <a href=<?php echo  '"'. DS . APPLINAME . DS .'BesoinDAide.php"';?> >Besoin d'aide ?</a></li>
		 
		    <li class="active"> <a href=<?php echo '"'. DS . APPLINAME . DS .'Contact.php"';?> >Nous contacter</a></li>
	    </ul>
 	</div>
</div>
			