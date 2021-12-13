<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';

// On récupère les données
if (!empty($_POST)) {

    // On prépare les données
    $data = [
        'email' => getValue($_POST['email']),
        'password' => hash('sha256', getValue($_POST['password'])),
    ];

    // On regarde si le visiteur souhaite rester connecté
    // if(isset($_POST['remember']))
    // {
        // setcookie($data['email'], 'cookiename', time() + 3600 * 24 * 365, null, null, false, true);
        // setcookie($data['password'], 'cookiename', time() + 3600 * 24 * 365, null, null, false, true);
    // }

    // On cherche un utilisateur avec cet email et ce hash de MDP
    $user = getUserByEmailAndPassword($data['email'], $data['password']);

    // Si introuvable -> Back with error
    if (!$user) {
        header('Location: ../../login.php?error=true');
        exit;
    }

    // On démare la session
    session_start();
    $_SESSION = [
        'auth_id' => $user['id']
    ];

    // On redigige vers l'accueil
    header('Location: ../../');
    exit;
}