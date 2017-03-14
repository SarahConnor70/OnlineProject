<?php
class Login {
    public static function connexion($login, $password, $logCor, $passCor) {
        if (($login !== $logCor|| $password !== $passCor)) {
            $data = [
                "erreur" => true,
                "message" => "Email ou mot de passe incorrect!"
            ];
        } else {
            $_SESSION["toke_connexion"] = hash('sha256', $login);
            $data   = [
                "erreur" => false,
                "message" => "Vous êtes maintenant connectés!"
            ];
        }
        return $data;
    }
}
