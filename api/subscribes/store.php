<?php

require $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';
require $_SERVER['DOCUMENT_ROOT'] . '/functions/comments.php';
require $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';
require $_SERVER['DOCUMENT_ROOT'] . '/functions/posts.php';
middleware('auth');
$auth = getAuth();

if (getValue($_POST)) {

    // On prépare les données depuis le formulaire
    $data = [
        'username' => getValue($_POST['username']),
        'user_id' => $auth['id'],
        'post_id' => getValue($_POST['post_id']),
    ];

    // On créé l'article et on le stock en base
    $subscribeId = storeSubscribe($data);

    // On redirige l'utilisateur sur la page de l'article
    header("Location: /");
    exit;
}