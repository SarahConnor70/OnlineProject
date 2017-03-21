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

    // Recuperer un stagiaire depuis la base de données
    public static function recupStagiaire(){
        $promo  = ModelFormation::getLastPromo()["promo"];
        $query  = DataBase::bdd()->prepare("SELECT * from stagiaires WHERE promo = :promo ORDER by id DESC");
        $query->bindParam(":promo", $promo);
        $query->execute();
        $fetch  = $query->fetchAll();
        return sizeof($fetch) > 1 ? $fetch : false;
    }
     // Inserer un resultat de test
    public static function InsertResultat($resultat){
        $query      = "INSERT INTO resultatTest (dates, connuFormation, age, prescription, status, prescripteur, contreIndic, commentaire, resultatNiveau, resultatFormation, resultatExperience, pointNiveau, pointFormation, pointExperience, commentaire1,) VALUES(:dates, :connuFormation, :age, :prescription, :status, :prescripteur, :contreIndic, :commentaire, :resultatNiveau, :resultatFormation, :resultatExperience, :pointNiveau, :pointFormation, :pointExperience, :commentaire1)";

        $execute    = DataBase::bdd()->prepare($query);
        $execute->bindParam(':dates', $resultat[0]);
        $execute->bindParam(':connuFormation', $resultat[1]);
        $execute->bindParam(':age', $resultat[2]);
        $execute->bindParam(':prescription', $resultat[3]);
        $execute->bindParam(':status', $resultat[4]);
        $execute->bindParam(':prescripteur', $resultat[5]);
        $execute->bindParam(':contreIndic', $resultat[6]);
        $execute->bindParam(':commentaire', $resultat[7]);
        $execute->bindParam(':resultatNiveau', $resultat[8]);
        $execute->bindParam(':resultatFormation', $resultat[9]);
        $execute->bindParam(':resultatExperience', $resultat[10]);
        $execute->bindParam(':pointNiveau', $resultat[11]);
        $execute->bindParam(':pointFormation', $resultat[12]);
        $execute->bindParam(':pointExperience', $resultat[13]);
        $execute->bindParam(':commentaire1', $resultat[14]);
        $execute->execute();


    }

    public static function rechercheStagiaire($prenom, $nom){
        $query = DataBase::bdd()->prepare("SELECT * FROM stagiaires WHERE prenom =:prenom AND nom =:nom");
        $query->bindParam(":prenom", $prenom);
        $query->bindParam(":nom", $nom);
        $query->execute();

        $fetch = $query->fetch();
        return $fetch;
    }

    public static function modifStagiaire($stagiaire){
        $query  = "UPDATE stagiaires SET cp = :cp,
                                         ville = :ville,
                                         mail = :mail,
                                         telephone = :telephone,
                                         adresse = :adresse,
                                         accepter = :accepter
                       WHERE nom = :nom AND prenom = :prenom";

        $execute = DataBase::bdd()->prepare($query);
        $execute->bindParam(":nom", $stagiaire[0]);
        $execute->bindParam(":prenom", $stagiaire[1]);
        $execute->bindParam(':telephone', $stagiaire[2]);
        $execute->bindParam(':mail', $stagiaire[3]);
        $execute->bindParam(":adresse", $stagiaire[4]);
        $execute->bindParam(':cp', $stagiaire[5]);
        $execute->bindParam(':ville', $stagiaire[6]);
        $execute->bindParam(':accepter', $stagiaire[7]);
        return $execute->execute();
    }
}

?>
