    <?php

    require $_SERVER['DOCUMENT_ROOT'] . '/crud/functions/helpers.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/crud/functions/users.php';

    $id = $_GET['id'];

    if (getValue($_POST) && $id) {

        // On prépare les données depuis le formulaire
        $data = [
            'username' => getValue($_POST['username']),
            'first_name' => getValue($_POST['first_name']),
            'last_name' => getValue($_POST['last_name']),
        ];

        // On créé l'article et on le stock en base
        $UserId = updateUser($id, $data);

        // On redirige l'utilisateur sur la page de l'article
        header("Location: /crud/users/show.php?id=$UserId");
        exit();
    }