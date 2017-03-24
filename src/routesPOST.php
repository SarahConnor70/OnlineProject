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

$app->post('/dashboard', function($request, $response, $args) {
    $data = Stagiaire::recupStagiaire();
    $response->withHeader('Content-type', 'application/json');
    return $response->withJson($data, 200, JSON_PRETTY_PRINT);
});

$app->post('/jvisite', function($request, $response, $args) {
    $data = Stagiaire::recupStages();
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


$app->post('/stagiaire', function($request, $response){
    if((!empty($_POST['nomStagiaire'])) && (!empty($_POST['prenomStagiaire'])) && (!empty($_POST['telephoneStagiaire'])) && (!empty($_POST['mailStagiaire'])) && (!empty($_POST['adresseStagiaire'])) && (!empty($_POST['cpStagiaire'])) && (!empty($_POST['villeStagiaire'])) || (isset($_POST["accepter"]))) {
        $stagiaire  = [];
        $i          = 0;
        foreach ($_POST as $key => $value) {
            $stagiaire[$i] = $value;
            $i++;
        }
        $data = Stagiaire::rechercheStagiaire($stagiaire[0], $stagiaire[1]);
        if (isset($data["id"])) {
            $reponse = Stagiaire::modifStagiaire($stagiaire);
        } else {
            $reponse = Stagiaire::insertStagiaire($stagiaire);
        }
        $response->withHeader('Content-type', 'application/json');
        return $response->withJson(["reponse" => $reponse], 200, JSON_PRETTY_PRINT);
    } elseif ((!empty($_POST["prenomRecherche"])) && (!empty($_POST["nomRecherche"]))) {
        $reponse = 'ok';
        $resultat = Stagiaire::rechercheStagiaire($_POST['nomRecherche'], $_POST['prenomRecherche']);
        $response->withHeader('Content-type', 'application/json');
        return $response->withJson(['recherche' => $resultat, 'reponse' => $reponse], 200, JSON_PRETTY_PRINT);
    } elseif ((!empty($_POST["nomEntreprise"])) && (!empty($_POST["adresseEntreprise"])) && (!empty($_POST["telephoneEntreprise"])) && (!empty($_POST["nomTuteur"])) && (!empty($_POST["cpEntreprise"])) && (!empty($_POST["villeEntreprise"])) && (!empty($_POST["nomStagiaire"]))) {
        $stage = [];
        $i     = 0;
        foreach ($_POST as $key => $value) {
            $stage[$i] = $value;
            $i++;
        }
        $data = Stagiaire::insertStage($stage, false);
        $response->withHeader('Content-type', 'application/json');
        return $response->withJson(['reponse' => "ok"], 200, JSON_PRETTY_PRINT);
    } else {
        $resultat = [];
        $i        = 0;
        foreach($_POST as $key => $value) {
            $i++;
            $resultat[$key] = $value;
        }
        Stagiaire::InsertResultat($resultat);
        $response->withHeader('Content-type', 'application/json');
        return $response->withJson(['reponse' => "ok"], 200, JSON_PRETTY_PRINT);
    }
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
	    $formation[6] = $_POST["promo"];
        ModelFormation::setFormation($formation);
    } else{
        $reponse = "Les champs sont vides";
    }
    $response->withHeader('Content-type', 'application/json');
    return $response->withJson(['reponse' => $reponse], 200, JSON_PRETTY_PRINT);
});

?>
