<?php
class ModelCoord {
    public static function setEntreprise($donnees){
        $query  = "UPDATE coordonnees SET nomEntreprise = :nomEntreprise, adresseEntreprise = :adresseEntreprise, telephoneEntreprise = :telephoneEntreprise WHERE id=1";
        $execute = Database::bdd()->prepare($query);
        $execute->bindParam(":nomEntreprise"      , $donnees[0]);
        $execute->bindParam(":adresseEntreprise"  , $donnees[1]);
        $execute->bindParam(":telephoneEntreprise", $donnees[2]);
        return $execute->execute();
    }

    public static function getEntreprise() {
        $query = "SELECT * FROM coordonnees";
        $execute = Database::bdd()->query($query);
        return $execute->fetch();
    }
}
