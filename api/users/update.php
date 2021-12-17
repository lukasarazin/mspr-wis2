<?php

require $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';
require $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';

middleware('auth');

$id = $_GET['id'];
$auth = getAuth();

if (getValue($_POST) && $id) {

    $imagePath = uploadImage($_FILES['avatar']);

    // On prépare les données depuis le formulaire
    $data = [
        'avatar' => getValue($auth['avatar']),
        'username' => getValue($_POST['username']),
        'first_name' => getValue($_POST['first_name']),
        'last_name' => getValue($_POST['last_name']),
        'biography' => getValue($_POST['biography']),
    ];

    if (getValue($_FILES['avatar']['tmp_name'])):

        // Supprimer la photo dans le dossier uploads
        if (getValue($auth['avatar'])):
            removeImage($auth['avatar']);
        endif;

        // Ajouter dans le dossier uploads le nouvel avatar
        $imagePath = uploadImage($_FILES['avatar']);

        // Modifier 'avatar' dans $data
        $data['avatar'] = $imagePath;
    endif;

    // On créé l'article et on le stock en base
    $UserId = updateUser($id, $data);

    // On redirige l'utilisateur sur la page de l'article
    header("Location: /users/show.php?id=$UserId");
    exit();
}