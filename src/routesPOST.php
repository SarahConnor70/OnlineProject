<?php

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

$app->post('/coordonnees', function($request, $response){
    $params = $request->getParsedBody();
    if ((!empty($params['nomOnline'])) && (!empty($params['adresseOnline'])) && (!empty($params['telephoneOnline']))) {
        if (($params['nomOnline'] !== '') && ($params['adresseOnline'] !== '') && ($params['telephoneOnline'] !=='')) {
            $reponse    = 'ok';
            $online     = [];
            $online[0]  = $params['nomOnline'];
            $online[1]  = $params['adresseOnline'];
            $online[2]  = $params['telephoneOnline'];
            ModelCoord::setEntreprise($online);
        } else {
            $reponse = 'Les champs sont vides';
        }
    } else {
        $reponse = 'Tous les champs ne sont setter';
    }
    $response->withHeader('Content-type', 'application/json');
    return $response->withJson(["reponse" => $reponse], 200, JSON_PRETTY_PRINT);
});

$app->post('/formation', function($request, $response){
    if(!empty($_POST['dateDebut']) && !empty($_POST['dateFin']) && !empty($_POST['placeRegion']) && !empty($_POST['placeSupp']) && !empty($_POST['intitule']) && !empty($_POST['titre'])){
        $reponse	= 'ok';
        $formation 	= [];
        $formation[0] 	= $_POST['dateDebut'];
        $formation[1] 	= $_POST['dateFin'];
        $formation[2] 	= $_POST['placeRegion'];
        $formation[3] 	= $_POST['placeSupp'];
        $formation[4] 	= $_POST['intitule'];
        $formation[5] 	= $_POST['titre'];
        $formation[6] 	= $_POST["promo"];
        ModelFormation::setFormation($formation);
    } else {
        $reponse = "Les champs sont vides";
    }
    $response->withHeader('Content-type', 'application/json');
    return $response->withJson(["reponse" => $reponse], 200, JSON_PRETTY_PRINT);
});
