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

$app->post('/stagiaire', function($request, $response)
{
    if(!empty($_POST['date']) && !empty($_POST['connuFormation']) && !empty($_POST['age']) && !empty($_POST['prescription']) && !empty($_POST['status']) && !empty($_POST['prescripteur']) && !empty($_POST['contreIndic']) && !empty($_POST['commentaire']) && !empty($_POST['resultatNiveau']) && !empty($_POST['resultatFormation']) && !empty($_POST['resultatExperience']) && !empty($_POST['pointNiveau']) && !empty($_POST['pointFormation']) && !empty($_POST['pointExperience']) && !empty($_POST['commentaire1'])){

        $reponse='ok';
        $resultatTest=[];
        $resultatTest[0]= $_POST['date'];
        $resultatTest[1]= $_POST['connuFormation'];
        $resultatTest[2]= $_POST['age'];
        $resultatTest[3]= $_POST['prescription'];
        $resultatTest[4]= $_POST['status'];
        $resultatTest[5]= $_POST['prescripteur'];
        $resultatTest[6]= $_POST['contreIndic'];
        $resultatTest[7]= $_POST['commentaire'];
        $resultatTest[8]= $_POST['resultatNiveau'];
        $resultatTest[9]= $_POST['resultatFormation'];
        $resultatTest[10]= $_POST['resultatExperience'];
        $resultatTest[11]= $_POST['pointNiveau'];
        $resultatTest[12]= $_POST['pointFormation'];
        $resultatTest[13]= $_POST['pointExperience'];
        $resultatTest[14]= $_POST['commentaire1'];

        Stagiaire::InsertResultat($resultatTest);
    }
    else{
       $reponse = "Les champs sont vides";
    }
    echo json_encode(['reponse' => $reponse]);

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
