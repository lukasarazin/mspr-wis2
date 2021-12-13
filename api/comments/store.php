<?php

require $_SERVER['DOCUMENT_ROOT'] . '/crud/functions/helpers.php';
require $_SERVER['DOCUMENT_ROOT'] . '/crud/functions/comments.php';
require $_SERVER['DOCUMENT_ROOT'] . '/crud/functions/users.php';
require $_SERVER['DOCUMENT_ROOT'] . '/crud/functions/posts.php';

$auth = getAuth();

if (getValue($_POST)) {

    // On prépare les données depuis le formulaire
    $data = [
        'body' => getValue($_POST['body']),
        'user_id' => $auth['id'],
        'post_id' => getValue($_POST['post_id']),
    ];

    // On créé l'article et on le stock en base
    $commentId = storeComment($data);

    // On redirige l'utilisateur sur la page de l'article
    header("Location: /crud/");
    exit;
}