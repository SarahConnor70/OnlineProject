<?php
/*
 * POST ROUTE ARE HERE
 */

$app->post("/", function($request, $response, $args) {
    $erreur = [];
    $json   = json_decode($request->getBody());
    if (($json->email == null || $json->pass == null || $json->email !== $this->login[0] || $json->pass !== $this->login[1])) {
        $erreur = [
            "erreur" => true,
            "message" => "Impossible de se connecter. (Erreur d'email/mot de passe)"
        ];
    } else {
        $erreur = [
            "erreur" => false,
            "message" => "Vous êtes maintenant connecté! ;)"
        ];
    }
    $response->withHeader('Content-type', 'application/json');
    return $response->withJson($erreur, 200, JSON_PRETTY_PRINT);
});

$app->post('/coordonnees', function($request, $response){
	
	if(empty($_POST['nomOnline']) && empty($_POST['adresseOnline']) && empty($_POST['telephoneOnline'])) {
    	if(($_POST['nomOnline'] !== '') && ($_POST['adresseOnline'] !== '') && ($_POST['telephoneOnline'] !=='')) {
        	$reponse = 'ok';
    	} else {
        	$reponse = 'Les champs sont vides';
    	}
	} else {
    	$reponse = 'Tous les champs ne sont setter';
}
echo json_encode(['reponse' => $reponse]);

});

?>
