<?php

require $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';
require $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';

middleware('auth');

$auth = getAuth();

if (getValue($_POST)) {

    // On prépare les données depuis le formulaire
    $data = [
        'post_id' => getValue($_POST['post_id']),
        'user_id' => $auth['id'],
    ];

    storeLike($data);

    // On redirige l'utilisateur sur la page de l'article
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}