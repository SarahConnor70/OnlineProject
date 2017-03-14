<?php
/*
 * POST ROUTE ARE HERE
 */

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