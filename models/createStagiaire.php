<?php

class stagiaire {
    // Insererun nouveau stagiaire
    public static function InsertStagiaire($nom, $prenom, $cp, $ville, $email, $telephone, $promo) {
        $query      = "INSERT INTO stagiaires (nom, prenom, cp, ville, mail, telephone, promo) VALUES(:nom, :prenom, :cp, :ville, :mail, :telephone, :promo)";
        $execute    = DataBase::bdd()->prepare($query);
        $execute->bindParam(':nom', $nom);
        $execute->bindParam(':prenom', $prenom);
        $execute->bindParam(':cp', $cp);
        $execute->bindParam(':ville', $ville);
        $execute->bindParam(':mail', $email);
        $execute->bindParam(':telephone', $telephone);
        $execute->bindParam(':promo', $promo);
        return $execute->execute();
    }

    // Recuperer un stagiare depuis la base de données
    public static function RecupStagiaire($id){
        $query  = DataBase::bdd()->prepare("SELECT * from stagiaires ORDER by id DESC");
        $query->execute();
        $fetch  = $query->fetchAll();
        return sizeof($fetch) > 1 ? $fetch : false;
    }
}
