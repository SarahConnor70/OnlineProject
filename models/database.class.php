<?php

class DataBase {
    
    public static function bdd() {
        $host   = "127.0.0.1";
        $base   = "projectOnline";
        $login  = "root";
        $pass    = "";
        try {
            $bdd = new PDO("mysql:host=$host;dbname=$base", $login, $pass,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                ]
            );
        } 
        catch (exception $e) {
            die('Erreur : '. $e->getMessage());
        }
        return $bdd;
    }
}

?>
