<?php

require $_SERVER['DOCUMENT_ROOT'] . '/crud/functions/helpers.php';
require $_SERVER['DOCUMENT_ROOT'] . '/crud/functions/comments.php';
require $_SERVER['DOCUMENT_ROOT'] . '/crud/functions/users.php';
require $_SERVER['DOCUMENT_ROOT'] . '/crud/functions/posts.php';

$id = $_GET['id'];

if (getValue($_POST) && $id) {

    // On prépare les données depuis le formulaire
    $data = [
        'body' => getValue($_POST['body']),
    ];

    // On créé l'article et on le stock en base
    $commentId = updateComment($id, $data);

    // On redirige l'utilisateur sur la page de l'article
    header("Location: /crud/");
    exit();
}