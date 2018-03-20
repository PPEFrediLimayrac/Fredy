<div class="menu_nav">
	<div class="clr"></div>
        <ul>
        	<?php if($_SESSION) 
        	{
        		echo' <li><a href="/fredy/apresconnexion.php">Connecté en tant que '.$_SESSION['pseudo_demandeur']. '</a></li>';
        		echo' <li class="active"><a href="deconnexion.php">Se déconnecter </a> </li>'; 
        	}
        	else
        	{
        		echo' <li class="active"> <a href="Connexion.php">Se connecter</a></li>'; 
        	}?>
            <li class="active"><a href="index.php">Accueil</a></li>
		   
		  
		    <li class="active"> <a href="BesoinDAide.php">Besoin d'aide ?</a></li>
		 
		    <li class="active"> <a href="Contact.php">Nous contacter</a></li>
	    </ul>
 	</div>
</div>
			