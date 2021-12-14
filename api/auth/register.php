<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';

middleware('guest');

// On check si y'a des données
if (!empty($_POST)) {

// Check si email unique
    // Check l'email
    $email = getValue($_POST['email']);

    // On cherche un utilisateur avec le même email
    $sameEmailUser = getUserByEmail($email);

    // Si 1
    if ($sameEmailUser) {
        // Retour back avec errors
        header('Location: ../../register.php?error=true');
        exit;
    }

    // Check si password = password_confirm
    $password = getValue($_POST['password']);
    $passwordConfirm = getValue($_POST['password_confirm']);

    // FALSE
    if ($password !== $passwordConfirm) {
        // Retour back avec errors
        header('Location: ../../register.php?error=true');
        exit;
    }

    // On Hash le mot de passe
    $password = hash('sha256', $password);

    // On nettoie les données
    $data = [
        'username' => getValue($_POST['username']),
        'email' => getValue($_POST['email']),
        'password' => $password,
    ];

    // On créé l'utilisateur
    $id = storeUser($data);

    // On shoot un email
    // mail($data['email'], 'Bienvenue', 'Coucou');

    // On démare la session
    session_start();
    $_SESSION = [
        'auth_id' => $id,
    ];

    // On redirige vers la home
    header('Location: ../../');
    exit;
}