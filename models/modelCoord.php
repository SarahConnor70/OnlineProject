<?php

require_once('database.class.php');

	class ModelCoord{
		public $nom, $adresse, $telephone;

		public static function setEntreprise($donnees){
			$this->nom       = $donnees[0];
			$this->adresse   = $donnees[1];
			$this->telephone = $donnees[2];
		}
	}

?>