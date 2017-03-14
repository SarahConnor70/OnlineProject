<?php

$app->get('/', function ($request, $response, $args) {
    if (!login::VerifSession()) {
        return $this->view->render($response, "index.phtml");
    } else {
        return $this->view->render($response, 'dashboard.phtml');
    }
});

$app->get("/dashboard", function($request, $response, $args) {
    if (!login::VerifSession()) {
        return $this->view->render($response, "index.phtml");
    } else {
        return $this->view->render($response, 'dashboard.phtml', [
            "dashboard" => true
        ]);
    }
});

$app->get("/cordonnees", function($request, $response, $args) {
    if (!login::VerifSession()) {
        return $this->view->render($response, "index.phtml");
    } else {
        return $this->view->render($response, 'cordonnees.phtml', [
            "coordonnee" => true
        ]);
    }
});

$app->get("/formation", function($request, $response, $args) {
    if (!login::VerifSession()) {
        return $this->view->render($response, "index.phtml");
    } else {
        return $this->view->render($response, 'formation.phtml', [
            "formation" => true
        ]);
    }
});

$app->get("/stagiaire", function($request, $response, $args) {
    if (!login::VerifSession()) {
        return $this->view->render($response, "index.phtml");
    } else {
        return $this->view->render($response, 'stagiaire.phtml', [
            "stagiaire" => true
        ]);
    }
});

$app->get("/jvisite", function($request, $response, $args) {
    if (!login::VerifSession()) {
        return $this->view->render($response, "index.phtml");
    } else {
        return $this->view->render($response, 'jvisite.phtml', [
            "jvisite" => true
        ]);
    }
});

$app->get("/docpdf", function($request, $response, $args) {
    if (!login::VerifSession()) {
        return $this->view->render($response, "index.phtml");
    } else {
        return $this->view->render($response, 'docpdf.phtml', [
            "docpdf" => true
        ]);
    }
});
