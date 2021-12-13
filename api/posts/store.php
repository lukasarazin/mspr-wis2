<?php

require $_SERVER['DOCUMENT_ROOT'] . '/crud/functions/helpers.php';
require $_SERVER['DOCUMENT_ROOT'] . '/crud/functions/posts.php';
require $_SERVER['DOCUMENT_ROOT'] . '/crud/functions/users.php';

$auth = getAuth();

if (getValue($_POST) && isAdmin($auth)) {

    // On prépare les données depuis le formulaire
    $data = [
        'title' => getValue($_POST['title']),
        'excerpt' => getValue($_POST['excerpt']),
        'body' => getValue($_POST['body']),
        'user_id' => $auth['id'],
    ];

    // On créé l'article et on le stock en base
    $postId = storePost($data);

    // On redirige l'utilisateur sur la page de l'article
    header("Location: /crud/posts/show.php?id=$postId");
    exit;
}