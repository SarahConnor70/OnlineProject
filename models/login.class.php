<?php
class Login {
    public static function connexion($login, $password, $logCor, $passCor) {
        global $app;
        if (($login !== $logCor|| $password !== $passCor)) {
            $data = [
                "erreur" => true,
                "message" => "Email ou mot de passe incorrect!"
            ];
        } else {
            $data   = [
                "erreur" => false,
                "message" => "Vous êtes maintenant connectés!"
            ];
            self::setSession($login);
        }
        return $data;
    }

    public static function setSession($login) {
        $token = hash('sha256', $login);
        return $_SESSION["token_connexion"] = $token;
    }

    public static function VerifSession() {
        return isset($_SESSION["token_connexion"]) ? true : false;
    }
}
