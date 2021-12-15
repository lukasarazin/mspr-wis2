<?php

require $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';
require $_SERVER['DOCUMENT_ROOT'] . '/functions/comments.php';
require $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';
require $_SERVER['DOCUMENT_ROOT'] . '/functions/like.php';

middleware('auth');

$auth = getAuth();

    // On prépare les données depuis le formulaire
    $data = [
        'user_id' => $auth['id'],
        'post_id' => $_GET['id'],
    ];

    // On créé le like et on le stock en base
    $likeId = storeLike($data);

    // On redirige l'utilisateur sur la page d'accueil
    header("Location: /");
    exit;