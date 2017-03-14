<?php
/*
 * POST ROUTE ARE HERE
 */

$app->post("/", function($request, $response, $args) {
    $data   = [];
    $json   = json_decode($request->getBody());
    if (($json->email == null || $json->pass == null)) {
        $data = [
            "erreur" => true,
            "message" => "Veuillez remplir les champs demandés."
        ];
    } else {
        $data = login::connexion($json->email, $json->pass, $this->login[0], $this->login[1]);
    }
    $response->withHeader('Content-type', 'application/json');
    return $response->withJson($data, 200, JSON_PRETTY_PRINT);
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
