<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/database.php';


function getAuth()
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
    $stmt = $dbh->prepare('INSERT INTO users (username, biography, email, password) VALUES (:username, :biography, :email, :password)');
    $stmt->bindParam(':username', $data['username']);
    $stmt->bindParam(':email', $data['email']);
    $stmt->bindParam(':password', $data['password']);
    $stmt->bindParam(':biography', $data['biography']);
    $stmt->execute();

    return $dbh->lastInsertId();
}

function updateUser($id, $data)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('UPDATE users SET username = :username, first_name = :first_name, last_name = :last_name, avatar = :avatar, updated_at = NOW() WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':username', $data['username']);
    $stmt->bindParam(':first_name', $data['first_name']);
    $stmt->bindParam(':last_name', $data['last_name']);
    $stmt->bindParam(':avatar', $data['avatar']);

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


function follow($data)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('INSERT INTO follow (user_id, subscriber_id) VALUES (:user_id, :subscriber_id)');
    $stmt->bindParam(':user_id', $data['user_id']);
    $stmt->bindParam(':subscriber_id', $data['subscriber_id']);
    $stmt->execute();

    return true;
}

function unfollow($data)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('DELETE FROM follow WHERE user_id = :user_id AND subscriber_id = :subscriber_id LIMIT 1');
    $stmt->bindParam(':user_id', $data['user_id']);
    $stmt->bindParam(':subscriber_id', $data['subscriber_id']);
    return $stmt->execute();
}

function getSubscriptions($data)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('SELECT * FROM follow WHERE user_id = :user_id');
    $stmt->bindParam(':user_id', $data['user_id']);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getFollowers($data)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('SELECT * FROM follow WHERE user_id = :user_id');
    $stmt->bindParam(':user_id', $data['user_id']);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getFollowingAuthor($follow)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('SELECT * FROM users WHERE id = :subscriber_id LIMIT 1');
    $stmt->bindParam(':subscriber_id', $follow['subscriber_id']);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getSubscribeAuthor($subscribe)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('SELECT * FROM users WHERE id = :user_id LIMIT 1');
    $stmt->bindParam(':user_id', $subscribe['user_id']);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getUserSubscribers($id)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('SELECT * FROM follow WHERE user_id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getSubscribersUser($id)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('SELECT * FROM follow WHERE subscriber_id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function isFollowed()
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('SELECT * FROM users WHERE user_id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function storeLike($data)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('INSERT INTO likes (post_id, user_id) VALUES (:post_id, :user_id)');
    $stmt->bindParam(':post_id', $data['post_id']);
    $stmt->bindParam(':user_id', $data['user_id']);
    $stmt->execute();

    return $dbh->lastInsertId();
}

function getLikes($data)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('SELECT * FROM likes WHERE user_id = :user_id');
    $stmt->bindParam(':user_id', $data['user_id']);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getUserLikes($id)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('SELECT * FROM likes WHERE user_id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getLikeAuthor($like)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('SELECT * FROM likes WHERE id = :post_id LIMIT 1');
    $stmt->bindParam(':post_id', $like['post_id']);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function getLike($data)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('SELECT post_id FROM likes WHERE user_id = :user_id');
    $stmt->bindParam(':user_id', $data['user_id']);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}