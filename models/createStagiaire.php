<?php
class Stagiaire {

    // Inserer un nouveau stagiaire
    public static function insertStagiaire($stagiaire) {
        $query      = "INSERT INTO stagiaires (nom, prenom, adresse, cp, ville, mail, telephone, promo, accepter) VALUES(:nom, :prenom, :adresse, :cp, :ville, :mail, :telephone, :promo, :accepter)";
        $promo = ModelFormation::getLastPromo()['promo'];
        $execute = DataBase::bdd()->prepare($query);
        $execute->bindParam(':nom', $stagiaire[0]);
        $execute->bindParam(':prenom', $stagiaire[1]);
        $execute->bindParam(':telephone', $stagiaire[2]);
        $execute->bindParam(':mail', $stagiaire[3]);
        $execute->bindParam(':adresse', $stagiaire[4]);
        $execute->bindParam(':cp', $stagiaire[5]);
        $execute->bindParam(':ville', $stagiaire[6]);
        $execute->bindParam(':accepter', $stagiaire[7]);
        $execute->bindParam(':promo', $promo);
        return $execute->execute();
    }

    // Recuperer un stagiare depuis la base de données
    public static function recupStagiaire(){
        $promo  = ModelFormation::getLastPromo()["promo"];
        $query  = DataBase::bdd()->prepare("SELECT * from stagiaires WHERE promo = :promo ORDER by id DESC");
        $query->bindParam(":promo", $promo);
        $query->execute();
        $fetch  = $query->fetchAll();
        return sizeof($fetch) > 1 ? $fetch : false;
    }

    public static function modifStagiaire(){
        $query  = "UPDATE stagiaires SET cp = :cp,
                                         ville = :ville,
                                         mail = :mail,
                                         telephone = :telephone,
                                         promo = :promo,
                                         accepter = :accepter
                       WHERE nom = :nom AND prenom = :prenom";

        $execute = DataBase::bdd()->prepapre($query);
        $execute->bindParam(':cp', $cp);
        $execute->bindParam(':ville', $ville);
        $execute->bindParam(':mail', $email);
        $execute->bindParam(':telephone', $telephone);
        $execute->bindParam(':promo', $promo);
        $execute->bindParam(':accepter', $accepter);
        return $execute->execute();
    }
}

?>
