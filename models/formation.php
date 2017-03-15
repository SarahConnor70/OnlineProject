<?php

	class ModelFormation{

		public static function setFormation($info){

			// Récupère l'année de début et de fin
			$annee1 = explode("-", $info[0]);
			$annee2 = explode("-", $info[1]);

			// Si l'année est la même la promo est l'année de début
			if($annee1[0] == $annee2[0]){
				$promo = $annee1[0];
			}

			// Sinon la promo est année1 année2
			else{
				$promo = $annee1[0] . " " . $annee2[0];
			}

			$query = "INSERT INTO formations(debut, fin, placeRegion, placeSupp, intitule, titre, promo) VALUES (:debut, :fin, :placeRegion, :placeSupp, :intitule, :titre, :promo)";
			$execute    = DataBase::bdd()->prepare($query);
        	$execute->bindParam(':debut', $info[0]);
        	$execute->bindParam(':fin', $info[1]);
        	$execute->bindParam(':placeRegion', $info[2]);
        	$execute->bindParam(':placeSupp', $info[3]);
        	$execute->bindParam(':intitule', $info[4]);
        	$execute->bindParam(':titre', $info[5]);
        	$execute->bindParam(':promo', $promo);

        	return $execute->execute();
		}

		public static function getId(){
			$query = "SELECT id FROM formations order by id desc limit 1";

			$execute = Database::bdd()->query($query);
			return $execute->fetch();
		}

		public static function getFormation($bool){

			// Si la formation est la dernière
			if($bool){
				$id = self::getId()['id'];
			}
			// Si la formation est l'avant dernière
			else{
				$id = self::getId()['id'] - 1;
			}
			$query = "SELECT * FROM formations WHERE id=$id";

			$execute = Database::bdd()->query($query);
			return $execute->fetch();

		}

	}

?>
