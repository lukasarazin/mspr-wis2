<?php

require $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';
require $_SERVER['DOCUMENT_ROOT'] . '/functions/comments.php';
require $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';
require $_SERVER['DOCUMENT_ROOT'] . '/functions/posts.php';
middleware('auth');
$id = $_GET['id'];

if (getValue($_POST) && $id) {

    // On prépare les données depuis le formulaire
    $data = [
        'body' => getValue($_POST['body']),
    ];

    // On créé l'article et on le stock en base
    $commentId = updateComment($id, $data);

    // On redirige l'utilisateur sur la page de l'article
    header("Location: /");
    exit();
}