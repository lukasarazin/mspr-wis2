<?php

require $_SERVER['DOCUMENT_ROOT'] . '/crud/functions/helpers.php';
require $_SERVER['DOCUMENT_ROOT'] . '/crud/functions/posts.php';

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
    header("Location: /crud/posts/show.php?id=$postId");
    exit();
}