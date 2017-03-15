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

	if(!empty($_POST['nomOnline']) && !empty($_POST['adresseOnline']) && !empty($_POST['telephoneOnline'])) {
    		if(($_POST['nomOnline'] !== '') && ($_POST['adresseOnline'] !== '') && ($_POST['telephoneOnline'] !=='')) {
        		$reponse = 'ok';
        		$online = [];
			$online[0] = $_POST['nomOnline'];
			$online[1] = $_POST['adresseOnline'];
			$online[2] = $_POST['telephoneOnline'];
			ModelCoord::setEntreprise($online);
    		} 
		else {
        		$reponse = 'Les champs sont vides';
    		}
	}
	else {
    		$reponse = 'Tous les champs ne sont setter';
	}
	echo json_encode(['reponse' => $reponse]);
});

$app->post('/formation', function($request, $response){

    if(!empty($_POST['dateDebut']) && !empty($_POST['dateFin']) && !empty($_POST['placeRegion']) && !empty($_POST['placeSupp']) && !empty($_POST['intitule']) && !empty($_POST['titre'])){

        $reponse='ok';
        $formation = [];
        $formation[0] = $_POST['dateDebut'];
        $formation[1] = $_POST['dateFin'];
        $formation[2] = $_POST['placeRegion'];
        $formation[3] = $_POST['placeSupp'];
        $formation[4] = $_POST['intitule'];
        $formation[5] = $_POST['titre'];
        ModelFormation::setFormation($formation);
    }
    else{
        $reponse = "Les champs sont vides";
    }
    echo json_encode(['reponse' => $reponse]);
});

?>
