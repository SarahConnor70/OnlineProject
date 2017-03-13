<?php

$app->get('/', function ($request, $response, $args) {
    return $this->view->render($response, 'index.phtml');
});

$app->get("/dashboard", function($request, $response, $args) {
    return $this->view->render($response, 'dashboard.phtml');
});

$app->get("/cordonnees", function($request, $response, $args) {
    return $this->view->render($response, 'cordonnees.phtml');
});

$app->get("/formation", function($request, $response, $args) {
    return $this->view->render($response, 'formation.phtml');
});

$app->get("/stagiaire", function($request, $response, $args) {
    return $this->view->render($response, 'stagiaire.phtml');
});

$app->get("/jvisite", function($request, $response, $args) {
    return $this->view->render($response, 'jvisite.phtml');
});

$app->get("/docpdf", function($request, $response, $args) {
    return $this->view->render($response, 'docpdf.phtml');
});
