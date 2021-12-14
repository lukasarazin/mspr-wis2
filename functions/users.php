<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/database.php';


function    getAuth()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $id = getValue($_SESSION['auth_id']) ? $_SESSION['auth_id'] : 0;

    $dbh = connectDB();
    $stmt = $dbh->prepare('SELECT * FROM users WHERE id = :id LIMIT 1');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getUser($id)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('SELECT * FROM users WHERE id = :id LIMIT 1');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getUserByEmail($email)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getUserByEmailAndPassword($email, $password)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('SELECT * FROM users WHERE email = :email AND password = :password LIMIT 1');
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getUsers()
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('SELECT * FROM users WHERE deleted_at IS NULL');
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function storeUser($data)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)');
    $stmt->bindParam(':username', $data['username']);
    $stmt->bindParam(':email', $data['email']);
    $stmt->bindParam(':password', $data['password']);
    $stmt->execute();

    return $dbh->lastInsertId();
}

function updateUser($id, $data)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('UPDATE users SET username = :username, first_name = :first_name, last_name = :last_name, updated_at = NOW() WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':username', $data['username']);
    $stmt->bindParam(':first_name', $data['first_name']);
    $stmt->bindParam(':last_name', $data['last_name']);
    $stmt->execute();

    return $id;
}

function delete($id)
{

}


function getUserPosts($id)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('SELECT * FROM posts WHERE user_id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}










