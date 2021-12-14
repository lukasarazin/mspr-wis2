<?php

require $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';
require $_SERVER['DOCUMENT_ROOT'] . '/functions/posts.php';
middleware('auth');
$id = $_GET['id'];

if (getValue($_POST) && $id) {

    // On prépare les données depuis le formulaire
    $data = [
        'title'     => getValue($_POST['title']),
        'excerpt'   => getValue($_POST['excerpt']),
        'body'      => getValue($_POST['body']),
    ];

    // On créé l'article et on le stock en base
    $postId = updatePost($id, $data);

    // On redirige l'utilisateur sur la page de l'article
    header("Location: /posts/show.php?id=$postId");
    exit();
}