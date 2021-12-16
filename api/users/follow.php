<?php

require $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';
require $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';

middleware('auth');

$auth = getAuth();

if (getValue($_POST)) {

    // On prépare les données depuis le formulaire
    $data = [
        'user' => $auth['id'],
        'subscriber_id' => getValue($_POST['subscriber_id']),
        'user_id' => $auth['id'],
    ];

    toggleFollow($data);

    // On redirige l'utilisateur sur la page de l'article
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}