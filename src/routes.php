<?php
// Routes

$app->get('/', function ($request, $response, $args) { // login route
    return $this->renderer->render($response, 'index.phtml', $args);
});
