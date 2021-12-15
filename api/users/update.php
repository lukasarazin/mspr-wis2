<?php

require $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';
require $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';

middleware('auth');

$id = $_GET['id'];
$auth = getAuth();

if (getValue($_POST) && $id) {

    // On prépare les données depuis le formulaire
    $data = [
        'avatar' => getValue($auth['avatar']),
        'username' => getValue($_POST['username']),
        'first_name' => getValue($_POST['first_name']),
        'last_name' => getValue($_POST['last_name']),
    ];

    if (getValue($_FILES['image'])):
        // Supprimer la photo dans le dossier uploads
        removeImage($auth['avatar']);

        // Ajouter dans le dossier uploads la nouvelle image
        $imagePath = uploadImage($_FILES['image']);

        // Modifier 'avatar' dans $data
        $data['avatar'] = $imagePath;
    endif;

    // On créé l'article et on le stock en base
    $UserId = updateUser($id, $data);

    // On redirige l'utilisateur sur la page de l'article
    header("Location: /users/show.php?id=$UserId");
    exit();
}