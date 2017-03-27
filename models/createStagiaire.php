<?php

class Stagiaire {
    // Insererun nouveau stagiaire
    public static function InsertStagiaire($stagiaire) {
        $promo      = ModelFormation::getLastPromo()["promo"];
        $accepter   = isset($stagiaire[7]) ? $stagiaire[7] : "Inconnu";
        $query      = "INSERT INTO stagiaires (nom, prenom, cp, ville, mail, telephone, adresse, promo, accepter) VALUES(:nom, :prenom, :cp, :ville, :mail, :telephone, :adresse, :promo, :accepter)";
        $execute    = DataBase::bdd()->prepare($query);
        $execute->bindParam(':nom', $stagiaire[0]);
        $execute->bindParam(':prenom', $stagiaire[1]);
        $execute->bindParam(':cp', $stagiaire[5]);
        $execute->bindParam(':ville', $stagiaire[6]);
        $execute->bindParam(':mail', $stagiaire[3]);
        $execute->bindParam(':telephone', $stagiaire[2]);
        $execute->bindParam(':adresse', $stagiaire[4]);
        $execute->bindParam(':promo', $promo);
        $execute->bindParam(':accepter', $accepter);
        return $execute->execute() == false ? "False" : "ok";
    }

    // Recuperer un stagiare depuis la base de données
    public static function recupStagiaire(){
        $promo  = ModelFormation::getLastPromo()["promo"];
        $query  = DataBase::bdd()->prepare("SELECT * from stagiaires WHERE promo = :promo ORDER by id DESC");
        $query->bindParam(":promo", $promo);
        $query->execute();
        $fetch  = $query->fetchAll();
        return sizeof($fetch) > 0 ? $fetch : false;
    }

    public static function insertStage($stage, $update = false) {
        if ($update == false) {
            $promo  = ModelFormation::getLastPromo()["promo"];
            $query = Database::bdd()->prepare("INSERT into stage(entreprise, tuteur, telephone, mail, adresse, cp, ville, dateRDV, heureRDV, stagiaire, promo) VALUES(:entreprise, :tuteur, :telephone, :mail, :adresse, :cp, :ville, :dateRDV, :heureRDV, :stagiaire, :promo)");
            $query->bindParam(':entreprise', $stage[0]);
            $query->bindParam(':adresse', $stage[1]);
            $query->bindParam(':telephone', $stage[2]);
            $query->bindParam(':tuteur', $stage[3]);
            $query->bindParam(':cp', $stage[4]);
            $query->bindParam(':mail', $stage[5]);
            $query->bindParam(':ville', $stage[6]);
            $query->bindParam(':stagiaire', $stage[7]);
            $query->bindParam(':dateRDV', $stage[8]);
            $query->bindParam(':heureRDV', $stage[9]);
            $query->bindParam(':promo', $promo);
            return $query->execute();
        }
    }
    
    public static function recupStages() {
        $data   = [];
        $promo = ModelFormation::getLastPromo()['promo'];
        $query  = DataBase::bdd()->prepare("SELECT * from stage WHERE promo = :promo");
        $query->bindParam(":promo", $promo);
        $query->execute();
        $fetch  = $query->fetchAll();
        for ($i = 0; $i < sizeof($fetch); $i++) {
            $data[$fetch[$i]['dateRDV']][] .= $fetch[$i]["adresse"] . " " . $fetch[$i]["cp"] . " " . $fetch[$i]["ville"];
        }
        return $data;
    }
    
    public static function modifStagiaire($stagiaire){
        $query  = "UPDATE stagiaires SET cp = :cp, ville = :ville, mail = :mail, telephone = :telephone, adresse = :adresse, accepter = :accepter WHERE nom = :nom AND prenom = :prenom";
        $execute = DataBase::bdd()->prepare($query);
        $execute->bindParam(':cp', $stagiaire[5]);
        $execute->bindParam(':ville', $stagiaire[6]);
        $execute->bindParam(':mail', $stagiaire[3]);
        $execute->bindParam(':telephone', $stagiaire[2]);
        $execute->bindParam(":adresse", $stagiaire[4]);
        $execute->bindParam(':accepter', $stagiaire[7]);
        $execute->bindParam(":nom", $stagiaire[0]);
        $execute->bindParam(":prenom", $stagiaire[1]);
        return $execute->execute() == false ? "False" : "ok";
    }
    
    public static function rechercheStagiaire($nom, $prenom){
        $query = DataBase::bdd()->prepare("SELECT * FROM stagiaires WHERE prenom =:prenom AND nom =:nom");
        $query->bindParam(":prenom", $prenom);
        $query->bindParam(":nom", $nom);
        $query->execute();
        $fetch = $query->fetch();
        return count($fetch) > 0 ? $fetch : false;
    }

    // Inserer un resultat de test
    public static function InsertResultat($resultat, $id){
        $query      = "INSERT INTO resultattest (date, connuFormation, age,prescription,status, prescripteur,
                    contreIndic, commentaire, resultatNiveau, resultatFormation, resultatExperience, idStagiaire,
                    pointNiveau, pointFormation, pointExperience, commentaire1, prerequis,resultatTravail,
                    resultatCuriosite, resultatDynamisme, resultatDiscours, resultatMobilite, pointTravail,
                    pointCuriosite, pointDynamisme, pointDiscours, pointMobilite, total, commentaire2, resultatMetier, resultatEntreprise, resultatProjet, pointMetier, pointEntreprise, pointProjet, total1, commentaire3, resultatCulture, pointCulture, total2, commentaire4, NbPoints, note) VALUES(:date, :connuFormation, :age, :prescription, :status, :prescripteur, :contreIndic, :commentaire, :resultatNiveau, :resultatFormation, :resultatExperience, :idStagiaire, :pointNiveau, :pointFormation, :pointExperience, :commentaire1, :prerequis, :resultatTravail, :resultatCuriosite, :resultatDynamisme, :resultatDiscours, :resultatMobilite, :pointTravail, :pointCuriosite, :pointDynamisme, :pointDiscours, :pointMobilite, :total, :commentaire2, :resultatMetier, :resultatEntreprise, :resultatProjet, :pointMetier, :pointEntreprise, :pointProjet, :total1, :commentaire3, :resultatCulture, :pointCulture, :total2, :commentaire4, :NbPoints, :note)";

        $execute    = DataBase::bdd()->prepare($query);
        foreach($resultat as $key => &$value) {
            if (!in_array($key, ["nomResultat", "prenomResultat"])) {
                $execute->bindParam(':'.$key, $value, PDO::PARAM_STR);
            }
        }
        $execute->bindParam(":idStagiaire", $id);
        $execute->execute();
    }
}

?>