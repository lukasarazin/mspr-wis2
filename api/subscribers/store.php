<?php

require $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';
require $_SERVER['DOCUMENT_ROOT'] . '/functions/subscribers.php';
require $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';

middleware('auth');

$auth = getAuth();

if (getValue($_POST)) {

    // On prépare les données depuis le formulaire
    $data = [
        'username' => getValue($_POST['username']),
        'user_id' => $auth['id'],
    ];

    // On créé l'article et on le stock en base
    $subscriberId = storeSubscriber($data);

    // On redirige l'utilisateur sur la page de l'article
    header("Location: /users/show");
    exit;
}