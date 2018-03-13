<?php
	function hashage($passe)
	{
		$hash = hash('sha256', $passe);
		$passe = hash('sha256', 10 . $hash);
		return $passe;
	}
?>