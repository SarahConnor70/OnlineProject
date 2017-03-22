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


$app->post('/stagiaire', function($request, $response)
{
    foreach($_POST as $key => $value) {
        if (empty($_POST[$key])) {
            return json_encode(['reponse' => "Champs vides"]);
        }
    }

    $resultatTest=[];
    $resultatTest[0] = $_POST['date'];
    $resultatTest[1] = $_POST['connuFormation'];
    $resultatTest[2] = $_POST['age'];
    $resultatTest[3] = $_POST['prescription'];
    $resultatTest[4] = $_POST['status'];
    $resultatTest[5] = $_POST['prescripteur'];
    $resultatTest[6] = $_POST['contreIndic'];
    $resultatTest[7] = $_POST['commentaire'];
    $resultatTest[8] = $_POST['resultatNiveau'];
    $resultatTest[9] = $_POST['resultatFormation'];
    $resultatTest[10] = $_POST['resultatExperience'];
    $resultatTest[11] = $_POST['pointNiveau'];
    $resultatTest[12] = $_POST['pointFormation'];
    $resultatTest[13] = $_POST['pointExperience'];
    $resultatTest[14] = $_POST['commentaire1'];
    $resultatTest[15] = $_POST['resultatTravail'];
    $resultatTest[16] = $_POST['resultatCuriosite'];
    $resultatTest[17] = $_POST['resultatDynamisme'];
    $resultatTest[18] = $_POST['resultatDiscours'];
    $resultatTest[19] = $_POST['resultatMobilite'];
    $resultatTest[20] = $_POST['pointTravail'];
    $resultatTest[21] = $_POST['pointCuriosite'];
    $resultatTest[22] = $_POST['pointDynamisme'];
    $resultatTest[23] = $_POST['pointDiscours'];
    $resultatTest[24] = $_POST['pointMobilite'];
    $resultatTest[25] = $_POST['total'];
    $resultatTest[26] = $_POST['commentaire2'];
    $resultatTest[27] = $_POST['commentaires2'];
    $resultatTest[28] = $_POST['resultatMetier'];
    $resultatTest[29] = $_POST['resultatEntreprise'];
    $resultatTest[30] = $_POST['resultatProjet'];
    $resultatTest[31] = $_POST['pointMetier'];
    $resultatTest[32] = $_POST['pointEntreprise'];
    $resultatTest[33] = $_POST['pointProjet'];
    $resultatTest[34] = $_POST['total1'];
    $resultatTest[35] = $_POST['commentaire3'];
    $resultatTest[36] = $_POST['commentaires3'];
    $resultatTest[37] = $_POST['resultatCulture'];
    $resultatTest[38] = $_POST['pointCulture'];
    $resultatTest[39] = $_POST['total2'];
    $resultatTest[40] = $_POST['commentaire4'];
    $resultatTest[41] = $_POST['NbPoints'];
    $resultatTest[42] = $_POST['note'];

    Stagiaire::InsertResultat($resultatTest);

    echo json_encode(['reponse' => "ok"]);

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
    }
    else{
        $reponse = "Les champs sont vides";
    }
    echo json_encode(['reponse' => $reponse]);
});

?>
